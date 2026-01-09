@extends('layouts.admin')

@section('title', 'Nieuwsitem bewerken')

@section('content')
<div class="max-w-2xl">
    <h1 class="text-3xl font-bold mb-6">Nieuwsitem bewerken</h1>

    <div class="bg-white rounded-lg shadow-md p-6">
        <form method="POST" action="{{ route('admin.news.update', $news) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Titel *</label>
                <input type="text" name="title" id="title" value="{{ old('title', $news->title) }}" required
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('title') border-red-500 @enderror">
                @error('title')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>

            @if($news->image)
                <div class="mb-4">
                    <p class="text-sm text-gray-600 mb-2">Huidige afbeelding:</p>
                    <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" class="w-32 h-32 object-cover rounded">
                </div>
            @endif

            <div class="mb-4">
                <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Nieuwe afbeelding</label>
                <input type="file" name="image" id="image" accept="image/*"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('image') border-red-500 @enderror">
                @error('image')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="content" class="block text-gray-700 text-sm font-bold mb-2">Inhoud *</label>
                <textarea name="content" id="content" rows="10" required
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('content') border-red-500 @enderror">{{ old('content', $news->content) }}</textarea>
                @error('content')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="published_at" class="block text-gray-700 text-sm font-bold mb-2">Publicatiedatum *</label>
                <input type="date" name="published_at" id="published_at" value="{{ old('published_at', $news->published_at->format('Y-m-d')) }}" required
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('published_at') border-red-500 @enderror">
                @error('published_at')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Opslaan
                </button>
                <a href="{{ route('news.index') }}" class="text-blue-600 hover:underline">
                    Annuleren
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
