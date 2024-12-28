@extends('layouts.index')
@section('content')
    <div class="mx-5 mt-3 border bg-white rounded-lg py-5">
        <div class="flex justify-between mx-5 items-center">
            <p class="font-semibold text-zinc-800 text-lg">Master User</p>
            <a href="{{ route('users.create') }}" class="bg-sky-700 text-white text-xs py-2 px-3 rounded-lg font-medium">Tambah
                Data</a>
        </div>
        <div class="mx-5 mt-5">
            <div class="relative w-1/4">
                <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none z-20 ps-3.5">
                    <i data-lucide="search" class="shrink-0 size-4 text-gray-400"></i>
                </div>
                <input
                    class="py-2 ps-10 pe-4 block w-full border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-0 focus:outline-none disabled:opacity-50 disabled:pointer-events-none"
                    type="text"placeholder="Cari data..." value="">
            </div>
        </div>
        <div class="mx-5 mt-5">
            <div class="flex flex-col">
                <div class="-m-1.5 overflow-x-auto">
                    <div class="p-1.5 min-w-full inline-block align-middle">
                        <div class="border  rounded-lg overflow-hidden dark:border-neutral-700">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                                <thead>
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                            Name</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                            Age</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                            Address</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                                    <tr>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                            John Brown</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                            45</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                            New York No. 1 Lake Park</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                            <div class="hs-dropdown relative inline-flex">
                                                <button id="hs-dropdown-custom-icon-trigger" type="button"
                                                    class="hs-dropdown-toggle flex justify-center items-center size-9 text-sm font-semibold rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                                                    aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                                                    <svg class="flex-none size-4 text-gray-600 dark:text-neutral-500"
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <circle cx="12" cy="12" r="1" />
                                                        <circle cx="12" cy="5" r="1" />
                                                        <circle cx="12" cy="19" r="1" />
                                                    </svg>
                                                </button>

                                                <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden bg-white shadow-md rounded-lg mt-2 min-w-40 z-[60]"
                                                    role="menu" aria-orientation="vertical"
                                                    aria-labelledby="hs-dropdown-custom-icon-trigger">
                                                    <div class="p-1 space-y-0.5">
                                                        <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100"
                                                            href="#">
                                                            Edit Data
                                                        </a>
                                                        <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-red-600 hover:bg-gray-100 focus:outline-none focus:bg-gray-100"
                                                            href="#">
                                                            Hapus Data
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                            John Brown</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                            45</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                            New York No. 1 Lake Park</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                            <div class="hs-dropdown relative inline-flex">
                                                <button id="hs-dropdown-custom-icon-trigger" type="button"
                                                    class="hs-dropdown-toggle flex justify-center items-center size-9 text-sm font-semibold rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                                                    aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                                                    <svg class="flex-none size-4 text-gray-600 dark:text-neutral-500"
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <circle cx="12" cy="12" r="1" />
                                                        <circle cx="12" cy="5" r="1" />
                                                        <circle cx="12" cy="19" r="1" />
                                                    </svg>
                                                </button>

                                                <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden bg-white shadow-md rounded-lg mt-2 z-[60]"
                                                    role="menu" aria-orientation="vertical"
                                                    aria-labelledby="hs-dropdown-custom-icon-trigger">
                                                    <div class="p-1 space-y-0.5">
                                                        <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100"
                                                            href="#">
                                                            Edit Data
                                                        </a>
                                                        <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-red-600 hover:bg-gray-100 focus:outline-none focus:bg-gray-100"
                                                            href="#">
                                                            Hapus Data
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
