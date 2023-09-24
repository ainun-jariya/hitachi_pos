import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';
import { PageProps } from '@/types';
import Table from "@/Components/Table";
import Th from "@/Components/Th";
import Td from "@/Components/Td";

export default function Index({ auth, categories }: PageProps<{}>) {
    return (
        <AuthenticatedLayout
            user={auth.user}
            header={<h2 className="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Category</h2>}
        >
            <Head title="Category" />

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                    <div className="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                        <section className="">
                            <header>
                                <h2 className="text-lg font-medium text-gray-900 dark:text-gray-100">List of Category</h2>
                            </header>
                            <Table>
                                <thead>
                                    <tr>
                                        <Th>No</Th>
                                        <Th>Name</Th>
                                        <Th>Created At</Th>
                                        <Th>Updated At</Th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {categories.map((val, key) => {
                                        return (
                                            <tr key={key}>
                                                <td>{val.id}</td>
                                                <td>{val.name}</td>
                                                <td>{val.name}</td>
                                                <td>{val.name}</td>
                                            </tr>
                                        )
                                    })}
                                </tbody>
                            </Table>
                        </section>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
