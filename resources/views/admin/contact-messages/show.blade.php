@extends('layouts.admin')

@section('title', 'Contactbericht bekijken')

@section('content')
<div class="max-w-4xl">
    <h1 class="text-3xl font-bold mb-6">Contactbericht</h1>

    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <div class="mb-4">
            <h2 class="text-xl font-semibold mb-2">Van</h2>
            <p class="text-gray-700"><strong>Naam:</strong> {{ $contactMessage->name }}</p>
            <p class="text-gray-700"><strong>E-mail:</strong> {{ $contactMessage->email }}</p>
            <p class="text-gray-700"><strong>Datum:</strong> {{ $contactMessage->created_at->format('d/m/Y H:i') }}</p>
        </div>

        <div class="mb-4">
            <h2 class="text-xl font-semibold mb-2">Bericht</h2>
            <p class="text-gray-700 whitespace-pre-wrap">{{ $contactMessage->message }}</p>
        </div>

        @if($contactMessage->admin_reply)
            <div class="mb-4 p-4 bg-gray-50 rounded">
                <h2 class="text-xl font-semibold mb-2">Antwoord</h2>
                <p class="text-gray-700 whitespace-pre-wrap">{{ $contactMessage->admin_reply }}</p>
                <p class="text-sm text-gray-500 mt-2">Beantwoord op: {{ $contactMessage->replied_at->format('d/m/Y H:i') }}</p>
            </div>
        @endif
    </div>

    @if(!$contactMessage->admin_reply)
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-semibold mb-4">Antwoord versturen</h2>
            <form method="POST" action="{{ route('admin.contact-messages.reply', $contactMessage) }}">
                @csrf
                <div class="mb-4">
                    <label for="admin_reply" class="block text-gray-700 text-sm font-bold mb-2">Antwoord *</label>
                    <textarea name="admin_reply" id="admin_reply" rows="6" required
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('admin_reply') border-red-500 @enderror">{{ old('admin_reply') }}</textarea>
                    @error('admin_reply')
                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Antwoord versturen
                </button>
            </form>
        </div>
    @endif

    <div class="mt-6">
        <a href="{{ route('admin.contact-messages.index') }}" class="text-blue-600 hover:underline">
            ← Terug naar overzicht
        </a>
    </div>
</div>
@endsection
