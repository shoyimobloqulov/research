<div class="card card-body my-2">
    <div class="m-3">
        {!! $contentWithSelects !!}
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form wire:submit.prevent="submitAnswers">
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>

    @if (session()->has('message'))
        <div class="alert alert-success mt-3">
            {{ session('message') }}
        </div>
    @endif

    @if (!empty($results))
        <div class="mt-2">
            <h3>Results:</h3>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>User Answer</th>
                    <th>Result</th>
                    <th>Select</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($results as $result)
                    <tr class="{{ $result['is_correct'] ? 'table-success' : 'table-danger' }}">
                        <td>{{ $result['user_answer'] }}</td>
                        <td>
                            <span class="{{ $result['is_correct'] ? 'text-success' : 'text-danger' }}">
                                {{ $result['is_correct'] ? 'Correct' : 'Incorrect' }}
                            </span>
                        </td>
                        <td>
                            <input type="checkbox" class="form-check-input"
                                   {{ $result['is_correct'] ? 'checked' : '' }} disabled>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <p>Total Correct: <span class="text-success">{{ $totalCorrect }}</span></p>
            <p>Total Incorrect: <span class="text-danger">{{ $totalIncorrect }}</span></p>
        </div>
    @endif
</div>
