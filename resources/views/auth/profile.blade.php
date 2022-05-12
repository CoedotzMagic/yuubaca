<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <x-validation-errors class="mb-4" :errors="$errors"/>

                    <x-success></x-success>

                    <form action="{{ route('profile.update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- <div>
                            <x-label for="name" :value="__('Name')"/>

                            <x-input oncontextmenu="return false;" id="name" class="block mt-1 w-full" type="text" name="name"
                                     :value="old('name', auth()->user()->name)" readonly/>
                        </div> -->

                        <div class="mt-4">
                            <x-label for="email" :value="__('Email')"/>

                            <x-input oncontextmenu="return false;" id="email" class="block mt-1 w-full" type="email" name="email"
                                     :value="old('email', auth()->user()->email)" readonly/>
                        </div>

                        <div class="mt-4">
                            <x-label for="password" :value="__('New password')"/>

                            <x-input id="password" class="block mt-1 w-full" type="password" name="password"/>
                        </div>

                        <div class="mt-4">
                            <x-label for="password_confirmation" :value="__('New password confirmation')"/>

                            <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                                     name="password_confirmation"/>
                        </div>

                        <br>
                        <x-label for="change_status" :value="__('* Untuk Perubahan Nama & Email, silahkan hubungi master admin di email admin@yuubaca.com dengan subjek email : Perubahan Data')"/>

                        <br>
                        <x-button class="mt-4">
                            {{ __('Submit') }}
                        </x-button>

                        <x-back-button>
                            {{ __('Kembali') }}
                        </x-back-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
