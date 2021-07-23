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
                <p class="text-4xl lg:text-6xl font-extrabold text-indigo-600 tracking-wide uppercase">404</p>
                <p class="mt-5 text-2xl font-semibold text-gray-900 sm:text-5xl sm:tracking-tight lg:text-3xl">Page Not
                    Found.</p>
                <p class="max-w-xl mt-5 mx-auto text-xl text-gray-500">Please check the URL in the address bar and try
                    again.</p>
            </div>
        </div>
    </div>
</div>
@endsection
