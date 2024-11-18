@extends('layouts.user_type.auth')

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard CCTV</title>
  <script>
    function toggleDaerah(id) {
      const daerahList = document.getElementById(id);
      daerahList.style.display = (daerahList.style.display === "none" || daerahList.style.display === "") ? "block" : "none";
    }

    function toggleCCTV(id, checkbox) {
      const cctv = document.getElementById(id);
      cctv.style.display = checkbox.checked ? "block" : "none";
    }

    function showVideo(overlay) {
      overlay.style.display = 'none';
    }

    window.onload = function() {
      const checkboxes = document.querySelectorAll('.form-check-input');
      checkboxes.forEach(checkbox => {
        if (checkbox.checked) {
          toggleCCTV(checkbox.id.replace('checkbox-', ''), checkbox);
        }
      });
    }
  </script>
  <style>
    .list-group-item {
      text-align: left;
    }
  </style>
</head>

<header style="text-align: center; margin-bottom: 20px;">
  <h1>Dashboard CCTV DIY</h1>
  <p>Memantau kondisi lalu lintas di berbagai titik kota secara real-time</p>
</header>

<div style="text-align: center; margin-bottom: 20px; display: flex; justify-content: flex-end; padding-right: 20px;">
  <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
</div>

@php
  $cctvs = DB::table('cctvs')->get();
@endphp

<div class="container">
  <div class="row">
    <div class="col-md-3">
      <div class="list-group">
        @php
          $groupedCctvs = $cctvs->groupBy('namaWilayah');
        @endphp

        @foreach($groupedCctvs as $wilayah => $cctvGroup)
          <a href="#{{ Str::slug($wilayah) }}" class="list-group-item list-group-item-action" onclick="toggleDaerah('{{ Str::slug($wilayah) }}')">
            {{ $wilayah }}
          </a>
          <div id="{{ Str::slug($wilayah) }}" style="display: block; padding-left: 15px;">
            @foreach($cctvGroup as $cctv)
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="checkbox-{{ Str::slug($cctv->namaTitik) }}" onclick="toggleCCTV('{{ Str::slug($cctv->namaTitik) }}', this)">
                <label class="form-check-label" for="checkbox-{{ Str::slug($cctv->namaTitik) }}">
                  {{ $cctv->namaTitik }}
                </label>
              </div>
            @endforeach
          </div>
        @endforeach
      </div>
    </div>
    <div class="col-md-9">
      @foreach($groupedCctvs as $wilayah => $cctvGroup)
        <div class="wilayah-group mb-4">
          <h3 class="text-dark mb-3">{{ $wilayah }}</h3>
          <div class="row">
            @foreach($cctvGroup as $cctv)
              <div class="col-md-6 col-lg-4 mb-4 cctv-view" id="{{ Str::slug($cctv->namaTitik) }}" style="display: none;">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title text-center mb-3">{{ $cctv->namaTitik }}</h5>
                    <div class="iframe-container" style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden;">
                      <iframe
                        src="{{ $cctv->link }}"
                        style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"
                        frameborder="0"
                        allowfullscreen>
                      </iframe>
                      <div class="iframe-overlay"
                         onclick="showVideo(this)"
                         style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); display: flex; align-items: center; justify-content: center; cursor: pointer;">
                        <svg class="btn-play" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="80" height="80">
                          <path fill="white" d="M8 5v14l11-7z"/>
                        </svg>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>

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
  }
</script>
@endpush
