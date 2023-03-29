<?php

namespace App\Http\Controllers;

use App\Http\Requests\Dashboard\StoreArticle;
use App\Http\Requests\Dashboard\UpdateArticle;
use App\Models\Article;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $articles = Article::all();
        return response()->json(["data" => $articles]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticle $request): JsonResponse
    {
        $data = $request->all();
        $article = Article::create($data);
        return response()->json([
            "status" => 'success',
            "data" => $article
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Article::find($id);
        return response()->json([
            "status" => 'success',
            "data" => $data
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticle $request, string $id)
    {
        $data = $request->all();
        $article = Article::find($id);
        $article->update($data);
        return response()->json([
            "status" => 'success',
            "data" => $article
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = Article::find($id);
        $article->delete();
        return response()->json([
            "status" => 'success',
            "data" => $article
        ], 200);
    }
}
