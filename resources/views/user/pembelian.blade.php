@extends('layouts.global')

@section('content')
    @include('components.nav2user')
    <div class="w-full h-full flex">
        <div class="w-full flex flex-col bg-violet-950">
            <div class="w-auto h-auto m-4 p-8 bg-gray-900 rounded-lg drop-shadow-md self-center">
                <p class="text-3xl font-bold mb-4 text-white text-center">Pembelian Laptop</p>
                <hr><br>
                <form action="{{ route('user.konfirmasi', $laptops->id) }}" method="post" class="w-full flex flex-col items-center">
                    @csrf
                    <div class="h-auto flex flex-col gap-2">
                        <div class="grid place-items-center bg-violet-950 rounded-3xl ease-linear duration-200">
                            <img src="{{ asset($laptops->image_path) }}" alt="" class="w-80 hover:scale-110 ease-linear duration-200">
                        </div>
                        <div class="flex flex-row">
                            <p class="w-[150px]">Merk Laptop</p>
                            <p class="w-[20px]">:</p>
                            <input type="text" name="merk_laptop" id="" value="{{ $laptops->merk_laptop }}"
                                class="w-[500px] bg-violet-950 rounded-sm ring-1 ring-slate-300 focus:outline-none"@readonly(true)>
                        </div>
                        <div class="flex flex-row">
                            <p class="w-[150px]">Spesifikasi Laptop</p>
                            <p class="w-[20px]">:</p>
                            <input type="text" name="spesifikasi_laptop" id="" value="{{ $laptops->spesifikasi_laptop }}"
                                class="w-[500px] bg-violet-950 rounded-sm ring-1 ring-slate-300 focus:outline-none"@readonly(true)>
                        </div>
                        <div class="flex flex-row">
                            <p class="w-[150px]">Harga Laptop</p>
                            <p class="w-[20px]">:</p>
                            <input type="text" name="harga_laptop" id="" value="{{ $laptops->harga_laptop }}"
                                class="w-[500px] bg-violet-950 rounded-sm ring-1 ring-slate-300 focus:outline-none"@readonly(true)>
                        </div>
                        <div class="flex flex-row">
                            <p class="w-[150px]">Jumlah Laptop</p>
                            <p class="w-[20px]">:</p>
                            <input type="text" name="jumlah_laptop" id=""
                                class="w-[500px] bg-gray-800 rounded-sm ring-1 ring-slate-300 focus:outline-none focus:ring-violet-500">
                        </div>
                    </div>
                    <button type="submit"
                        class="w-[200px] h-auto py-4 mt-16 text-white font-medium bg-violet-800 rounded-md flex justify-center items-center hover:bg-violet-700">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
