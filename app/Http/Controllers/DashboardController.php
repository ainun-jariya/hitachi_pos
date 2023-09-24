<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): Response
    {
        //get all posts
        $badges = [
            'total_customers' => Customer::all()->count(),
            'total_transactions' => number_format(Transaction::where('status', 'done')->sum('total_price'), 0, ',', '.'),
            'total_sales' => Transaction::where('status', 'done')->count(),
            'total_profit' => number_format(3000000, 0, ',', '.'),
        ];

        $transactions = Transaction::with([
            'transactable.user.image',
            'outlet',
        ]);
        if(@$request->get('customer_name')) {
            $transactions->whereHas('transactable', function ($qCust) use ($request) {
                $qCust->whereHas('user', function ($qUser) use ($request) {
                    $qUser->where('name', $request->get('customer_name'));
                });
            });
        }
        if(@$request->get('outlet_name')) {
            $transactions->whereHas('outlet', function ($qOutlet) use ($request) {
                $qOutlet->where('name', $request->get('outlet_name'));
            });
        }
        if(@$request->get('payment_status')) {
            $transactions->where('status', $request->get('payment_status'));
        }
        if(@$request->get('transaction_date')) {
            $transactions->whereBetween('created_at', [
                $request->get('transaction_date').' 00:00:00',
                $request->get('transaction_date').' 23:59:59'
            ]);
        }
        $transactions = $transactions->paginate($request->get('perPage', 15))->withQueryString();
        $paginationRange = range((($transactions->currentPage() - 2) < 1 ? 1 : $transactions->currentPage() - 2), (($transactions->currentPage() + 2) > $transactions->lastPage() ? $transactions->lastPage() : $transactions->currentPage() + 2));
        $paginationRangeUrls = [];
        foreach ($paginationRange as $key => $num)
        {
            $paginationRangeUrls[$key] = [
                'path' => $transactions->url($num),
                'num' => $num,
            ];
        }
        //return view
        return Inertia::render('Dashboard', [
            'badges' => $badges,
            'transactions' => $transactions->items(),
            'transactionsPagination' => [
                'perPage' => $transactions->perPage(),
                'path' => $transactions->path(),
                'currentPage' => $transactions->currentPage(),
                'total' => $transactions->total(),
                'lastPage' => $transactions->lastPage(),
                'rangeUrls' => $paginationRangeUrls,
                'nextPageUrl' => $transactions->nextPageUrl(),
                'previousPageUrl' => $transactions->previousPageUrl(),
            ]
        ]);
    }
}
