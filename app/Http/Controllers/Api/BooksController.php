<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\Response;

class BooksController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return BookResource::collection(Book::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        $book = Book::create($request->validated());

        if ($request->has('authors') && is_array($request->get('authors'))) {
            $book->authors()->syncWithoutDetaching($request->authors);
        }

        return new BookResource($book);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return BookResource
     */
    public function show(int $id)
    {
        return new BookResource(Book::with('authors')->findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        return new BookResource($book->update($request->validated()));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        try {
            $book = Book::findOrFail($id);
            return response($book->delete(), Response::HTTP_NO_CONTENT);
        } catch (\Exception $exception) {
            return response($exception->getMessage(), Response::HTTP_BAD_REQUEST);
        }
    }
}
