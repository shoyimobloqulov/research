<div class="container">
    <h2>Vocabulary Matching Test</h2>
    {{ json_encode($userAnswers) }}
    {{ json_encode($selectedDefinitions) }}

    <div class="row">
        <div class="col-md-6">
            <h4>Words</h4>
            <ul class="list-group">
                @foreach($vocabularies as $vocabulary)
                    <li
                        class="list-group-item text-center"
                        wire:click="selectWord({{ $vocabulary->id }})"
                        style="cursor: pointer;
                            background-color: {{ in_array($vocabulary->id, $selectedWords) ? '#D6EAF8' : '' }};
                            border: {{ in_array($vocabulary->id, $selectedWords) ? '2px solid #28a745' : '' }};"
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
                        wire:click="selectDefinition('{{  substr($vocabulary->definition,0,1)  }}', {{ $vocabulary->id }})"
                        style="cursor: pointer;
                            background-color: {{ in_array(substr($vocabulary->definition,0,1), $selectedDefinitions) ? '#D6EAF8' : '' }};
                            border: {{ in_array(substr($vocabulary->definition,0,1), $selectedDefinitions) ? '2px solid #28a745' : '' }};"
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
                    <td>{{ isset($userAnswers[$vocabulary->id]) ? $userAnswers[$vocabulary->id] : 'N/A' }}</td>
                    <td>{{ $vocabulary->chr }}</td>
                    <td>
                        @if(isset($results[$vocabulary->id]) && $results[$vocabulary->id])
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
