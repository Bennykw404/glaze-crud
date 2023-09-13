@extends('layouts.app')

@section('content')
    @push('style')
        <link rel="stylesheet" href="{{ asset('vendor/fullcalendar/fullcalendar.min.css') }}">
    @endpush
    <div class="hero bg-primary mb-4 text-white">
        <div class="hero-inner">
            <h2>Selamat Datang, {{ Auth::user()->name }}!</h2>
            <p class="lead">Silakan masukan data spesifikasi dan form pinjaman tools.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Calendar</h4>
                </div>
                <div class="card-body">
                    <div class="fc-overflow">
                        <div id="myEvent"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="{{ asset('vendor/fullcalendar/fullcalendar.min.js') }}"></script>
        <script src="{{ asset('js/page/modules-calendar.js') }}"></script>
    @endpush
@endsection
