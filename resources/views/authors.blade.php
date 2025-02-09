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

                        </div>

                        <div class="w-full mt-4 flex gap-x-4">
                            <div class="w-5/6">
                                <h2 class="text-2xl font-semibold leading-tight">Authors</h2>
                            </div>

                            <div
                                class="w-1/6 rounded-lg bg-violet-500 px-4 py-2 text-center text-[#fff] ml-4 cursor-pointer">
                                <a href="{{ route('book.create') }}">Create a Book</a>
                            </div>
                        </div>
                        <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                            <div class="inline-block min-w-full shadow-md rounded-lg overflow-hidden">
                                <table class="min-w-full leading-normal">
                                    <thead>
                                        <tr>
                                            <th
                                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                                First Name
                                            </th>
                                            <th
                                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                                Last Name
                                            </th>
                                            <th
                                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                                Birthday
                                            </th>
                                            <th
                                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                                Gender
                                            </th>
                                            <th
                                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                                Birthplace
                                            </th>
                                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-right"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($authors['items']))
                                            @forelse ($authors['items'] as $item)
                                                <tr>
                                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                        <p class="text-gray-900 whitespace-no-wrap">
                                                            {{ $item['first_name'] }}
                                                        </p>
                                                    </td>
                                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                        <p class="text-gray-900 whitespace-no-wrap">
                                                            {{ $item['last_name'] }}
                                                        </p>
                                                    </td>
                                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                        <p class="text-gray-900 whitespace-no-wrap">
                                                            {{ $item['birthday'] }}
                                                        </p>
                                                    </td>
                                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                        <p class="text-gray-900 whitespace-no-wrap">
                                                            {{ $item['gender'] }}
                                                        </p>
                                                    </td>
                                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                        <p class="text-gray-900 whitespace-no-wrap">
                                                            {{ $item['place_of_birth'] }}
                                                        </p>
                                                    </td>
                                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-right">
                                                        <a href="{{ route('author.view', ['id' => $item['id']]) }}">View</a>
                                                        |
                                                        <a
                                                            href="{{ route('author.delete', ['id' => $item['id']]) }}">delete</a>
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
