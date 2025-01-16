<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="{{ route('dashboard') }}"
                    class="flex items-center p-2 rounded-lg group
               text-gray-900 hover:bg-gray-100
               {{ request()->routeIs('dashboard') ? 'bg-gray-200 font-bold' : '' }}">
                    <svg class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                        <path
                            d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                        <path
                            d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                    </svg>
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('profile.edit') }}"
                    class="flex items-center p-2 rounded-lg group
               text-gray-900 hover:bg-gray-100
               {{ request()->routeIs('profile.edit') ? 'bg-gray-200 font-bold' : '' }}">
                    <svg class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                        <path
                            d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                        <path
                            d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                    </svg>
                    <span class="ms-3">My Profile</span>
                </a>
            </li>
            <li>
                <a href="#"
                    class="flex items-center p-2 rounded-lg group
               text-gray-900 hover:bg-gray-100
               {{ request()->routeIs('profile.edit') ? 'bg-gray-200 font-bold' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.666 3.888A2.25 2.25 0 0 0 13.5 2.25h-3c-1.03 0-1.9.693-2.166 1.638m7.332 0c.055.194.084.4.084.612v0a.75.75 0 0 1-.75.75H9a.75.75 0 0 1-.75-.75v0c0-.212.03-.418.084-.612m7.332 0c.646.049 1.288.11 1.927.184 1.1.128 1.907 1.077 1.907 2.185V19.5a2.25 2.25 0 0 1-2.25 2.25H6.75A2.25 2.25 0 0 1 4.5 19.5V6.257c0-1.108.806-2.057 1.907-2.185a48.208 48.208 0 0 1 1.927-.184" />
                    </svg>

                    <span class="ms-3">บันทึก NCP</span>
                </a>
            </li>
            @if (auth()->user() && auth()->user()->role_id == 1)
                <li>
                    <button type="button"
                        class="flex items-center w-full p-2 rounded-lg group text-gray-900 hover:bg-gray-100
            {{ request()->routeIs('profile.show') || request()->routeIs('UsersManage.index') ? 'bg-gray-200 font-bold' : '' }}"
                        data-collapse-toggle="dropdown-example" aria-controls="dropdown-example" aria-expanded="false">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 18">
                            <path
                                d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                        </svg>
                        <span class="flex-1 ms-3 text-left whitespace-nowrap">Profile</span>
                    </button>
                    <ul id="dropdown-example"
                        class="{{ request()->routeIs('profile.edit') || request()->routeIs('UsersManage.index') ? 'block' : 'hidden' }} py-2 space-y-2">
                        <li>
                            <a href="{{ route('profile.edit') }}"
                                class="flex items-center w-full p-2 pl-8 rounded-lg text-gray-900 hover:bg-gray-100
                    {{ request()->routeIs('profile.edit') ? 'bg-gray-200 font-bold' : '' }}">
                                View Profile
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('UsersManage.index') }}"
                                class="flex items-center w-full p-2 pl-8 rounded-lg text-gray-900 hover:bg-gray-100
                    {{ request()->routeIs('UsersManage.index') ? 'bg-gray-200 font-bold' : '' }}">
                                Users List
                            </a>
                        </li>
                    </ul>
                </li>
            @endif
        </ul>
    </div>
</aside>
