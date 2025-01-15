<div class="container">
    @guest
        <div class="alert alert-info">
            You must be logged in to view Vocabulary.
        </div>
    @endguest

    @auth
        <div class="alert alert-info">
            If you refresh the page, you will have to start the test again.
        </div>

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <h2>Vocabulary Matching Test</h2>
        <div class="row">
            <div class="col-md-6 my-2">
                <h4>Words</h4>
                <ul class="list-group">
                    @foreach($vocabularies as $vocabulary)
                        <li
                            class="list-group-item d-flex gap-2"
                            wire:click="selectWord({{ $vocabulary->id }})"
                            style="cursor: pointer;
                                background-color: {{ array_key_exists($vocabulary->id,$selectedList) ? '#28a745' : '' }};
                                border: {{ array_key_exists($vocabulary->id,$selectedList)  ? '2px solid #28a745' : '' }};
                                color:  {{ array_key_exists($vocabulary->id,$selectedList)  ? '#ffffff' : '' }};
                                margin-top: 5px;"
                        >
                            @if(!empty($selectedList) && isset($selectedList[$vocabulary->id]))
                                <b class=" d-flex align-items-center justify-content-center text-uppercase badge bg-primary p-1 rounded-pill"
                                   style="width: 28px; height: 24px;">
                                    {{ $selectedList[$vocabulary->id] ?? ""}}
                                </b>
                            @endif
                            <div class="d-flex justify-content-center w-100">
                                {{ $vocabulary->word }}
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="col-md-6 my-2">
                <h4>Answers</h4>
                <ul class="list-group">
                    @foreach($vocabularies as $vocabulary)
                        <li
                            class="list-group-item text-center"
                            wire:click="selectAnswer('{{ substr($vocabulary->definition, 0, 1) }}')"
                            style="cursor: pointer;
                                background-color: {{ in_array(substr($vocabulary->definition, 0, 1),$selectedList) ? '#28a745' : '' }};
                                border: {{ in_array(substr($vocabulary->definition, 0, 1),$selectedList) ? '2px solid #28a745' : '' }};
                                color:  {{ in_array(substr($vocabulary->definition, 0, 1),$selectedList)  ? '#ffffff' : '' }};
                                margin-top: 4px"
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
            <div class="my-2">
                <h3>Results</h3>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Word</th>
                        <th>Your Answer</th>
                        <th>Result</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($vocabularies as $vocabulary)
                        <tr>
                            <td>{{ $vocabulary->word }}</td>
                            <td>{{ $selectedList[$vocabulary->id] ?? 'N/A' }}</td>
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
            </div>
        @endif
    @endauth
</div>
