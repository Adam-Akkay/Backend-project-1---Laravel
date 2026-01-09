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
</div>
@endsection
