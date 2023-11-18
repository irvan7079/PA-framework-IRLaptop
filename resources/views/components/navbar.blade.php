<header>
    <img src="{{ asset('assets/images/darkbg.jpg') }}" alt="" class="absolute w-full h-full object-cover -z-10 brightness-50">
    <div class="container min-h-screen ] bg-cover px-24 py-5 relative" >
        <nav class="flex text-center">
            <img src="{{ asset('assets/images/logoIR.png') }}" alt="logo web" class="h-[75px] cursor-pointer">
            <ul class="flex-1 items-center">
                <li class="list-none inline-block px-5"><a href="{{ route('welcome') }}"  class="no-underline text-white px-2 hover:text-violet-500 duration-300">Home</a></li>
                <li class="list-none inline-block px-5"><a href="#about"  class="no-underline text-white px-2 hover:text-violet-500 duration-300">About</a></li>
                <li class="list-none inline-block px-5"><a href="#menu"  class="no-underline text-white px-2 hover:text-violet-500 duration-300">Product</a></li>
                <li class="list-none inline-block px-5"><a href="#review"  class="no-underline text-white px-2 hover:text-violet-500 duration-300">Review</a></li>
                <li class="list-none inline-block px-5"><a href="#footer"  class="no-underline text-white px-2 hover:text-violet-500 duration-300">Contact</a></li>
            </ul>
        </nav>

        <div class="text-white mt-48">
            <h1 class="text-6xl font-semibold leading-normal">IR <br>Laptop Store <br></h1>
            <p>Dalam genggaman laptop, terdapat potensi tak terbatas untuk membangun, belajar, dan mengubah dunia.</p>

            <div class="mt-10">
                <a href="{{ route('login') }}" class="bg-violet-950 rounded-3xl py-3 px-8 font-medium inline-block mr-4
                hover:bg-transparent hover:border-violet-400 hover:text-white duration-300 hover:border border border-transparent">Login</a>
            </div>
        </div>
    </div>
</header>
