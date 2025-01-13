@extends('layouts.index')
@section('content')
    <div class="mx-5 mt-3">
      {{-- tabs --}}
        <div class="border-b border-gray-200 dark:border-neutral-700">
            <nav class="flex gap-x-2.5" aria-label="Tabs" role="tablist" aria-orientation="horizontal">
                <button type="button"
                    class="hs-tab-active:font-semibold hs-tab-active:border-sky-700 hs-tab-active:text-sky-700 py-4 px-1 inline-flex items-center gap-x-2 border-b-2 border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-sky-700 focus:outline-none focus:text-sky-700 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:text-blue-500 active"
                    id="tabs-with-icons-item-1" aria-selected="true" data-hs-tab="#tabs-with-icons-1"
                    aria-controls="tabs-with-icons-1" role="tab">
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                    </svg>
                    Data Wilayah
                </button>
                <button type="button"
                    class="hs-tab-active:font-semibold hs-tab-active:border-sky-700 hs-tab-active:text-sky-700 py-4 px-1 inline-flex items-center gap-x-2 border-b-2 border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-sky-700 focus:outline-none focus:text-sky-700 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:text-blue-500"
                    id="tabs-with-icons-item-2" aria-selected="false" data-hs-tab="#tabs-with-icons-2"
                    aria-controls="tabs-with-icons-2" role="tab">
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <circle cx="12" cy="10" r="3"></circle>
                        <path d="M7 20.662V19a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v1.662"></path>
                    </svg>
                    Tab 2
                </button>
                <button type="button"
                    class="hs-tab-active:font-semibold hs-tab-active:border-sky-700 hs-tab-active:text-sky-700 py-4 px-1 inline-flex items-center gap-x-2 border-b-2 border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-sky-700 focus:outline-none focus:text-sky-700 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:text-blue-500"
                    id="tabs-with-icons-item-3" aria-selected="false" data-hs-tab="#tabs-with-icons-3"
                    aria-controls="tabs-with-icons-3" role="tab">
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path
                            d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z">
                        </path>
                        <circle cx="12" cy="12" r="3"></circle>
                    </svg>
                    Tab 3
                </button>
            </nav>
        </div>
        <div class="mt-3">
            {{-- card data teritori --}}
            <div id="tabs-with-icons-1" role="tabpanel" aria-labelledby="tabs-with-icons-item-1">
                <div class="grid grid-cols-4 gap-x-4">
                    <div class="flex flex-col bg-green-500/70 shadow-sm rounded-xl">
                        <div class="p-4 md:p-5">
                            <div class="flex justify-between">
                                <div class="flex flex-col">
                                    <p class="text-xs text-white font-medium">Total Desa</p>
                                    <p class="text-white font-semibold text-lg">100</p>
                                </div>
                                <i data-lucide="chart-column-big" class="size-5 text-white"></i>
                            </div>
                            <small class="text-white">sejak bulan lalu 6</small>
                        </div>
                    </div>
                    <div class="flex flex-col bg-cyan-500/70 shadow-sm rounded-xl">
                        <div class="p-4 md:p-5">
                            <div class="flex justify-between">
                                <div class="flex flex-col">
                                    <p class="text-xs text-white font-medium">Total Kecamatan</p>
                                    <p class="text-white font-semibold text-lg">100</p>
                                </div>
                                <i data-lucide="chart-column-big" class="size-5 text-white"></i>
                            </div>
                            <small class="text-white">sejak bulan lalu 6</small>
                        </div>
                    </div>
                    <div class="flex flex-col bg-indigo-500/70 shadow-sm rounded-xl">
                        <div class="p-4 md:p-5">
                            <div class="flex justify-between">
                                <div class="flex flex-col">
                                    <p class="text-xs text-white font-medium">Total Kabupaten</p>
                                    <p class="text-white font-semibold text-lg">100</p>
                                </div>
                                <i data-lucide="chart-column-big" class="size-5 text-white"></i>
                            </div>
                            <small class="text-white">sejak bulan lalu 6</small>
                        </div>
                    </div>
                    <div class="flex flex-col bg-red-500/70 shadow-sm rounded-xl">
                        <div class="p-4 md:p-5">
                            <div class="flex justify-between">
                                <div class="flex flex-col">
                                    <p class="text-xs text-white font-medium">Total Provinsi</p>
                                    <p class="text-white font-semibold text-lg">100</p>
                                </div>
                                <i data-lucide="chart-column-big" class="size-5 text-white"></i>
                            </div>
                            <small class="text-white">sejak bulan lalu 6</small>
                        </div>
                    </div>
                </div>
            </div>
            <div id="tabs-with-icons-2" class="hidden" role="tabpanel" aria-labelledby="tabs-with-icons-item-2">
                <p class="text-gray-500 dark:text-neutral-400">
                    This is the <em class="font-semibold text-gray-800 dark:text-neutral-200">second</em> item's tab body.
                </p>
            </div>
            <div id="tabs-with-icons-3" class="hidden" role="tabpanel" aria-labelledby="tabs-with-icons-item-3">
                <p class="text-gray-500 dark:text-neutral-400">
                    This is the <em class="font-semibold text-gray-800 dark:text-neutral-200">third</em> item's tab body.
                </p>
            </div>
        </div>
    </div>
@endsection
