<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Learning') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col gap-8 justify-center items-center">

            <!-- Content -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($courses as $course)
                    <div
                        class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700 flex flex-col">
                        <a href="#" class="flex justify-center p-5">
                            {{-- <img class="rounded-t-lg" src="{{ $course->image_url }}" alt="" /> --}}
                            <x-application-logo class="block h-auto w-[5rem] fill-current text-gray-800" />
                        </a>
                        <div class="p-5 flex flex-col flex-grow">
                            <a href="#">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                    {{ $course->nama_kursus }}</h5>
                            </a>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 min-h-20 max-h-20">
                                {{ $course->deskripsi }}</p>
                            <div class="mt-auto">
                                <button
                                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 pay-button">
                                    Open Your Course
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>


            <!-- Pagination Links -->
            <div class="pagination w-full mt-20">
                {{ $courses->links() }}
            </div>

        </div>
    </div>
</x-app-layout>
