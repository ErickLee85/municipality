<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class Testing extends Component
{

    public $selectValue = "";

    public function render()
    {
        $apiData = Http::get('https://the-trivia-api.com/api/questions?categories=science,general_knowledge&limit=2&difficulty=hard');
        $objectsArray = json_decode($apiData);
        return view('livewire.testing' ,[
            'scienceQuestions' => $objectsArray
        ]);
    }
}
