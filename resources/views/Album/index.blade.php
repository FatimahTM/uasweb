
@extends('layout.main')

@section('title', 'Album List')

@section('content')
<div class="container mx-auto py-12">
    <div class="bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Album List</h2>
        
        <div class="mt-6 mb-4">
            <a href="{{ route('albums.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md">Add New Album</a>
        </div>
        
        <table class="min-w-full bg-white">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="uppercase font-semibold text-sm">Title</th>
                    <th class="uppercase font-semibold text-sm">Artist</th>
                    <th class="uppercase font-semibold text-sm">Year</th>
                    <th class="uppercase font-semibold text-sm">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach($album as $item)
                <tr>
                    <td class="text-center">{{ $item['title'] }}</td>
                    <td class="text-center">{{ $item['artist'] }}</td>
                    <td class="text-center">{{ $item['year'] }}</td>
                    <td class="text-center">
                        <a href="{{ route('albums.edit', $item->id) }}" class="bg-yellow-400 text-green-500 px-4 py-2 rounded-md hover:bg-yellow-500 hover:text-black">Edit</a>

                        <form action="{{ route('albums.destroy', $item->id) }}" method="POST" style="display: inline-block" onsubmit="return confirm('Are you sure you want to delete this album?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-green-500 px-4 py-2 rounded-md hover:bg-red-600 hover:text-white ml-2">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
@endsection
