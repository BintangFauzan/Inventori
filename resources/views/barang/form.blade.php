<x-app-layout title="Input">
    <x-slot:heading>Input Barang</x-slot:heading>
    <form action="{{ isset($barang) ? route('barang.update', $barang->id) : route('barang.store') }}" method="post" class="space-y-6">
        @csrf
        @if(isset($barang))
            @method('PUT') <!-- Tambahkan ini untuk update -->
        @endif
        <div>
            <label for="nama_barang">Nama Barang</label>
            <input class="border px-4 py-2 rounded block mt-1" type="text" value="{{ old('nama_barang',isset($barang) ? $barang->nama_barang : '') }}" name="nama_barang" id="nama_barang" class="form-control">

            @error('nama_barang')
            <p class="text-red-500 text-sm mt-1">
                {{ $message }}
            </p>
            @enderror
        </div>
        <div>
            <label for="jenis_barang">Jenis Barang</label>
            <select name="jenis_barang" id="jenis_barang" class="border px-4 py-4 rounded-block mt-1">
                <option value="rokok" {{ (isset($barang) && $barang->jenis_barang == 'rokok') ? 'selected' : '' }} >Rokok</option>
                <option value="sabun" {{ (isset($barang) && $barang->jenis_barang == 'sabun') ? 'selected' : '' }}>Sabun</option>
                <option value="makanan" {{ (isset($barang) && $barang->jenis_barang == 'makanan') ? 'selected' : '' }}>Makanan</option>
            </select>

            @error('jenis_barang')
            <p class="text-red-500 text-sm mt-1">
                {{ $message }}
            </p>
            @enderror
        </div>
        <div>
            <label for="stok">Stok</label>
            <input class="border px-4 py-2 rounded block mt-1" type="text" value="{{ old('stok',isset($barang) ? $barang->stok : '') }}"  name="stok" id="stok" class="form-control">

            @error('stok')
            <p class="text-red-500 text-sm mt-1">
                {{ $message }}
            </p>
            @enderror
        </div>
        <div>
            <label for="harga">Harga</label>
            <input class="border px-4 py-2 rounded block mt-1" type="text" value="{{ old('harga',isset($barang) ? $barang->harga : '') }}"  name="harga" id="harga" class="form-control">

            @error('harga')
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


