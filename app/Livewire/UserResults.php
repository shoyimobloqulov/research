<?php

namespace App\Livewire;

use App\Models\QuizResult;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserResults extends Component
{
    public function render()
    {
        $results = QuizResult::where('user_id', Auth::id())->latest()->get();
        return view('livewire.user-results', ['results' => $results]);
    }
}
