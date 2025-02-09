@extends('layouts.main')

@section('page_title')
    Create a Book
@endsection

@section('content')
    <div class="flex min-h-screen">
        @include('layouts.sidebar')

        <div class="flex-1">
            @include('layouts.head')

            <main>
                <div class="flex justify-center items-center min-h-screen bg-gray-100">
                    <div class="bg-white overflow-hidden shadow-md rounded-lg w-full max-w-md">
                        <div class="p-8">
                            <form method="POST" action="{{ route('book.store') }}">
                                @method('POST')
                                @csrf

                                @if (@session('error'))
                                    <div
                                        class="alert alert-danger mb-4 p-3 bg-red-100 border border-red-400 text-red-700 rounded">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <!-- Email Field -->
                                <div class="mb-5">
                                    <label for="title" class="block mb-2 text-sm font-medium text-gray-600">
                                        Book Title <span class="text-red-600">*</span>
                                    </label>
                                    <input type="text" name="title" value="{{ @old('title') }}"
                                        class="block w-full p-3 rounded bg-gray-200 border border-transparent focus:outline-none focus:ring-2 focus:ring-indigo-400">
                                    @if ($errors->has('title'))
                                        <p class="text-red-600 text-sm">{{ $errors->first('title') }}</p>
                                    @endif
                                </div>

                                <div class="mb-5">
                                    <label for="description" class="block mb-2 text-sm font-medium text-gray-600">
                                        Description <span class="text-red-600">*</span>
                                    </label>
                                    <textarea name="description" rows="3"
                                        class="block w-full p-3 rounded bg-gray-200 border border-transparent focus:outline-none focus:ring-2 focus:ring-indigo-400">{{ @old('description') }}</textarea>
                                    @if ($errors->has('description'))
                                        <p class="text-red-600 text-sm">{{ $errors->first('description') }}</p>
                                    @endif
                                </div>

                                <div class="mb-5">
                                    <label for="isbn" class="block mb-2 text-sm font-medium text-gray-600">
                                        ISBN <span class="text-red-600">*</span>
                                    </label>
                                    <input type="text" name="isbn" value="{{ @old('isbn') }}"
                                        class="block w-full p-3 rounded bg-gray-200 border border-transparent focus:outline-none focus:ring-2 focus:ring-indigo-400">
                                    @if ($errors->has('isbn'))
                                        <p class="text-red-600 text-sm">{{ $errors->first('isbn') }}</p>
                                    @endif
                                </div>

                                <div class="mb-5">
                                    <label for="format" class="block mb-2 text-sm font-medium text-gray-600">
                                        Format <span class="text-red-600">*</span>
                                    </label>
                                    <input type="text" name="format" value="{{ @old('format') }}"
                                        class="block w-full p-3 rounded bg-gray-200 border border-transparent focus:outline-none focus:ring-2 focus:ring-indigo-400">
                                    @if ($errors->has('format'))
                                        <p class="text-red-600 text-sm">{{ $errors->first('format') }}</p>
                                    @endif
                                </div>

                                <div class="mb-5">
                                    <label for="pages" class="block mb-2 text-sm font-medium text-gray-600">
                                        Number of Pages <span class="text-red-600">*</span>
                                    </label>
                                    <input type="text" name="pages" value="{{ @old('pages') }}"
                                        class="block w-full p-3 rounded bg-gray-200 border border-transparent focus:outline-none focus:ring-2 focus:ring-indigo-400">
                                    @if ($errors->has('pages'))
                                        <p class="text-red-600 text-sm">{{ $errors->first('pages') }}</p>
                                    @endif
                                </div>

                                <!-- Dropdown Field -->
                                <div class="mb-5">
                                    <label for="author" class="block mb-2 text-sm font-medium text-gray-600">
                                        Author <span class="text-red-600">*</span>
                                    </label>
                                    <select name="author"
                                        class="block w-full p-3 rounded bg-gray-200 border border-transparent focus:outline-none focus:ring-2 focus:ring-indigo-400">
                                        <option value="">-- Choose an Author --</option>
                                        @foreach ($authors['items'] as $item)
                                            <option value="{{ $item['id'] }}">{{ $item['first_name'] }}
                                                {{ $item['last_name'] }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('author'))
                                        <p class="text-red-600 text-sm">{{ $errors->first('author') }}</p>
                                    @endif
                                </div>

                                <!-- Date Picker -->
                                <div class="mb-5">
                                    <label for="releasedate" class="block mb-2 text-sm font-medium text-gray-600">
                                        Release Date <span class="text-red-600">*</span>
                                    </label>
                                    <input type="date" name="releasedate" id="date"
                                        class="block w-full p-3 rounded bg-gray-200 border border-transparent focus:outline-none focus:ring-2 focus:ring-indigo-400">
                                        @if ($errors->has('releasedate'))
                                        <p class="text-red-600 text-sm">{{ $errors->first('releasedate') }}</p>
                                    @endif
                                </div>

                                <!-- Buttons -->
                                <div class="flex justify-between">
                                    <a href="{{ route('dashboard') }}"
                                        class="px-6 py-3 bg-red-600 text-white rounded shadow hover:bg-red-700 transition">
                                        Cancel
                                    </a>
                                    <button type="submit"
                                        class="px-6 py-3 bg-indigo-600 text-white rounded shadow hover:bg-indigo-700 transition">
                                        Save
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <script>
                    // Disable past dates in the date picker
                    document.addEventListener("DOMContentLoaded", function() {
                        let today = new Date().toISOString().split("T")[0];
                        document.getElementById("date").setAttribute("min", today);
                    });
                </script>

            </main>
        </div>
    </div>
@endsection
