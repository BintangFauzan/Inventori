<x-app-layout title="Form Pembelian">
    <x-slot:heading>Pembelian Barang</x-slot:heading>

    @if (session('error'))
        <div class="bg-red-500 text-white p-4 rounded">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('pembelian.store') }}" method="POST" class="space-y-6">
        @csrf

        <label for="barang_id">Nama Barang</label>
        <select name="barang_id" id="barang_id" class="border px-4 py-2 rounded mt-1">
            <option value="">Pilih Barang</option>
            @foreach ($barang as $barang)
                <option value="{{ $barang->id }}">{{ $barang->nama_barang }}</option>
            @endforeach
        </select>

        <label for="jumlah_beli">Jumlah Beli</label>
        <input type="number" name="jumlah_beli" id="jumlah_beli" min="1" value="1" class="border px-4 py-2 rounded mt-1">

        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Beli</button>

        @if ($errors->any())
            <div class="mt-4">
                <ul class="text-red-500">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </form>
</x-app-layout>
