@extends('layouts.admin')

@section('title', 'Nieuwe FAQ categorie')

@section('content')
<div class="max-w-2xl">
    <h1 class="text-3xl font-bold mb-6">Nieuwe FAQ categorie</h1>

    <div class="bg-white rounded-lg shadow-md p-6">
        <form method="POST" action="{{ route('admin.faq-categories.store') }}">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Naam *</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('name') border-red-500 @enderror">
                @error('name')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="order" class="block text-gray-700 text-sm font-bold mb-2">Volgorde</label>
                <input type="number" name="order" id="order" value="{{ old('order', 0) }}"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('order') border-red-500 @enderror">
                @error('order')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Opslaan
                </button>
                <a href="{{ route('admin.faq-categories.index') }}" class="text-blue-600 hover:underline">
                    Annuleren
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
