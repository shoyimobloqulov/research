<div class="card card-body my-2">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @guest
        <div class="alert alert-info">
            You must be logged in to view Listening.
        </div>
    @endguest

    @auth
        <div class="alert alert-info">
            If you refresh the page, you will have to start the test again.
        </div>

        @if (session()->has('message'))
            <div class="alert alert-success mt-3">
                {{ session('message') }}
            </div>
        @endif

        <div class="m-3">
            {!! $contentWithSelects !!}
        </div>


        <form wire:submit.prevent="submitAnswers">
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>

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
                                <label>
                                    <input type="checkbox" class="form-check-input"
                                           {{ $result['is_correct'] ? 'checked' : '' }} disabled>
                                </label>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <p>Total Correct: <span class="text-success">{{ $totalCorrect }}</span></p>
                <p>Total Incorrect: <span class="text-danger">{{ $totalIncorrect }}</span></p>
            </div>
        @endif
    @endauth
</div>
