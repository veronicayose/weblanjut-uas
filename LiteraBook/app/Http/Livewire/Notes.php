<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Note;

class Notes extends Component
{
    public $the_notes, $bookTitle, $title, $pages, $note, $notes_id;

    public $isOpen = 0;

    public function render()
    {
        $this->the_notes = Note::all();
        return view('livewire.notes.notes');
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
        $this->title = '';
        $this->pages = '';
        $this->note = '';
        $this->notes_id = '';
    }

    public function store()
    {
        $validateData = $this->validate([
        'title' => 'required',
        'bookTitle' => 'required',
        'pages' => 'required',
        'note' => 'required',
        ]);

        if ($this->notes_id) {
            Note::find($this->notes_id)->update($validateData);
        } else {            
            Note::create($validateData);
        }

        session()->flash('message',
        $this->notes_id ? 'Note is Updated' : 'Note is Created');
        
        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id){
        $notes = Note::findOrFail($id);
        $this->notes_id = $id;
        $this->bookTitle = $notes->bookTitle;
        $this->title = $notes->title;
        $this->pages = $notes->pages;
        $this->note = $notes->note;        
        $this->openModal();
       
    }

    public function delete($id)
    {
        Note::find($id)->delete();
        session()->flash('message', 'Note is deleted.');
    }
}
