<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Reading;

class Readings extends Component
{
    public $the_reading, $bookTitle, $releaseYear, $totalPages, $author, $reading_id;

    public $isOpen = 0;

    public function render()
    {
        $this->the_reading = Reading::all();
        return view('livewire.reading.readings');
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
        $this->releaseYear = '';
        $this->totalPages = '';
        $this->author = '';
        $this->reading_id = '';
    }

    public function store()
    {
        $validateData = $this->validate([
        'bookTitle' => 'required',
        'releaseYear' => 'required',
        'totalPages' => 'required',
        'author' => 'required',
        ]);

        if ($this->reading_id) {
            Reading::find($this->reading_id)->update($validateData);
        } else {            
            Reading::create($validateData);
        }

        session()->flash('message',
        $this->reading_id ? 'Reading Book is Updated' : 'Reading Book is Created');
        
        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id){
        $reads = Reading::findOrFail($id);
        $this->reading_id = $id;
        $this->bookTitle = $reads->bookTitle;
        $this->releaseYear = $reads->releaseYear;
        $this->totalPages = $reads->totalPages;
        $this->author = $reads->author;        
        $this->openModal();
       
    }

    public function delete($id)
    {
        Reading::find($id)->delete();
        session()->flash('message', 'Reading is deleted.');
    }
}
