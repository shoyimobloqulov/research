@extends('layouts.admin')
@section('content')
    <div class="position-relative w-100 z-index-0 mb-4 pt-5 bg-theme-1 rounded">
        <div
            class="coverimg h-100 w-100 rounded start-0 top-0 position-absolute overlay-gradiant overflow-hidden opacity-75"
            style="background-image: url({{ asset('bg102.jpg') }});"><img
                src="{{ asset('bg102.jpg') }}" alt="" style="display: none;"></div>
        <br><br>
        <div class="w-100 p-3 bottom-0 position-relative z-index-1">
            <figure class="avatar avatar-100 rounded bg-white p-3 mb-3"><img
                    src="{{ asset('logo.jpg') }}" alt=""
                    class="w-100 d-block"></figure>
            <div class="row text-white">
                <div class="col-12 col-md mb-3 mb-md-0">

                </div>
            </div>
        </div>
    </div>
    <div class="row gx-3">
        <div class="col-12 col-md-12 col-lg-12 col-xxl-12"><h5 class="mb-3">Welcome to Research Hub</h5>
            <p class="small">
                The <i>Research Hub</i> is a comprehensive platform designed to guide researchers through the entire
                research
                process, from conception to completion. Whether you're a student, academic, or professional, our
                platform provides essential resources and tools to help you master research writing, data analysis,
                ethical conduct, and more. <br> <br>
                Our platform offers a wealth of knowledge on the key stages of research, including how to structure and
                write research papers, conduct literature reviews, analyze data, and present findings effectively. We
                provide expert guidance on a range of research methodologies, including qualitative, quantitative, and
                mixed methods, helping you choose the best approach for your study. <br>
                In addition to research methods and writing, <i>Research Hub</i> emphasizes the importance of ethical
                research
                practices, data integrity, and the responsible use of sources to avoid plagiarism. You'll also find
                resources on presenting your research visually, writing clear conclusions, and reporting your results in
                an impactful way. <br> <br>

                You can enhance your research competence through a variety of interactive activities, such as reading
                tasks, answering questions, watching relevant YouTube videos, taking notes, listening exercises,
                matching tasks, and engaging in self-study modules. These activities are designed to help you actively
                apply your knowledge and deepen your understanding of each aspect of the research process. <br><br>
                Designed for researchers at all levels, the <i>Research Hub</i> is a valuable tool for improving the quality of
                your work, enhancing your research skills, and navigating the complexities of academic publishing and
                scientific communication. Join us today to take your research to the next level.

            </p>
        </div>
    </div>
@endsection
