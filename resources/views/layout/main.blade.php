<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quick Pos - @yield('title')</title>
    @vite('resources/css/app.css')
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
</head>

<body>
    <div class="antialiased bg-gray-50 ">
        <nav class="bg-white border-b border-gray-200 px-4 py-2.5  fixed left-0 right-0 top-0 z-50">
            <div class="flex flex-wrap justify-between items-center">
                <div class="flex justify-start items-center">
                    <button data-drawer-target="drawer-navigation" data-drawer-toggle="drawer-navigation"
                        aria-controls="drawer-navigation"
                        class="p-2 mr-2 text-gray-600 rounded-lg cursor-pointer md:hidden hover:text-gray-900 hover:bg-gray-100 focus:bg-gray-100  focus:ring-2 focus:ring-gray-100 ">
                        <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <svg aria-hidden="true" class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Toggle sidebar</span>
                    </button>
                    <a href="https://flowbite.com" class="flex items-center justify-between mr-4">
                        <img src="https://flowbite.s3.amazonaws.com/logo.svg" class="mr-3 h-8" alt="Flowbite Logo" />
                        <span class="self-center text-2xl font-semibold whitespace-nowrap ">Quick Pos</span>
                    </a>
                </div>
                <div class="flex items-center lg:order-2">
                    <button type="button" data-drawer-toggle="drawer-navigation" aria-controls="drawer-navigation"
                        class="p-2 mr-1 text-gray-500 rounded-lg md:hidden hover:text-gray-900 hover:bg-gray-100  focus:ring-4 focus:ring-gray-300 ">
                        <span class="sr-only">Toggle search</span>
                        <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z">
                            </path>
                        </svg>
                    </button>
                    <!-- Notifications -->
                    <button type="button" data-dropdown-toggle="notification-dropdown"
                        class="p-2 mr-1 text-gray-500 rounded-lg hover:text-gray-900 hover:bg-gray-100  focus:ring-gray-300 ">
                        <span class="sr-only">View notifications</span>
                        <!-- Bell icon -->
                        <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z">
                            </path>
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div class="hidden overflow-hidden z-50 my-4 max-w-sm text-base list-none bg-white rounded divide-y divide-gray-100 shadow-lg  "
                        id="notification-dropdown">
                        <div class="block py-2 px-4 text-base font-medium text-center text-gray-700 bg-gray-50 ">
                            Notifications
                        </div>
                        <div>
                            <a href="#" class="flex py-3 px-4 border-b hover:bg-gray-100  ">
                                <div class="flex-shrink-0">
                                    <img class="w-11 h-11 rounded-full"
                                        src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/bonnie-green.png"
                                        alt="Bonnie Green avatar" />
                                    <div
                                        class="flex absolute justify-center items-center ml-6 -mt-5 w-5 h-5 rounded-full border border-white bg-primary-700 ">
                                        <svg aria-hidden="true" class="w-3 h-3 text-white" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z">
                                            </path>
                                            <path
                                                d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="pl-3 w-full">
                                    <div class="text-gray-500 font-normal text-sm mb-1.5 ">
                                        New message from
                                        <span class="font-semibold text-gray-900 ">Bonnie Green</span>:
                                        "Hey, what's up? All set for the presentation?"
                                    </div>
                                    <div class="text-xs font-medium text-primary-600 ">
                                        a few moments ago
                                    </div>
                                </div>
                            </a>
                        </div>
                        <a href="#"
                            class="block py-2 text-md font-medium text-center text-gray-900 bg-gray-50 hover:bg-gray-100 ">
                            <div class="inline-flex items-center">
                                <svg aria-hidden="true" class="mr-2 w-4 h-4 text-gray-500 " fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                    <path fill-rule="evenodd"
                                        d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                View all
                            </div>
                        </a>
                    </div>
                    <button type="button"
                        class="flex mx-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 "
                        id="user-menu-button" aria-expanded="false" data-dropdown-toggle="dropdown">
                        <span class="sr-only">Open user menu</span>
                        <img class="w-8 h-8 rounded-full"
                            src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/michael-gough.png"
                            alt="user photo" />
                    </button>
                    <!-- Dropdown menu -->
                    <div class="hidden z-50 my-4 w-56 text-base list-none bg-white rounded divide-y divide-gray-100 shadow  "
                        id="dropdown">
                        <div class="py-3 px-4">
                            <span class="block text-sm font-semibold text-gray-900 ">Neil Sims</span>
                            <span class="block text-sm text-gray-900 truncate ">name@flowbite.com</span>
                        </div>
                        <ul class="py-1 text-gray-700 " aria-labelledby="dropdown">
                            <li>
                                <a href="#" class="block py-2 px-4 text-sm hover:bg-gray-100 ">My
                                    profile</a>
                            </li>
                            <li>
                                <a href="#" class="block py-2 px-4 text-sm hover:bg-gray-100 ">Account
                                    settings</a>
                            </li>
                        </ul>
                        <ul class="py-1 text-gray-700 " aria-labelledby="dropdown">
                            <li>
                                <a href="/signout" class="block py-2 px-4 text-sm hover:bg-gray-100  ">Sign
                                    out</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Sidebar -->

        <aside
            class="fixed top-0 left-0 z-40 w-64 h-screen pt-14 transition-transform -translate-x-full bg-white border-r border-gray-200 md:translate-x-0  "
            aria-label="Sidenav" id="drawer-navigation">
            <div class="overflow-y-auto py-5 px-3 h-full bg-white ">
                <ul class="space-y-2">
                    <li>
                        <a href="/dashboard-manager"
                            class="{{ request()->is('dashboard-manager') ? 'bg-blue-500' : '' }} group flex items-center p-2 text-base font-medium rounded-lg  hover:bg-blue-500 text-gray-600 hover:text-white ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23"
                                fill="{{ request()->is('dashboard-manager') ? 'white' : 'gray' }}"
                                class="bi bi-pie-chart-fill  group-hover:fill-white " viewBox="0 0 16 16">
                                <path
                                    d="M15.985 8.5H8.207l-5.5 5.5a8 8 0 0 0 13.277-5.5zM2 13.292A8 8 0 0 1 7.5.015v7.778zM8.5.015V7.5h7.485A8 8 0 0 0 8.5.015" />
                            </svg>
                            <span
                                class="ml-3 {{ request()->is('dashboard-manager') ? 'text-white' : '' }}">Overview</span>
                        </a>
                    </li>
                    <li>
                        <a href="/dashboard-manager/user"
                            class="{{ request()->is('dashboard-manager/user*') ? 'bg-blue-500' : '' }} group flex items-center p-2 text-base font-medium rounded-lg  hover:bg-blue-500 text-gray-600 hover:text-white ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23"
                                fill="{{ request()->is('dashboard-manager/user*') ? 'white' : 'gray' }}"
                                class="bi bi-person-fill group-hover:fill-white" viewBox="0 0 16 16">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                            </svg>
                            <span
                                class="ml-3 {{ request()->is('dashboard-manager/user*') ? 'text-white' : '' }}">User</span>
                        </a>
                    </li>
                    <li>
                        <a href="/dashboard-manager/product"
                            class="{{ request()->is('dashboard-manager/product*') ? 'bg-blue-500' : '' }} group flex items-center p-2 text-base font-medium rounded-lg  hover:bg-blue-500 text-gray-600 hover:text-white ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23"
                                fill="{{ request()->is('dashboard-manager/product*') ? 'white' : 'gray' }}"
                                class="bi bi-box-fill group-hover:fill-white" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M15.528 2.973a.75.75 0 0 1 .472.696v8.662a.75.75 0 0 1-.472.696l-7.25 2.9a.75.75 0 0 1-.557 0l-7.25-2.9A.75.75 0 0 1 0 12.331V3.669a.75.75 0 0 1 .471-.696L7.443.184l.004-.001.274-.11a.75.75 0 0 1 .558 0l.274.11.004.001zm-1.374.527L8 5.962 1.846 3.5 1 3.839v.4l6.5 2.6v7.922l.5.2.5-.2V6.84l6.5-2.6v-.4l-.846-.339Z" />
                            </svg>
                            <span
                                class="ml-3 {{ request()->is('dashboard-manager/product*') ? 'text-white' : '' }}">Product</span>
                        </a>
                    </li>
                    <li>
                        <a href="/dashboard-manager/category"
                            class="{{ request()->is('dashboard-manager/category*') ? 'bg-blue-500' : '' }} group flex items-center p-2 text-base font-medium rounded-lg  hover:bg-blue-500 text-gray-600 hover:text-white ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23"
                                fill="{{ request()->is('dashboard-manager/category*') ? 'white' : 'gray' }}"
                                class="bi bi-grid-fill group-hover:fill-white" viewBox="0 0 16 16">
                                <path
                                    d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5zm8 0A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5zm-8 8A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5zm8 0A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5z" />
                            </svg>
                            <span
                                class="ml-3 {{ request()->is('dashboard-manager/category*') ? 'text-white' : '' }}">Category</span>
                        </a>
                    </li>
                    <li>
                        <a href="/dashboard-manager/order"
                            class="{{ request()->is('dashboard-manager/order*') ? 'bg-blue-500' : '' }} group flex items-center p-2 text-base font-medium rounded-lg  hover:bg-blue-500 text-gray-600 hover:text-white ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23"
                                fill="{{ request()->is('dashboard-manager/order*') ? 'white' : 'gray' }}"
                                class="bi bi-bag-check-fill group-hover:fill-white" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0m-.646 5.354a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0z" />
                            </svg>
                            <span
                                class="ml-3 {{ request()->is('dashboard-manager/order*') ? 'text-white' : '' }}">Order</span>
                        </a>
                    </li>
                    <li>
                        <a href="/dashboard-manager/report"
                            class="{{ request()->is('dashboard-manager/report*') ? 'bg-blue-500' : '' }} group flex items-center p-2 text-base font-medium rounded-lg  hover:bg-blue-500 text-gray-600 hover:text-white ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23"
                                fill="{{ request()->is('dashboard-manager/report*') ? 'white' : 'gray' }}" class="bi bi-clipboard2-check-fill group-hover:fill-white" viewBox="0 0 16 16">
                                <path
                                    d="M10 .5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5.5.5 0 0 1-.5.5.5.5 0 0 0-.5.5V2a.5.5 0 0 0 .5.5h5A.5.5 0 0 0 11 2v-.5a.5.5 0 0 0-.5-.5.5.5 0 0 1-.5-.5" />
                                <path
                                    d="M4.085 1H3.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1h-.585q.084.236.085.5V2a1.5 1.5 0 0 1-1.5 1.5h-5A1.5 1.5 0 0 1 4 2v-.5q.001-.264.085-.5m6.769 6.854-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708.708" />
                            </svg>
                            <span
                                class="ml-3 {{ request()->is('dashboard-manager/report*') ? 'text-white' : '' }}">Report</span>
                        </a>
                    </li>
                </ul>
                <ul class="pt-5 mt-5 space-y-2 border-t border-gray-200 ">
                    <li>
                        <a href="/signout"
                            class=" group flex items-center p-2 text-base font-medium rounded-lg  hover:bg-blue-500 text-gray-600 hover:text-white ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="gray"
                                class="bi bi-pie-chart-fill  group-hover:fill-white " viewBox="0 0 16 16">
                                <path
                                    d="M15.985 8.5H8.207l-5.5 5.5a8 8 0 0 0 13.277-5.5zM2 13.292A8 8 0 0 1 7.5.015v7.778zM8.5.015V7.5h7.485A8 8 0 0 0 8.5.015" />
                            </svg>
                            <span class="ml-3 ">Sign Out</span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>

        <main class="p-[2rem] pt-[6rem] md:ml-64 min-h-[100vh]">
            {{-- <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
                <div class="border-2 border-dashed border-gray-300 rounded-lg  h-32 md:h-64"></div>
                <div class="border-2 border-dashed rounded-lg border-gray-300  h-32 md:h-64"></div>
                <div class="border-2 border-dashed rounded-lg border-gray-300  h-32 md:h-64"></div>
                <div class="border-2 border-dashed rounded-lg border-gray-300  h-32 md:h-64"></div>
            </div> --}}

            @yield('content')
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>

</html>
