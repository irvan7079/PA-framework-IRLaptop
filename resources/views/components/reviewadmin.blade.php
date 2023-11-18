<section id="review" class="bg-black-950 py-20 ">
 <div id="review" class="container">
    <div class="max-w-md mx-auto text-center">
        <h2 class="font-oswald font-bold uppercase">Customer Review</h2>
        <div class="seperator mx-auto"></div>
        <p class="paragraph">Mereka bukan hanya sekadar kata-kata, tetapi merupakan tonggak yang membangun jalan menuju pemahaman yang lebih dalam, memperbaiki kesalahan, dan menginspirasi perubahan positif. Dalam dunia yang terhubung secara digital ini, komentar-komentar yang memberikan nilai, dukungan, dan wawasan menjadi pendorong pertumbuhan dan perkembangan yang tak ternilai harganya.</p><br>
    </div>
    <div class="swiper py-10 mx-10">
        <ul class="swiper-wrapper">
            @foreach ($comment as $cmt)
                <li class="swiper-slide">
                    <div class="flex flex-col gap-5 bg-violet-950 rounded-lg p-6">
                        <p class="paragraph">{{ $cmt->isi_komentar }}</p>
                            <div class="flex items-center">
                                <img src="{{ asset('assets/images/zoropic.png') }}" alt="review image" class="w-12 h-12 rounded-full">
                                <div class="ml-2">
                                    <p class="font-oswald uppercase">{{ $cmt->username }}</p>
                                    <p class="paragraph">{{ $cmt->created_at }}</p>
                                </div>
                                <i class="ri-double-quotes-l text-violet-400 text-4xl ml-auto"></i>
                            </div>
                    </div>
                </li>
            @endforeach
        </ul>
        <div class="swiper-pagination"></div>
    </div>
 </div>
</section>
