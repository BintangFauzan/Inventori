<x-app-layout title="Users">
    <x-slot:heading>{{ $user->name }}</x-slot:heading>

    <div>{{$user->email}}</div>
    <div>Register at {{$user->created_at}}</div>

    <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus user ini?')">
    @method('DELETE')
        @csrf


        <x-button type="submit">
            Delete
        </x-button>
    </form>
 </x-app-layout>
