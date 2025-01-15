<?php

namespace App\Livewire;

use App\Models\MatchingResult;
use App\Models\Vocabulary;
use Exception;
use JetBrains\PhpStorm\NoReturn;
use Livewire\Component;

class VocabularyMatchTest extends Component
{
    public object $vocabularies;

    public array $selectedList = [];

    public int|null $select_id = null;
    public bool $showResults = false;
    public array $results = [];
    public ?int $subject_id = null;

    public function mount($subject_id)
    {
        $this->vocabularies = Vocabulary::where('subject_id', $subject_id)
            ->inRandomOrder()
            ->get();

        $this->subject_id = $subject_id;
    }

    public function selectWord(int $voc_id)
    {
        $this->selectedList[$voc_id] = null;
        $this->select_id = $voc_id;
    }

    public function selectAnswer($variant)
    {
        if ($this->select_id) {
            $this->selectedList[$this->select_id] = $variant;
        } else {
            session()->flash('error', "You must choose the first word.");
        }
    }

    /**
     * @throws Exception
     */
    public function checkAnswers()
    {
        $this->showResults = true;

        $totalCorrect = 0;
        $totalIncorrect = 0;

        foreach ($this->vocabularies as $vocabulary) {
            $isCorrect = isset($this->selectedList[$vocabulary->id]) && $this->selectedList[$vocabulary->id] === $vocabulary->chr;

            if ($isCorrect) {
                $totalCorrect++;
            } else {
                $totalIncorrect++;
            }

            $this->results[$vocabulary->id] = $isCorrect;
        }

        if (!$this->subject_id) {
            throw new Exception('subject_id cannot be null');
        }

        MatchingResult::create([
            'user_id' => auth()->id(),
            'subject_id' => $this->subject_id,
            'user_answers' => json_encode($this->selectedList),
            'results' => json_encode($this->results),
            'total_correct' => $totalCorrect,
            'total_incorrect' => $totalIncorrect,
        ]);
    }

    public function render()
    {
        return view('livewire.vocabulary-match-test');
    }
}
