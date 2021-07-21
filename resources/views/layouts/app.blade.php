<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="stylesheet" href='https://mmwebfonts.comquas.com/fonts/?font=pyidaungsu' />
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div class="bg-gray-100" style="min-height: 50px;">
        <nav x-data="{ open: false }" class="bg-white shadow">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <div class="flex-shrink-0 flex items-center">
                            <a href="{{ route('index') }}">
                                <img class="block lg:hidden h-8 w-auto" src="{{ asset('covidinfopku_square.svg') }}"
                                    alt="Workflow">
                                <img class="hidden lg:block h-8 w-auto" src="{{ asset('covidinfopku.svg') }}"
                                    alt="Workflow">
                            </a>
                        </div>
                        <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                            <!-- Current: "border-indigo-500 text-gray-900", Default: "border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700" -->
                            <a href="{{ route('index') }}"
                                class="{{ Request::path() == '/' ? 'border-indigo-500 text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700'}} inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                                ပင်မစာမျက်နှာ
                            </a>
                            <a href="{{ route('volunteer-list') }}"
                                class="{{ Request::path() == 'volunteer-list' ? 'border-indigo-500 text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700'}} inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                                စေတနာ့ဝန်ထမ်းများ
                            </a>
                            <a href="{{ route('emergency-list') }}"
                                class="{{ Request::path() == 'emergency-list' ? 'border-indigo-500 text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700'}} inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                                ပရဟိတအဖွဲ့အစည်းများ
                            </a>
                            <a href="{{ route('donation-list') }}"
                                class="{{ Request::path() == 'donation-list' ? 'border-indigo-500 text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700'}} inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                                လှူဒါန်းရန်
                            </a>
                            <a href="{{ route('blog-list') }}"
                                class="{{ Request::path() == 'blog-list' || Request::is('blogs/*') ? 'border-indigo-500 text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700'}} inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                                သတင်းများ
                            </a>
                            <a href="#"
                                class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                                About
                            </a>
                        </div>
                    </div>
                    <div class="-mr-2 flex items-center sm:hidden">
                        <!-- Mobile menu button -->
                        <button type="button"
                            class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
                            aria-controls="mobile-menu" @click="open = !open" aria-expanded="false"
                            x-bind:aria-expanded="open.toString()">
                            <span class="sr-only">Open main menu</span>
                            <svg x-description="Icon when menu is closed.

Heroicon name: outline/menu" x-state:on="Menu open" x-state:off="Menu closed" class="block h-6 w-6"
                                :class="{ 'hidden': open, 'block': !(open) }" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                            <svg x-description="Icon when menu is open. Heroicon name: outline/x" x-state:on="Menu open"
                                x-state:off="Menu closed" class="hidden h-6 w-6"
                                :class="{ 'block': open, 'hidden': !(open) }" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <div x-description="Mobile menu, show/hide based on menu state." class="sm:hidden" id="mobile-menu"
                x-show="open">
                <div class="pt-2 pb-3 space-y-1">
                    <!-- Current: "bg-indigo-50 border-indigo-500 text-indigo-700", Default: "border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700" -->
                    <a href="{{ route('index') }}"
                        class="{{ Request::path() == '/' ? 'bg-indigo-50 border-indigo-500 text-indigo-700' : 'border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700' }} block pl-3 pr-4 py-2 border-l-4 text-base font-medium">ပင်မစာမျက်နှာ</a>
                    <a href="{{ route('volunteer-list') }}"
                        class="{{ Request::path() == 'volunteer-list' ? 'bg-indigo-50 border-indigo-500 text-indigo-700' : 'border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700' }} block pl-3 pr-4 py-2 border-l-4 text-base font-medium">စေတနာ့ဝန်ထမ်းများ</a>
                    <a href="{{ route('emergency-list') }}"
                        class="{{ Request::path() == 'emergency-list' ? 'bg-indigo-50 border-indigo-500 text-indigo-700' : 'border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700' }} block pl-3 pr-4 py-2 border-l-4 text-base font-medium">ပရဟိတအဖွဲ့အစည်းများ</a>
                    <a href="{{ route('donation-list') }}"
                        class="{{ Request::path() == 'donation-list' ? 'bg-indigo-50 border-indigo-500 text-indigo-700' : 'border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700' }} block pl-3 pr-4 py-2 border-l-4 text-base font-medium">လှူဒါန်းရန်</a>
                    <a href="{{ route('blog-list') }}"
                        class="{{ Request::path() == 'blog-list' ||Request::is('blogs/*') ? 'bg-indigo-50 border-indigo-500 text-indigo-700' : 'border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700' }} block pl-3 pr-4 py-2 border-l-4 text-base font-medium">သတင်းများ</a>
                    <a href="#"
                        class="border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">About</a>
                </div>
            </div>
        </nav>
    </div>
    @yield('content')
    <footer class="bg-gray-50" aria-labelledby="footerHeading">
        <h2 id="footerHeading" class="sr-only">Footer</h2>
        <div class="max-w-md mx-auto pt-12 px-4 sm:max-w-7xl sm:px-6 lg:pt-16 lg:px-8">
            <div class="mt-12 border-t border-gray-200 py-8">
                <p class="text-base text-gray-400 xl:text-center">
                    © 2021 PakokkuInfo. All rights reserved.
                </p>
            </div>
        </div>
    </footer>
</body>

</html>
