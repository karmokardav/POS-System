<div class="flex">

    <aside class="h-screen bg-white w-20 md:w-64 transition-all duration-300 flex flex-col border-r border-gray-200">

        <div class="flex items-center justify-between md:justify-start
            px-4 py-4 ">

            <span class="hidden md:block text-[#c3592b] font-bold text-lg">
                POS System
            </span>

            <button class="md:hidden flex items-center justify-center 
               w-7 h-7 text-[#c3592b] text-xl">
                <i class="fa fa-bars"></i>
            </button>

        </div>
        @role('Admin')
        <nav class="flex-1 px-2 md:px-3 space-y-1 mt-4 ">
            <!-- <a href="{{ route('dashboard') }}"
                class="flex text-gray-700 items-center justify-center md:justify-start md:gap-3 px-0 md:px-3 py-2 rounded-lg hover:bg-[#c3592b] hover:text-white transition">

                <i class="fa fa-home text-lg"></i>

                <span class="hidden md:block font-semibold">
                    Dashboard
                </span>
            </a> -->
            <a href="{{ route('dashboard') }}" class="flex items-center justify-center md:justify-start md:gap-3 px-0 md:px-3 hover:bg-brand-500 hover:text-white py-2 rounded-lg transition
                    {{ request()->routeIs('dashboard')
    ? 'bg-brand-50 text-[#c3592b]'
    : 'text-gray-700 hover:bg-[#c3592b] hover:text-white' }}">

                <i class="fa fa-home text-lg"></i>

                <span class="hidden md:block font-semibold">
                    Dashboard
                </span>
            </a>
            <!-- products -->
            <a href="{{ route('products.index') }}" class="flex items-center justify-center md:justify-start md:gap-3 px-0 md:px-3 hover:bg-brand-500 hover:text-white py-2 rounded-lg transition
                    {{ request()->routeIs('products.index')
    ? 'bg-brand-50 text-[#c3592b]'
    : 'text-gray-700 hover:bg-[#c3592b] hover:text-white' }}">
                <i class="fa fa-box text-lg"></i>
                <span class="hidden md:block font-semibold">
                    Products
                </span>
            </a>
            <!-- Management Menu -->
            <div
                x-data="{ open: {{ request()->routeIs('roles.index') || request()->routeIs('permissions.index') || request()->routeIs('users.index') ? 'true' : 'false' }} }">

                <!-- Parent Button -->
                <button @click="open = !open" :class="open 
                        ? 'bg-[#f9e6dc] text-[#c3592b]' 
                        : 'text-gray-700 hover:bg-[#c3592b] hover:text-white'"
                    class="w-full flex items-center justify-center md:justify-between md:gap-3 px-0 md:px-3 py-2 rounded-lg transition">

                    <div class="flex items-center justify-center md:gap-3 w-full md:w-auto">
                        <i class="fa fa-cogs text-lg"></i>
                        <span class="hidden md:block font-semibold">User Management</span>
                    </div>

                    <i class="fa fa-chevron-down hidden md:block text-xs transition-transform"
                        :class="open ? 'rotate-180' : ''"></i>
                </button>

                <!-- Dropdown Items -->
                <div x-show="open" x-transition class="mt-1 space-y-1">

                    <a href="{{ route('users.index') }}" class="flex items-center justify-center md:justify-start md:gap-3 px-0 md:px-6 py-2 rounded-lg transition
                                {{ request()->routeIs('users.index')
    ? 'bg-brand-50 text-[#c3592b]'
    : 'text-gray-700 hover:bg-[#c3592b] hover:text-white' }}">

                        <i class="fa fa-users text-sm"></i>
                        <span class="hidden md:block font-semibold">Users</span>
                    </a>
                    <a href="{{ route('roles.index') }}" class="flex items-center justify-center md:justify-start md:gap-3 px-0 md:px-6 py-2 rounded-lg transition
                                {{ request()->routeIs('roles.index')
    ? 'bg-brand-50 text-[#c3592b]'
    : 'text-gray-700 hover:bg-[#c3592b] hover:text-white' }}">

                        <i class="fa fa-user-shield text-sm"></i>
                        <span class="hidden md:block font-semibold">Roles</span>
                    </a>

                    <a href="{{ route('permissions.index') }}" class="flex items-center justify-center md:justify-start md:gap-3 px-0 md:px-6 py-2 rounded-lg transition
                                {{ request()->routeIs('permissions.index')
    ? 'bg-brand-50 text-[#c3592b]'
    : 'text-gray-700 hover:bg-[#c3592b] hover:text-white' }}">

                        <i class="fa fa-lock text-sm"></i>
                        <span class="hidden md:block font-semibold">Permissions</span>
                    </a>
                </div>
            </div>
            <!-- category -->
            <a href="{{ route('categories.index') }}" class="flex items-center justify-center md:justify-start md:gap-3 px-0 md:px-3 hover:bg-brand-500 hover:text-white py-2 rounded-lg transition
                    {{ request()->routeIs('categories.index')
    ? 'bg-brand-50 text-[#c3592b]'
    : 'text-gray-700 hover:bg-[#c3592b] hover:text-white' }}">

                <i class="fa fa-layer-group text-lg"></i>

                <span class="hidden md:block font-semibold">
                    Category
                </span>
            </a>
            <!-- brands -->
            <a href="{{ route('brands.index') }}" class="flex items-center justify-center md:justify-start md:gap-3 px-0 md:px-3 hover:bg-brand-500 hover:text-white py-2 rounded-lg transition
                    {{ request()->routeIs('brands.index')
    ? 'bg-brand-50 text-[#c3592b]'
    : 'text-gray-700 hover:bg-[#c3592b] hover:text-white' }}">
                <i class="fa fa-tags text-lg"></i>

                <span class="hidden md:block font-semibold">
                    Brands
                </span>
            </a>
            <!-- Login History -->
            <a href="{{ route('loginHistory.index') }}" class="flex items-center justify-center md:justify-start md:gap-3 px-0 md:px-3 hover:bg-brand-500 hover:text-white py-2 rounded-lg transition
                    {{ request()->routeIs('loginHistory.index')
    ? 'bg-brand-50 text-[#c3592b]'
    : 'text-gray-700 hover:bg-[#c3592b] hover:text-white' }}">

                <i class="fa fa-history text-lg"></i>

                <span class="hidden md:block font-semibold">
                    Login History
                </span>
            </a>


        </nav>
        @endrole

    </aside>
</div>