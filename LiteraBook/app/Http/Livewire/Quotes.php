<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Quote;

class Quotes extends Component
{
    public $the_quotes, $bookTitle, $pages, $quote, $quotes_id;

    public $isOpen = 0;

    public function render()
    {
        $this->the_quotes = Quote::all();
        return view('livewire.quotes.quotes');
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
        $this->pages = '';
        $this->quote = '';
        $this->quotes_id = '';
    }

    public function store()
    {
        $validateData = $this->validate([
        'bookTitle' => 'required',
        'pages' => 'required',
        'quote' => 'required',
        ]);

        if ($this->quotes_id) {
            Quote::find($this->quotes_id)->update($validateData);
        } else {            
            Quote::create($validateData);
        }

        session()->flash('message',
        $this->quotes_id ? 'Quote is Updated' : 'Quote is Created');
        
        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id){
        $quotes = Quote::findOrFail($id);
        $this->quotes_id = $id;
        $this->bookTitle = $notes->bookTitle;
        $this->pages = $notes->pages;
        $this->quote = $notes->quote;        
        $this->openModal();
       
    }

    public function delete($id)
    {
        Quote::find($id)->delete();
        session()->flash('message', 'Note is deleted.');
    }
}
