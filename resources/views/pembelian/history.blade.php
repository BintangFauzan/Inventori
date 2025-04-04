<x-app-layout title="History">
    <x-slot:heading>History</x-slot:heading>
    <x-table>
        <x-table.thead>
            <tr>
                <x-table.th>No</x-table.th>
                <x-table.th>Barang Id</x-table.th>
                <x-table.th>Jumlah Beli</x-table.th>
                <x-table.th>Total Harga</x-table.th>
                <x-table.th>Tanggal Dibuat</x-table.th>
            </tr>
        </x-table.thead>
        <x-table.tbody>
            @forelse($pembelian as $item)
                <tr>
                    <x-table.td>{{ $loop->iteration }}</x-table.td>
                    <x-table.td>{{ $item->barang_id }}</x-table.td>
                    <x-table.td>{{ $item->jumlah_beli }}</x-table.td>
                    <x-table.td>{{ number_format($item->total_harga,2,',','.') }}</x-table.td>
                    <x-table.td>{{ $item->created_at }}</x-table.td>
                </tr>
            @empty
                <tr>
                    <x-table.td colspan="5" class="text-center">Tidak ada riwayat pembelian</x-table.td>
                </tr>
            @endforelse
        </x-table.tbody>
    </x-table>
    <div class="mt-4">
        {{ $pembelian->links() }}
    </div>
</x-app-layout>
