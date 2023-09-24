import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import {Head, useForm} from '@inertiajs/react';
import { PageProps } from '@/types';
import {FormEventHandler} from "react";

export default function Dashboard({ auth, badges, transactions, transactionsPagination }: PageProps) {
    const { data, setData, get, processing, errors, reset } = useForm({
        customer_name: '',
        transaction_date: '',
        outlet_name: '',
        payment_status: ''
    });

    const submit: FormEventHandler = (e) => {
        e.preventDefault();

        get(route('dashboard'));
    };
    return (
        <AuthenticatedLayout
            user={auth.user}
            header={''}
        >
            <Head title="Dashboard" />

            <div className="container px-6 mx-auto grid">
                <h2
                    className="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
                >
                    Dashboard
                </h2>
                {/*badges*/}
                <div className="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
                    <div
                        className="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
                    >
                        <div
                            className="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500"
                        >
                            <svg className="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"
                                ></path>
                            </svg>
                        </div>
                        <div>
                            <p
                                className="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
                            >
                                Total Customers
                            </p>
                            <p
                                className="text-lg font-semibold text-gray-700 dark:text-gray-200"
                            >
                                {badges['total_customers']}
                            </p>
                        </div>
                    </div>
                    <div
                        className="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
                    >
                        <div
                            className="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500"
                        >
                            <svg className="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    fillRule="evenodd"
                                    d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                                    clipRule="evenodd"
                                ></path>
                            </svg>
                        </div>
                        <div>
                            <p
                                className="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
                            >
                                Total Transaction
                            </p>
                            <p
                                className="text-lg font-semibold text-gray-700 dark:text-gray-200"
                            >
                                Rp {badges['total_transactions']}
                            </p>
                        </div>
                    </div>
                    <div
                        className="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
                    >
                        <div
                            className="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500"
                        >
                            <svg className="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"
                                ></path>
                            </svg>
                        </div>
                        <div>
                            <p
                                className="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
                            >
                                Total Sale
                            </p>
                            <p
                                className="text-lg font-semibold text-gray-700 dark:text-gray-200"
                            >
                                {badges['total_sales']} transactions
                            </p>
                        </div>
                    </div>
                    <div
                        className="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
                    >
                        <div
                            className="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500"
                        >
                            <svg className="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    fillRule="evenodd"
                                    d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                                    clipRule="evenodd"
                                ></path>
                            </svg>
                        </div>
                        <div>
                            <p
                                className="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
                            >
                                Profit
                            </p>
                            <p
                                className="text-lg font-semibold text-gray-700 dark:text-gray-200"
                            >
                                Rp {badges['total_profit']}
                            </p>
                        </div>
                    </div>
                </div>
                {/*filter for table below*/}
                <div
                    className="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
                >
                    <form onSubmit={submit}>
                        <div className="flex w-full justify-between">
                            <label className="block text-sm">
                                <span className="text-gray-700 dark:text-gray-400">Transaction Date</span>
                                <input
                                    className="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    placeholder="10-10-2022"
                                    type="date"
                                    id="filter_transaction_date"
                                    name="transaction_date"
                                    value={data.transaction_date}
                                    onChange={(e) => setData('transaction_date', e.target.value)}
                                />
                            </label>

                            <label className="block text-sm">
                                <span className="text-gray-700 dark:text-gray-400">
                                  Customer Name
                                </span>
                                <input
                                    className="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    placeholder="Jane Doe"
                                    id="filter_customer_name"
                                    name="customer_name"
                                    value={data.customer_name}
                                    onChange={(e) => setData('customer_name', e.target.value)}
                                />
                            </label>
                            <label className="block text-sm">
                                <span className="text-gray-700 dark:text-gray-400">
                                  Outlet Name
                                </span>
                                <input
                                    className="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    placeholder="Balonggede"
                                    id="filter_outlet_name"
                                    name="outlet_name"
                                    value={data.outlet_name}
                                    onChange={(e) => setData('outlet_name', e.target.value)}
                                />
                            </label>
                            <label className="block text-sm">
                                <span className="text-gray-700 dark:text-gray-400">
                                  Payment Status
                                </span>
                                <select
                                    className="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                    id="filter_payment_status"
                                    name="payment_status"
                                    value={data.payment_status}
                                    onChange={(e) => setData('payment_status', e.target.value)}
                                >
                                    <option value=''>all</option>
                                    <option value='new'>New</option>
                                    <option value='waiting_payment'>Waiting Payment</option>
                                    <option value='delivery'>Delivery</option>
                                    <option value='done'>Done</option>
                                </select>
                            </label>
                            <button disabled={processing}
                                className="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                            >
                                <span>Filter</span>
                            </button>
                        </div>
                    </form>
                </div>

                {/*transaction report table*/}
                <div className="w-full overflow-hidden rounded-lg shadow-xs">
                    <div className="w-full overflow-x-auto">
                        <table className="w-full whitespace-no-wrap">
                            <thead>
                            <tr
                                className="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                            >
                                <th className="px-4 py-3">Customer Name</th>
                                <th className="px-4 py-3">Outlet Name</th>
                                <th className="px-4 py-3">Total Amount</th>
                                <th className="px-4 py-3">Status</th>
                                <th className="px-4 py-3">Transaction Time</th>
                            </tr>
                            </thead>
                            <tbody
                                className="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                            >
                            { transactions.map((transaction, key) => {
                                return (
                                <tr className="text-gray-700 dark:text-gray-400">
                                    <td className="px-4 py-3">
                                        <div className="flex items-center text-sm">

                                            <div
                                                className="relative hidden w-8 h-8 mr-3 rounded-full md:block"
                                            >
                                                <img
                                                    className="object-cover w-full h-full rounded-full"
                                                    src={transaction.transactable.user.image.file}
                                                    alt=""
                                                    loading="lazy"
                                                />
                                                <div
                                                    className="absolute inset-0 rounded-full shadow-inner"
                                                    aria-hidden="true"
                                                ></div>
                                            </div>
                                            <div>
                                                <p className="font-semibold">{transaction.transactable.user.name}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td className="px-4 py-3">
                                        <div className="flex items-center text-sm">
                                            <div>
                                                <p className="font-semibold">{transaction.outlet.name}</p>
                                                <p className="text-xs text-gray-600 dark:text-gray-400">
                                                    [Staff Name]
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td className="px-4 py-3 text-sm">
                                        Rp {transaction.totalPriceIdn}
                                    </td>
                                    <td className="px-4 py-3 text-xs">
                                        <span
                                            className={
                                                transaction.status == 'new' ?
                                                    "px-2 py-1 font-semibold leading-tight text-gray-700 bg-gray-100 rounded-full dark:text-gray-100 dark:bg-gray-700"
                                                    : (transaction.status == 'waiting_payment' ?
                                                        "px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:text-white dark:bg-orange-600"
                                                        : (transaction.status == 'delivery' ?
                                                            "px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-full dark:bg-yellow-700 dark:text-yellow-100"
                                                            : "px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100"
                                                            )
                                                        )
                                            }
                                        >
                                          {transaction.status}
                                        </span>
                                    </td>
                                    <td className="px-4 py-3 text-sm">
                                        {transaction.createdAtIdn}
                                    </td>
                                </tr>
                                );
                            })}
                            </tbody>
                        </table>
                    </div>
                    <div className="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                        <span className="flex items-center col-span-3">
                          Showing {(transactionsPagination.perPage * transactionsPagination.currentPage) - transactionsPagination.perPage + 1} - {transactionsPagination.perPage * transactionsPagination.currentPage} of {transactionsPagination.total}
                        </span>
                        <span className="col-span-2"></span>
                        <span className="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                          <nav aria-label="Table navigation">
                            <ul className="inline-flex items-center">
                                {transactionsPagination.previousPageUrl &&
                                  <li>
                                    <a href={transactionsPagination.previousPageUrl}
                                        className="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple"
                                        aria-label="Previous"
                                    >
                                      <svg
                                          aria-hidden="true"
                                          className="w-4 h-4 fill-current"
                                          viewBox="0 0 20 20"
                                      >
                                        <path
                                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                            clipRule="evenodd"
                                            fillRule="evenodd"
                                        ></path>
                                      </svg>
                                    </a>
                                  </li>
                                }
                                { transactionsPagination.rangeUrls.map(function (option) {
                                  return (<li>
                                    <a href={option.path}
                                        className={
                                            option.num == transactionsPagination.currentPage ?
                                            "px-3 py-1 text-white transition-colors duration-150 bg-purple-600 border border-r-0 border-purple-600 rounded-md focus:outline-none focus:shadow-outline-purple"
                                            : "px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
                                        }>
                                        {option.num}
                                    </a>
                                  </li>);
                                })}
                                {transactionsPagination.nextPageUrl &&
                                  <li>
                                    <a href={transactionsPagination.nextPageUrl}
                                        className="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple"
                                        aria-label="Next"
                                    >
                                      <svg
                                          className="w-4 h-4 fill-current"
                                          aria-hidden="true"
                                          viewBox="0 0 20 20"
                                      >
                                        <path
                                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                            clipRule="evenodd"
                                            fillRule="evenodd"
                                        ></path>
                                      </svg>
                                    </a>
                                  </li>
                                }
                            </ul>
                          </nav>
                        </span>
                    </div>
                </div>


                <h2
                    className="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
                >
                    Charts
                </h2>
                <div className="grid gap-6 mb-8 md:grid-cols-2">
                    <div
                        className="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
                    >
                        <h4 className="mb-4 font-semibold text-gray-800 dark:text-gray-300">
                            Revenue
                        </h4>
                        <canvas id="pie"></canvas>
                        <div
                            className="flex justify-center mt-4 space-x-3 text-sm text-gray-600 dark:text-gray-400"
                        >

                            <div className="flex items-center">
                    <span
                        className="inline-block w-3 h-3 mr-1 bg-blue-500 rounded-full"
                    ></span>
                                <span>Shirts</span>
                            </div>
                            <div className="flex items-center">
                    <span
                        className="inline-block w-3 h-3 mr-1 bg-teal-600 rounded-full"
                    ></span>
                                <span>Shoes</span>
                            </div>
                            <div className="flex items-center">
                    <span
                        className="inline-block w-3 h-3 mr-1 bg-purple-600 rounded-full"
                    ></span>
                                <span>Bags</span>
                            </div>
                        </div>
                    </div>
                    <div
                        className="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
                    >
                        <h4 className="mb-4 font-semibold text-gray-800 dark:text-gray-300">
                            Traffic
                        </h4>
                        <canvas id="line"></canvas>
                        <div
                            className="flex justify-center mt-4 space-x-3 text-sm text-gray-600 dark:text-gray-400"
                        >
                            <div className="flex items-center">
                    <span
                        className="inline-block w-3 h-3 mr-1 bg-teal-600 rounded-full"
                    ></span>
                                <span>Organic</span>
                            </div>
                            <div className="flex items-center">
                    <span
                        className="inline-block w-3 h-3 mr-1 bg-purple-600 rounded-full"
                    ></span>
                                <span>Paid</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
