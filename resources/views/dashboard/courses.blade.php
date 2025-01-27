<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Courses') }}
        </h2>
    </x-slot> --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col gap-8 justify-center items-center">

            <!-- Search -->
            <x-search-form :route="route('dashboard.courses')" :search="$search" />

            <!-- Content -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($courses as $course)
                    <div
                        class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                        <a href="#" class="flex justify-center p-5">
                            {{-- <img class="rounded-t-lg" src="{{ $course->image_url }}" alt="" /> --}}
                            <x-application-logo class="block h-auto w-[5rem] fill-current text-gray-800" />
                        </a>
                        <div class="p-5">
                            <a href="#">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                    {{ $course->nama_kursus }}</h5>
                            </a>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 min-h-20 max-h-20">
                                {{ $course->deskripsi }}</p>
                            <div class="flex justify-between items-center mt-auto">
                                <button
                                    onclick="enrollnow('{{ $course->id_kursus }}', '{{ $course->nama_kursus }}', {{ $course->harga }})"
                                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 pay-button">
                                    Enroll Now
                                </button>
                                <div class="flex items-center space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-500">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                                    </svg>
                                    <span class="text-sm font-medium">IDR
                                        {{ number_format($course->harga, 0, ',', '.') }}</span>
                                </div>
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

<script>
    async function enrollnow(courseId, courseName, coursePrice) {
        try {
            const response = await fetch('{{ route('create-payment') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                        'content'),
                },
                body: JSON.stringify({
                    name: @json(Auth::user()->name),
                    email: @json(Auth::user()->email),
                    amount: coursePrice, // Dynamic course price
                    course_id: courseId, // Dynamic course ID
                    course_name: courseName, // Dynamic course name
                }),
            });

            const data = await response.json();
            if (data.snap_token) {
                window.snap.pay(data.snap_token, {
                    onSuccess: function(result) {
                        // Kirim data ke server setelah pembayaran berhasil
                        saveTransaction(result, courseId);
                    },
                    onError: function(result) {
                        console.log("Payment error", result);
                    },
                    onPending: function(result) {
                        console.log("Payment pending", result);
                    }
                });
            } else {
                console.log('Failed to get Snap token');
            }

        } catch (error) {
            console.log('Error during payment creation:', error);
        }
    }

    async function saveTransaction(result, courseId) {
        try {
            const response = await fetch('{{ route('save-transaction') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                        'content'),
                },
                body: JSON.stringify({
                    transaction_id: result.transaction_id,
                    user_id: @json(Auth::user()->id),
                    course_id: courseId,
                    payment_status: result.transaction_status === 'settlement' ? 'paid' : 'unpaid',
                }),
            });
            const data = await response.json();
            if (data.success) {
                console.log('Transaction successfully saved');
            } else {
                console.log('Failed to save transaction');
            }
        } catch (error) {
            console.log('Error saving transaction:', error);
        }
    }
</script>
