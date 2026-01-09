@extends('layouts.app')

@section('title', 'Wachtwoord vergeten')

@section('content')
<div class="max-w-md mx-auto">
    <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-2xl font-bold mb-6">Wachtwoord vergeten</h2>
        <p class="text-gray-600 mb-4">Vul uw e-mailadres in en we sturen u een link om uw wachtwoord te resetten.</p>
<<<<<<< HEAD

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">
                    E-mailadres
                </label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('email') border-red-500 @enderror">
                @error('email')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Reset link versturen
                </button>
                <a href="{{ route('login') }}" class="text-sm text-blue-600 hover:underline">
                    Terug naar inloggen
                </a>
            </div>
        </form>
=======
        <p class="text-sm text-gray-500">Let op: Deze functionaliteit vereist een geconfigureerde mail server. Voor nu kunt u contact opnemen met de beheerder.</p>
>>>>>>> d8a97282b9145629dc952d67913417992d407051
    </div>
</div>
@endsection
