<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBookRequest;
use App\Services\AuthorServices;
use App\Services\BookServices;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

/**
 * Class BookController
 * 
 * @package App\Http\Controllers
 */
class BookController extends Controller
{
    public AuthorServices $author;
    public BookServices $book;

    /**
     * Method __construct
     *
     * @param AuthorServices $author
     * @param BookServices $book
     *
     * @return void
     */
    public function __construct(BookServices $book, AuthorServices $author)
    {
        $this->book = $book;
        $this->author = $author;
    }

    /**
     * Method index
     *
     * @return View|RedirectResponse
     */
    public function create(): View|RedirectResponse
    {
        try {
            $authors = $this->author->getAllAuthors();
            return view('book-create', compact('authors'));
        } catch (Exception $e) {
            return redirect()->route('dashboard')->with('error', $e->getMessage());
        }
    }

    /**
     * Method store
     *
     * @param CreateBookRequest $request
     *
     * @return RedirectResponse
     */
    public function store(CreateBookRequest $request): RedirectResponse
    {
        try {
            $bookData = $request->validated();
            $book = $this->book->storeBook($bookData);
            if ($book) {
                return redirect()->route('authors')->with('success', 'Book created successfully.');
            }

            return redirect()->back()->with('error', 'Something went wrong.');
        } catch (Exception $e) {
            return redirect()->route('book.create')->with('error', $e->getMessage());
        }
    }
}
