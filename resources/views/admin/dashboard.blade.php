@extends('layouts.user_type.auth')

@section('content')

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <title>Dashboard CCTV</title>
        <script></script>

        <link rel="stylesheet" href="{{ asset('assets/css/weather-card.css') }}"
    </head>

    <header class="header">
        <h4 style="text-align: left; margin-left: 20px;">Selamat Datang, Admin</h4>
        <p style="text-align: left; margin-left: 20px; margin-bottom: -15px;">Semoga kebaikan selalu menyertaimu</p>
    </header>

    <div class="container">
        <div class="dashboard-container">
            <!-- Left side for weather -->
            <div class="weather-card">
                <img class="image-card" style="width: 100%;" src="{{ asset('images/people.svg') }}" alt="">
            
                <div class="weather-info d-flex" id="weatherInfo">
                    <h2 class="mb-0 font-weight-normal" id="temperature">
                        <i id="weatherIcon" class="mdi" style="font-size: 30px;"></i>
                        <span id="tempValue"></span>
                    </h2>
                </div>
            
                <!-- Weather details to the right of weather-info -->
                <div class="weather-details ml-3">
                    <h4 class="location font-weight-normal" id="location">Loading...</h4>
                    <h5 class="country font-weight-normal" id="country">Indonesia</h5>
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
                                <h3 style="color: white;">Panorama</h3>
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
                                <h3 style="color: white;">Sekolah</h3>
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const apiKey = '66db882578a46f03c27c30a952240556';
            const lat = -7.797068;
            const lon = 110.370529;

            const iconMap = {
                '01d': 'mdi-weather-sunny',
                '01n': 'mdi-weather-night',
                '02d': 'mdi-weather-partlycloudy',
                '02n': 'mdi-weather-night',
                '03d': 'mdi-weather-cloudy',
                '03n': 'mdi-weather-cloudy',
                '04d': 'mdi-weather-cloudy',
                '04n': 'mdi-weather-cloudy',
                '09d': 'mdi-weather-pouring',
                '09n': 'mdi-weather-pouring',
                '10d': 'mdi-weather-rainy',
                '10n': 'mdi-weather-rainy',
                '11d': 'mdi-weather-lightning',
                '11n': 'mdi-weather-lightning',
                '13d': 'mdi-weather-snowy',
                '13n': 'mdi-weather-snowy',
                '50d': 'mdi-weather-fog',
                '50n': 'mdi-weather-fog',
            };

            fetch(
                    `https://api.openweathermap.org/data/2.5/weather?lat=${lat}&lon=${lon}&units=metric&appid=${apiKey}`)
                .then(response => response.json())
                .then(data => {
                    const temperature = Math.round(data.main.temp);
                    const location = data.name;
                    const iconCode = data.weather[0].icon;
                    const mdiClass = iconMap[iconCode] || 'mdi-weather-cloudy';

                    document.getElementById('weatherIcon').className = 'mdi mr-2 ' + mdiClass;
                    document.getElementById('tempValue').innerHTML = `${temperature}<sup>°C</sup>`;
                    document.getElementById('location').textContent = location;
                    document.getElementById('country').textContent = 'Indonesia';
                })
                .catch(error => {
                    console.error('Error fetching weather data:', error);
                });
        });
    </script>
@endsection
