@extends('layouts.app')

@section('title', 'Veelgestelde Vragen')

@section('content')
<div class="max-w-4xl mx-auto">
    <h1 class="text-3xl font-bold mb-6">Veelgestelde Vragen</h1>

    @forelse($categories as $category)
        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <h2 class="text-2xl font-semibold mb-4">{{ $category->name }}</h2>
            <div class="space-y-4">
                @forelse($category->faqItems as $item)
                    <div class="border-b border-gray-200 pb-4 last:border-b-0 last:pb-0">
                        <h3 class="font-semibold text-lg mb-2">{{ $item->question }}</h3>
                        <p class="text-gray-700">{{ $item->answer }}</p>
                    </div>
                @empty
                    <p class="text-gray-600">Geen vragen in deze categorie.</p>
                @endforelse
            </div>
        </div>
    @empty
        <div class="bg-white rounded-lg shadow-md p-6 text-center">
            <p class="text-gray-600">Er zijn nog geen veelgestelde vragen beschikbaar.</p>
        </div>
    @endforelse
</div>
@endsection
