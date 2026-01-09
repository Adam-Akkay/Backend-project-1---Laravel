@extends('layouts.app')

@section('title', 'Profiel bewerken')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-2xl font-bold mb-6">Profiel bewerken</h2>

        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="username" class="block text-gray-700 text-sm font-bold mb-2">
                    Gebruikersnaam
                </label>
                <input type="text" name="username" id="username" value="{{ old('username', auth()->user()->username) }}"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('username') border-red-500 @enderror">
                @error('username')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="birthday" class="block text-gray-700 text-sm font-bold mb-2">
                    Geboortedatum
                </label>
                <input type="date" name="birthday" id="birthday" value="{{ old('birthday', auth()->user()->birthday?->format('Y-m-d')) }}"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('birthday') border-red-500 @enderror">
                @error('birthday')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="profile_photo" class="block text-gray-700 text-sm font-bold mb-2">
                    Profielfoto
                </label>
                <input type="file" name="profile_photo" id="profile_photo" accept="image/*"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('profile_photo') border-red-500 @enderror">
                @error('profile_photo')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="about_me" class="block text-gray-700 text-sm font-bold mb-2">
                    Over mij
                </label>
                <textarea name="about_me" id="about_me" rows="4"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('about_me') border-red-500 @enderror">{{ old('about_me', auth()->user()->about_me) }}</textarea>
                @error('about_me')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Opslaan
                </button>
                <a href="{{ route('profiles.show', auth()->user()) }}" class="text-blue-600 hover:underline">
                    Annuleren
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
