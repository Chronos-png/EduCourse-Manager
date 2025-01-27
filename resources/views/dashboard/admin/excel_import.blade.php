<x-admin-layout>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-16 py-8 bg-white m-4">

        {{-- Form Input Excel --}}
        <form action="{{ route('admin.import_courses') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload
                file</label>
            <input
                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                aria-describedby="file_input_help" id="file_input" type="file" name="file" accept=".xlsx, .xls">
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">Only accept an .xlsx / .xls
                file !
            </p>

            <div class="flex justify-end">
                <button
                    class="mt-4 text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    type="submit">Upload</button>
            </div>

        </form>

        {{-- Preview Section --}}
        @if (isset($dataValues))
            {{-- Preview Tables Header --}}
            <h4 class="text-2xl font-bold dark:text-white my-5">Preview Tables</h4>


            {{-- Preview Tables --}}
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Nama Kursus
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Deskripsi
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Harga
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataValues as $value)
                            <tr
                                class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $value->nama_kursus ?? '' }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $value->deskripsi ?? '' }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $value->harga ?? '' }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $value->status_kursus ?? '' }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <form class="flex justify-end my-5" action="{{ route('admin.store_courses') }}" method="POST">
                @csrf
                <input type="hidden" name="dataValues" value="{{ json_encode($dataValues) }}">
                <button
                    class="mt-4 text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    type="submit">Save</button>
            </form>
        @endif

    </div>

</x-admin-layout>
