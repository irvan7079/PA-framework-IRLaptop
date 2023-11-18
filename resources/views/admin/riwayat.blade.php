@extends('layouts.global')

@section('content')
    @include('components.nav2admin')
    <div class="w-full h-full flex">
        <div class="w-full flex flex-col bg-violet-900">
            <div class="h-auto m-4 p-8 bg-gray-900 rounded-lg drop-shadow-md">
                <p class="text-4xl font-bold mb-4 text-violet-500">Daftar Riwayat Pembelian User</p>
                <hr><br>
                <form action="/admin/laptop/searchriwayat" class="form-inline" method="GET">
                    <input type="search" name="searchriwayat" class="px-2 w-[300px] py-2 bg-gray-800 rounded-sm ring-1 ring-slate-300 focus:outline-none focus:ring-violet-500" placeholder="Masukkan Username Pembeli">
                        <button type="submit" class="px-2 py-2 bg-violet-800 hover:bg-violet-600 rounded-md text text-black hover:text-white font-semibold duration-300">Cari Riwayat</button>
                </form><br>
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-violet-500 uppercase bg-gray-900">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    No.
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Username Pembeli
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Merk Laptop
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Harga Laptop
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Jumlah Laptop
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Total Harga
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $index => $usr)
                                <tr class="bg-gray-900 border-b hover:bg-violet-900 text-white font-medium hover:text-white">
                                    <th scope="row" class="px-6 py-4 whitespace-nowrap">
                                        {{ ++$index }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $usr->username }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="w-full h-auto">
                                            <button
                                                class="px-4 py-2 bg-red-600 rounded-md text-black hover:bg-white hover:text-red-500 font-semibold duration-300">Delete</button>
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
