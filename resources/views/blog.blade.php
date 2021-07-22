@extends('layouts.app')
@section('content')
<!--
  This example requires Tailwind CSS v2.0+

  The alpine.js code is *NOT* production ready and is included to preview
  possible interactivity
-->
<div class="bg-white py-8">
    <div class="bg-gray-100">
        <div class="max-w-7xl mx-auto py-10 px-4 sm:py-24 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-base font-semibold text-indigo-600 tracking-wide uppercase ">သတင်းများ</h2>
            </div>
        </div>
    </div>
    <div class="relative bg-white pt-4 pb-20 px-4 sm:px-6 lg:pt-6 lg:pb-28 lg:px-8">
        <div class="absolute inset-0">
            <div class="bg-white h-1/3 sm:h-2/3"></div>
        </div>
        <div class="relative max-w-7xl mx-auto">
            <div class="mt-8 max-w-lg mx-auto grid gap-5 lg:grid-cols-3 lg:max-w-none">
                @foreach ($blogs as $blog )
                <div class="flex flex-col rounded-lg shadow-lg overflow-hidden divide-y-8 divide-gray-200">
                    <div class="flex-1 bg-white p-6 flex flex-col justify-between">
                        <div class="flex-1">
                            <p class="text-sm font-medium text-indigo-600">
                                <span
                                    class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-indigo-100 text-indigo-800 ">
                                    @if ($blog->category === 'knowledge')
                                    ဗဟုသုတ
                                    @elseif($blog->category === 'new')
                                    သတင်း
                                    @else
                                    @endif
                                </span>
                            </p>
                            <a href="posts/{{ $blog->slug }}" class="block mt-2">
                                <p class="text-xl font-semibold text-gray-900 ">
                                    {{ Str::words($blog->title, 10, '.....') }}
                                </p>
                                <p class="mt-3 text-base text-gray-500 ">
                                    <div>
                                        {!! Str::words(strip_tags($blog->descriptions), 20, '.....') !!}
                                    </div>
                                </p>
                            </a>
                        </div>
                        <div class="mt-6 flex items-center">
                            <div class="flex-shrink-0">
                                <a href="#">
                                    <span class="sr-only">{{ $blog->author->name }}</span>
                                    <img class="h-10 w-10 rounded-full" src="{{ asset('profile-user.png') }}" alt="">
                                </a>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-900">
                                    <a href="#" class="hover:underline">
                                        {{ $blog->author->name }}
                                    </a>
                                </p>
                                <div class="flex space-x-1 text-sm text-gray-500">
                                    <time datetime="2020-03-16">
                                        {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $blog->created_at)->format('d-m-Y') }}
                                    </time>
                                    <span aria-hidden="true">
                                        ·
                                    </span>
                                    <span>
                                        {{ (new Mtownsend\ReadTime\ReadTime(strip_tags($blog->descriptions)))->get() }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>{{ $blogs->links('vendor.pagination.tailwind') }}
        </div>
    </div>
</div>
@endsection
