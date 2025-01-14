<div class="container">
    <h2>Vocabulary Matching Test</h2>
    <div class="row">
        <div class="col-md-6">
            <h4>Words</h4>
            <ul class="list-group">
                @foreach($vocabularies as $vocabulary)
                    <li
                        class="list-group-item text-center"
                        wire:click="selectWord({{ $vocabulary->id }})"
                        style="cursor: pointer; background-color: {{ isset($userAnswers[$vocabulary->id]) ? $colors[$vocabulary->id] : ($selectedWord === $vocabulary->id ? '#D6EAF8' : '') }};"
                    >
                        {{ $vocabulary->word }}
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="col-md-6">
            <h4>Definitions</h4>
            <ul class="list-group">
                @foreach($vocabularies as $vocabulary)
                    <li
                        class="list-group-item text-center"
                        wire:click="selectDefinition('{{ $vocabulary->chr }}')"
                        style="cursor: pointer; background-color: {{ in_array($vocabulary->chr, $userAnswers) ? $colors[$vocabulary->id] : ($selectedDefinition === $vocabulary->chr ? '#D6EAF8' : '') }};"
                    >
                        {{ $vocabulary->definition }}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <button
        class="btn btn-success mt-3"
        wire:click="checkAnswers"
    >
        Submit
    </button>

    @if($showResults)
        <h3>Results</h3>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Word</th>
                <th>Your Answer</th>
                <th>Correct Answer</th>
                <th>Result</th>
            </tr>
            </thead>
            <tbody>
            @foreach($vocabularies as $vocabulary)
                <tr>
                    <td>{{ $vocabulary->word }}</td>
                    <td>{{ $userAnswers[$vocabulary->id] ?? 'N/A' }}</td>
                    <td>{{ $vocabulary->chr }}</td>
                    <td>
                        @if($results[$vocabulary->id] ?? false)
                            <span class="text-success">Correct</span>
                        @else
                            <span class="text-danger">Incorrect</span>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
</div>
