@extends('layouts.main')

@section('page_title')
    Author
@endsection

@section('content')
    <div class="flex min-h-screen">
        @include('layouts.sidebar')

        <div class="flex-1">
            @include('layouts.head')

            <main>
                <div class="w-100 h-100 flex justify-center items-center">
                    <div class="container mx-auto max-w-sm rounded-lg overflow-hidden shadow-lg my-2 bg-white">
                        <div class="relative z-10" style="clip-path: polygon(0 0, 100% 0, 100% 100%, 0 calc(100%));">
                            <img class="w-full"
                                src="https://png.pngtree.com/png-clipart/20230917/original/pngtree-no-image-available-icon-flatvector-illustration-thumbnail-graphic-illustration-vector-png-image_12323920.png?auto=format&fit=crop&w=634&q=80"
                                alt="Profile image" />
                        </div>
                        <hr>
                        <div class="relative flex justify-between items-center flex-row p-6 z-50 mt-2">
                            <ul>
                                <li><strong>Author: </strong>{{ $author['first_name'] }} {{ $author['last_name'] }}</li>
                                <li><strong>Biography:
                                    </strong>{{ isset($author['biography']) ? $author['biography'] : 'NA' }}</li>
                                <li>{{ isset($author['place_of_birth']) ? $author['place_of_birth'] : 'NA' }}</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="container mx-auto px-4 sm:px-8">
                    <div class="py-8">
                        <div>
                            <h2 class="text-2xl font-semibold leading-tight">Books</h2>
                        </div>
                        <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                            <div class="inline-block min-w-full shadow-md rounded-lg overflow-hidden">
                                <table class="min-w-full leading-normal">
                                    <thead>
                                        <tr>
                                            <th
                                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                                Title
                                            </th>
                                            <th
                                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                                isbn
                                            </th>
                                            <th
                                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                                Description
                                            </th>
                                            <th
                                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                                No of Pages
                                            </th>
                                            <th
                                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                                Release Date
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($author['books']))
                                            @forelse ($author['books'] as $book)
                                                <tr>
                                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                        <p class="text-gray-900 whitespace-no-wrap">
                                                            {{ $book['title'] }}
                                                        </p>
                                                    </td>
                                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                        <p class="text-gray-900 whitespace-no-wrap">
                                                            {{ $book['isbn'] }}
                                                        </p>
                                                    </td>
                                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                        <p class="text-gray-900 whitespace-no-wrap">
                                                            {{ $book['description'] }}
                                                        </p>
                                                    </td>
                                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                        <p class="text-gray-900 whitespace-no-wrap">
                                                            {{ $book['number_of_pages'] }}
                                                        </p>
                                                    </td>
                                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                        <p class="text-gray-900 whitespace-no-wrap">
                                                            {{ $book['release_date'] }}
                                                        </p>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td class="text-center p-5" colspan="5">No data found</td>
                                                </tr>
                                            @endforelse
                                        @else
                                            <tr>
                                                <td class="text-center p-5" colspan="5">No data found</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection
