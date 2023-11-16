<section id="menu">
    <div id="menu" class="container mb-10">
        <div class="max-w-md mx-auto text-center">
            <h2 class="font-oswald font-bold uppercase">OUR BEST MENU</h2>
            <div class="seperator mx-auto"></div>
            <p class="paragraph">Lorem ipsum dolor sit amet consectetur adipisicing elit. Non amet,
                 explicabo maiores vel reprehenderit in maxime ipsum animi minus dicta libero voluptatem eaque atque dolore nemo, ipsa error voluptatum illum.</p>
            <div class="tabs_wrap">
                <ul class="flex flex-wrap justify-center gap-3 py-10">
                    <li class="btn bg-violet-950">All</li>
                    <li class="btn bg-violet-950">Asus</li>
                    <li class="btn bg-violet-950">Acer</li>
                    <li class="btn bg-violet-950">Gaming</li>
                </ul>
            </div>
        </div>
        <div>
            <ul class="mx-7 grid grid-cols-1 gap-5 md:grid-cols-2 lg:grid-cols-4 lg:gap-12">
                @foreach ($laptop as $ltp)
                    <li>
                        <div class="h-56 grid place-items-center bg-violet-950 rounded-3xl hover:bg-slate-300 ease-linear duration-200">
                            <img src="{{ asset($ltp->image_path) }}" alt="" class="w-40 hover:scale-110 ease-linear duration-200">
                        </div>

                        <div class="pt-5">
                            <div class=" mb-2">
                                <h4 class="font-oswald font-bold uppercase">{{ $ltp->merk_laptop }}</h4>
                                <p class="paragraph">{{ $ltp->spesifikasi_laptop }}</p>
                                <p class="paragraph">{{ $ltp->stok_laptop." pcs" }}</p>
                            </div>

                            <p class="font-dmsans text-violet-300">{{ "Rp. ".$ltp->harga_laptop }}</p>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
 </section>
