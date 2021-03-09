<?php

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
 
Route::get('book', function() {
    return Book::paginate(12);
});
 
Route::get('book/{id}', function($id) {
    return Book::find($id);
});

Route::get('book/search/{keyword}', function($keyword) {
    return Book::where('name', 'like', '%' . $keyword . '%')
    ->orWhere('author', 'like', '%' . $keyword . '%')
    ->get();
});

Route::get('category', function() {
    return Category::all();
});

Route::get('category/{id}', function($id) {
    return Category::find($id);
});

Route::post('book', function(Request $request) {
    return Book::create($request->all());
});

Route::put('book/{id}', function(Request $request, $id) {
    $article = Book::findOrFail($id);
    $article->update($request->all());
    return $request;
});

Route::delete('book/{id}', function($id) {
    return Book::find($id)->delete();
});
