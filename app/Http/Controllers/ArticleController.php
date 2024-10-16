<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    // Function to create a new article
    public function create()
    {
        return view('articles.create');
    }

    // Function to store a new article
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Article::create($validatedData);

        session()->flash('success', 'Article created successfully.');

        return redirect()->route('articles.index');
    }

    // Function to display all articles
    public function index()
    {
        $articles = Article::all();
        return view('articles.index', compact('articles'));
    }

    // Function to show a specific article
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    // Function to edit an article
    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    // Function to update an article
    public function update(Request $request, Article $article)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $article->update($validatedData);

        session()->flash('success', 'Article updated successfully.');

        return redirect()->route('articles.index');
    }

    // Function to delete an article
    public function destroy(Article $article)
    {
        $article->delete();

        session()->flash('success', 'Article deleted successfully.');

        return redirect()->route('articles.index');
    }
}


