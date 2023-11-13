<header>
    <img src="{{ asset('assets/images/darkbg.jpg') }}" alt="" class="absolute w-full h-full object-cover -z-10 brightness-50">
    <div class="container ] bg-cover px-24 py-5 relative" >
        <nav class="flex text-center">
            <img src="{{ asset('assets/images/logoIR.png') }}" alt="logo web" class="h-[75px] cursor-pointer">
            <ul class="flex-1 items-center">
                <li class="list-none inline-block px-5"><a href="{{ route('adminmenu') }}"  class="no-underline text-white px-2 hover:text-violet-500 duration-300">Home</a></li>
                <li class="list-none inline-block px-5"><a href="{{ route('admin.laptop') }}"  class="no-underline text-white px-2 hover:text-violet-500 duration-300">Daftar Laptop</a></li>
                <li class="list-none inline-block px-5"><a href="{{ route('admin.akun') }}"  class="no-underline text-white px-2 hover:text-violet-500 duration-300">Daftar Akun</a></li>
                <li class="list-none inline-block px-5"><a href="{{ route('admin.riwayat') }}"  class="no-underline text-white px-2 hover:text-violet-500 duration-300">Daftar Riwayat</a></li>
            </ul>
                <a href="{{ route('logout') }}" class="bg-violet-950 rounded-3xl py-3 px-8 font-bold inline-block mr-4
                hover:bg-transparent hover:border-violet-400 hover:text-white duration-300 hover:border border border-transparent">Logout</a>
        </nav>
    </div>
</header>
