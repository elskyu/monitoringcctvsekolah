@extends('layouts.user_type.auth')

@section('content')


    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header pb-0 px-3">
                <h6 class="mb-0">Edit CCTV</h6>
            </div>            
            <div class="card-body pt-4 p-3">
                <form action="/editCctv" method="POST" role="form text-left">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="region-name" class="form-control-label">{{ __('Nama Wilayah') }}</label>
                                <div class="@error('region.name')border border-danger rounded-3 @enderror">
                                    <input class="form-control" value="{{ old('region_name') }}" type="text" placeholder="Nama Wilayah" id="region-name" name="region_name">
                                        @error('region_name')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="point-name" class="form-control-label">{{ __('Nama Titik') }}</label>
                                <div class="@error('point.name')border border-danger rounded-3 @enderror">
                                    <input class="form-control" value="{{ old('point_name') }}" type="text" placeholder="Nama Titik" id="point-name" name="point_name">
                                        @error('point_name')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cctv-number" class="form-control-label">{{ __('Nomor CCTV') }}</label>
                                <div class="@error('cctv.number')border border-danger rounded-3 @enderror">
                                    <input class="form-control" value="{{ old('cctv_number') }}" type="text" placeholder="Nomor CCTV" id="cctv-number" name="cctv_number">
                                        @error('cctv_number')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cctv-link" class="form-control-label">{{ __('Link') }}</label>
                                <div class="@error('cctv.link')border border-danger rounded-3 @enderror">
                                    <input class="form-control" value="{{ old('cctv_link') }}" type="text" placeholder="Link" id="cctv-link" name="cctv_link">
                                        @error('cctv_link')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4">{{ 'Save Changes' }}</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
