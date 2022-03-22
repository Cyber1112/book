<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Genres;
use App\Models\Authors;

class BookController extends Controller
{
    // SHOW ALL BOOKS WITH GENRES
    public function books(){
        return response(Book::with(['genres', 'authors', 'comments'])->get());
    }

    // CREATE NEW BOOK
    public function addBook(Request $request){
        $fields = $request->validate([
            'title' => 'required',
            'rating' => 'required',
            'genres' => 'required|array',
            'authors' => 'required',
        ]);
        $book = new Book;
        $book->title = $fields['title'];
        $book->rating = $fields['rating'];

        $book->save();
        
        $genre = Genres::find($fields['genres']);
        $book->genres()->attach($genre);

        $author = Authors::find($fields['authors']);
        $book->genres()->attach($author);

        return response($book, 201);
    }

    // DELETE BOOK
    public function deleteBook($id){
        $book = Book::find($id);
        $book->delete();
        $response = "DELETED SUCCESSFULLY";
        return response($response, 201);
    }

    // FIND BOOK
    public function findBook($id){
        $book = Book::find($id);
        return response($book, 201);
    }

    // FIND BOOK BY AUTHORS
    public function findByAuthor($name, $surname){

        $booksByAuthor = Authors::with(['searchBookByAuthor'])
        ->where('name', 'LIKE', '%' . $name . '%')
        ->where('surname', 'LIKE', '%' . $surname . '%')->get();

        if ( !$booksByAuthor ) {
            return response('NOT FOUND', 404);
        }
        return response($booksByAuthor, 201);
        
    }

    // EDIT BOOK
    public function updateBook(Request $request, $id){
        $book = Book::find($id);
        
        $book->title = $request->title;
        $book->save();

        return response($book, 201);
    }
}
