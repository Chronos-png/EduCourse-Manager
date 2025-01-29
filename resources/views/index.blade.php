<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    {{-- banner --}}
    <div id="default-carousel" class="relative w-full" data-carousel="slide">
        <!-- Carousel wrapper -->
        <div class="relative h-[50vh] xl:h-[93vh] overflow-hidden rounded-lg">
            <!-- Item 1 -->
            <div class="hidden duration-1200 ease-in-out" data-carousel-item>
                <img src="{{ asset('/images/carousel/carousel-1.jpg') }}"
                    class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                    alt="...">
                @include('components.mask-carousel-overlay')
            </div>
            <!-- Item 2 -->
            <div class="hidden duration-1200 ease-in-out" data-carousel-item>
                <img src="{{ asset('/images/carousel/carousel-2.jpg') }}"
                    class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                    alt="...">
                @include('components.mask-carousel-overlay')
            </div>
            <!-- Item 3 -->
            <div class="hidden duration-1200 ease-in-out" data-carousel-item>
                <img src="{{ asset('/images/carousel/carousel-3.jpg') }}"
                    class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                    alt="...">
                @include('components.mask-carousel-overlay')
            </div>
        </div>

        <!-- Slider indicators -->
        <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
            <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
                data-carousel-slide-to="0"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
                data-carousel-slide-to="1"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"
                data-carousel-slide-to="2"></button>
        </div>

        <!-- Slider controls -->
        <button type="button"
            class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
            data-carousel-prev>
            <span
                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 1 1 5l4 4" />
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button type="button"
            class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
            data-carousel-next>
            <span
                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 9 4-4-4-4" />
                </svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    </div>

    <!-- Service Start -->
    <div class="w-full h-fit flex justify-center items-center py-20">
        <div class="container mx-auto py-10">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Service Item 1 -->
                <div class="text-center pt-3 rounded-lg bg-gray-200">
                    <div class="p-4">
                        <div class="flex justify-center w-full p-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-20 text-blue-900">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                            </svg>
                        </div>
                        <h5 class="text-lg font-semibold mb-3">Skilled Instructors</h5>
                        <p class="text-gray-600">Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita amet diam
                        </p>
                    </div>
                </div>
                <!-- Service Item 1 -->
                <div class="text-center pt-3 rounded-lg bg-gray-200">
                    <div class="p-4">
                        <div class="flex justify-center w-full p-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-20 text-blue-900">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                            </svg>
                        </div>
                        <h5 class="text-lg font-semibold mb-3">Online Classes</h5>
                        <p class="text-gray-600">Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita amet diam
                        </p>
                    </div>
                </div>
                <!-- Service Item 1 -->
                <div class="text-center pt-3 rounded-lg bg-gray-200">
                    <div class="p-4">
                        <div class="flex justify-center w-full p-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-20 text-blue-900">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                            </svg>
                        </div>
                        <h5 class="text-lg font-semibold mb-3">International Certificate</h5>
                        <p class="text-gray-600">Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita amet diam
                        </p>
                    </div>
                </div>
                <!-- Service Item 1 -->
                <div class="text-center pt-3 rounded-lg bg-gray-200">
                    <div class="p-4">
                        <div class="flex justify-center w-full p-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-20 text-blue-900">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                            </svg>
                        </div>
                        <h5 class="text-lg font-semibold mb-3">Home Projects</h5>
                        <p class="text-gray-600">Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita amet diam
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Service End -->

    <!-- About Start -->
    <div class="py-5 bg-gray-100">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 items-center">
                <div class="wow fadeInUp" data-wow-delay="0.1s">
                    <div class="relative h-[400px] w-full">
                        <img class="absolute w-full h-full object-cover"
                            src="{{ asset('images/carousel/default/about.jpg') }}" alt="">
                    </div>
                </div>
                <div class="wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="text-primary bg-white px-3 inline-block">About Us</h6>
                    <h1 class="text-3xl font-bold mb-4">Welcome to Edu Course</h1>
                    <p class="mb-4 text-gray-700">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu
                        diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                    <p class="mb-4 text-gray-700">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu
                        diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo
                        magna dolore erat amet</p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 mb-4">
                        <p class="flex items-center text-gray-800">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m12.75 15 3-3m0 0-3-3m3 3h-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>

                            Skilled Instructors
                        </p>
                        <p class="flex items-center text-gray-800">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m12.75 15 3-3m0 0-3-3m3 3h-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>

                            Online Classes
                        </p>
                        <p class="flex items-center text-gray-800">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m12.75 15 3-3m0 0-3-3m3 3h-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>

                            International Certificate
                        </p>
                        <p class="flex items-center text-gray-800">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m12.75 15 3-3m0 0-3-3m3 3h-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>

                            Skilled Instructors
                        </p>
                        <p class="flex items-center text-gray-800">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m12.75 15 3-3m0 0-3-3m3 3h-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>

                            Online Classes
                        </p>
                        <p class="flex items-center text-gray-800">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m12.75 15 3-3m0 0-3-3m3 3h-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>

                            International Certificate
                        </p>
                    </div>
                    <a class="bg-primary text-white py-3 px-5 inline-block mt-2 rounded-lg hover:bg-blue-700 transition"
                        href="#">Read More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Courses Start -->
    <div class="container mx-auto py-10">
        <div class="text-center">
            <h6 class="text-primary bg-white inline-block px-3">Courses</h6>
            <h1 class="mb-10">Popular Courses</h1>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 justify-center">
            @php
                $photo_num = 1;
            @endphp
            @foreach ($courses as $course)
                <div class="bg-gray-100 rounded-lg overflow-hidden shadow-md">
                    <div class="relative">
                        <img class="w-full" src="{{ asset('images/carousel/default/course-' . $photo_num . '.jpg') }}"
                            alt="">
                        <div class="absolute bottom-0 left-0 flex justify-center w-full mb-4 gap-4">
                            <a href="#" class="bg-primary text-white px-3 py-1 rounded-full bg-blue-500">Read
                                More</a>
                            <a href="#" class="bg-primary text-white px-3 py-1 rounded-full bg-blue-500">Join
                                Now</a>
                        </div>
                    </div>
                    <div class="text-center p-4">
                        <h3 class="mb-0"></h3>{{ $course->harga_kursus }}
                        <div class="mb-3 text-yellow-500">★★★★★ (123)</div>
                        <h5 class="mb-4">{{ $course->nama_kursus }}</h5>
                    </div>
                </div>
                @php
                    $photo_num++;
                @endphp
            @endforeach
        </div>
    </div>
    <!-- Courses End -->



    <!-- Team Start -->
    <div class="py-5 bg-gray-100">
        <div class="container mx-auto px-4">
            <div class="text-center">
                <h6 class="text-primary bg-white px-3 inline-block">Instructors</h6>
                <h1 class="text-3xl font-bold mb-5">Expert Instructors</h1>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <img class="w-full h-60 object-cover" src="{{ asset('images/carousel/default/team-1.jpg') }}"
                        alt="">
                    <div class="flex justify-center -mt-5">
                        <div class="bg-white p-2 flex space-x-2 rounded-full shadow-md">
                            <a class="text-primary p-2" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="text-primary p-2" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="text-primary p-2" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="text-center p-4">
                        <h5 class="font-semibold">Instructor Name</h5>
                        <small class="text-gray-500">Designation</small>
                    </div>
                </div>
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <img class="w-full h-60 object-cover" src="{{ asset('images/carousel/default/team-2.jpg') }}"
                        alt="">
                    <div class="flex justify-center -mt-5">
                        <div class="bg-white p-2 flex space-x-2 rounded-full shadow-md">
                            <a class="text-primary p-2" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="text-primary p-2" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="text-primary p-2" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="text-center p-4">
                        <h5 class="font-semibold">Instructor Name</h5>
                        <small class="text-gray-500">Designation</small>
                    </div>
                </div>
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <img class="w-full h-60 object-cover" src="{{ asset('images/carousel/default/team-3.jpg') }}"
                        alt="">
                    <div class="flex justify-center -mt-5">
                        <div class="bg-white p-2 flex space-x-2 rounded-full shadow-md">
                            <a class="text-primary p-2" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="text-primary p-2" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="text-primary p-2" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="text-center p-4">
                        <h5 class="font-semibold">Instructor Name</h5>
                        <small class="text-gray-500">Designation</small>
                    </div>
                </div>
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <img class="w-full h-60 object-cover" src="{{ asset('images/carousel/default/team-4.jpg') }}"
                        alt="">
                    <div class="flex justify-center -mt-5">
                        <div class="bg-white p-2 flex space-x-2 rounded-full shadow-md">
                            <a class="text-primary p-2" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="text-primary p-2" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="text-primary p-2" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="text-center p-4">
                        <h5 class="font-semibold">Instructor Name</h5>
                        <small class="text-gray-500">Designation</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->

    <!-- Testimonial Start -->
    <div class="py-5 bg-gray-100">
        <div class="container mx-auto px-4">
            <div class="text-center">
                <h6 class="text-primary bg-white px-3 inline-block">Testimonial</h6>
                <h1 class="text-3xl font-bold mb-5">Our Students Say!</h1>
            </div>
            <div class="flex flex-wrap justify-center gap-6">
                @foreach ($students as $student)
                    <div class="bg-white shadow-lg rounded-lg p-6 text-center max-w-sm">
                        <img class="w-20 h-20 border rounded-full p-2 mx-auto mb-3"
                            src="{{ asset('images/carousel/default/testimonial-2.jpg') }}" alt="">
                        <h5 class="font-semibold">{{ $student }}</h5>
                        <p class="text-gray-500">Profession</p>
                        <div class="bg-gray-100 p-4 rounded-lg">
                            <p class="text-gray-700">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam
                                amet
                                diam et eos. Clita erat ipsum et lorem et sit.</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Testimonial End -->


</x-guest-layout>
