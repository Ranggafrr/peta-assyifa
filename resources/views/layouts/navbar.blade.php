<div class="bg-white border-b shadow-sm w-full top-0 py-3 px-5">
    <div class="flex justify-between items-center">
        <div class="flex flex-col space-y-1.5">
            <p class="font-semibold text-zinc-700 text-lg">{{ $menu }}</p>
            <ol class="flex items-center whitespace-nowrap">
                @foreach ($breadcrumbs as $item)
                    @if ($loop->last)
                        <li class="inline-flex items-center text-xs font-medium text-cyan-600 truncate"
                            aria-current="page">
                            {{ $item['name'] }}
                        </li>
                    @else
                        <li class="inline-flex items-center">
                            <a class="flex items-center text-xs text-gray-500 hover:text-sky-700 focus:outline-none focus:text-sky-700"
                                href="{{ $item['url'] }}">
                                {{ $item['name'] }}
                            </a>
                            <i data-lucide="chevron-right" class="shrink-0 size-5 text-gray-400 mx-1"></i>
                        </li>
                    @endif
                @endforeach
            </ol>
        </div>
        <div class="hs-dropdown relative inline-flex">
            <button id="hs-dropdown-default" type="button"
                class="hs-dropdown-toggle inline-flex items-center gap-x-2 text-sm font-medium rounded-full border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                <img class="inline-block size-[45px] rounded-full"
                    src="https://images.unsplash.com/photo-1568602471122-7832951cc4c5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=300&h=300&q=80"
                    alt="Avatar">
            </button>
            <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-md rounded-lg mt-2 dark:bg-neutral-800 dark:border dark:border-neutral-700 dark:divide-neutral-700 after:h-4 after:absolute after:-bottom-4 after:start-0 after:w-full before:h-4 before:absolute before:-top-4 before:start-0 before:w-full"
                role="menu" aria-orientation="vertical" aria-labelledby="hs-dropdown-default">
                <div class="space-y-0.5 border-b flex space-x-2 items-center p-2.5">
                    <img class="inline-block size-8 rounded-full"
                        src="https://images.unsplash.com/photo-1568602471122-7832951cc4c5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=300&h=300&q=80"
                        alt="Avatar">
                    <div class="flex flex-col">
                        <p class="text-sm text-zinc-800 font-medium">{{ Session('user')->nama_lengkap }}</p>
                        <p class="text-xs text-zinc-600">{{ Session('user')->email ? Session('user')->email : '-' }}</p>
                    </div>
                </div>
                <div class="p-1 space-y-0.5 border-b">
                    <a class="flex items-center gap-x-2 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700"
                        href="#">
                        <i data-lucide="circle-user-round" class="size-5 text-zinc-700"></i> Profil
                    </a>
                    <a class="flex items-center gap-x-2 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700"
                        href="#">
                        <i data-lucide="settings"class="size-5 text-zinc-700"></i> Pengaturan
                    </a>
                </div>
                <div class="p-1 space-y-0.5">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="flex items-center gap-x-3.5 py-2 px-3 w-full rounded-lg text-sm text-red-600 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700">
                            <i data-lucide="log-out" class="size-5"></i> Keluar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
