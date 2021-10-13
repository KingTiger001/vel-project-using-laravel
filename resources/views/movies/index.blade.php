{{-- @dump($velflix) --}}
{{-- @dump($genres) --}}
{{-- @dump($trending) --}}
{{-- @dump($popular); --}}

<div class="container px-4 pt-16 mx-auto">
    <!-- Popular Movies -->
    <sectionc x-data="{ open: false}" >
        <h2 class="mb-4 text-lg antialiased font-bold tracking-wider text-gray-200">
            Popular on Velflix &rsaquo;
        </h2>

        <div class="carousel" data-flickity='{ "freeScroll": true, "wrapAround": true }'
            class="flex carousel flex-nowrap">
            <!-- Cards -->
            @foreach ($popular as $movie)
            <div @click="open = true" class="flex flex-col mr-3 overflow-hidden rounded-md" style="background-color:  #181818">
                <div @click="open = true" class="w-72">
                    <img class="w-full h-56 cursor-pointer"
                        src="{{ 'https://image.tmdb.org/t/p/w500' . $movie['poster_path'] }}"
                        alt="poster">
                </div>

                <div x-show="open"  class="">
                <!-- Buttons Navigation -->
                <div class="flex flex-row items-center justify-between m-4">
                    <div class="flex items-center justify-center space-x-2">
                        <button class="flex items-center justify-center bg-white rounded-full w-9 h-9 focus:outline-none" >
                            <x-icons name="caret-right-fill" />
                        </button>
                        <button class="flex items-center justify-center w-8 h-8 border-2 border-gray-400 rounded-full hover:border-gray-100">
                            <x-icons name="plus" />
                        </button>
                        <button class="flex items-center justify-center w-8 h-8 border-2 border-gray-400 rounded-full hover:border-gray-100">
                            <x-icons name="hand-thumbs-up" />
                        </button>
                        <button class="flex items-center justify-center w-8 h-8 border-2 border-gray-400 rounded-full hover:border-gray-100">
                            <x-icons name="hand-thumbs-down" />
                        </button>
                    </div>

                    <div class="">
                        <button class="flex items-center justify-center w-8 h-8 border-2 border-gray-400 rounded-full hover:border-gray-100 focus:outline-none ">
                            <x-bi-chevron-down class="w-4 h-4 text-white" />
                        </button>
                    </div>
                </div>
                <!-- End Buttons Navigation -->

                <!-- Rating -->
                <div class="flex mx-4">
                    <span class="font-bold text-green-500">{{ $movie['vote_average'] * 10 . '%' }} Match</span>
                </div>
                <!-- End Rating -->

                <!-- Genres -->
                <div class="flex m-4">
                    <span class="flex text-sm font-medium text-gray-400 truncate">
                    @foreach ($movie['genre_ids'] as $genre)
                    {{-- @dump($genre) --}}
                    @if ($loop->index)
                        &middot;
                        {{ $genres->get($genre)}}
                    @endif

                    @endforeach
                    </span>
                </div>
                <!-- End Genres -->
                </div>
            </div>
            @endforeach
            <!-- End Cards -->
        </div>

        <!-- Model card -->
        @foreach ($popular as $movie)
        <div x-show="open"
            x-transition:enter="duration-500 ease-in-out transition-tansform"
            class="fixed top-0 left-0 flex items-center w-full h-full mt-6 overflow-y-auto ">
            <div class="container mx-auto overflow-y-auto bg-gray-500 rounded-lg opacity-75 lg:px-56">
                <div  @click.away="open = false" class="bg-gray-100 border-8 shadow-lg rounded-xl">
                    <!-- Modal Head -->
                    <div class="relative overflow-hidden bg-gray-200" >
                        <iframe class="absolute top-0 left-0 w-full h-full rounded-t-xl responsive-iframe"
                            src="https://www.youtube.com/embed/XIAtk0eFONw"
                            allow="autoplay; encrypted-media" allowfullscreen>
                        </iframe>
                        <button class="z-50" @click="open = false">
                            <svg  xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </button>

                    </div>

                    <!-- Modal Body -->
                    <div class="px-8 py-3">
                        <div class="relative overflow-hidden responsive-container">
                            <div class="flex flex-row w-full my-4 space-x-4">
                                <button class="flex items-center justify-center px-2 py-2 space-x-2 bg-white rounded shadow-md bg-gradient w-28 ">
                                    <x-icons name="caret-right-fill" />
                                    <span class="font-semibold text-black">Play</span>
                                </button>
                                <button class="flex items-center justify-center w-8 h-8 mr-2 rounded-full ring-2 ring-gray-400">
                                    <x-icons name="plus" />
                                </button>
                                <button class="flex items-center justify-center w-8 h-8 mr-2 rounded-full ring-2 ring-gray-400">
                                    <x-icons name="hand-thumbs-up" />
                                </button>
                                <button class="flex items-center justify-center w-8 h-8 mr-8 rounded-full ring-2 ring-gray-400">
                                    <x-icons name="hand-thumbs-down" />
                                </button>
                            </div>

                            <div class="flex my-4">
                                <div class="w-4/6">
                                    <span class="flex mb-3 space-x-4">
                                        <p class="font-bold text-green-500">{{ $movie['vote_average'] * 10 . '%' }} Match</p>
                                        <p>2021</p>
                                    </span>

                                    <span>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur, voluptates.
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt, voluptatum?
                                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Incidunt, nulla.
                                    </span>
                                    <span>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur, voluptates.
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt, voluptatum?
                                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Incidunt, nulla.
                                    </span>
                                    <span>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur, voluptates.
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt, voluptatum?
                                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Incidunt, nulla.
                                    </span>
                                    <span>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur, voluptates.
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt, voluptatum?
                                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Incidunt, nulla.
                                    </span>
                                </div>

                                <div class="w-2/6">
                                    <span class="flex mb-3 text-gray-500">
                                        Cast:
                                    </span>
                                    <span class="text-gray-500">
                                        Genres:
                                        @foreach ($movie['genre_ids'] as $genre)
                                        {{-- @dump($genre) --}}
                                            &middot;
                                            {{ $genres->get($genre)}}
                                        @endforeach
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </sectionc>
    <!-- End Popular Movies -->


    {{-- <div class="popular-movies">
        <h2 class="text-lg antialiased font-bold tracking-wide text-gray-200">
            Trending Now
        </h2>

        <div>
            <div x-data="{swiper: null}" x-init="swiper = new Swiper($refs.container, {
                loop: true,
                slidesPerView: 2,
                spaceBetween: 0,

                breakpoints: {
                640: {
                    slidesPerView: 1,
                    spaceBetween: 0,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 0,
                },
                1024: {
                    slidesPerView: 5,
                    spaceBetween: 0,
                },
                },
            })" class="relative flex flex-row w-full mx-auto">

                <button class="absolute inset-y-0 left-0 z-10 text-center origin-center bg-black bg-opacity-50 w-14" @click="swiper.slidePrev()">
                    <x-bi-chevron-compact-left class="ml-5 text-white" />
                </button>

                <div class="swiper-container" x-ref="container">
                    <div class="text-white swiper-wrapper">
                        @foreach($trending as $movie )
                            <x-velflix-card :movie="$movie" :genres="$genres" />
                        @endforeach
                    </div>
                </div>

                <button class="absolute inset-y-0 right-0 z-10 text-center origin-center bg-black bg-opacity-50 w-14" @click="swiper.slideNext()">
                    <x-bi-chevron-compact-right class="ml-5 text-white" />
                </button>
            </div>
        </div>
    </div>

    <div class="popular-movies">
        <h2 class="text-lg antialiased font-bold tracking-wide text-gray-200">
            Comedies
        </h2>

        <div>
            <div x-data="{swiper: null}" x-init="swiper = new Swiper($refs.container, {
                loop: true,
                slidesPerView: 2,
                spaceBetween: 0,

                breakpoints: {
                640: {
                    slidesPerView: 1,
                    spaceBetween: 0,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 0,
                },
                1024: {
                    slidesPerView: 5,
                    spaceBetween: 0,
                },
                },
            })" class="relative flex flex-row w-full mx-auto">

                <button class="absolute inset-y-0 left-0 z-10 text-center origin-center bg-black bg-opacity-50 w-14" @click="swiper.slidePrev()">
                    <x-bi-chevron-compact-left class="ml-5 text-white" />
                </button>

                <div class="swiper-container" x-ref="container">
                    <div class="text-white swiper-wrapper">
                        @foreach($comedies as $movie )
                            <x-velflix-card :movie="$movie" :genres="$genres" />
                        @endforeach
                    </div>
                </div>

                <button class="absolute inset-y-0 right-0 z-10 text-center origin-center bg-black bg-opacity-50 w-14" @click="swiper.slideNext()">
                    <x-bi-chevron-compact-right class="ml-5 text-white" />
                </button>
            </div>
        </div>
    </div>

    <div class="popular-movies">
        <h2 class="text-lg antialiased font-bold tracking-wide text-gray-200">
            Western Movies
        </h2>

        <div>
            <div x-data="{swiper: null}" x-init="swiper = new Swiper($refs.container, {
                loop: true,
                slidesPerView: 2,
                spaceBetween: 0,

                breakpoints: {
                640: {
                    slidesPerView: 1,
                    spaceBetween: 0,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 0,
                },
                1024: {
                    slidesPerView: 5,
                    spaceBetween: 0,
                },
                },
            })" class="relative flex flex-row w-full mx-auto">

                <button class="absolute inset-y-0 left-0 z-10 text-center origin-center bg-black bg-opacity-50 w-14" @click="swiper.slidePrev()">
                    <x-bi-chevron-compact-left class="ml-5 text-white" />
                </button>

                <div class="swiper-container" x-ref="container">
                    <div class="text-white swiper-wrapper">
                        @foreach($western as $movie )
                            <x-velflix-card :movie="$movie" :genres="$genres" />
                        @endforeach
                    </div>
                </div>

                <button class="absolute inset-y-0 right-0 z-10 text-center origin-center bg-black bg-opacity-50 w-14" @click="swiper.slideNext()">
                    <x-bi-chevron-compact-right class="ml-5 text-white" />
                </button>
            </div>
        </div>
    </div>

    <div class="popular-movies">
        <h2 class="text-lg antialiased font-bold tracking-wide text-gray-200">
            Action
        </h2>

        <div>
            <div x-data="{swiper: null}" x-init="swiper = new Swiper($refs.container, {
                loop: true,
                slidesPerView: 2,
                spaceBetween: 0,

                breakpoints: {
                640: {
                    slidesPerView: 1,
                    spaceBetween: 0,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 0,
                },
                1024: {
                    slidesPerView: 5,
                    spaceBetween: 0,
                },
                },
            })" class="relative flex flex-row w-full mx-auto">

                <button class="absolute inset-y-0 left-0 z-10 text-center origin-center bg-black bg-opacity-50 w-14" @click="swiper.slidePrev()">
                    <x-bi-chevron-compact-left class="ml-5 text-white" />
                </button>

                <div class="swiper-container" x-ref="container">
                    <div class="text-white swiper-wrapper">
                        @foreach($action as $movie )
                            <x-velflix-card :movie="$movie" :genres="$genres" />
                        @endforeach
                    </div>
                </div>

                <button class="absolute inset-y-0 right-0 z-10 text-center origin-center bg-black bg-opacity-50 w-14" @click="swiper.slideNext()">
                    <x-bi-chevron-compact-right class="ml-5 text-white" />
                </button>
            </div>
        </div>
    </div>

    <div class="popular-movies">
        <h2 class="text-lg antialiased font-bold tracking-wide text-gray-200">
            Horror Films
        </h2>

        <div>
            <div x-data="{swiper: null}" x-init="swiper = new Swiper($refs.container, {
                loop: true,
                slidesPerView: 2,
                spaceBetween: 0,

                breakpoints: {
                640: {
                    slidesPerView: 1,
                    spaceBetween: 0,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 0,
                },
                1024: {
                    slidesPerView: 5,
                    spaceBetween: 0,
                },
                },
            })" class="relative flex flex-row w-full mx-auto">

                <button class="absolute inset-y-0 left-0 z-10 text-center origin-center bg-black bg-opacity-50 w-14" @click="swiper.slidePrev()">
                    <x-bi-chevron-compact-left class="ml-5 text-white" />
                </button>

                <div class="swiper-container" x-ref="container">
                    <div class="text-white swiper-wrapper">
                        @foreach($horror as $movie )
                            <x-velflix-card :movie="$movie" :genres="$genres" />
                        @endforeach
                    </div>
                </div>

                <button class="absolute inset-y-0 right-0 z-10 text-center origin-center bg-black bg-opacity-50 w-14" @click="swiper.slideNext()">
                    <x-bi-chevron-compact-right class="ml-5 text-white" />
                </button>
            </div>
        </div>
    </div>

    <div class="popular-movies">
        <h2 class="text-lg antialiased font-bold tracking-wide text-gray-200">
            Thrillers
        </h2>

        <div>
            <div x-data="{swiper: null}" x-init="swiper = new Swiper($refs.container, {
                loop: true,
                slidesPerView: 2,
                spaceBetween: 0,

                breakpoints: {
                640: {
                    slidesPerView: 1,
                    spaceBetween: 0,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 0,
                },
                1024: {
                    slidesPerView: 5,
                    spaceBetween: 0,
                },
                },
            })" class="relative flex flex-row w-full mx-auto">

                <button class="absolute inset-y-0 left-0 z-10 text-center origin-center bg-black bg-opacity-50 w-14" @click="swiper.slidePrev()">
                    <x-bi-chevron-compact-left class="ml-5 text-white" />
                </button>

                <div class="swiper-container" x-ref="container">
                    <div class="text-white swiper-wrapper">
                        @foreach($thriller as $movie )
                            <x-velflix-card :movie="$movie" :genres="$genres" />
                        @endforeach
                    </div>
                </div>

                <button class="absolute inset-y-0 right-0 z-10 text-center origin-center bg-black bg-opacity-50 w-14" @click="swiper.slideNext()">
                    <x-bi-chevron-compact-right class="ml-5 text-white" />
                </button>
            </div>
        </div>
    </div>

    <div class="popular-movies">
        <h2 class="text-lg antialiased font-bold tracking-wide text-gray-200">
            Anime
        </h2>

        <div>
            <div x-data="{swiper: null}" x-init="swiper = new Swiper($refs.container, {
                loop: true,
                slidesPerView: 2,
                spaceBetween: 0,

                breakpoints: {
                640: {
                    slidesPerView: 1,
                    spaceBetween: 0,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 0,
                },
                1024: {
                    slidesPerView: 5,
                    spaceBetween: 0,
                },
                },
            })" class="relative flex flex-row w-full mx-auto">

                <button class="absolute inset-y-0 left-0 z-10 text-center origin-center bg-black bg-opacity-50 w-14" @click="swiper.slidePrev()">
                    <x-bi-chevron-compact-left class="ml-5 text-white" />
                </button>

                <div class="swiper-container" x-ref="container">
                    <div class="text-white swiper-wrapper">
                        @foreach($animation as $movie )
                            <x-velflix-card :movie="$movie" :genres="$genres" />
                        @endforeach
                    </div>
                </div>

                <button class="absolute inset-y-0 right-0 z-10 text-center origin-center bg-black bg-opacity-50 w-14" @click="swiper.slideNext()">
                    <x-bi-chevron-compact-right class="ml-5 text-white" />
                </button>
            </div>
        </div>
    </div> --}}

</div>
