<x-app-layout title="Login">
    <x-slot name="heading"> LOGIN
    </x-slot>

    <form action="{{route('login')}}" method="post" class="space-y-6">
        @csrf
        <div>
            <label for="email">email</label>
            <input class="border px-4 py-2 rounded block mt-1" type="text" value="{{ old('email') }}" name="email" id="email">

            @error('email')
            <p class="text-red-500 text-sm mt-1">
                {{ $message }}
            </p>
            @enderror

        </div>

        <div>
            <label for="password">password</label>
            <input class="border px-4 py-2 rounded block mt-1" type="password" name="password" id="password">

            @error('password')
            <p class="text-red-500 text-sm mt-1">
                {{ $message }}
            </p>
            @enderror

        </div>
        <x-button>
            Login
        </x-button>

    </form>
</x-app-layout>
