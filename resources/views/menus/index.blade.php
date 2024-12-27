<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Kreasi Dapur</title>

        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

        <!-- Fonts -->
        <!-- <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> -->

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" 
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body >
        <div class="min-h-screen bg-gray-100">

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
            
            <livewire:layout.navigation />
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
                </section>

                <!--About-->

                <div class="about" id="About">
                    <div class="about_main">

                        <div class="image">
                            <img src="image/Food-Plate.png">
                        </div>

                        <div class="about_text">
                            <h1><span>Tentang</span>Kami</h1>
                            <h3>Mengapa memilih kami?</h3>
                            <p>
                                Di Kreasi Dapur, kami percaya bahwa setiap hidangan memiliki cerita. Kami menggabungkan resep-resep klasik keluarga dengan sentuhan modern untuk menciptakan makanan yang tidak hanya lezat, tetapi juga penuh makna. Mengapa memilih kami? Karena kami menyajikan lebih dari sekadar resep kami menyajikan warisan dan kenangan yang dapat dinikmati bersama orang terdekat. Dengan bahan-bahan berkualitas dan cara memasak yang sederhana namun istimewa, kami ingin setiap orang merasakan kehangatan dari dapur mereka sendiri. Bergabunglah dengan kami, dan temukan betapa indahnya berbagi cinta melalui masakan.
                            </p>
                        </div>

                    </div>

                </div>

                <!--Menu-->

                <div class="menu" id="Resep">
                    <h1>Resep<span>Keluarga</span></h1>
                    <input class="search-bar" type="text" id="searchInput" placeholder="Cari Resep" onkeyup="searchMenu()">
                    <div class="menu_box">
                        @if($menus->isEmpty())
                            <p class="notif">Maaf, namun tidak ada resep yang tersedia saat ini.</p>
                        @else
                            @foreach($menus as $menu)
                            <div class="menu_card">
                                <div class="menu_image">
                                    <img src="{{ asset('storage/' . $menu->gambar) }}" alt="Gambar Menu: {{ $menu->judul }}">
                                </div>

                                <div class="menu_info">
                                    <h2>{{ $menu->judul }}</h2>
                                    <p>
                                        {{ $menu->deskripsi }}
                                    </p>
                                    <a href="{{ route('menus.show', $menu->id) }}" class="menu_btn">Selengkapnya</a>
                                </div>
                            </div> 
                            @endforeach
                        @endif

                    </div>
                </div>

                <!--Team-->

                <div class="team">
                    <h1>Team<span>Kami</span></h1>

                    <div class="team_box">
                        <div class="profile">
                            <img src="image/Abyan.png" alt="Abyan Raga">

                            <div class="info">
                                <h2 class="name">Abyan Raga</h2>
                                <p class="bio">NIM: 234311001 <br> Jurusan/Prodi: Teknik/TRPL</p>

                                <div class="team_icon">
                                    <i class="fa-brands fa-facebook-f"></i>
                                    <i class="fa-brands fa-twitter"></i>
                                    <a href="https://www.instagram.com/_abyanraga/" target="_blank">
                                        <i class="fa-brands fa-instagram"></i>
                                    </a>
                                </div>

                            </div>

                        </div>

                        <div class="profile">
                            <img src="image/May.png" alt="Cantikka May">

                            <div class="info">
                                <h2 class="name">Cantikka May</h2>
                                <p class="bio">NIM: 234311010 <br> Jurusan/Prodi: Teknik/TRPL</p>

                                <div class="team_icon">
                                    <i class="fa-brands fa-facebook-f"></i>
                                    <i class="fa-brands fa-twitter"></i>
                                    <a href="https://www.instagram.com/cantikkamay_/" target="_blank">
                                        <i class="fa-brands fa-instagram"></i>
                                    </a>
                                </div>

                            </div>

                        </div>

                        <div class="profile">
                            <img src="image/Shaffa2.png" alt="Shaffa Dwiaji">

                            <div class="info">
                                <h2 class="name">Shaffa Dwiaji</h2>
                                <p class="bio">NIM: 234311028 <br> Jurusan/Prodi: Teknik/TRPL</p>

                                <div class="team_icon">
                                    <i class="fa-brands fa-facebook-f"></i>
                                    <i class="fa-brands fa-twitter"></i>
                                    <a href="https://www.instagram.com/shffdwj_/" target="_blank">
                                        <i class="fa-brands fa-instagram"></i>
                                    </a>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>
            </main>

            <footer>
                <p class="end">Hak Cipta &copy; 2024 <span>TRPL - KreasiDapur</span></p>
            </footer>
        </div>
        <script>
        function searchMenu() {
            const input = document.getElementById('searchInput');
            const filter = input.value.toLowerCase();
            const menuCards = document.querySelectorAll('.menu_card');

            menuCards.forEach(card => {
                const title = card.querySelector('h2').textContent.toLowerCase();
                if (title.includes(filter)) {
                    card.style.display = ""; 
                } else {
                    card.style.display = "none"; 
            }
            });
        }
    </script>
    </body>
</html>
