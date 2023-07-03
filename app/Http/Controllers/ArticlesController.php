<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('id')->get();

        return response()->json($articles);
    }

    public function show($id)
    {
        $article = Article::find($id);

        if (!$article) {
            return response()->json(['error' => 'Article not found'], 404);
        }

        return response()->json($article);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:30',
            'content' => 'required',
            'author' => 'required',
            'category' => 'required',
            'published_at' => 'required|date',
        ]);

        $article = Article::create($request->all());

        return response()->json($article, 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:30',
            'content' => 'required',
            'author' => 'required',
            'category' => 'required',
            'published_at' => 'required|date',
        ]);

        $article = Article::find($id);

        if (!$article) {
            return response()->json(['error' => 'Article not found'], 404);
        }

        $article->update($request->all());

        return response()->json($article);
    }

    public function destroy($id)
    {
        $article = Article::find($id);

        if (!$article) {
            return response()->json(['error' => 'Article not found'], 404);
        }

        $article->delete();

        return response()->json(['message' => 'Article deleted']);
    }
}
