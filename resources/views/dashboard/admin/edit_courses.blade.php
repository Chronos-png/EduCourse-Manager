<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Learning') }}
        </h2>
    </x-slot>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-16 py-8 bg-white m-4">

        <form action="{{ route('admin.update_courses', ['course' => $course->id_kursus]) }}" method="POST">
            @csrf
            @method('PUT') <!-- Agar form menggunakan method PUT -->

            <div class="grid gap-4 mb-4 grid-cols-2">
                <!-- Kolom Nama -->
                <div class="col-span-2">
                    <label for="nama_kursus" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                        Kursus</label>
                    <input type="text" name="nama_kursus" id="nama_kursus"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Masukkan Nama Kursus" value="{{ $course->nama_kursus }}" required="">

                    @if ($errors->has('nama_kursus'))
                        <div class="text-sm text-red-500">{{ $errors->first('nama_kursus') }}</div>
                    @endif
                </div>

                <!-- Kolom Deskripsi (Text Area) -->
                <div class="col-span-2">
                    <label for="deskripsi"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Masukkan Deskripsi Kursus" required="">{{ $course->deskripsi }}</textarea>
                    @if ($errors->has('deskripsi'))
                        <div class="text-sm text-red-500">{{ $errors->first('deskripsi') }}</div>
                    @endif
                </div>

                <!-- Kolom Harga (Integer) -->
                <div class="col-span-2">
                    <label for="harga"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga</label>
                    <input type="number" name="harga" id="harga"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Masukkan Harga Kursus" value="{{ $course->harga }}" required="">

                    @if ($errors->has('harga'))
                        <div class="text-sm text-red-500">{{ $errors->first('harga') }}</div>
                    @endif
                </div>

                <!-- Kolom Jumlah Siswa yang Terdaftar (Integer) -->
                <div class="col-span-2">
                    <label for="jumlah_siswa_yang_terdaftar"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah Siswa Yang
                        Terdaftar</label>
                    <input type="number" name="jumlah_siswa_yang_terdaftar" id="jumlah_siswa_yang_terdaftar"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Masukkan Jumlah Siswa" value="{{ $course->jumlah_siswa_yang_terdaftar }}"
                        required="">

                    @if ($errors->has('jumlah_siswa_yang_terdaftar'))
                        <div class="text-sm text-red-500">{{ $errors->first('jumlah_siswa_yang_terdaftar') }}</div>
                    @endif
                </div>

                <!-- Kolom Status Kursus -->
                <div class="col-span-2">
                    <label for="status_kursus"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status
                        Kursus</label>
                    <select name="status_kursus" id="status_kursus"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        required="">
                        <option value="active" {{ $course->status_kursus == 'active' ? 'selected' : '' }}>Active
                        </option>
                        <option value="inactive" {{ $course->status_kursus == 'inactive' ? 'selected' : '' }}>Inactive
                        </option>
                    </select>
                    @if ($errors->has('status_kursus'))
                        <div class="text-sm text-red-500">{{ $errors->first('status_kursus') }}</div>
                    @endif
                </div>
            </div>

            <!-- Button Submit -->
            <div class="w-full flex items-end">
                <button type="submit"
                    class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ml-auto">
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    Update
                </button>
            </div>
        </form>

    </div>
</x-admin-layout>
