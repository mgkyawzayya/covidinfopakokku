@extends('layouts.app')
@section('content')
<!--
  This example requires Tailwind CSS v2.0+

  The alpine.js code is *NOT* production ready and is included to preview
  possible interactivity
-->
<div class="relative py-16 bg-white overflow-hidden">
    <div class="relative px-6 sm:px-6 lg:px-8">
        <div class="text-lg max-w-prose mx-auto">
            <h1>
                <span
                    class="mt-2 block text-3xl text-center leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">{{$blog->title}}</span>
            </h1>
            <p class="mt-6 prose prose-indigo prose-lg text-gray-500 mx-auto pyidaungsu">{!! $blog->descriptions !!}</p>
        </div>
    </div>
</div>
@endsection
