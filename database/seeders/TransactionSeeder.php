<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Customer::all()->each(function ($customer) {
            $transactionFactories = \App\Models\Transaction::factory(rand(3,10))->make();
            $transactionFactories->each(function ($transactionFactory) use ($customer) {
                $customer->transactions()->save($transactionFactory);
                $transactionDetailFactories = \App\Models\TransactionDetail::factory(rand(3,10))->make();
                $transactionDetailFactories->each(function ($cartDetailFactory) use ($transactionFactory) {
                    $transactionFactory->details()->save($cartDetailFactory);
                });
            });
        });

        \App\Models\Staff::where('level', 'staff')->get()->each(function ($staff) {
            $transactionFactories = \App\Models\Transaction::factory(rand(3,10))->make();
            $transactionFactories->each(function ($transactionFactory) use ($staff) {
                $staff->transactions()->save($transactionFactory);
                $transactionDetailFactories = \App\Models\TransactionDetail::factory(rand(3,10))->make();
                $transactionDetailFactories->each(function ($cartDetailFactory) use ($transactionFactory) {
                    $transactionFactory->details()->save($cartDetailFactory);
                });
            });
        });
    }
}
