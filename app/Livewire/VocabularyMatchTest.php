<?php

namespace App\Livewire;

use App\Models\MatchingResult;
use App\Models\Vocabulary;
use Livewire\Component;

class VocabularyMatchTest extends Component
{
    public $vocabularies;
    public array $userAnswers = [];
    public array $selectedWords = [];
    public array $selectedDefinitions = [];
    public bool $showResults = false;
    public array $results = [];

    public function mount($subject_id)
    {
        $this->vocabularies = Vocabulary::where('subject_id', $subject_id)->get();
    }

    public function selectWord($word_id)
    {
        if (in_array($word_id, $this->selectedWords)) {
            $this->selectedWords = array_diff($this->selectedWords, [$word_id]);
        } else {
            $this->selectedWords[] = $word_id;
        }
    }

    public function selectDefinition($definition, $word_id)
    {
        if (in_array($definition, $this->selectedDefinitions)) {
            $this->selectedDefinitions = array_diff($this->selectedDefinitions, [$definition]);
            unset($this->userAnswers[$word_id]);
        } else {
            $this->selectedDefinitions[] = $definition;
            $this->userAnswers[$word_id] = $definition;
        }
    }

    public function checkAnswers()
    {
        $this->showResults = true;
        foreach ($this->vocabularies as $vocabulary) {
            $isCorrect = isset($this->userAnswers[$vocabulary->id]) && $this->userAnswers[$vocabulary->id] === $vocabulary->chr;
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
