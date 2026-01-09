@extends('layouts.admin')

@section('title', 'FAQ item bewerken')

@section('content')
<div class="max-w-2xl">
    <h1 class="text-3xl font-bold mb-6">FAQ item bewerken</h1>

    <div class="bg-white rounded-lg shadow-md p-6">
        <form method="POST" action="{{ route('admin.faq-items.update', $faqItem) }}">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="faq_category_id" class="block text-gray-700 text-sm font-bold mb-2">Categorie *</label>
                <select name="faq_category_id" id="faq_category_id" required
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('faq_category_id') border-red-500 @enderror">
                    <option value="">Selecteer een categorie</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('faq_category_id', $faqItem->faq_category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('faq_category_id')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="question" class="block text-gray-700 text-sm font-bold mb-2">Vraag *</label>
                <input type="text" name="question" id="question" value="{{ old('question', $faqItem->question) }}" required
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('question') border-red-500 @enderror">
                @error('question')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="answer" class="block text-gray-700 text-sm font-bold mb-2">Antwoord *</label>
                <textarea name="answer" id="answer" rows="6" required
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('answer') border-red-500 @enderror">{{ old('answer', $faqItem->answer) }}</textarea>
                @error('answer')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="order" class="block text-gray-700 text-sm font-bold mb-2">Volgorde</label>
                <input type="number" name="order" id="order" value="{{ old('order', $faqItem->order) }}"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('order') border-red-500 @enderror">
                @error('order')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Opslaan
                </button>
                <a href="{{ route('admin.faq-items.index') }}" class="text-blue-600 hover:underline">
                    Annuleren
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
