<x-app-layout>
    <div class="py-12 relative">
        <div class="relative max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col gap-8 justify-center items-center">

            <div class="flex w-full gap-3">

                <!-- Search -->
                <x-search-form :route="route('dashboard.courses')" :search="$search" />

                <!-- Dropdown Filter Button -->
                <button id="filterButton" class="px-4 py-2 bg-blue-500 text-white rounded">
                    Filter
                </button>
            </div>

            <!-- Dropdown Filter Form -->
            <div id="filterForm" class="hidden w-full relative h-0 z-20">
                <form method="GET" action="{{ route('dashboard.courses') }}"
                    class="flex gap-4 items-start w-[20rem] mx-auto flex-col p-5 absolute right-2 top-[-10px] bg-gray-100 border rounded shadow-sm">
                    <!-- Price Range Filters -->
                    <input type="number" name="min_price" value="{{ request()->get('min_price') }}"
                        placeholder="Min Price" class="px-4 py-2 rounded border w-full" />
                    <input type="number" name="max_price" value="{{ request()->get('max_price') }}"
                        placeholder="Max Price" class="px-4 py-2 rounded border w-full" />

                    <!-- Sort By -->
                    <select name="sort_by" class="px-4 py-2 rounded border w-full">
                        <option value="nama_kursus" {{ request()->get('sort_by') == 'nama_kursus' ? 'selected' : '' }}>
                            Sort by Name</option>
                        <option value="harga" {{ request()->get('sort_by') == 'harga' ? 'selected' : '' }}>Sort by
                            Price</option>
                    </select>

                    <!-- Sort Order -->
                    <select name="sort_order" class="px-4 py-2 rounded border w-full">
                        <option value="asc" {{ request()->get('sort_order') == 'asc' ? 'selected' : '' }}>Ascending
                        </option>
                        <option value="desc" {{ request()->get('sort_order') == 'desc' ? 'selected' : '' }}>Descending
                        </option>
                    </select>

                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Apply Filters</button>
                </form>
            </div>


            <!-- Content -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 z-10 mb-[15rem]">
                @foreach ($courses as $course)
                    <div
                        class="max-w-sm h-auto bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                        <a href="#" class="flex justify-center p-5">
                            {{-- <img class="rounded-t-lg" src="{{ $course->image_url }}" alt="" /> --}}
                            <x-application-logo class="block h-auto w-20 fill-current text-gray-800" />
                        </a>
                        <div class="p-5">
                            <a href="#">
                                <h5
                                    class="overflow-hidden course-description mb-2 min-h-[3.5rem] text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                                    {{ $course->nama_kursus }}</h5>
                            </a>
                            <p
                                class="course-description mb-3 text-sm text-gray-700 dark:text-gray-400 min-h-[4rem] max-h-[4rem] overflow-hidden">
                                {{ $course->deskripsi }}
                            </p>
                            <div class="flex-grow h-full">
                                <div class="flex-grow h-full flex justify-between items-center mt-auto space-x-4">
                                    @if ($course->status_kursus == 'active')
                                        <button
                                            onclick="enrollnow('{{ $course->id_kursus }}', '{{ $course->nama_kursus }}', {{ $course->harga }})"
                                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
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
                                    @else
                                        <button disabled
                                            onclick="enrollnow('{{ $course->id_kursus }}', '{{ $course->nama_kursus }}', {{ $course->harga }})"
                                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-gray-500 rounded-lg hover:bg-gray-500 focus:ring-4 focus:outline-none">
                                            Course Closed
                                        </button>

                                        <div class="flex items-center space-x-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-500">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                                            </svg>
                                            <span class="text-sm font-medium line-through">IDR
                                                {{ number_format($course->harga, 0, ',', '.') }}</span>
                                        </div>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination Links -->
            <div class="pagination w-full absolute bottom-[1rem]">
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

    // Fixiing the course description UI to show only 10 words
    document.addEventListener("DOMContentLoaded", function() {
        const maxWords = 24; // Set the maximum word count

        // Get all elements with the class "course-description"
        const descriptions = document.querySelectorAll('.course-description');

        descriptions.forEach(description => {
            let text = description.innerText.trim();
            let words = text.split(" ");

            if (words.length > maxWords) {
                words = words.slice(0, maxWords); // Slice to the first "maxWords" words
                description.innerText = words.join(" ") + "..."; // Rejoin and add "..."
            }
        });
    });


    // JavaScript to toggle visibility filters
    document.getElementById("filterButton").addEventListener("click", function() {
        var filterForm = document.getElementById("filterForm");
        filterForm.classList.toggle("hidden");
    });
</script>
