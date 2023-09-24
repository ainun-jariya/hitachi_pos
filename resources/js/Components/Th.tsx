import {ThHTMLAttributes} from 'react';

export default function Th({ className = '', children, ...props }: ThHTMLAttributes<HTMLTableColElement>) {
    return (
        <th
            {...props}
            className={'items-center bg-white dark:bg-gray-800  border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm text-white w-full' + className
            }
        >
            {children}
        </th>
    );
}
