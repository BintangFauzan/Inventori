<x-app-layout title="Barang">
    <x-slot:heading>Barang</x-slot:heading>
    <div class="sm:flex sm:items-center">
        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
            <x-button class="bg-red-500" as="a" href="/barang/create">
                Add Barang
            </x-button>
        </div>
    </div>
    <x-table>
        <x-table.thead>
            <tr>
                <x-table.th>No</x-table.th>
                <x-table.th>Nama Barang</x-table.th>
                <x-table.th>Jenis Barang</x-table.th>
                <x-table.th>Stok</x-table.th>
                <x-table.th>Harga</x-table.th>
                <x-table.th>Created At</x-table.th>
            </tr>
        </x-table.thead>
        <x-table.tbody>
            @foreach($barangs as $barang)
                <tr>
                    <x-table.td>{{ $loop->iteration }}</x-table.td>
                    <x-table.td>{{ $barang->nama_barang }}</x-table.td>
                    <x-table.td>{{ $barang->jenis_barang }}</x-table.td>
                    <x-table.td>{{ $barang->stok }}</x-table.td>
                    <x-table.td>{{number_format($barang->harga,2,',','.') }}</x-table.td>
                    <x-table.td>{{ date('d-m-y', strtotime($barang->created_at)) }}</x-table.td>
                    <x-table.td>
                        <a href="/barang/{{$barang->id}}/edit">Update</a>
                        <form action="{{ route('barang.destroy', $barang->id) }}" method="POST" style="display:inline;" class="delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="delete-button">Delete</button>
                        </form>

                        <script>
                            document.querySelectorAll('.delete-button').forEach(button => {
                                button.addEventListener('click', function() {
                                    const form = this.closest('form');
                                    Swal.fire({
                                        title: 'Apakah Anda yakin?',
                                        text: "Anda tidak akan dapat mengembalikan ini!",
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#3085d6',
                                        cancelButtonColor: '#d33',
                                        confirmButtonText: 'Ya, hapus!'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            Swal.fire({
                                                title: "Deleted!",
                                                text: "Your file has been deleted.",
                                                icon: "success"
                                            });
                                            form.submit();
                                        }
                                    });
                                });
                            });
                        </script>
                    </x-table.td>
                </tr>
            @endforeach
        </x-table.tbody>
    </x-table>

    <div class="mt-4">
        {{ $barangs->links() }}
    </div>
</x-app-layout>
<?php
