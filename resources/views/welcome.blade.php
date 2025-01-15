@extends('layouts.admin')
@section('content')
    @guest
        <div class="row gx-3 align-items-center">
            <div class="col-12 col-lg mb-3"><h3 class="fw-normal mb-0 text-secondary">Welcome</h3></div>

            <div class="col-6 col-sm-4 col-lg-3 col-xl-2 mb-3">
                <div class="card adminuiux-card">
                    <div class="card-body">
                        <p class="text-secondary small mb-2">Users</p>
                        <span class="badge badge-light text-bg-success">
                            <i class="me-1 bi bi-people-fill"></i>{{ $totalUsers }}</span>
                    </div>
                </div>
            </div>

            <div class="col-md-12 mt-3">
                <div class="card">
                    <div class="card-body">
                        <h2 class="mb-4">Users List</h2>
                        <table id="quizResults" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Activity</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if(Carbon\Carbon::parse($user->last_online)->gt(Carbon\Carbon::now()->subMinutes(1)))
                                            <span class="badge bg-success">Online</span>
                                        @else
                                            <p class="badge bg-danger">{{ $user->last_online ? Carbon\Carbon::parse($user->last_online)->diffForHumans() : 'Never' }}</p>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endguest
    @auth
        <div class="row">
            <div class="col-md-12"><h3 class="fw-normal mb-0 text-secondary">Good day,</h3>
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
                        <h2 class="mb-4">You test results</h2>
                        <table id="quizResults" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Test</th>
                                <th>Correct answers</th>
                                <th>Total questions</th>
                                <th>Result</th>
                                <th>Certificate</th>
                                <th>Time</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($results as $result)
                                <tr>
                                    <td>{{ $result->id }}</td>
                                    <td>{{ $result->quiz->name ?? "50 questions" }}</td>
                                    <td>{{ $result->correct_answers }}</td>
                                    <td>{{ $result->total_questions }}</td>
                                    <td>{{ $result->score }} %</td>
                                    <td>
                                        @if($result->score > 50)
                                            <a class="badge bg-success"
                                               href="{{ route('certificate.generate', ['id' => $result->id, 'user_id' => auth()->user()->id, 'name' => auth()->user()->name ?? ""]) }}">
                                                Get Certificate
                                            </a>
                                        @else
                                            <div class="text-center">-</div>
                                        @endif
                                    </td>
                                    <td>{{ $result->created_at }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card my-2">
                    <div class="card-body">
                        <h2 class="mb-4">Your vocabulary results</h2>
                        <table id="matchResults" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>User ID</th>
                                <th>Subject ID</th>
                                <th>User Answers</th>
                                <th>Total Correct</th>
                                <th>Total Incorrect</th>
                                <th>Created At</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($matchingResults as $result)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $result->user_id }}</td>
                                    <td>{{ $result->subject_id }}</td>
                                    <td>
                                        @foreach(json_decode($result->user_answers) as $user_answer)
                                            <span class="badge bg-primary">{{ $user_answer }}</span>
                                        @endforeach
                                    </td>
                                    <td>{{ $result->total_correct }}</td>
                                    <td>{{ $result->total_incorrect }}</td>
                                    <td>{{ $result->created_at }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card my-2">
                    <div class="card-body">
                        <h2 class="mb-4">Your listening results</h2>
                        <table id="vocabularyResults" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Subject</th>
                                <th>User Answers</th>
                                <th>Total Correct</th>
                                <th>Total Incorrect</th>
                                <th>Created At</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($listeningResults as $result)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $result->subject->name ?? "" }}</td>
                                    <td>
                                        @foreach(json_decode($result->user_answers) as $user_answer)
                                            <span class="badge bg-primary">{{ $user_answer }}</span>
                                        @endforeach
                                    </td>
                                    <td>{{ $result->total_correct }}</td>
                                    <td>{{ $result->total_incorrect }}</td>
                                    <td>{{ $result->created_at ?? "" }}</td>
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
        $(document).ready(function () {
            $('#quizResults').DataTable({
                responsive: true
            });
            $("#matchResults").DataTable({
                responsive: true
            });
            $("#vocabularyResults").DataTable({
                responsive: true
            });


            const quizResults = @json($quizResults);

            const labels = quizResults.map(result => result.quiz && result.quiz.name ? result.quiz.name : '50 questions');
            const scores = quizResults.map(result => result.score);

            const ctx = document.getElementById('lineChart').getContext('2d');
            const lineChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Your score',
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
        });

    </script>

@endsection
