@extends('layouts.app')

@section('title', 'Nieuws')

@section('content')
<div class="max-w-7xl mx-auto">
    <h1 class="text-3xl font-bold mb-6">Nieuws</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($news as $item)
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                @if($item->image)
                    <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" class="w-full h-48 object-cover">
                @endif
                <div class="p-6">
                    <h2 class="text-xl font-semibold mb-2">
                        <a href="{{ route('news.show', $item) }}" class="text-gray-900 hover:text-blue-600">
                            {{ $item->title }}
                        </a>
                    </h2>
                    <p class="text-gray-600 text-sm mb-2">{{ $item->published_at->format('d/m/Y') }}</p>
                    <p class="text-gray-700">{{ Str::limit(strip_tags($item->content), 150) }}</p>
                    <a href="{{ route('news.show', $item) }}" class="text-blue-600 hover:underline mt-4 inline-block">
                        Lees meer →
                    </a>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-12">
                <p class="text-gray-600">Er is nog geen nieuws beschikbaar.</p>
            </div>
        @endforelse
    </div>

    <div class="mt-6">
        {{ $news->links() }}
    </div>
</div>
@endsection
