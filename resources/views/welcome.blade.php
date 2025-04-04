
<x-app-layout title="home">

    <x-slot:heading>Home</x-slot:heading>
    <canvas id="my-chart"></canvas>

    <script>
        document.addEventListener('DOMContentLoaded', function() {  // Pastikan grafik dijalankan setelah DOM ter-load
            const ctx = document.getElementById('my-chart').getContext('2d');

            const myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Total Barang', 'Total Stok', 'Total Rokok', 'Total Sabun', 'Total Makanan'], // Label untuk setiap data
                    datasets: [{
                        label: 'Jumlah',
                        data: [{{ $totalBarang }}, {{ $totalStok }}, {{ $totalRokok }}, {{ $totalSabun }}, {{ $totalMakanan }}], // Data yang akan ditampilkan
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
</x-app-layout>
