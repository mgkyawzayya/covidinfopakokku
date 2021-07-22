@extends('layouts.app')
@section('content')
<!--
  This example requires Tailwind CSS v2.0+

  The alpine.js code is *NOT* production ready and is included to preview
  possible interactivity
-->
<div class="relative py-8 bg-white overflow-hidden">
    <div class="relative px-6 sm:px-6 lg:px-8">
        <div class="text-lg max-w-prose mx-auto">
            <h1>
                <span
                    class="mt-2 block text-2xl text-center leading-loose font-extrabold tracking-wide text-gray-900 sm:text-2xl pyidaungsu">{{$blog->title}}</span>
            </h1>
            <p class="mt-6 prose prose-indigo prose-lg text-gray-500 mx-auto leading-relaxed pyidaungsu">{!!
                $blog->descriptions !!}</p>
        </div>
    </div>
</div>
@endsection
