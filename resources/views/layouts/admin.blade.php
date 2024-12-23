<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,viewport-fit=cover">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Research Hub</title>
    <link rel="icon" type="image/png" href="{{ asset('logo.jpg') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Fira+Sans+Condensed:wght@100;400;500;600&amp;family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,400&amp;display=swap"
        rel="stylesheet">
    <style>
        :root {
            --adminuiux-content-font: 'Roboto';
            --adminuiux-content-font-weight: 400;
            --adminuiux-title-font: "Fira Sans Condensed";
            --adminuiux-title-font-weight: 500
        }
        img {
            display: block;
            max-width: 100%;
            height: auto;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script defer="defer" src="{{ asset('assets/js/app69d8.js?803121624e78c5f20718') }}"></script>
    <link href="{{ asset('assets/css/app69d8.css?803121624e78c5f20718') }}" rel="stylesheet">

    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css"/>
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.rtl.min.css"/>
    <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">

</head>
<body
    class="main-bg main-bg-opac main-bg-blur adminuiux-sidebar-fill-white adminuiux-sidebar-boxed theme-blue roundedui"
    data-theme="theme-blue" data-sidebarfill="adminuiux-sidebar-fill-white" data-bs-spy="scroll"
    data-bs-target="#list-example" data-bs-smooth-scroll="true" tabindex="0">
<div class="pageloader">
    <div class="container h-100">
        <div class="row justify-content-center align-items-center text-center h-100">
            <div class="col-12 mb-auto pt-4"></div>
            <div class="col-auto"><img src="{{ asset('logo.jpg') }}" alt="" class="height-60 mb-3">
                <p class="h6 mb-0">Researchs</p>
                <p class="h3 mb-4">Hub</p>
                <div class="loader10 mb-2 mx-auto"></div>
            </div>
            <div class="col-12 mt-auto pb-4">
                <p class="text-secondary">Please wait, we are preparing something amazing preview...</p>
            </div>
        </div>
    </div>
</div>
@include('layouts.navbar')
<div class="adminuiux-wrap">
    @include('layouts.sidebar')
    <main class="adminuiux-content has-sidebar" onclick="contentClick()">
        <div class="container mt-3" id="main-content">
            @yield('content')
        </div>
        <footer class="adminuiux-mobile-footer hide-on-scrolldown style-2">
            <div class="container">
                <ul class="nav nav-pills nav-justified">
                    <!-- Mavzular link -->
                    <li class="nav-item">
                        <a href="{{ route('topics') }}" class="nav-link">
                            <i class="nav-icon bi bi-columns-gap"></i> <span class="nav-text">Topics</span>
                        </a>
                    </li>
                    <!-- Mundarija link -->
                    <li class="nav-item">
                        <a href="{{ route('contact') }}" class="nav-link">
                            <i class="nav-icon bi bi-wallet"></i> <span class="nav-text">Contact details</span>
                        </a>
                    </li>
                    <!-- Biz haqimizda link -->
                    <li class="nav-item">
                        <a href="{{ route('about') }}" class="nav-link">
                            <i class="nav-icon bi bi-file-earmark-person-fill"></i> <span
                                class="nav-text">About</span>
                        </a>
                    </li>
                    <!-- Sozlamalar link -->
                    <li class="nav-item">
                        <a href="{{ route('settings') }}" class="nav-link">
                            <i class="nav-icon" data-feather="settings"></i> <span class="nav-text">Settings</span>
                        </a>
                    </li>
                </ul>
            </div>
        </footer>

    </main>
</div>
<footer class="adminuiux-footer has-adminuiux-sidebar mt-auto">
    <div class="container-fluid">
        <div class="row gx-3">
            <div class="col-12 col-md col-lg text-center text-md-start py-2"><span class="small">&copy;2024, <a
                        href="https://proftech.uz/" target="_blank">researchs.uz</a> ️</span>
            </div>
            <div class="col-12 col-md-auto col-lg-auto align-self-center">
                <ul class="nav small justify-content-center">

                </ul>
            </div>
        </div>
    </div>
</footer>

<script src="{{ asset('assets/js/investment/investment-dashboard.js') }}"></script>

@yield('script')

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function () {
        $("#region_id").change(function () {
            let regionId = this.value;
            let districtSelect = document.getElementById('district_id');

            districtSelect.innerHTML = '<option value="">{{ __('Tumanni tanlang') }}</option>';

            if (regionId) {
                $.ajax({
                    url: "/get-districts",
                    data: {
                        region_id: regionId
                    },
                    success: function (data) {
                        data.forEach(district => {
                            let option = document.createElement('option');
                            option.value = district.id;
                            option.textContent = district.district_name;
                            districtSelect.appendChild(option);
                        });
                    }
                })
            }
        });


        $('.select2').select2({
            theme: 'bootstrap-5'
        });
    });
</script>
</body>
</html>
