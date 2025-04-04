<x-app-layout title="To-Do List">
    <x-slot:heading>To-Do List</x-slot:heading>
    <div class="flex flex-wrap justify-start">
        <x-button as="a" href="ToDo/create">Tambah Tugas</x-button>
        @foreach($todo as $todo)
        <div class="card m-2" style="width: 20rem;">
            <h5 class="card-title">{{ $todo->judul }}</h5>
            <p class="card-text">{{ $todo->isi }}</p>
            <p class="card-text">{{ $todo->tanggal }}</p>
            <p class="card-text">
                @if($todo->status)
                    Selesai
                    @else
                    Belum Selesai
                @endif
            </p>
            <a href="/ToDo/{{$todo->id}}/edit" class="btn btn-primary">Edit</a>
            <form action="{{ route('ToDo.destroy', $todo->id) }}" method="POST" class="delete-form">
                @csrf
                @method('DELETE')
                <button type="button" class="btn btn-danger delete-button">Delete</button>
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
        </div>
        @endforeach
    </div>
</x-app-layout>
