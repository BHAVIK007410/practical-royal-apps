<?php

namespace App\Http\Controllers;

use App\Services\AuthorServices;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

/**
 * Class AuthorController
 * 
 * @package App\Http\Controllers
 */
class AuthorController extends Controller
{
    public AuthorServices $author;

    /**
     * Method __construct
     *
     * @param AuthorServices $author
     *
     * @return void
     */
    public function __construct(AuthorServices $author)
    {
        $this->author = $author;
    }

    /**
     * Method index
     *
     * @return View|RedirectResponse
     */
    public function index(): View|RedirectResponse
    {
        try {
            $authors = $this->author->getAllAuthors();
            return view('authors', compact('authors'));
        } catch (Exception $e) {
            return redirect()->route('dashboard')->with('error', $e->getMessage());
        }
    }

    /**
     * Method author
     *
     * @param string $id
     *
     * @return View|RedirectResponse
     */
    public function author(string $id): View|RedirectResponse
    {
        try {
            $author = $this->author->getAuthor($id);
            return view('author', compact('author'));
        } catch (Exception $e) {
            return redirect()->route('dashboard')->with('error', $e->getMessage());
        }
    }

    /**
     * Method delete
     *
     * @param string $id
     *
     * @return RedirectResponse
     */
    public function delete(string $id): RedirectResponse
    {
        try {
            $authorBooks = $this->author->authorBooks($id);
            if (!empty($authorBooks)) {
                return redirect()->back()->with('error', 'Author cannot be deleted. Please delete his books first.');
            }

            $author = $this->author->delAuthor($id);
            if ($author) {
                return redirect()->back()->with('success', 'Author deleted successfully.');
            }

            return redirect()->back()->with('error', 'Something went wrong.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
