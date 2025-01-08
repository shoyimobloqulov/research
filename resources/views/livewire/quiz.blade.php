<div class="bg bg-white p-3 rounded-2">
    @if (session('result'))
        <div class="card my-2">
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-4 col-lg-3 text-center mb-4">
                        <div class="position-relative d-inline-block mx-auto">
                            <div id="halfcircleprogress" style="position: relative;">
                                <svg viewBox="0 0 100 50" class="w-100">
                                    <!-- Background Circle -->
                                    <path
                                        d="M 50,50 m -47,0 a 47,47 0 1 1 94,0"
                                        stroke="#DDDDDD"
                                        stroke-width="4"
                                        fill-opacity="0">
                                    </path>
                                    <!-- Progress Circle -->
                                    <path
                                        d="M 50,50 m -47,0 a 47,47 0 1 1 94,0"
                                        stroke="rgb(78,175,79)"
                                        stroke-width="6"
                                        fill-opacity="0"
                                        style="stroke-dasharray: 147.708, 147.708; stroke-dashoffset: {{ 147.708 - (147.708 * session('result.correct') / session('result.total')) }};">
                                    </path>
                                </svg>
                                <!-- Score Text -->
                                <div class="progressbar-text text-bold"
                                     style="position: absolute; left: 50%; bottom: 0; transform: translate(-50%, 50%); color: rgb(78,175,79); font-size: 2rem;">
                                    {{ round((session('result.correct') / session('result.total')) * 100) }}%
                                </div>
                            </div>
                        </div>
                        <!-- Quiz Info -->
                        <div class="my-2">
                            <h6 class="fw-bold"><br>
                                <span class="my-2">Test Results</span></h6>
                            <p class="text-muted m-0">Correct answers: {{ session('result.correct') }}
                                / {{ session('result.total') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="mb-3 card">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        @foreach ($questions as $index => $question)
                            <button
                                class="btn {{ $index == $currentQuestionIndex ? 'btn-primary' : ($userAnswers[$question['id']] ? 'btn-success' : 'btn-secondary') }}"
                                wire:click="$set('currentQuestionIndex', {{ $index }})">
                                {{ $index + 1 }}
                            </button>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        @if ($currentQuestion)
            <div>
                <h4>{{ $currentQuestion['question'] }}</h4>
                <ul class="list-group">
                    @foreach ($currentQuestion['answers'] as $answer)
                        <li class="list-group-item">
                            <input
                                type="radio"
                                id="answer_{{ $answer['id'] }}"
                                name="question_{{ $currentQuestion['id'] }}"
                                value="{{ $answer['id'] }}"
                                wire:click="selectAnswer({{ $currentQuestion['id'] }}, {{ $answer['id'] }})"
                                {{ $userAnswers[$currentQuestion['id']] == $answer['id'] ? 'checked' : '' }}>
                            <label for="answer_{{ $answer['id'] }}">{{ $answer['text'] }}</label>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="d-flex justify-content-between mt-3">
                <button class="btn btn-primary"
                        wire:click="previousQuestion" {{ $currentQuestionIndex == 0 ? 'disabled' : '' }}>
                    Previous
                </button>
                <button class="btn btn-primary"
                        wire:click="nextQuestion" {{ $currentQuestionIndex == count($questions) - 1 ? 'disabled' : '' }}>
                    Next
                </button>
            </div>

            @if ($currentQuestionIndex == count($questions) - 1)
                <div class="mt-3 text-center">
                    <button class="btn btn-success" wire:click="submitQuiz">Close the Test</button>
                </div>
            @endif
        @endif
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif


</div>
