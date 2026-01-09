@extends('layouts.app')

@section('title', 'Contact')

@section('content')
<div class="max-w-2xl mx-auto">
    <h1 class="text-3xl font-bold mb-6">Contact</h1>

    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <h2 class="text-xl font-semibold mb-4">Team Informatie</h2>
        <p class="text-gray-700 mb-2"><strong>Naam:</strong> Zaalvoetbal Soda JC</p>
        <p class="text-gray-700 mb-2"><strong>Adres:</strong> Dapperenstraat 20, 1081 Koekelberg</p>
        <p class="text-gray-700 mb-2"><strong>Contactpersoon:</strong> Adam Akkay</p>
        <p class="text-gray-700 mb-4"><strong>E-mail:</strong> adam.akkay@hotmail.com</p>
        <a href="https://maps.app.goo.gl/K1nSPWMKn1rvMRzu9" target="_blank" class="text-blue-600 hover:underline">
            Bekijk op Google Maps
        </a>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-xl font-semibold mb-4">Stuur ons een bericht</h2>

        <form method="POST" action="{{ route('contact.submit') }}">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">
                    Naam *
                </label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('name') border-red-500 @enderror">
                @error('name')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">
                    E-mailadres *
                </label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('email') border-red-500 @enderror">
                @error('email')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="message" class="block text-gray-700 text-sm font-bold mb-2">
                    Bericht *
                </label>
                <textarea name="message" id="message" rows="6" required
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('message') border-red-500 @enderror">{{ old('message') }}</textarea>
                @error('message')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Verzenden
            </button>
        </form>
    </div>
</div>
@endsection
