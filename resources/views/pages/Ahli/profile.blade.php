@extends('layouts.kabupaten.app')

@section('title', 'Profile')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-social/assets/css/bootstrap.css') }}">
@endpush

@section('kabupaten_main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Profile</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="">Dashboard</a></div>
                    <div class="breadcrumb-item">Profile</div>
                </div>
            </div>
            <div class="section-body">
                <div>
                    <div>
                        <div class="card profile-widget">
                            <div class="profile-widget-header">
                                <div class="profile-widget-items">
                                    <div class="profile-widget-item">
                                        <div class="profile-widget-item-label">DESA</div>
                                        <div class="profile-widget-item-value">{{ $jumlahDesa }}</div>
                                    </div>
                                    <div class="profile-widget-item">
                                        <div class="profile-widget-item-label">Lembaga</div>
                                        <div class="profile-widget-item-value">{{ $jumlahLembaga }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="profile-widget-description">
                                <div class="profile-widget-name">DPMD<div class="text-muted d-inline font-weight-normal">
                                        Dinas Pemerdayaan Masyarakat Desa
                                    </div>
                                </div>
                                Dinas Pemberdayaan Masyarakat dan Desa (DPMD) Kabupaten Sumenep merupakan lembaga
                                pemerintahan yang bertanggung jawab dalam mengkoordinasikan, mengawasi, dan melaksanakan
                                program pembangunan di tingkat desa. DPMD memiliki peran strategis dalam memperkuat
                                partisipasi masyarakat dan meningkatkan kesejahteraan di wilayah Kabupaten Sumenep.
                                <b>Dinas Pemerdayaan Masyarakat Desa</b>
                            </div>

                            <a href="{{ route('resetPassword-DPMD') }}" class="btn  btn-info btn-icon">
                                Ubah Password
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/summernote/dist/summernote-bs4.js') }}"></script>

    <!-- Page Specific JS File -->
@endpush
