@extends('layouts.admin')
@section('content')
    @auth
        <div class="row">
            <div class="col-md-12"><h3 class="fw-normal mb-0 text-secondary">Hayrli kun,</h3>
                <h1>{{ auth()->user()->name }}</h1></div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <canvas id="lineChart" height="50"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-md-12 mt-3">
                <div class="card">
                    <div class="card-body">
                        <h2 class="mb-4">Test natijalari</h2>
                        <table id="quizResults" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Test</th>
                                <th>To'g'ri javoblar</th>
                                <th>Jami savollar</th>
                                <th>Natija</th>
                                <th>Vaqt</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($results as $result)
                                <tr>
                                    <td>{{ $result->id }}</td>
                                    <td>{{ $result->quiz->name ?? "" }}</td>
                                    <td>{{ $result->correct_answers }}</td>
                                    <td>{{ $result->total_questions }}</td>
                                    <td>{{ $result->score }} %</td>
                                    <td>{{ $result->created_at }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endauth
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <script>
        $('#quizResults').DataTable();

        const quizResults = @json($quizResults);

        const labels = quizResults.map(result => result.quiz.name);

        const scores = quizResults.map(result => result.score);

        var ctx = document.getElementById('lineChart').getContext('2d');
        var lineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Sizning ballingiz',
                    data: scores,
                    borderColor: 'rgba(54, 162, 235, 1)',
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    fill: false,
                    borderWidth: 2
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100,
                    }
                },
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        enabled: true
                    }
                }
            }
        });
    </script>

@endsection
