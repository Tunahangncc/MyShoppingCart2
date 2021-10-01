

<div class="footer-area">
    <footer class="text-gray-100 bg-gray-800">
        <div class="max-w-3xl mx-auto py-6">
            <h1 class="flex items-center justify-center text-center text-lg lg:text-2xl">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-1 text-blue-400" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                </svg>
                My Shopping Cart
            </h1>

            <div class="flex justify-center mt-6">
                <div class="bg-white rounded-md">
                    <div class="flex flex-wrap justify-between md:flex-row">
                        <h3 class="p-2 font-bold">{{ __('messages.about the website') }}</h3>
                        <p class="p-2 text-justify">
                            {{ __('messages.about content.body') }}
                        </p>
                    </div>
                </div>
            </div>

            <hr class="h-px mt-6 bg-gray-700 border-none">

            <div class="flex flex-col items-center justify-between mt-6 md:flex-row ">
                <div>
                    <a href="#" class="text-xl font-bold text-gray-100 transition duration-300 hover:text-gray-400">Tunahan Genç</a>

                    <div>
                        <ul class="list-none flex justify-around">
                            <li><a href="#"><i class="fab fa-instagram transition duration-300 hover:text-gray-400"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin transition duration-300 hover:text-gray-400"></i></a></li>
                        </ul>
                    </div>
                </div>

                <div class="flex mt-4 md:m-0">
                    <div class="-m-x">
                        <a href="{{ route('customerHome') }}" class="px-4 text-sm text-gray-100 font-medium transition duration-300 hover:text-gray-400">{{ __('messages.navbar content text.links.home') }}</a>
                        <a href="{{ route('customerProducts') }}" class="px-4 text-sm text-gray-100 font-medium transition duration-300 hover:text-gray-400">{{ __('messages.navbar content text.links.products') }}</a>
                        <a href="{{ route('customerAboutUs') }}" class="px-4 text-sm text-gray-100 font-medium transition duration-300 hover:text-gray-400">{{ __('messages.navbar content text.links.about') }}</a>
                        <a href="{{ route('customerContact') }}" class="px-4 text-sm text-gray-100 font-medium transition duration-300 hover:text-gray-400">{{ __('messages.navbar content text.links.contact') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>

<script src="{{ asset('styles/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('styles/js/customer/navbar.js') }}"></script>
@yield('SpecialJs')

</body>
</html>

