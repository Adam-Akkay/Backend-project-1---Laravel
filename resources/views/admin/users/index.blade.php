@extends('layouts.admin')

@section('title', 'Gebruikersbeheer')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold">Gebruikersbeheer</h1>
    <a href="{{ route('admin.users.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Nieuwe gebruiker
    </a>
</div>

<div class="bg-white shadow-md rounded-lg overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Naam</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">E-mail</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Rol</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acties</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach($users as $user)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $user->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->email }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $user->role === 'admin' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                            {{ $user->role === 'admin' ? 'Admin' : 'Gebruiker' }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
<<<<<<< HEAD
                        <div class="flex space-x-4">
                            {{-- Hide "Admin verwijderen" button for protected admin (admin@ehb.be) --}}
                            @if($user->email !== 'admin@ehb.be')
                                <form method="POST" action="{{ route('admin.users.toggle-admin', $user) }}" class="inline">
                                    @csrf
                                    <button type="submit" class="text-blue-600 hover:text-blue-900">
                                        {{ $user->role === 'admin' ? 'Admin verwijderen' : 'Admin maken' }}
                                    </button>
                                </form>
                            @else
                                <span class="text-gray-400 text-sm">Beschermde beheerder</span>
                            @endif
                            
                            {{-- Hide delete button for protected admin (admin@ehb.be) and for yourself --}}
                            @if($user->id !== auth()->id() && $user->email !== 'admin@ehb.be')
                                <form method="POST" action="{{ route('admin.users.destroy', $user) }}" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Weet u zeker dat u deze gebruiker wilt verwijderen? Het e-mailadres wordt vrijgegeven voor nieuwe registraties.')">
                                        Verwijderen
                                    </button>
                                </form>
                            @endif
                        </div>
=======
                        <form method="POST" action="{{ route('admin.users.toggle-admin', $user) }}" class="inline">
                            @csrf
                            <button type="submit" class="text-blue-600 hover:text-blue-900">
                                {{ $user->role === 'admin' ? 'Admin verwijderen' : 'Admin maken' }}
                            </button>
                        </form>
>>>>>>> d8a97282b9145629dc952d67913417992d407051
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
