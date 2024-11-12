@extends('layouts.user_type.auth')

@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard CCTV</title>
    <script>
        function toggleDaerah(id) {
            const daerahList = document.getElementById(id);
            daerahList.style.display = (daerahList.style.display === "none" || daerahList.style.display === "") ? "block" : "none";
        }

        function tampilkanCCTV(id) {
            const tampilanCCTV = document.querySelectorAll('.cctv-view');
            tampilanCCTV.forEach(view => view.classList.remove('active'));
            document.getElementById(id).classList.add('active');
        }

        function toggleCCTV(id) {
            const tampilanCCTV = document.querySelectorAll('.cctv-view');
            tampilanCCTV.forEach(view => view.classList.remove('active'));

            const cctv = document.getElementById(id);
            if (cctv.style.display === "none" || cctv.style.display === "") {
                cctv.style.display = "block";
            } else {
                cctv.style.display = "none";
            }
        }
    </script>
  </head>

    <header>
        <h1>Dashboard CCTV DIY</h1>
        <p>Memantau kondisi lalu lintas di berbagai titik kota secara real-time</p>
    </header>

    <div class="video-item m-1">
                <h5 class="text-center">Simpang Kolombo 1</h5>
                <div class="iframe-container">
                    <iframe data-src="http://103.255.15.227:5080/CCTVSLEMAN/play.html?id=SimpangKolombo1" frameborder="0" allowfullscreen></iframe>
                    <div class="iframe-overlay">
                        <svg class="btn-play" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="80" height="80">
                            <path fill="white" d="M8 5v14l11-7z"/>
                        </svg>
                    </div>
                </div>
            </div>
@endsection
@push('dashboard')
  <script>
    window.onload = function() {
      var ctx = document.getElementById("chart-bars").getContext("2d");

      new Chart(ctx, {
        type: "bar",
        data: {
          labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
          datasets: [{
            label: "Sales",
            tension: 0.4,
            borderWidth: 0,
            borderRadius: 4,
            borderSkipped: false,
            backgroundColor: "#fff",
            data: [450, 200, 100, 220, 500, 100, 400, 230, 500],
            maxBarThickness: 6
          }, ],
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              display: false,
            }
          },
          interaction: {
            intersect: false,
            mode: 'index',
          },
          scales: {
            y: {
              grid: {
                drawBorder: false,
                display: false,
                drawOnChartArea: false,
                drawTicks: false,
              },
              ticks: {
                suggestedMin: 0,
                suggestedMax: 500,
                beginAtZero: true,
                padding: 15,
                font: {
                  size: 14,
                  family: "Open Sans",
                  style: 'normal',
                  lineHeight: 2
                },
                color: "#fff"
              },
            },
            x: {
              grid: {
                drawBorder: false,
                display: false,
                drawOnChartArea: false,
                drawTicks: false
              },
              ticks: {
                display: false
              },
            },
          },
        },
      });


  </script>
@endpush

