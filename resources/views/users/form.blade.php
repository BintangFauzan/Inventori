<x-app-layout title="{{ $page_meta['title'] }}">
    <x-slot:heading>{{ $page_meta['title'] }}</x-slot:heading>
    
    <form action="{{ $page_meta['url'] }}" method="post" class="space-y-6">
        @method($page_meta['method'])
        @csrf
        <div>
            <label for="name">name</label>
            <input class="border px-4 py-2 rounded block mt-1" type="text" value="{{ old('name', $user->name) }}" name="name" id="name">

            @error('name')
            <p class="text-red-500 text-sm mt-1">
                {{ $message }}
            </p>
        @enderror
        
        </div>
        <div>
            <label for="email">email</label>
            <input class="border px-4 py-2 rounded block mt-1" type="text" value="{{ old('email', $user->email) }}" name="email" id="email">

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
            Update
        </x-button>
    </form>
 </x-app-layout>