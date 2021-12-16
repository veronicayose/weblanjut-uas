<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\BooksToRead;

class BooksToReads extends Component
{
    public $to_reads, $bookTitle, $author, $releaseYear, $books_id;

    public $isOpen = 0;

    public function render()
    {
        $this->to_reads = BooksToRead::all();
        return view('livewire.toReads.books-to-reads');
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    private function resetInputFields(){
        $this->bookTitle = '';
        $this->author = '';
        $this->releaseYear = '';
        $this->books_id = '';
    }

    public function store()
    {
        $this->validate([
            'bookTitle' => 'required',
            'releaseYear' => 'required',
            'author' => 'required',
        
        ]);

        BooksToRead::updateOrCreate(['id' => $this->books_id], [
            'bookTitle' => $this->bookTitle,
            'releaseYear' => $this->releaseYear,
            'author' => $this->author,
            
        ]);

        session()->flash('message',
            $this->books_id ? 'Book to Read is Updated.' : 'Book to Read is Created.');

        $this->closeModal();

        $this->resetInputFields();
    }

    public function edit($id){
        $books = BooksToRead::findOrFail($id);
        $this->books_id = $id;
        $this->bookTitle = $books->bookTitle;
        $this->author = $books->author;
        $this->releaseYear = $books->releaseYear;        
        $this->openModal();
       
    }

    public function delete($id)
    {
        BooksToRead::find($id)->delete();
        session()->flash('message', 'Books to read is deleted.');
    }
}
