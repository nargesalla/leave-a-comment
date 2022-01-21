<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $products = Comment::all()->toArray();

        return array_reverse($products);
    }

    public function store(Request $request)
    {
        $product = new Comment([
            'name' => $request->input('name'),
            'detail' => $request->input('detail')
        ]);
        $product->save();

        return response()->json('Product created!');
    }
}
