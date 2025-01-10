@extends('layouts.admin')
@section('content')
    <div class="container mt-3">
        <div class="row gx-1">
            <div class="col-12 col-sm-12 col-md-12 my-2">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 text-center">
                            <button class="btn btn-link" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseCard" aria-expanded="true" aria-controls="collapseCard">
                                Please review the article and complete the associated activities.
                            </button>
                        </h5>
                    </div>
                    <div id="collapseCard" class="collapse collapse in show">
                        <div class="card-body" aria-expanded="true">
                            <ol>
                                <li><b>Summary Writing:</b> Write a concise summary of the article, highlighting the
                                    main points, methodology, and conclusions.
                                </li>
                                <li><b>Critical Review:</b> Analyse the strengths and weaknesses of the article,
                                    discussing the validity of the research and its relevance.
                                </li>
                                <li><b>Comparison Task:</b> Compare the article with another on a similar topic,
                                    focusing on methods, results, or theoretical frameworks.
                                </li>
                                <li><b>Personal Connection:</b> Reflect on how the article relates to your field of
                                    study or personal experience.
                                </li>
                                <li><b>Role Play:</b> Present the article's findings as though you were the researcher
                                    delivering it to a conference audience.
                                </li>
                            </ol>

                            <h4>The article:</h4>
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th class="w-25">Attribute</th>
                                    <th>Value</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Author</td>
                                    <td>{{ $article['author'] ?? "" }}</td>
                                </tr>
                                <tr>
                                    <td>Year</td>
                                    <td>{{ $article['year'] ?? "" }}</td>
                                </tr>
                                <tr>
                                    <td>Title</td>
                                    <td>{{ $article['title'] ?? "" }}</td>
                                </tr>
                                <tr>
                                    <td>Journal</td>
                                    <td>{{ $article['journal'] ?? "" }}</td>
                                </tr>
                                <tr>
                                    <td>Volume</td>
                                    <td>{{ $article['volume'] ?? "" }}</td>
                                </tr>
                                <tr>
                                    <td>Article ID</td>
                                    <td>{{ $article['article_id'] ?? "" }}</td>
                                </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12">
                <div class="row gx-3">
                    <!-- Mavzu haqida -->
                    <div class="col-6 col-sm-6 col-md-3">
                        <div class="card adminuiux-card mb-3">
                            <div class="card-body z-index-1">
                                <div class="avatar avatar-50 bg-success-subtle text-success rounded mb-2">
                                    <i class="bi bi-info-square"></i>
                                </div>

                                <h5 class="fw-medium mb-0">{{ $id }}-Self study </h5>
                                <a class="text-secondary small" href="{{ route('study.docs',$id) }}">
                                    To view the details of the self study
                                </a>
                            </div>
                        </div>
                    </div>

                    @foreach($study as $index => $s)
                        <div class="col-6 col-sm-6 col-md-3">
                            <div class="card adminuiux-card mb-3">
                                <div class="card-body z-index-1">
                                    <div class="avatar avatar-50 bg-success-subtle text-success rounded mb-2">
                                        @if($index == 0)
                                            <i class="bi bi-info-square"></i>
                                        @elseif($index == 1)
                                            <i class="bi bi-book"></i>
                                        @elseif($index == 2)
                                            <i class="bi bi-camera-video"></i>
                                        @elseif($index == 3)
                                            <i class="bi bi-optical-audio-fill"></i>
                                        @elseif($index == 4)
                                            <i class="bi bi-bookmark-dash"></i>
                                        @else
                                            <i class="bi bi-question-square"></i>
                                        @endif
                                    </div>
                                    <h5 class="fw-medium mb-0">{{ $s->name ?? "" }}</h5>
                                    <a class="text-secondary small" href="{{ route('study.activity', $s->id) }}">
                                        @php
                                            if (preg_match('/^.*?\..*?\./', $s->name, $matches)) {
                                                $result = trim($matches[0]);
                                                echo $result;
                                            } else {
                                                echo "Matn topilmadi.";
                                            }
                                        @endphp
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection
