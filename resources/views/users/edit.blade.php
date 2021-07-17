@extends('layouts.dashboard')
@section('content')
<div class="bg-white">
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="max-w-none mx-auto">
            <div class="relative bg-white">
                <div class="absolute inset-0">
                    <div class="absolute inset-y-0 left-0 w-1/2 bg-gray-50"></div>
                </div>
                <div class="relative max-w-7xl mx-auto lg:grid lg:grid-cols-5">
                    <div class="bg-white py-16 px-4 sm:px-6 lg:col-span-5 lg:py-24 lg:px-8 xl:pl-12">
                        <div class="max-w-lg mx-auto lg:max-w-none">
                            <form action="{{ route('user.update', $user->id) }}" method="POST"
                                class="grid grid-cols-1 gap-y-6">
                                @csrf
                                @method('PUT')
                                <div>
                                    <label for="name" class="sr-only">Full name</label>
                                    <input type="text" name="name" id="name" autocomplete="name"
                                        class="block w-full shadow-sm py-3 px-4 placeholder-gray-500 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md"
                                        value="{{ $user->name }}">
                                </div>
                                <div>
                                    <label for="email" class="sr-only">Email</label>
                                    <input type="email" name="email" id="email" autocomplete="email"
                                        class="block w-full shadow-sm py-3 px-4 placeholder-gray-500 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md"
                                        value="{{ $user->email }}">
                                </div>
                                <div>
                                    <label for="password" class="sr-only">Email</label>
                                    <input type="password" name="password" id="password" autocomplete="email"
                                        class="block w-full shadow-sm py-3 px-4 placeholder-gray-500 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                                </div>
                                <div>
                                    <button type="submit"
                                        class="inline-flex justify-center py-3 px-6 border border-transparent shadow-sm text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
