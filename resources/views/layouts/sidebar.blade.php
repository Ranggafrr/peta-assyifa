<div class="w-1/4 bg-white border-r">
    <div class="px-6 pt-5">
        <a class="hs-layout-splitter-prev-pre-limit-reached:hidden block flex-none font-semibold text-xl text-black focus:outline-none focus:opacity-80 dark:text-white"
            href="#" aria-label="Brand">Brand</a>
        <a class="hs-layout-splitter-prev-pre-limit-reached:block hidden flex-none focus:outline-none focus:opacity-80"
            href="#" aria-label="Brand">
            <svg class="w-10 h-auto" width="100" height="100" viewBox="0 0 100 100" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <rect width="100" height="100" rx="10" fill="black"></rect>
                <path
                    d="M37.656 68V31.6364H51.5764C54.2043 31.6364 56.3882 32.0507 58.1283 32.8793C59.8802 33.696 61.1882 34.8146 62.0523 36.2351C62.9282 37.6555 63.3662 39.2654 63.3662 41.0646C63.3662 42.5443 63.0821 43.8108 62.5139 44.8643C61.9458 45.906 61.1823 46.7524 60.2235 47.4034C59.2646 48.0544 58.1934 48.522 57.0097 48.8061V49.1612C58.2999 49.2322 59.5369 49.6288 60.7206 50.3509C61.9162 51.0611 62.8927 52.0672 63.6503 53.3693C64.4079 54.6714 64.7867 56.2457 64.7867 58.0923C64.7867 59.9744 64.3309 61.6671 63.4195 63.1705C62.508 64.6619 61.1349 65.8397 59.3002 66.7038C57.4654 67.5679 55.1572 68 52.3754 68H37.656ZM44.2433 62.4957H51.3279C53.719 62.4957 55.4413 62.04 56.4948 61.1286C57.5601 60.2053 58.0928 59.0215 58.0928 57.5774C58.0928 56.5002 57.8264 55.5296 57.2938 54.6655C56.7611 53.7895 56.0035 53.103 55.021 52.6058C54.0386 52.0968 52.8667 51.8423 51.5054 51.8423H44.2433V62.4957ZM44.2433 47.1016H50.7597C51.896 47.1016 52.92 46.8944 53.8314 46.4801C54.7429 46.054 55.459 45.4562 55.9798 44.6868C56.5125 43.9055 56.7789 42.9822 56.7789 41.9169C56.7789 40.5083 56.2817 39.3482 55.2874 38.4368C54.3049 37.5253 52.843 37.0696 50.9017 37.0696H44.2433V47.1016Z"
                    fill="white"></path>
            </svg>
        </a>
    </div>
    <nav class="hs-accordion-group p-6 w-full flex flex-col flex-wrap" data-hs-accordion-always-open>
        <ul class="space-y-1.5">
            <li>
                <a class="hs-layout-splitter-prev-pre-limit-reached:hidden flex items-center gap-x-3.5 py-2 px-2.5 {{ $page == 'Dashboard' ? 'bg-gray-100 text-sky-700 font-semibold' : '' }} text-sm text-gray-700 rounded-lg hover:bg-gray-100"
                    href="{{ route('dashboard') }}">
                    Dashboard
                </a>
            </li>
            {{-- List Modul --}}
            @foreach ($modules as $module)
                @if ($module->menus->isNotEmpty())
                    <li class="hs-accordion {{ $modul == $module->modul ? 'active' : '' }} "
                        id="{{ $module->modul }}-accordion">
                        <button type="button"
                            class="hs-layout-splitter-prev-pre-limit-reached:hidden flex hs-accordion-toggle hs-accordion-active:text-sky-700 hs-accordion-active:hover:bg-transparent w-full text-start items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100"
                            aria-expanded="true" aria-controls="{{ $module->modul }}-accordion">
                            {{ $module->modul }}
                            <i data-lucide="chevron-right"
                                class="hs-accordion-active:rotate-90 ms-auto block size-4 text-gray-600 group-hover:text-gray-500"></i>
                        </button>
                        <div id="{{ $module->modul }}-accordion"
                            class="{{ $modul != $module->modul ? 'hidden' : '' }} hs-layout-splitter-prev-pre-limit-reached:hidden hs-accordion-content w-full overflow-hidden transition-[height] duration-300"
                            role="region" aria-labelledby="{{ $module->modul }}-accordion">
                            <ul class="hs-accordion-group ps-3 pt-2 space-y-1.5" data-hs-accordion-always-open>
                                {{-- List Menu --}}
                                @foreach ($module->menus as $menuItem)
                                    @if ($menuItem->sub_menu == 'Y')
                                        @if ($menuItem->subMenus->isNotEmpty())
                                            <li class="hs-accordion {{ $menu == $menuItem->nama_menu ? 'active' : '' }}"
                                                id="accordion-sub-{{ $menuItem->id }}">
                                                <button type="button"
                                                    class="hs-accordion-toggle hs-accordion-active:text-sky-700 hs-accordion-active:hover:bg-transparent w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100"
                                                    aria-expanded="true"
                                                    aria-controls="accordion-sub-{{ $menuItem->id }}">
                                                   {{$menuItem->kode_menu}} {{ $menuItem->nama_menu }}
                                                    <i data-lucide="chevron-right"
                                                        class="hs-accordion-active:rotate-90 ms-auto size-4 text-gray-600 group-hover:text-gray-500"></i>
                                                </button>
                                                <div id="accordion-sub-{{ $menuItem->id }}"
                                                    class="{{ $menu != $menuItem->nama_menu ? 'hidden' : '' }} hs-accordion-content w-full overflow-hidden transition-[height] duration-300"
                                                    role="region" aria-labelledby="accordion-sub-{{ $menuItem->id }}">
                                                    <ul class="pt-2 ps-2 space-y-1.5">
                                                        @foreach ($menuItem->subMenus as $submenu)
                                                            <li>
                                                                <a class="{{ $menu == $submenu->nama_submenu ? 'text-sky-700 font-semibold bg-gray-100' : 'text-gray-700' }} flex items-center gap-x-3.5 py-2 px-2.5 text-sm rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100"
                                                                    href="{{ route($submenu->route) }}">
                                                                    {{$submenu->kode_submenu}} {{ $submenu->nama_submenu }}
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </li>
                                        @endif
                                    @else
                                        <li>
                                            <a href="{{ route($menuItem->route) }}"
                                                class="{{ $menu == $menuItem->nama_menu ? 'text-sky-700 font-semibold bg-gray-100' : 'text-gray-700 ' }} w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100">
                                                {{ $menuItem->kode_menu }} {{ $menuItem->nama_menu }}
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </li>
                @endif
            @endforeach
        </ul>
    </nav>
</div>
