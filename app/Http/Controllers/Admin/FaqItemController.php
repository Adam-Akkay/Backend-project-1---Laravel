<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FaqCategory;
use App\Models\FaqItem;
use Illuminate\Http\Request;

class FaqItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = FaqItem::with('faqCategory')->orderBy('faq_category_id')->orderBy('order')->get();
        return view('admin.faq-items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = FaqCategory::orderBy('name')->get();
        return view('admin.faq-items.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'faq_category_id' => 'required|exists:faq_categories,id',
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'order' => 'nullable|integer',
        ]);

        FaqItem::create([
            'faq_category_id' => $request->faq_category_id,
            'question' => $request->question,
            'answer' => $request->answer,
            'order' => $request->order ?? 0,
        ]);

        return redirect()->route('admin.faq-items.index')->with('success', 'FAQ item succesvol aangemaakt.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FaqItem $faqItem)
    {
        $categories = FaqCategory::orderBy('name')->get();
        return view('admin.faq-items.edit', compact('faqItem', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FaqItem $faqItem)
    {
        $request->validate([
            'faq_category_id' => 'required|exists:faq_categories,id',
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'order' => 'nullable|integer',
        ]);

        $faqItem->update([
            'faq_category_id' => $request->faq_category_id,
            'question' => $request->question,
            'answer' => $request->answer,
            'order' => $request->order ?? 0,
        ]);

        return redirect()->route('admin.faq-items.index')->with('success', 'FAQ item succesvol bijgewerkt.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FaqItem $faqItem)
    {
        $faqItem->delete();
        return redirect()->route('admin.faq-items.index')->with('success', 'FAQ item succesvol verwijderd.');
    }
}
