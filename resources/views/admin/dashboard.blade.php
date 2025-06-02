@extends('layouts.user_type.auth')

@section('content')

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

        <title>Dashboard CCTV</title>
        <script></script>
        <link rel="stylesheet" href="{{ asset('assets/css/weather-card.css') }}" </head>

        <header class="header">
            <h4 style="text-align: left; margin-left: 20px;">Selamat Datang, Admin</h4>
            <p style="text-align: left; margin-left: 20px; margin-bottom: -15px;">Semoga kebaikan selalu menyertaimu</p>
        </header>

        <div class="container">
            <div class="dashboard-container">
                <!-- Left side for weather -->
                <div class="weather-card">
                    <img class="image-card" src="{{ asset('images/people.svg') }}" alt="">

                    <div class="weather-info d-flex" id="weatherInfo" style="margin-top: 10px;">
                        <!-- Column for location and country on the left -->
                        <div class="weather-details">
                            <h4 class="location font-weight-normal" id="location">Loading...</h4>
                            <h5 class="country font-weight-normal" id="country">Indonesia</h5>
                        </div>

                        <!-- Temperature and weather icon on the right -->
                        <div class="temperature-info d-flex justify-content-end" style="margin-left: 125px;">
                            <h2 class="mb-0 font-weight-normal" id="temperature">
                                <i id="weatherIcon" class="mdi" style="font-size: 30px;"></i>
                                <span id="tempValue"></span>
                            </h2>
                        </div>
                    </div>
                </div>

                <!-- Right side for the other cards -->
                <div class="card-container">
                    <!-- Top row for Users and CCTV Panorama -->
                    <div class="card-row">

                        <div class="card" style="background-color:#7da0fa">
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

                        <div class="card" style="background-color: rgba(71,71,161,255);">
                            <div class="card-content">
                                <div class="left-column">
                                    <h3 style="color: white;">Panorama</h3>
                                    <p style="color: white; font-size: 24pt;" class="fs-30 mb-2">{{ $panoramaCount }}</p>
                                </div>
                                <div class="right-column">
                                    <i class="fas fa-earth-americas icon-card"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Bottom row for CCTV Sekolah and Belum Digunakan -->
                    <div class="card-row">
                        <div class="card" style="background-color:#7978e9">
                            <div class="card-content">
                                <div class="left-column">
                                    <h3 style="color: white;">Sekolah</h3>
                                    <p style="color: white; font-size: 24pt;" class="fs-30 mb-2">{{ $sekolahCount }}</p>
                                </div>
                                <div class="right-column">
                                    <i class="fas fa-book-open icon-card"></i>
                                </div>
                            </div>
                        </div>

                        <div class="card" style="background-color: #f3797e;">
                            <h3 style="color: white;">Empty Card</h3>
                            <p style="color: white;">0</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Statistik Section -->
        <div class="statistik-section" style="margin-top: 40px;">
            <h4 style="margin-bottom: 20px;">Statistik CCTV</h4>
            <div style="margin-top: 40px;">
                <h4>Grafik Jumlah Sekolah dan CCTV per Wilayah</h4>
                <canvas id="wilayahChart" height="100"></canvas>
            </div>

            <div style="margin-top: 40px;">
                <h4>Grafik Jumlah CCTV per Sekolah</h4>
                <canvas id="sekolahChart" height="120"></canvas>
            </div>
        </div>

        <script>
            // Data dari Laravel (convert to JSON)
            const sekolahPerWilayah = @json($jumlahSekolahPerWilayah);
            const cctvPerWilayah = @json($jumlahCCTVPerWilayah);
            const cctvPerSekolah = @json($jumlahCCTVPerSekolah);

            // Gabungkan data wilayah berdasarkan nama
            const wilayahLabels = [...new Set([
                ...sekolahPerWilayah.map(d => d.namaWilayah),
                ...cctvPerWilayah.map(d => d.namaWilayah)
            ])];

            const sekolahData = wilayahLabels.map(w => {
                const match = sekolahPerWilayah.find(d => d.namaWilayah === w);
                return match ? match.total_sekolah : 0;
            });

            const cctvWilayahData = wilayahLabels.map(w => {
                const match = cctvPerWilayah.find(d => d.namaWilayah === w);
                return match ? match.total_cctv : 0;
            });

            // Grafik Wilayah
            new Chart(document.getElementById('wilayahChart'), {
                type: 'bar',
                data: {
                    labels: wilayahLabels,
                    datasets: [{
                            label: 'Jumlah Sekolah',
                            data: sekolahData,
                            backgroundColor: 'rgba(54, 162, 235, 0.7)'
                        },
                        {
                            label: 'Jumlah CCTV',
                            data: cctvWilayahData,
                            backgroundColor: 'rgba(255, 99, 132, 0.7)'
                        }
                    ]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top'
                        },
                        title: {
                            display: true,
                            text: 'Statistik Sekolah & CCTV per Wilayah'
                        }
                    }
                }
            });

            // Grafik Sekolah (line chart)
            const sekolahLabels = cctvPerSekolah.map(d => d.namaSekolah);
            const cctvSekolahData = cctvPerSekolah.map(d => d.total_cctv);

            new Chart(document.getElementById('sekolahChart'), {
                type: 'line', // Ubah jadi line chart
                data: {
                    labels: sekolahLabels,
                    datasets: [{
                        label: 'Jumlah CCTV',
                        data: cctvSekolahData,
                        fill: false, // garis tidak diisi area di bawahnya
                        borderColor: 'rgba(75, 192, 192, 1)', // warna garis
                        backgroundColor: 'rgba(75, 192, 192, 0.2)', // warna titik
                        tension: 0.4, // kurva halus, nilai antara 0 (linear) sampai 1 (sangat melengkung)
                        pointRadius: 5,
                        pointHoverRadius: 7,
                        borderWidth: 3,
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top'
                        },
                        title: {
                            display: true,
                            text: 'Jumlah CCTV per Sekolah'
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 1
                            }
                        }
                    }
                }
            });
        </script>

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
                        `https://api.openweathermap.org/data/2.5/weather?lat=${lat}&lon=${lon}&units=metric&appid=${apiKey}`
                    )
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
