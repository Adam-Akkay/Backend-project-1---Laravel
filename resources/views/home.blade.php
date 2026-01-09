@extends('layouts.app')

@section('title', 'Home - Zaalvoetbal Soda JC')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center">
        <h1 class="text-4xl font-bold text-gray-900 mb-4">Welkom bij Zaalvoetbal Soda JC</h1>
        <p class="text-xl text-gray-600 mb-8">Uw lokale futsal team in Koekelberg</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-8">
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-2xl font-semibold mb-4">Team Informatie</h2>
            <p class="text-gray-700 mb-2"><strong>Naam:</strong> Zaalvoetbal Soda JC</p>
            <p class="text-gray-700 mb-2"><strong>Adres:</strong> Dapperenstraat 20, 1081 Koekelberg</p>
            <p class="text-gray-700 mb-4"><strong>Contactpersoon:</strong> Adan Julien</p>
            <a href="https://www.google.be/maps/place/Dapperenstraat,%2020+1081+Koekelberg+Belgium" target="_blank" class="text-blue-600 hover:underline">
                Bekijk op Google Maps
            </a>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-2xl font-semibold mb-4">Snelle Links</h2>
            <ul class="space-y-2">
                <li><a href="{{ route('news.index') }}" class="text-blue-600 hover:underline">Nieuws</a></li>
                <li><a href="{{ route('faq.index') }}" class="text-blue-600 hover:underline">Veelgestelde Vragen</a></li>
                <li><a href="{{ route('contact.show') }}" class="text-blue-600 hover:underline">Contact</a></li>
            </ul>
        </div>
    </div>
</div>
@endsection
