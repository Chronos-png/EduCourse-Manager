<x-admin-layout>
    @include('dashboard.admin.partials.delete-modal')
    @include('dashboard.admin.partials.create-modal')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Learning') }}
        </h2>
    </x-slot>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-16 py-8 bg-white m-4">
        @foreach ($courses as $course)
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4 flex px-2">
                <div class="flex justify-center items-center mr-10">
                    <input type="checkbox" class="courses-checkbox h-5 w-5 text-indigo-600 rounded"
                        data-id="{{ $course->nama_kursus }}">
                </div>
                <div class="flex justify-center items-center pr-3 mr-2">
                    <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                </div>
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold">{{ $course->nama_kursus }}</h3>
                    <p class="text-sm text-gray-600">{{ $course->deskripsi }}</p>
                    <span class="text-green-500">
                        >> Lihat Selengkapnya ...
                    </span>
                </div>
                <div class="flex justify-center items-center ml-auto">
                    <a href="{{ route('admin.edit_courses', $course->id_kursus) }}"
                        class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-3.5 h-3.5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4.243a1 1 0 1 0-2 0V11H7.757a1 1 0 1 0 0 2H11v3.243a1 1 0 1 0 2 0V13h3.243a1 1 0 1 0 0-2H13V7.757Z"
                                clip-rule="evenodd" />
                        </svg>
                        Edit
                    </a>
                </div>

            </div>
        @endforeach
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-16 py-6 bg-white m-4">

        <button data-modal-target="delete-modal" data-modal-toggle="delete-modal" type="button"
            class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                    d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
            </svg>
            Hapus
        </button>
        <button data-modal-target="create-modal" data-modal-toggle="create-modal" type="button"
            class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <svg class="w-3.5 h-3.5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 24 24">
                <path fill-rule="evenodd"
                    d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4.243a1 1 0 1 0-2 0V11H7.757a1 1 0 1 0 0 2H11v3.243a1 1 0 1 0 2 0V13h3.243a1 1 0 1 0 0-2H13V7.757Z"
                    clip-rule="evenodd" />
            </svg>
            Tambah
        </button>
    </div>

</x-admin-layout>
