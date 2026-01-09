@extends('layouts.app')

@section('title', $news->title)

@section('content')
<div class="max-w-4xl mx-auto">
    <article class="bg-white rounded-lg shadow-md overflow-hidden">
        @if($news->image)
            <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" class="w-full h-64 object-cover">
        @endif
        <div class="p-6">
            <h1 class="text-3xl font-bold mb-4">{{ $news->title }}</h1>
            <p class="text-gray-600 text-sm mb-6">{{ $news->published_at->format('d/m/Y') }}</p>
            <div class="prose max-w-none">
                {!! nl2br(e($news->content)) !!}
            </div>
            <div class="mt-6">
                <a href="{{ route('news.index') }}" class="text-blue-600 hover:underline">
                    ← Terug naar nieuws
                </a>
            </div>
        </div>
    </article>
</div>
@endsection
