@extends('layouts.main')

@section('page_title')
    Login
@endsection

@section('content')
    <div class="container mx-auto p-8 flex">
        <div class="max-w-md w-full mx-auto">
            <h1 class="text-4xl text-center mb-12 font-thin">Royal Apps</h1>

            <div class="bg-white rounded-lg overflow-hidden shadow-2xl">
                <div class="p-8">
                    <form method="POST" class="" action="{{ route('do-login') }}">
                        @method('POST')
                        @csrf

                        @if (@session('error'))
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="mb-5">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-600">Email <span
                                    class="text-red-600">*</span></label>

                            <input type="text" name="email" value="{{ @old('email') }}"
                                class="block w-full p-3 rounded bg-gray-200 border border-transparent focus:outline-none">
                            @if ($errors->has('email'))
                                <p class="text-red-600">{{ $errors->first('email') }}</p>
                            @endif
                        </div>

                        <div class="mb-5">
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-600">Password <span
                                    class="text-red-600">*</span></label>

                            <input type="password" name="password" value="{{ @old('password') }}"
                                class="block w-full p-3 rounded bg-gray-200 border border-transparent focus:outline-none">
                            @if ($errors->has('password'))
                                <p class="text-red-600">{{ $errors->first('password') }}</p>
                            @endif
                        </div>

                        <button type="submit"
                            class="w-full p-3 mt-4 bg-indigo-600 text-white rounded shadow">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
