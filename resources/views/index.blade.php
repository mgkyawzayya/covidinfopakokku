@extends('layouts.app')
@section('content')
<!--
  This example requires Tailwind CSS v2.0+

  The alpine.js code is *NOT* production ready and is included to preview
  possible interactivity
-->
<div class="bg-white py-0">
    <div class="bg-gray-100">
        <div class="max-w-7xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-base font-semibold text-indigo-600 tracking-wide uppercase">ပင်မစာမျက်နှာ</h2>
                <p class="mt-1 text-4xl font-extrabold text-gray-900 sm:text-5xl sm:tracking-tight lg:text-6xl">
                    အောက်ဆီဂျင် ရရှိနိုင်သည့်နေရာများ</p>
                {{-- <p class="max-w-xl mt-5 mx-auto text-xl text-gray-500">Start building for free, then add a site plan
                    to go
                    live. Account plans unlock additional features.</p> --}}
            </div>
        </div>
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <ul class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($oxygens as $oxygen)
            <li class="col-span-1 bg-white rounded-lg shadow divide-y divide-gray-200">
                <div class="w-full flex items-center justify-between p-6 space-x-6">
                    <div class="flex-1 truncate">
                        <div class="flex items-center space-x-3">
                            <h3 class="text-gray-900 text-sm font-medium truncate">{{ $oxygen->name }}</h3>
                            @if ($oxygen->status == 0)
                            <span
                                class="flex-shrink-0 inline-block px-2 py-0.5 text-red-800 text-xs font-medium bg-red-100 rounded-full">Not
                                Available</span>
                            @else
                            <span
                                class="flex-shrink-0 inline-block px-2 py-0.5 text-green-800 text-xs font-medium bg-green-100 rounded-full">Available</span>
                            @endif
                        </div>
                        <p class="mt-1 text-gray-500 text-sm truncate">{{ $oxygen->address }}</p>
                    </div>
                </div>
                <div>
                    <div class="-mt-px flex divide-x divide-gray-200">
                        <div class="w-0 flex-1 flex">
                            <a href="tel: {{ $oxygen->firstphone }}"
                                class="relative -mr-px w-0 flex-1 inline-flex items-center justify-center py-4 text-sm text-gray-700 font-medium border border-transparent rounded-bl-lg hover:text-gray-500">
                                <svg class="w-5 h-5 text-gray-400" x-description="Heroicon name: solid/phone"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true">
                                    <path
                                        d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z">
                                    </path>
                                </svg>
                                <span class="ml-3">{{ $oxygen->firstphone }}</span>
                            </a>
                        </div>
                        @if ($oxygen->secondphone)
                        <div class="-ml-px w-0 flex-1 flex">
                            <a href="tel:{{ $oxygen->secondphone }}"
                                class="relative w-0 flex-1 inline-flex items-center justify-center py-4 text-sm text-gray-700 font-medium border border-transparent rounded-br-lg hover:text-gray-500">
                                <svg class="w-5 h-5 text-gray-400" x-description="Heroicon name: solid/phone"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true">
                                    <path
                                        d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z">
                                    </path>
                                </svg>
                                <span class="ml-3">{{ $oxygen->secondphone }}</span>
                            </a>
                        </div>
                        @endif
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
