@auth
<nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
        <div class="flex items-center">
          <div class="flex-shrink-0">
            <img class="h-8 w-8" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company">
          </div>
          <div class="hidden md:block">
            <div class="ml-10 flex items-baseline space-x-4">
              <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white"
               aria-current="page"-->
              {{-- Memanggil nav-link --}}

              <x-navbar.nav-link href="/">Home</x-navbar.nav-link>
              <x-navbar.nav-link href="{{route('about')}}">About</x-navbar.nav-link>
              <x-navbar.nav-link href="/contact"  >Contact</x-navbar.nav-link>
              <x-navbar.nav-link href="/users"  >User</x-navbar.nav-link>
                <x-navbar.nav-link href="/barang"  >barang</x-navbar.nav-link>
                <x-navbar.nav-link href="/ToDo">To-Do List</x-navbar.nav-link>
                <x-navbar.nav-link href="/pembelian">Pembelian</x-navbar.nav-link>
                <x-navbar.nav-link href="/history">History</x-navbar.nav-link>


                @auth
                    <x-navbar.nav-link href="#" class="bg-red-500" >{{auth()->user()->name}} </x-navbar.nav-link>
                @else

                    <x-navbar.nav-link href="{{route('login')}}"  >login</x-navbar.nav-link>

                @endauth

                <form action="{{ route('logout') }}" method="POST" onsubmit="return confirm('Apakah anda yakin ingin keluar?')">
                    @csrf

                    @auth
                    <x-button type="submit" href="{{route('logout')}}"> Logout </x-button>
                    @endauth
                </form>

            </div>
          </div>
        </div>

          <!-- Mobile menu button -->
          <button type="button" class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" aria-controls="mobile-menu" aria-expanded="false">
            <span class="absolute -inset-0.5"></span>
            <span class="sr-only">Open main menu</span>
            <!-- Menu open: "hidden", Menu closed: "block" -->
            <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
            <!-- Menu open: "block", Menu closed: "hidden" -->
            <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
      </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="md:hidden" id="mobile-menu">
      <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
        <x-navbar.dropdown-link href="/">Home</x-navbar.dropdown-link>
        <x-navbar.dropdown-link href="{{route('about')}}">About</x-navbar.dropdown-link>
          <x-navbar.dropdown-link href="/pembelian">Pembelian</x-navbar.dropdown-link>
          <x-navbar.dropdown-link href="/history">History</x-navbar.dropdown-link>
          <x-navbar.dropdown-link href="/barang">Barang</x-navbar.dropdown-link>

      </div>

    </div>
  </nav>
@endauth
