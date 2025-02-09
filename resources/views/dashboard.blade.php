@extends('layouts.main')

@section('page_title')
    Dashboard
@endsection

@section('content')
    <div class="flex min-h-screen">
        @include('layouts.sidebar')

        <div class="flex-1">
            @include('layouts.head')

            <main>
                <div class="container mx-auto px-4 sm:px-8">
                    <div class="py-8">
                        <div>
                            <h2 class="text-2xl font-semibold leading-tight">Dashboard</h2>
                        </div>

                        <div class="w-full mt-4 flex gap-x-4">
                            <div class="w-5/6">
                                <p class="text-2xl"><strong>Hello, {{ Session::get('logggedinuser_first_name') }}
                                        {{ Session::get('logggedinuser_last_name') }}</strong></p>
                            </div>

                            <div
                                class="w-1/6 rounded-lg bg-violet-500 px-4 py-2 text-center text-[#fff] ml-4 cursor-pointer">
                                <a href="{{ route('logout') }}">Logout</a>
                            </div>
                        </div>
                        <small>Welcome to your dashboard</small>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection
