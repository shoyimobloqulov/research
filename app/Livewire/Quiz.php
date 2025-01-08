<?php

namespace App\Livewire;

use App\Models\QuizResult;
use App\Models\Test;
use Livewire\Component;

class Quiz extends Component
{
    public array $questions = [];
    public array $userAnswers = [];
    public int $quizId;
    public int $currentQuestionIndex = 0;

    public function mount($quizId)
    {
        $this->quizId = $quizId;

        $this->questions = Test::with('answers')
            ->where('subject_id', $quizId)
            ->inRandomOrder()
            ->get()
            ->toArray();

        foreach ($this->questions as $question) {
            $this->userAnswers[$question['id']] = null;
        }
    }

    public function selectAnswer($questionId, $answerId)
    {
        $this->userAnswers[$questionId] = $answerId;
    }

    public function nextQuestion()
    {
        if ($this->currentQuestionIndex < count($this->questions) - 1) {
            $this->currentQuestionIndex++;
        }
    }

    public function previousQuestion()
    {
        if ($this->currentQuestionIndex > 0) {
            $this->currentQuestionIndex--;
        }
    }

    public function submitQuiz()
    {
        if (in_array(null, $this->userAnswers, true)) {
            session()->flash('error', 'Iltimos, barcha savollarga javob bering.');
            return;
        }

        $correctAnswers = 0;

        foreach ($this->questions as $question) {
            $correctOption = collect($question['answers'])->firstWhere('is_correct', '1');
            if ($this->userAnswers[$question['id']] == $correctOption['id']) {
                $correctAnswers++;
            }
        }

        QuizResult::create([
            'user_id' => auth()->id(),
            'quiz_id' => $this->quizId,
            'correct_answers' => $correctAnswers,
            'total_questions' => count($this->questions),
            'score' => round(($correctAnswers / count($this->questions)) * 100, 2),
        ]);

        session()->flash('result', [
            'correct' => $correctAnswers,
            'total' => count($this->questions),
        ]);

        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.quiz', [
            'currentQuestion' => $this->questions[$this->currentQuestionIndex] ?? null,
        ]);
    }
}
