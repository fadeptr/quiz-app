<div>
    <nav class="bg-orange-400 p-5 text-white font-medium">
        <div class="max-w-screen-lg mx-auto">
            <div class="flex justify-between">
                <div>Ujian App</div>
                <div>
                    <a href="{{ route('login') }}" class="mr-2">Masuk</a>
                    <a href="{{ route('register') }}">Daftar</a>
                </div>
            </div>
        </div>
    </nav>
    <header class="mt-5">
        <div class="max-w-screen-lg mx-auto px-4 lg:px-0">
            <div class="lg:flex lg:items-center">
                <div class="w-full lg:w-1/2">
                    <div class="text-2xl lg:text-4xl font-bold mb-4">Ayo menjadi warga indonesia yang cerdas, belajar disini, Sekarang!!</div>
                    <div class="text-sm lg:text-base text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis culpa similique aspernatur. Obcaecati excepturi quasi sunt accusantium temporibus numquam quidem?</div>
                    {{-- <div class="btn btn-primary">Tombol</div> --}}
                    <div class="flex mt-5">
                        <a href="{{ route('login') }}" class="bg-orange-500 hover:bg-orange-600 transition-colors text-white border border-orange-700 rounded-lg px-3 py-2 text-sm mr-2">Masuk</a>
                        <a href="{{ route('register') }}" class="bg-blue-500 hover:bg-blue-600 transition-colors text-white border border-blue-700 rounded-lg px-3 py-2 text-sm">Daftar</a>
                    </div>
                </div>
                <div class="w-full lg:w-1/2 hidden lg:inline">
                    <img src="{{ asset('img/undraw_teacher_re_sico.svg') }}" alt="undraw">
                </div>
            </div>
        </div>
    </header>
    <section class="max-w-screen-lg mx-auto mt-5">
        <div class="text-left lg:text-center mb-5 px-4 lg:px-0">
            <h2 class="text-xl lg:text-3xl font-bold">Lorem ipsum dolor sit amet.</h2>
            <p class="text-base lg:text-2xl">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, ipsam.</p>
        </div>
        <div class="lg:flex text-black gap-5 mt-10 px-4 lg:px-0">
            <div class="w-full lg:w-1/3 bg-white hover:bg-orange-100 transition shadow-xl rounded-2xl p-10 mb-5 lg:mb-0">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 mb-3">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" />
                </svg>
                <h3 class="text-xl font-medium mb-4">Lorem ipsum dolor sit amet.</h3>
                <p class="text-sm text-gray-500">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vitae illum nobis eum dolorem deserunt. Eaque numquam ullam voluptas vitae temporibus.</p>
            </div>
            <div class="w-full lg:w-1/3 bg-white hover:bg-orange-100 transition shadow-xl rounded-2xl p-10 mb-5 lg:mb-0">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 mb-3">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" />
                </svg>
                <h3 class="text-xl font-medium mb-4">Lorem ipsum dolor sit amet.</h3>
                <p class="text-sm text-gray-500">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vitae illum nobis eum dolorem deserunt. Eaque numquam ullam voluptas vitae temporibus.</p>
            </div>
            <div class="w-full lg:w-1/3 bg-white hover:bg-orange-100 transition shadow-xl rounded-2xl p-10">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 mb-3">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" />
                </svg>
                <h3 class="text-xl font-medium mb-4">Lorem ipsum dolor sit amet.</h3>
                <p class="text-sm text-gray-500">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vitae illum nobis eum dolorem deserunt. Eaque numquam ullam voluptas vitae temporibus.</p>
            </div>
        </div>
    </section>
    <footer class="w-full px-4 lg:px-0 lg:max-w-screen-lg mx-auto mt-5">
        <div class="flex justify-between items-center py-5">
            <div class="text-gray-500">Website ini milik Faisal Ade Putra &copy; 2022</div>
            <div class="flex">
                <a href="" class="ml-2">
                    <svg class="fill-gray-800 w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z"/></svg>
                </a>
                <a href="" class="ml-2">
                    <svg class="fill-gray-800 w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/></svg>
                </a>
                <a href="" class="ml-2">
                    <svg class="fill-gray-800 w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"/></svg>
                </a>
            </div>
        </div>
    </footer>
</div>
