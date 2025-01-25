<!-- Main modal -->
<div id="create-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Tambah Kursus Baru
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-toggle="create-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Tutup</span>
                </button>
            </div>
            <!-- Modal body -->
            <form action="{{ route('admin.create_courses') }}" method="POST" class="p-4 md:p-5">
                @csrf
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <!-- Kolom Nama -->
                    <div class="col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                            Kursus</label>
                        <input type="text" name="name" id="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Masukkan Nama Kursus" value="{{ old('name') }}" required="">
                        @if ($errors->has('name'))
                            <div class="text-sm text-red-500">{{ $errors->first('name') }}</div>
                        @endif
                    </div>

                    <!-- Kolom Deskripsi (Text Area) -->
                    <div class="col-span-2">
                        <label for="description"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                        <textarea name="description" id="description"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Masukkan Deskripsi Kursus" required="">{{ old('description') }}</textarea>
                        @if ($errors->has('description'))
                            <div class="text-sm text-red-500">{{ $errors->first('description') }}</div>
                        @endif
                    </div>

                    <!-- Kolom Harga (Integer) -->
                    <div class="col-span-2">
                        <label for="price"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga</label>
                        <input type="number" name="price" id="price"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Masukkan Harga Kursus" value="{{ old('price', 0) }}" required="">
                        @if ($errors->has('price'))
                            <div class="text-sm text-red-500">{{ $errors->first('price') }}</div>
                        @endif
                    </div>

                    <!-- Kolom Jumlah Siswa yang Terdaftar (Integer) -->
                    <div class="col-span-2">
                        <label for="student_count"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah Siswa Yang
                            Terdaftar</label>
                        <input type="number" name="student_count" id="student_count"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Masukkan Jumlah Siswa" value="{{ old('student_count', 0) }}" required="">
                        @if ($errors->has('student_count'))
                            <div class="text-sm text-red-500">{{ $errors->first('student_count') }}</div>
                        @endif
                    </div>

                    <!-- Kolom Status Kursus (Boolean) -->
                    <div class="col-span-2">
                        <label for="status"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status Kursus</label>
                        <div class="flex flex-row-reverse justify-end gap-5">
                            <input type="checkbox" name="status" id="status"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                value="1" {{ old('status') ? 'checked' : '' }}>
                            <span class="ml-2">Aktif</span>
                        </div>
                        @if ($errors->has('status'))
                            <div class="text-sm text-red-500">{{ $errors->first('status') }}</div>
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
                        Create
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
