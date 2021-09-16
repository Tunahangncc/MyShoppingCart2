<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="theme-color" content="#000000"/>

    <link rel="shortcut icon" href="{{ asset('styles/css/admin/images/favicon.ico') }}"/>
    <link
        rel="apple-touch-icon"
        sizes="76x76"
        href="{{ asset('styles/css/admin/images/apple-icon.png') }}"
    />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css"
    />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="{{ asset('styles/css/admin/tailwind.css') }}">

    <title>Login | Notus JS by Creative Tim</title>
</head>

<body class="text-blueGray-700 antialiased">

<main>
    <section class="relative w-full h-full py-40 min-h-screen">
        <div class="absolute top-0 w-full h-full bg-blueGray-800 bg-full bg-no-repeat"
             style="
             background: url('https://i.pinimg.com/originals/3b/8a/d2/3b8ad2c7b1be2caf24321c852103598a.jpg');
             background-repeat: no-repeat;
             background-size: cover;
             filter: brightness(60%);
             "></div>

        <div class="container mx-auto px-4 h-full">
            <div class="flex content-center items-center justify-center h-full">
                <div class="w-full lg:w-4/12 px-4">
                    <div
                        class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-200 border-0">
                        <div class="rounded-t mb-0 px-6 py-6">
                            <div class="text-center mb-3">
                                <h6 class="text-blueGray-500 text-sm font-bold">
                                    Please Sign In
                                </h6>

                                @if(session('error-message'))
                                    <span class="bg-red-700 text-white px-2 py-1 mt-2 rounded">{{ __('messages.login page text.'.session('error-message')) }}</span>
                                @endif
                            </div>

                            <hr class="mt-6 border-b-1 border-blueGray-300"/>
                        </div>
                        <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                            <form action="{{ route('adminLoginPost') }}" method="POST">
                                @csrf

                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="grid-password">Email</label>

                                    <input  type="email"
                                            class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                            placeholder="Email"
                                            name="email"/>
                                </div>

                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="grid-password">Password</label>

                                    <input  type="password"
                                            class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                            placeholder="Password"
                                            name="password"/>
                                </div>

                                <div class="text-center mt-6">
                                    <button
                                        class="bg-blueGray-800 text-white active:bg-blueGray-600 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full ease-linear transition-all duration-150"
                                        type="submit">
                                        Sign In
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
</body>
<script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
<script>
    /* Make dynamic date appear */
    (function () {
        if (document.getElementById("get-current-year")) {
            document.getElementById(
                "get-current-year"
            ).innerHTML = new Date().getFullYear();
        }
    })();

    /* Function for opning navbar on mobile */
    function toggleNavbar(collapseID) {
        document.getElementById(collapseID).classList.toggle("hidden");
        document.getElementById(collapseID).classList.toggle("block");
    }

    /* Function for dropdowns */
    function openDropdown(event, dropdownID) {
        let element = event.target;
        while (element.nodeName !== "A") {
            element = element.parentNode;
        }
        Popper.createPopper(element, document.getElementById(dropdownID), {
            placement: "bottom-start",
        });
        document.getElementById(dropdownID).classList.toggle("hidden");
        document.getElementById(dropdownID).classList.toggle("block");
    }
</script>

</html>
