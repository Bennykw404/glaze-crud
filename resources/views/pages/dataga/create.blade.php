@extends('layouts.app')

@section('content')
@push('style')
<link rel="stylesheet" href="{{ asset('vendor/selectric/selectric.css') }}">
@endpush
<div class="row">
    <div class="col-12">
        <div class="card">
            <form action="{{ route('glaze.store') }}" method="POST">
                @csrf
                <div class="card-header">
                    <h4>Form Insert Glaze Application</h4>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Masukan Nama</label>
                        <div class="col-sm-9">
                            <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}"
                                readonly>
                        </div>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Pilih Glaze/Engobe</label>
                        <div class="col-sm-9">
                            <select name="dept" class="form-control selectric @error('dept') is-invalid @enderror"
                                required="">
                                <option selected>Pilih Glaze/Engobe</option>
                                <option value="Glaze">Glaze</option>
                                <option value="Engobe">Engobe</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Pilih Shift</label>
                        <div class="col-sm-9">
                            <select name="shift" class="form-control selectric @error('shift') is-invalid @enderror"
                                required="">
                                <option selected>Pilih Shift</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Pilih Grub</label>
                        <div class="col-sm-9">
                            <select name="grub"
                                class="form-control required selectric @error('grub') is-invalid @enderror">
                                <option selected>Pilih Grub</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Masukan Spray Air</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="text" name="spray"
                                    class="form-control @error('spray') is-invalid @enderror" value="{{ old('spray') }}"
                                    placeholder="Jika tidak ada isi 0">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        Second
                                    </div>
                                </div>
                                @error('spray')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Masukan Viscosity</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="text" name="viscosity"
                                    class="form-control @error('viscosity') is-invalid @enderror"
                                    value="{{ old('viscosity') }}">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        Second
                                    </div>
                                </div>
                                @error('viscosity')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Masukan Density</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="text" name="density"
                                    class="form-control @error('density') is-invalid @enderror"
                                    value="{{ old('density') }}">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        Gram
                                    </div>
                                </div>
                                @error('density')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Masukan Weight</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="text" name="weight"
                                    class="form-control @error('weight') is-invalid @enderror"
                                    value="{{ old('weight') }}">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        Gram
                                    </div>
                                </div>
                                @error('weight')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@push('scripts')
<script src="{{ asset('vendor/selectric/jquery.selectric.min.js') }}"></script>
@endpush
@endsection