<x-app-layout title="Isi Tugas">
    <x-slot:heading>Isi TUgas</x-slot:heading>
    <form action="{{ isset($todo) ? route('ToDo.update', $todo->id) : route('ToDo.store') }}" method="post">
        @csrf
        @if(isset($todo))
            @method('PUT')
        @endif
        <div>
            <label for="judul">Judul</label>
            <input class="border px-4 py-2 rounded block mt-1" type="text" value="{{ old('judul',isset($todo) ? $todo->judul : '') }}"  name="judul" id="judul" class="form-control">

            @error('judul')
            <p class="text-red-500 text-sm mt-1">
                {{ $message }}
            </p>
            @enderror
        </div>
        <div>
            <label for="isi">isi</label>
            <textarea name="isi" id="isi" class="border px-4 py-2  rounded block mt-1 w-full h-48">{{ old('isi', isset($todo) ? $todo->isi : '') }}</textarea>


            @error('isi')
            <p class="text-red-500 text-sm mt-1">
                {{ $message }}
            </p>
            @enderror
        </div>
        <div>
            <label for="tanggal">Tanggal</label>
            <input class="border px-4 py-2 rounded block mt-1" type="date" value="{{ old('tanggal',isset($todo) ? $todo->tanggal : '') }}"  name="tanggal" id="tanggal" class="form-control">

            @error('tanggal')
            <p class="text-red-500 text-sm mt-1">
                {{ $message }}
            </p>
            @enderror
        </div>
        <div>
            <label for="status">Status</label>
            <select name="status" class="border px-4 py-2 rounded block mt-1" value="{{ old('status',isset($todo) ? $todo->status : '') }}">
                <option value="0">Belum Selesai</option>
                <option value="1">Selesai</option>
            </select>
        </div>
        <x-button>
            Isi Tugas
        </x-button>
    </form>
</x-app-layout>
