@extends('layouts.user_type.auth')

@section('content')
    <main class="main-content">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card mb-4">
                        {{-- Header --}}
                        <div
                            class="card-header pb-0 d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center">
                            <h6 class="mb-2 mb-sm-0">Export Rekap Data CCTV</h6>
                        </div>

                        <!-- Konten Form Export -->
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive-sm px-3 py-3">
                                <form action="{{ route('export.rekap.cctv.post') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="tipe" class="form-label">Pilih Jenis Data:</label>
                                        <select name="tipe" id="tipe" class="form-select" required>
                                            <option value="">-- Pilih --</option>
                                            <option value="sekolah">CCTV Sekolah</option>
                                            <option value="panorama">CCTV Panorama</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-success">
                                        <i class="fas fa-file-excel"></i> Download Excel
                                    </button>
                                </form>
                            </div>
                        </div>
                        <!-- End Konten -->
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection