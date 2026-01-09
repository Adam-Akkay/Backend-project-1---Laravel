@extends('layouts.app')

@section('title', $news->title)

@section('content')
<div class="max-w-4xl mx-auto">
    <article class="bg-white rounded-lg shadow-md overflow-hidden">
        @if($news->image)
            <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" class="w-full h-64 object-cover">
        @endif
        <div class="p-6">
<<<<<<< HEAD
            <div class="flex justify-between items-start mb-4">
                <h1 class="text-3xl font-bold">{{ $news->title }}</h1>
                @auth
                    <form method="POST" action="{{ route('favorites.toggle', $news) }}" class="ml-4">
                        @csrf
                        <button type="submit" class="flex items-center text-gray-600 hover:text-red-600 transition-colors">
                            @if($isFavorited)
                                <svg class="w-6 h-6 fill-current text-red-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                                </svg>
                                <span class="ml-2">Verwijder uit favorieten</span>
                            @else
                                <svg class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                                </svg>
                                <span class="ml-2">Toevoegen aan favorieten</span>
                            @endif
                        </button>
                    </form>
                @endauth
            </div>
=======
            <h1 class="text-3xl font-bold mb-4">{{ $news->title }}</h1>
>>>>>>> d8a97282b9145629dc952d67913417992d407051
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
<<<<<<< HEAD

    <!-- Comments Section -->
    <div class="bg-white rounded-lg shadow-md p-6 mt-6">
        <h2 class="text-2xl font-bold mb-4">Reacties ({{ $news->comments->count() }})</h2>

        @auth
            <div class="mb-6">
                <form method="POST" action="{{ route('comments.store', $news) }}">
                    @csrf
                    <div class="mb-4">
                        <label for="content" class="block text-gray-700 text-sm font-bold mb-2">
                            Plaats een reactie
                        </label>
                        <textarea name="content" id="content" rows="3" required
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('content') border-red-500 @enderror"
                            placeholder="Schrijf uw reactie..."></textarea>
                        @error('content')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Reactie plaatsen
                    </button>
                </form>
            </div>
        @else
            <p class="text-gray-600 mb-4">
                <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Log in</a> om een reactie te plaatsen.
            </p>
        @endauth

        <div class="space-y-4">
            @forelse($news->comments as $comment)
                <div class="border-b border-gray-200 pb-4 last:border-b-0 last:pb-0">
                    <div class="flex justify-between items-start">
                        <div class="flex-1">
                            <div class="flex items-center mb-2">
                                <span class="font-semibold text-gray-900">{{ $comment->user->name }}</span>
                                <span class="text-gray-500 text-sm ml-2">{{ $comment->created_at->format('d/m/Y H:i') }}</span>
                            </div>
                            <p class="text-gray-700 whitespace-pre-wrap">{{ $comment->content }}</p>
                        </div>
                        @auth
                            @can('delete', $comment)
                                <form method="POST" action="{{ route('comments.destroy', $comment) }}" class="ml-4">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900 text-sm" onclick="return confirm('Weet u zeker dat u deze reactie wilt verwijderen?')">
                                        Verwijderen
                                    </button>
                                </form>
                            @endcan
                        @endauth
                    </div>
                </div>
            @empty
                <p class="text-gray-600">Nog geen reacties. Wees de eerste om te reageren!</p>
            @endforelse
        </div>
    </div>
=======
>>>>>>> d8a97282b9145629dc952d67913417992d407051
</div>
@endsection
