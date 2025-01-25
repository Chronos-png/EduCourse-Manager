<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Courses') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div> --}}

            @foreach ($courses as $course)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4 flex">
                    <div class="flex justify-center items-center pr-3 mr-2">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </div>
                    <div class="p-6 text-gray-900">
                        <h3 class="text-lg font-semibold">{{ $course->nama_kursus }}</h3>
                        <p class="text-sm text-gray-600">{{ $course->deskripsi }}</p>
                        <span class="text-green-500">
                            >> Daftar Sekarang
                        </span>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</x-app-layout>
