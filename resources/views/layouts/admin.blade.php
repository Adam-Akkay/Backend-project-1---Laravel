<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin - Zaalvoetbal Soda JC')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<<<<<<< HEAD
<body class="bg-gray-50 flex flex-col min-h-screen">
=======
<body class="bg-gray-50">
>>>>>>> d8a97282b9145629dc952d67913417992d407051
    <nav class="bg-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="flex-shrink-0 flex items-center">
                        <a href="{{ route('home') }}" class="text-xl font-bold text-white">
                            Admin - Zaalvoetbal Soda JC
                        </a>
                    </div>
                    <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                        <a href="{{ route('admin.users.index') }}" class="border-transparent text-gray-300 hover:border-gray-300 hover:text-white inline-flex items-center px-1 pt-4 border-b-2 text-sm font-medium">
                            Gebruikers
                        </a>
                        <a href="{{ route('admin.news.create') }}" class="border-transparent text-gray-300 hover:border-gray-300 hover:text-white inline-flex items-center px-1 pt-4 border-b-2 text-sm font-medium">
                            Nieuws
                        </a>
                        <a href="{{ route('admin.faq-categories.index') }}" class="border-transparent text-gray-300 hover:border-gray-300 hover:text-white inline-flex items-center px-1 pt-4 border-b-2 text-sm font-medium">
                            FAQ Categorieën
                        </a>
                        <a href="{{ route('admin.faq-items.index') }}" class="border-transparent text-gray-300 hover:border-gray-300 hover:text-white inline-flex items-center px-1 pt-4 border-b-2 text-sm font-medium">
                            FAQ Items
                        </a>
<<<<<<< HEAD
                        <a href="{{ route('admin.contact-messages.index') }}" class="border-transparent text-gray-300 hover:border-gray-300 hover:text-white inline-flex items-center px-1 pt-4 border-b-2 text-sm font-medium">
                            Contactberichten
                        </a>
=======
>>>>>>> d8a97282b9145629dc952d67913417992d407051
                    </div>
                </div>
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="text-gray-300 hover:text-white px-3 py-2 text-sm font-medium">
                        Terug naar site
                    </a>
                </div>
            </div>
        </div>
    </nav>

    @if(session('success'))
<<<<<<< HEAD
        <x-alert type="success" :message="session('success')" />
    @endif

    @if(session('error'))
        <x-alert type="error" :message="session('error')" />
    @endif

    @if($errors->any())
        <x-alert type="error">
=======
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
>>>>>>> d8a97282b9145629dc952d67913417992d407051
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
<<<<<<< HEAD
        </x-alert>
    @endif

    <main class="flex-1 py-10">
=======
        </div>
    @endif

    <main class="py-10">
>>>>>>> d8a97282b9145629dc952d67913417992d407051
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @yield('content')
        </div>
    </main>
</body>
</html>
