<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Users') }}
            </h2>
            <a type="button" href="{{ route('users.create') }}" class="inline-flex items-center px-4 py-2 ml-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                {{ __('Create') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="bg-gray-100 text-gray-900 table-auto w-full shadow-none">
                        <thead>
                            <tr>
                                <th class="text-black p-2 w-auto">#ID</th>
                                <th class="text-black p-2 w-auto">Name</th>
                                <th class="text-black p-2 w-auto">Email</th>
                                <th class="text-black p-2 w-auto">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr class="bg-white text-black">
                                    <td class="p-2 text-center">{{ $user->id }}</td>
                                    <td class="p-2 text-center">{{ $user->name }}</td>
                                    <td class="p-2 text-center">{{ $user->email }}</td>
                                    <td class="p-2 text-center">
                                        <a href={{ route('users.edit', $user->id) }} class="text-blue-600">Edit</a>
                                        <a href={{ route('users.delete', $user->id) }} class="text-red-600">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
