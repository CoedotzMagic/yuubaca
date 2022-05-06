<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-green-400 leading-tight">
            Selamat datang, {{ Auth()->user()->name }}
        </h2>
    </x-slot>

    <div class="py-12 m-sm-5" style="width: 100%; display: table;">
        <div style="display: table-row">
            <div style="width: 600px; display: table-cell;">
                <x-card>
                    <div>
                        <x-slot name="logo">
                            <x-book-logo class="w-16 h-16 fill-current" style="color: #F6C762" />
                        </x-slot>

                        <p class="pt-3 text-4xl">
                            Buku
                        </p>

                            @php
                                $buku = \Illuminate\Support\Facades\DB::table('buku')->count();
                            @endphp
                            <p align="right" style="font-size: 50px; font-family: Arial">{{ $buku }}</p>
                    </div>
                </x-card>
            </div>

            <div style="display: table-cell;">
                <x-card2>
                    <div>
                        <x-slot name="logo">
                            <x-user-logo class="w-16 h-16 fill-current" style="color: #EE95C5" />
                        </x-slot>

                        <p class="pt-3 text-4xl">
                            Pengunggah
                        </p>

                            @php
                                $user = \Illuminate\Support\Facades\DB::table('users')->count();
                            @endphp
                            <p align="right" style="font-size: 50px; font-family: Arial">{{ $user }}</p>
                    </div>
                </x-card2>
            </div>
        </div>
    </div>

    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#9edcff" fill-opacity="1" d="M0,288L48,256C96,224,192,160,288,144C384,128,480,160,576,160C672,160,768,128,864,149.3C960,171,1056,245,1152,272C1248,299,1344,277,1392,266.7L1440,256L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>

    <div style="background-color: #9edcff">
        {{-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                
            </div>
        </div> --}}

        <div class="py-12 px-6 text-center">
            <p style="font-family: 'Gloria Hallelujah', cursive; font-size: 20px; color: white">Baca buku, berbagi koleksi bacaan dan bersosialisasi secara bersamaan. <br> Dimana pun, kapan pun dengan nyaman bersama setiap orang.</p>
        </div>
    </div>

    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#9edcff" fill-opacity="1" d="M0,64L24,90.7C48,117,96,171,144,197.3C192,224,240,224,288,218.7C336,213,384,203,432,170.7C480,139,528,85,576,90.7C624,96,672,160,720,176C768,192,816,160,864,133.3C912,107,960,85,1008,64C1056,43,1104,21,1152,16C1200,11,1248,21,1296,26.7C1344,32,1392,32,1416,32L1440,32L1440,0L1416,0C1392,0,1344,0,1296,0C1248,0,1200,0,1152,0C1104,0,1056,0,1008,0C960,0,912,0,864,0C816,0,768,0,720,0C672,0,624,0,576,0C528,0,480,0,432,0C384,0,336,0,288,0C240,0,192,0,144,0C96,0,48,0,24,0L0,0Z"></path></svg>

    @include('footer')
</x-app-layout>
