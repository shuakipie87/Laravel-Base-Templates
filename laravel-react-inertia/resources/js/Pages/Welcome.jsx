import { Link, Head } from '@inertiajs/react';

export default function Welcome({ auth, laravelVersion, phpVersion }) {
    return (
        <>
            <Head title="Welcome" />
            <div className="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
                <div className="max-w-7xl mx-auto p-6 lg:p-8">
                   <h1 className="text-4xl font-bold text-gray-900 dark:text-white">Laravel 12 + Inertia + React</h1>
                   <p className="mt-4 text-gray-500">Running on PHP {phpVersion}</p>
                </div>
            </div>
        </>
    );
}