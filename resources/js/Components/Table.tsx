import {TableHTMLAttributes} from 'react';

export default function Table({ className = '', children, ...props }: TableHTMLAttributes<HTMLTableElement>) {
    return (
        <table
            {...props}
            className={'mt-6 space-y-6 bg-white dark:bg-gray-800 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm table-fixed text-white w-full' + className
            }
        >
            {children}
        </table>
    );
}
