<x-app-layout title="Users">
    <x-slot:heading>Users</x-slot:heading>
    <div class="sm:flex sm:items-center">
        <x-section-title>
            <x-slot name="title">Users</x-slot>
            <x-slot name="description">A list of all the users in your accout including their name, title,
                email, and role
            </x-slot>
        </x-section-title>
        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
            <x-button class="bg-red-500" as="a" href="/users/create">
                ADD User
            </x-button>
        </div>
    </div>
    <div class="mt-8 flow-root">
        <x-table>
            <x-table.thead>
                <tr>
                    <x-table.th>#</x-table.th>
                    <x-table.th>Name</x-table.th>
                    <x-table.th>email</x-table.th>
                    <x-table.th>created at</x-table.th>
                </tr>
            </x-table.thead>
            <x-table.tbody>
                @foreach ($users as $users)
                    <tr>
                        <x-table.td>{{ $loop->iteration }}</x-table.td>
                        <x-table.td>{{ $users->name }}</x-table.td>
                        <x-table.td>{{ $users->email }}</x-table.td>
                        <x-table.td>{{ $users->created_at->format('d M Y') }}</x-table.td>
                        
                        <x-table.td>
                            <div class="flex justify-end gap-x-2">
                                <a href="/users/{{ $users->id }}" class="hover:underline bg-red">View</a>
                            <a href="/users/{{ $users->id }}/edit" class="hover:underline">Update</a>
                            </div>
                        </x-table.td>
                    </tr>
                @endforeach
            </x-table.tbody>
        </x-table>
    </div>

    
 </x-app-layout>
