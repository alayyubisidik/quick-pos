<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign In</title>
    @vite('resources/css/app.css')
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
</head>

<body>
    <section class="bg-gray-50 ">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 ">
                <img class="w-8 h-8 mr-2" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/logo.svg"
                    alt="logo">
                QuickPos
            </a>
            <div
                class="w-full bg-white rounded-lg shadow  md:mt-0 sm:max-w-md xl:p-0  ">
                <div class="p-6 space-y-4 md:space-t-6 sm:p-8">
                    <h1
                        class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl ">
                        Sign in to your account
                    </h1>
                    @if (session("message-error"))
                        <div class="bg-red-200 p-[.7rem] rounded-md">
                            <p class="text-red-500 m-0 ">{{ session("message-error") }}</p>
                        </div>
                        @endif
                    <form class="space-y-4 md:space-b-6" action="/signin" method="post">
                            @csrf
                        <div>
                            <label for="email"
                            class="block mb-2 text-sm font-medium text-gray-900 ">Your
                            email</label>
                            @error("email")
                                <p class="text-red-500 text-sm mb-[3px] m-0 ">{{ $message }}</p>
                            @enderror
                            <input type="email" name="email" id="email" value="{{ old("email") }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5  "
                                placeholder="name@company.com" >
                        </div>
                        <div>
                            <label for="password"
                                class="block mb-2 text-sm font-medium text-gray-900 ">Password</label>
                            @error("password")
                            <p class="text-red-500 text-sm mb-[3px] m-0 ">{{ $message }}</p>
                            @enderror
                            <input type="password" name="password" id="password" placeholder="••••••••"
                                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5  "
                            >
                        </div>
                        <button type="submit"
                            class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Sign
                            in</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

</body>

</html>
