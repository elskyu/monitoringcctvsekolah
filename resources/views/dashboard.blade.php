@extends('layouts.user_type.auth')

@section('content')

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard CCTV</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
                background-color: #f7f7f7;
            }

            .container {
                width: 100%;
                padding: 20px;
            }

            .header {
                text-align: center;
                margin-bottom: 40px;
            }

            .header h1 {
                font-size: 2.5rem;
                color: #333;
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
                /* Adjust this value to match the desired height */
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
            }

            .card h3 {
                font-size: 1.6rem;
                color: #333;
                margin-bottom: 10px;
            }

            .card p {
                font-size: 1.2rem;
                color: #888;
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
        </style>
    </head>

    <header class="header">
        <h2>Selamat Pagi, Admin</h2>
        <p>Awali hari dengan secangkir kopi dan senyuman!</p>
    </header>

    <div class="container">
        <div class="dashboard-container">
            <!-- Left side for weather -->
            <div class="weather-card">
                <h3>Cuaca</h3>
                <p class="temperature">35°C</p>
                <p class="status">Yogyakarta, Indonesia</p>
                <img src="https://via.placeholder.com/150" alt="Weather Icon">
            </div>

            <!-- Right side for the other cards -->
            <div class="card-container">
                <!-- Top row for Users and CCTV Panorama -->
                <div class="card-row">
                    <div class="card">
                        <h3>Users</h3>
                        <p class="temperature">3</p>
                        <p class="status">Tidak ada perubahan hari ini</p>
                    </div>

                    <div class="card">
                        <h3>CCTV Panorama</h3>
                        <p class="temperature">3</p>
                        <p class="status">Tidak ada perubahan hari ini</p>
                    </div>
                </div>

                <!-- Bottom row for CCTV Sekolah and Belum Digunakan -->
                <div class="card-row">
                    <div class="card">
                        <h3>CCTV Sekolah</h3>
                        <p class="temperature">15</p>
                        <p class="status">Tidak ada perubahan hari ini</p>
                    </div>

                    <div class="card">
                        <h3>Belum Digunakan</h3>
                        <p class="temperature">0</p>
                        <p class="info">0.22% (30 days)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection