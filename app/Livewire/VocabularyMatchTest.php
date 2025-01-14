<?php

namespace App\Livewire;

use App\Models\MatchingResult;
use App\Models\Vocabulary;
use Livewire\Component;

class VocabularyMatchTest extends Component
{
    public $vocabularies;
    public $userAnswers = [];
    public $selectedWord = null; // Tanlangan so‘z
    public $selectedDefinition = null; // Tanlangan ta'rif
    public $showResults = false;
    public $results = [];
    public $colors = []; // Juftlik uchun ranglar

    public function mount($subject_id)
    {
        $this->vocabularies = Vocabulary::where('subject_id', $subject_id)->get()->shuffle();

        // Har bir juftlik uchun tasodifiy ranglarni yaratish
        foreach ($this->vocabularies as $vocabulary) {
            $this->colors[$vocabulary->id] = $this->generateRandomColor();
        }
    }

    public function selectWord($wordId)
    {
        $this->selectedWord = $wordId;
    }

    public function selectDefinition($definitionId)
    {
        $this->selectedDefinition = $definitionId;

        // Agar so‘z va ta'rif tanlangan bo‘lsa, javobni saqlash
        if ($this->selectedWord !== null) {
            $this->userAnswers[$this->selectedWord] = $definitionId;

            // Reset tanlangan elementlar
            $this->selectedWord = null;
            $this->selectedDefinition = null;
        }
    }

    private function generateRandomColor()
    {
        $colors = ['#FF5733', '#33FF57', '#5733FF', '#F1C40F', '#1ABC9C', '#E74C3C', '#9B59B6', '#34495E'];
        return $colors[array_rand($colors)];
    }

    public function checkAnswers()
    {
        $this->showResults = true;
        foreach ($this->vocabularies as $vocabulary) {
            $isCorrect = $this->userAnswers[$vocabulary->id] === $vocabulary->chr;
            $this->results[$vocabulary->id] = $isCorrect;

            MatchingResult::create([
                'user_id' => auth()->id(),
                'vocabulary_id' => $vocabulary->id,
                'is_correct' => $isCorrect,
            ]);
        }
    }

    public function render()
    {
        return view('livewire.vocabulary-match-test');
    }
}
