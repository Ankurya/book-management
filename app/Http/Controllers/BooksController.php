<?php

namespace App\Http\Controllers;
use App\Models\User;

use App\Models\Book;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Storage;ss
class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $books = Book::paginate(10);
        // return view('home')
        //     ->with(['books' => $books]);

        // $user_id = auth()->user()->id;
        // $user = User::find($user_id);
        // return view('home')->with('books',$user->books);

        // $books = Book::with(['users'])->where('user_id',$user_id);
        //  $book = $books->name;


        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                // Storage::disk('public');

        $createData = [
            'book_name' => $request->get("book_name"),
            'author_name' => $request->get("author_name"),
            'published_date' => $request->get("published_date"),
        ];

        if ($request->hasFile("image")) {
            $file = $request->file("image");
            $imageName = uniqid() . "_" . $file->getClientOriginalName();
            $destinationPath = storage_path('app/public');
            $file->move($destinationPath, $imageName);
            $createData["image"] = $imageName;
        }

        $isCreated = Book::create($createData);
        if ($isCreated) {
            return redirect('books')->with("success", "Books details saved successfully");
        } else {
            return redirect('books')->with("error", "Unable to save books details");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $books = Book::where("user_id", "=", $user->id)->get();
        return view('home');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);
        return view('edit')->with('book', $book);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $isUpdated = Book::find($id)->update($request->all());

        if ($isUpdated) {
            return redirect('books')->with("success", "Books details updated successfully.");
        } else {
            return redirect('books')->with("success", "Books details not updated.");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $book = Book::find($id);
        $book->delete();
        return redirect('books');

    }
}
