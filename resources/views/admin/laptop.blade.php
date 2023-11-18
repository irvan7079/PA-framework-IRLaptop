@extends('layouts.global')

@section('content')
    @include('components.nav2admin')
    <div class="w-full h-full flex">
        <div class="w-full flex flex-col bg-violet-900">
            <div class="h-auto m-4 p-8 bg-gray-900 rounded-lg drop-shadow-md">
                <p class="text-4xl font-bold mb-4 text-violet-500">Daftar Laptop</p>
                <hr><br>
                <form action="/admin/laptop/searchlaptop" class="form-inline" method="GET">
                    <input type="search" name="searchlaptop" class="px-2 w-[300px] py-2 bg-gray-800 rounded-sm ring-1 ring-slate-300 focus:outline-none focus:ring-violet-500" placeholder="Masukkan Merk Laptop">
                        <button type="submit" class="px-2 py-2 bg-violet-800 hover:bg-violet-600 rounded-md text text-black hover:text-white font-semibold duration-300">Cari Laptop</button>
                </form>

                <div class="w-full h-auto flex justify-end">
                    <a href="{{ route('admin.addlaptop') }}">
                        <button
                            class="px-4 py-2 bg-violet-800 hover:bg-violet-600 rounded-md text text-black hover:text-white font-semibold duration-300">Tambah Laptop</button>
                    </a>
                </div><br>
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-violet-500 uppercase bg-gray-900">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    No.
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Merk Laptop
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Spesifikasi Laptop
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Stok Laptop
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Harga Laptop
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($laptop as $index => $ltp)
                                <tr class="bg-gray-900 border-b hover:bg-violet-900 text-white font-medium hover:text-white">
                                    <th scope="row" class="px-6 py-4 whitespace-nowrap">
                                        {{ ++$index }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $ltp->merk_laptop }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $ltp->spesifikasi_laptop }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $ltp->stok_laptop." pcs" }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ "Rp. ".$ltp->harga_laptop }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="w-full h-auto flex justify-around">
                                            <a href="{{ route('admin.edit', $ltp->id) }}">
                                                <button
                                                    class="px-4 py-2 bg-yellow-600 rounded-md text-black hover:bg-yellow-400 hover:text-white font-semibold duration-300">Edit</button>
                                            </a>
                                            <form action="{{ route('admin.delete', $ltp->id) }}" method="post">
                                                @csrf
                                                <button
                                                class="px-4 py-2 bg-red-600 rounded-md text-black hover:bg-red-400 hover:text-white font-semibold duration-300">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
