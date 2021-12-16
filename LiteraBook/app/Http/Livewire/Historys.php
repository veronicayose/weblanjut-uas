<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Reading;

class Historys extends Component
{
    public $the_history, $bookTitle, $releaseYear, $totalPages, $author, $updated_at, $reading_id;
    
    public function render()
    {
        $this->the_history = Reading::all();
        return view('livewire.history.historys');
    }
}
