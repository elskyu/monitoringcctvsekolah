@extends('layouts.user_type.auth')

@section('content')

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <title>Dashboard CCTV</title>
        <script>

        </script>

        <style>
            body {
                font-family: 'Open Sans', sans-serif;
            }

            .container {
                width: 100%;
                height: 450px;
                padding: 20px;
            }

            .header {
                text-align: center;
                margin-bottom: 40px;
            }

            .header p {
                font-size: 1.2rem;
                color: #555;
            }

            .dashboard-container {
                display: flex;
                justify-content: space-between;
                gap: 20px;
            }

            /* Left side for weather card */
            .weather-card {
                flex: 1;
                background-color: #fff;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
                text-align: center;
                height: 340px;
            }

            .weather-card h3 {
                font-size: 1.6rem;
                color: #333;
                margin-bottom: 10px;
            }

            .weather-card .temperature {
                font-size: 2rem;
                font-weight: bold;
                color: #f39c12;
            }

            .weather-card .status {
                font-size: 1.2rem;
                color: #888;
            }

            .weather-card img {
                max-width: 100%;
                border-radius: 5px;
            }

            /* Right side for cards */
            .card-container {
                display: flex;
                flex-direction: column;
                gap: 20px;
                flex: 2;
            }

            .card-row {
                display: flex;
                gap: 20px;
                margin-bottom: 20px;
            }

            .card {
                background-color: #fff;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
                flex: 1;
                text-align: center;
                height: 150px;
            }

            .card h3 {
                font-size: 1.6rem;
                color: #555;
                margin-bottom: 10px;
                text-align: left;
            }

            .card p {
                font-size: 1.2rem;
                color: black;
                text-align: left;
            }

            .card .temperature {
                font-size: 2rem;
                font-weight: bold;
                color: #f39c12;
            }

            .card .status {
                font-size: 1.2rem;
                color: #2ecc71;
            }

            .card .info {
                font-size: 1rem;
                color: #2980b9;
            }

            .card-content {
                display: flex;
                /* Gunakan Flexbox untuk membagi kolom */
                justify-content: space-between;
                /* Memastikan kolom kiri dan kanan berada pada posisi yang sesuai */
                align-items: center;
                /* Menjaga elemen tetap sejajar vertikal */
            }

            .left-column {
                display: flex;
                flex-direction: column;
                /* Menyusun h3 dan p secara vertikal */
            }

            .right-column {
                display: flex;
                align-items: center;
                /* Menyusun ikon secara vertikal agar sejajar dengan teks */
            }

            .icon-card {
                width: 100px;
                font-size: 35pt;
                color: white;
                margin-left: 10px;
            }
        </style>
    </head>

    <header class="header">
        <h4 style="text-align: left; margin-left: 20px;">Selamat Datang, Admin</h4>
        <p style="text-align: left; margin-left: 20px; margin-bottom: -15px;">Semoga kebaikan selalu menyertaimu</p>
    </header>

    <div class="container">
        <div class="dashboard-container">
            <!-- Left side for weather -->
            <div class="weather-card">
                <img class="image-card" style="wid" src="{{ asset('images/people.svg') }}" alt="">

                <div class="weather-info" id="weatherInfo">

                    <div class="d-flex">
                        <div>
                            <h2 class="mb-0 font-weight-normal" id="temperature">
                                <i id="weatherIcon" class="mdi" style="font-size: 30px;"></i>
                                <span id="tempValue"></span>
                            </h2>

                        </div>
                        <div class="ml-2" style="margin-top: 10px;">
                            <h4 class="location font-weight-normal" id="location">Loading...</h4>
                            <h6 class="font-weight-normal" id="country">Indonesia</h6>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right side for the other cards -->
            <div class="card-container">
                <!-- Top row for Users and CCTV Panorama -->
                <div class="card-row">

                    <div class="card" style="background-color:rgb(223, 94, 55);">
                        <div class="card-content">
                            <div class="left-column">
                                <h3 style="color: white;">Users</h3>
                                <p style="color: white; font-size: 24pt;" class="fs-30 mb-2">{{ $userCount }}</p>
                            </div>
                            <div class="right-column">
                                <i class="fas fa-users icon-card"></i>
                            </div>
                        </div>
                    </div>

                    <div class="card" style="background-color:rgb(36, 222, 114);">
                        <div class="card-content">
                            <div class="left-column">
                                <h3 style="color: white;">CCTV Panorama</h3>
                                <p style="color: white; font-size: 24pt;" class="fs-30 mb-2">{{ $panoramaCount }}</p>
                            </div>
                            <div class="right-column">
                                <i class="fas fa-mountain icon-card"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Bottom row for CCTV Sekolah and Belum Digunakan -->
                <div class="card-row">
                    <div class="card" style="background-color:rgb(58, 160, 228);">
                        <div class="card-content">
                            <div class="left-column">
                                <h3 style="color: white;">CCTV Sekolah</h3>
                                <p style="color: white; font-size: 24pt;" class="fs-30 mb-2">{{ $sekolahCount }}</p>
                            </div>
                            <div class="right-column">
                                <i class="fas fa-school icon-card"></i>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <h3>Belum Digunakan</h3>
                        <p>0</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- Script tambahan cuaca -->
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.1/dist/js.cookie.min.js"></script>
    <script src="{{ asset('js/weather.js') }}"></script>
@endpush