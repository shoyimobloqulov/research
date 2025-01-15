@extends('layouts.admin')
@section('content')
    <style>
        .avatar.avatar-200 {
            height: 200px;
            line-height: 90px;
            width: 200px;
        }
    </style>
    <div class="position-relative w-100 z-index-0 mb-4 pt-5 bg-theme-1 rounded">
        <div
            class="coverimg h-100 w-100 rounded start-0 top-0 position-absolute overlay-gradiant overflow-hidden opacity-50"
            style="background-image: url({{ asset('samdchti1.jpg') }});"><img
                src="{{ asset('samdchti1.jpg') }}" alt="" style="display: none;"></div>
        <br><br> <br><br> <br><br>
        <div class="w-100 p-3 bottom-0 position-relative z-index-1">
            <figure class="avatar avatar-200 rounded bg-white p-4 mb-3 overlay-gradiant opacity-100">
                <img src="{{ asset('user.png') }}" alt="user image not found" class="w-100 d-block">
            </figure>
            <div class="row text-white">
                <div class="col-12 col-md mb-3 mb-md-0">
                    <h4>
                        <span class="fw-normal">Welcome to </span>Researchs Hub
                    </h4>
                    <p class="mb-2">Aziza Musoyeva - Associate professor, Ph.D.</p>
                    <p class="small">Samarkand State Institute of Foreign Languages
                        Bustonsaroy street 93, Samarkand city, 140104, Uzbekistan
                    </p></div>
                <div class="col-12 col-md-auto text-md-end">
                    <p class="opacity-75 small">Social networks</p>
                    <div>
                        <a href="https://sites.google.com/view/aziza-musoevas-portfolio/home"
                           class="btn btn-square btn-theme align-middle"><i class="bi bi-link"></i></a>
                        <a href="mailto:musoyeva@samdchti.uz" class="btn btn-square btn-theme align-middle"><i
                                class="bi bi-mailbox-flag"></i> </a>
                        <a href="https://linkedin.com/in/aziza-musoeva-083ab619a"
                           class="btn btn-square btn-theme align-middle"><i class="bi bi-linkedin"></i> </a>
                        <a class="btn btn-theme mx-2" href="tel:+998976861315">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-phone">
                                <path
                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                            </svg>
                            <span></span></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-100 p-3 bottom-0 position-relative z-index-1">
            <div class="card">
                <div class="card-body">
                    <h4>Scholarships:</h4>

                    <div class="">
                        <label>1. NILE project, INTO Glasgow Caledonian University (Scotland)</label><br>
                        <label>2. MA, London Metropolitan University (UK) – (EYUF)</label><br>
                        <label>3. Erasmus Alumni in University of Cadiz, Spain</label><br>
                        <label>4. FEP Alumni – University of Wisconsin Eau Claire (USA)</label><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
