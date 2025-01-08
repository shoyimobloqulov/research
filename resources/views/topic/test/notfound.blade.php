@extends('layouts.admin')
@section('content')
    <div class="card adminuiux-card height-dynamic position-relative overflow-hidden"
         style="--h-dynamic: calc(100vh - 160px)">
        <div class="card-body text-center">
            <div class="row h-100 justify-content-center align-items-center">
                <div class="col-auto">
                    <div id="current-time" class="mb-3">
                    </div>
                    <h1 class="text-danger">Bu test mavjud emas!</h1>
                    <p class="text-secondary mb-3">Iltimos, keyinroq qayta urinib ko'ring yoki bosh sahifaga qayting.</p>
                    <a href="/" class="btn btn-link">Bosh sahifa <i
                            class="bi bi-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showCurrentTime() {
            const now = new Date();
            const options = { year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit', second: '2-digit' };
            const formattedTime = now.toLocaleDateString('uz-UZ', options);
            document.getElementById('current-time').innerHTML = `<h2 class="text-theme-1">${formattedTime}</h2>`;
        }

        showCurrentTime();
        setInterval(showCurrentTime, 1000);
    </script>

@endsection
