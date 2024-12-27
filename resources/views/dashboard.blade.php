<x-app-layout>
    <head>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </head>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Selamat Datang di Kreasi Dapur! ") }}
                </div>
            </div>
        </div>
                <section id="Home">
                    <div class="main">

                        <div class="men_text">
                            <h1>Hidangan<span>Lezat</span><br>Warisan Hangat</h1>
                        </div>

                        <div class="main_image">
                            <img src="image/main_img.png">
                        </div>

                    </div>

                    <p>
                        Selamat datang di tempat di mana cita rasa menjadi jembatan antara generasi. Kami hadir untuk menghadirkan koleksi resep istimewa yang tidak hanya menggugah selera, tetapi juga menghidupkan kembali kenangan hangat bersama keluarga. Temukan inspirasi memasak, bagikan cerita di balik setiap hidangan, dan jadikan dapur Anda pusat kebahagiaan keluarga. Mari kita ciptakan warisan lezat untuk masa depan!
                    </p>

                    <div class="main_btn">
                        <a href="{{route('menus.index')}}">Cari Resep</a>
                        <i class="fa-solid fa-angle-right"></i>
                    </div>

                </section>
    </div>
</x-app-layout>
