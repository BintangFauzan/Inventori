<x-app-layout title="Barang">
    <x-slot:heading>{{ $barang->nama_barang }}</x-slot:heading>

    <div>Register at {{$barang->created_at}}</div>

{{--    <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus user ini?')">--}}
{{--        @method('DELETE')--}}
        @csrf


        <x-button type="submit">
            Delete
        </x-button>
    </form>
</x-app-layout>
