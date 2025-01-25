<!-- Main modal Edit -->
<div id="edit-modal-{{ $course->nama_kursus }}" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Edit Kursus
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-toggle="edit-modal-{{ $course->nama_kursus }}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Tutup</span>
                </button>
            </div>
            <!-- Modal body -->
            <form action="" method="POST" class="p-4 md:p-5">
                @csrf
                @method('PUT') <!-- Untuk method PUT agar sesuai dengan update -->
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <!-- Kolom Nama -->
                    <div class="col-span-2">
                        <label for="nama_kursus"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
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

                    <!-- Kolom Status Kursus (Enum: 'active' or 'inactive') -->
                    <div class="col-span-2">
                        <label for="status_kursus"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status Kursus</label>
                        <select name="status_kursus" id="status_kursus"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            required="">
                            <option value="active" {{ $course->status_kursus == 'active' ? 'selected' : '' }}>Active
                            </option>
                            <option value="inactive" {{ $course->status_kursus == 'inactive' ? 'selected' : '' }}>
                                Inactive</option>
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
    </div>
</div>
