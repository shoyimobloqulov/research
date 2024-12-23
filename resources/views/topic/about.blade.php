@extends('layouts.admin')
@section('content')
    <div class="card adminuiux-card mb-3">
        <div class="card-body pb-0 my-2">
            <div class="row">
                <div class="col-md-12">
                    <div id="content"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- mammoth.js library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mammoth/1.4.2/mammoth.browser.min.js"></script>

    <script>
        const filePath = "{{ $filename }}";

        fetch(filePath)
            .then(response => response.arrayBuffer())
            .then(arrayBuffer => {
                mammoth.convertToHtml({ arrayBuffer: arrayBuffer })
                    .then(function (result) {
                        document.getElementById('content').innerHTML = result.value;
                    })
                    .catch(function (err) {
                        console.error("Error converting Word file: ", err);
                    });
            })
            .catch(error => {
                console.error("Error fetching the file: ", error);
            });
    </script>

@endsection
