<?php

namespace App\Livewire;

use App\Models\Listening;
use App\Models\ListeningResult;
use Livewire\Component;
use Livewire\Attributes\Validate;

class FillInTheBlanks extends Component
{
    public $listening;
    #[Validate('required|array')]
    public $userAnswers = [];
    public $results = [];
    public $totalCorrect = 0;
    public $totalIncorrect = 0;

    public function mount($listeningId)
    {
        $this->listening = Listening::with('correctAnswers')->findOrFail($listeningId);

        preg_match_all('/\$\$\$/', $this->listening->content, $matches);
        $this->userAnswers = array_fill(0, count($matches[0]), '');
    }



    public function submitAnswers()
    {
        $this->validate([
            'userAnswers' => ['required', 'array', function ($attribute, $value, $fail) {
                foreach ($value as $key => $answer) {
                    if (trim($answer) === '') {
                        $fail("Answer {$key} is required. Please fill in all the blanks.");
                    }
                }
            }],
        ]);

        $this->results = [];
        $this->totalCorrect = 0;
        $this->totalIncorrect = 0;

        foreach ($this->listening->correctAnswers as $index => $correctAnswer) {
            $userAnswer = $this->userAnswers[$index] ?? '';
            $isCorrect = strtolower(trim($userAnswer)) === strtolower(trim($correctAnswer->answer));

            $this->results[] = [
                'user_answer' => $userAnswer,
                'correct_answer' => $correctAnswer->answer,
                'is_correct' => $isCorrect,
            ];

            if ($isCorrect) {
                $this->totalCorrect++;
            } else {
                $this->totalIncorrect++;
            }
        }

        ListeningResult::create([
            'listening_id' => $this->listening->id,
            'user_answers' => json_encode($this->userAnswers),
            'results' => json_encode($this->results),
            'user_id'   => auth()->id(),
            'total_correct' => $this->totalCorrect,
            'total_incorrect' => $this->totalIncorrect,
        ]);

        session()->flash('message', 'Your answers have been submitted successfully!');
    }

    public function render()
    {
        return view('livewire.fill-in-the-blanks', [
            'contentWithSelects' => $this->generateContentWithSelects(),
        ]);
    }

    private function generateContentWithSelects()
    {
        $content = $this->listening->content;
        $correctAnswers = $this->listening->correctAnswers->pluck('answer')->toArray();

        preg_match_all('/\$\$\$/', $content, $matches);
        foreach ($matches[0] as $index => $match) {
            $selectHtml = view('components.select', [
                'options' => $correctAnswers,
                'answerKey' => $index,
            ])->render();

            $content = preg_replace('/\$\$\$/', $selectHtml, $content, 1);
        }

        return $content;
    }
}
