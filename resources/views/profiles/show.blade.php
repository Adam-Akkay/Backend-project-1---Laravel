@extends('layouts.app')

@section('title', 'Profiel - ' . $user->name)

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex items-center mb-6">
            @if($user->profile_photo)
                <img src="{{ asset('storage/' . $user->profile_photo) }}" alt="{{ $user->name }}" class="w-24 h-24 rounded-full object-cover mr-4">
            @else
                <div class="w-24 h-24 rounded-full bg-gray-300 flex items-center justify-center text-2xl font-bold text-gray-600 mr-4">
                    {{ strtoupper(substr($user->name, 0, 1)) }}
                </div>
            @endif
            <div>
                <h1 class="text-3xl font-bold">{{ $user->username ?? $user->name }}</h1>
                <p class="text-gray-600">{{ $user->email }}</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @if($user->birthday)
                <div>
                    <h3 class="font-semibold text-gray-700">Geboortedatum</h3>
                    <p class="text-gray-600">{{ $user->birthday->format('d/m/Y') }}</p>
                </div>
            @endif

            @if($user->about_me)
                <div class="md:col-span-2">
                    <h3 class="font-semibold text-gray-700 mb-2">Over mij</h3>
                    <p class="text-gray-600">{{ $user->about_me }}</p>
                </div>
            @endif
        </div>

        @auth
            @if(auth()->id() === $user->id)
                <div class="mt-6">
                    <a href="{{ route('profile.edit') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Profiel bewerken
                    </a>
                </div>
            @endif
        @endauth
    </div>

    <!-- Profile Wall Section -->
    <div class="bg-white rounded-lg shadow-md p-6 mt-6">
        <h2 class="text-2xl font-bold mb-4">Profielmuur</h2>

        @auth
            <div class="mb-6">
                <form method="POST" action="{{ route('profile-messages.store', $user) }}">
                    @csrf
                    <div class="mb-4">
                        <label for="message" class="block text-gray-700 text-sm font-bold mb-2">
                            Plaats een bericht
                        </label>
                        <textarea name="message" id="message" rows="3" required
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('message') border-red-500 @enderror"
                            placeholder="Schrijf een bericht..."></textarea>
                        @error('message')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Bericht plaatsen
                    </button>
                </form>
            </div>
        @else
            <p class="text-gray-600 mb-4">
                <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Log in</a> om een bericht te plaatsen.
            </p>
        @endauth

        <div class="space-y-4">
            @forelse($user->profileMessages as $message)
                <div class="border-b border-gray-200 pb-4 last:border-b-0 last:pb-0">
                    <div class="flex justify-between items-start">
                        <div class="flex-1">
                            <div class="flex items-center mb-2">
                                <span class="font-semibold text-gray-900">{{ $message->author->name }}</span>
                                <span class="text-gray-500 text-sm ml-2">{{ $message->created_at->format('d/m/Y H:i') }}</span>
                            </div>
                            <p class="text-gray-700 whitespace-pre-wrap">{{ $message->message }}</p>
                        </div>
                        @auth
                            @can('delete', $message)
                                <form method="POST" action="{{ route('profile-messages.destroy', $message) }}" class="ml-4">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900 text-sm" onclick="return confirm('Weet u zeker dat u dit bericht wilt verwijderen?')">
                                        Verwijderen
                                    </button>
                                </form>
                            @endcan
                        @endauth
                    </div>
                </div>
            @empty
                <p class="text-gray-600">Nog geen berichten op deze profielmuur.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection
