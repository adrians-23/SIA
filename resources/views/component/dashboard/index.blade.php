@extends('layout.app')

@section('title')
    Dashboard
@endsection

@section('content')
    
    <section class="content-header">
        <div class="container-fluid">
            <div class="row callout callout-info">
                <h1>Dashboard</h1>
            </div>
        </div>
    </section>

    <section class="content">

        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-chalkboard-teacher"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">
                                Data Guru</a>
                            </span>
                            <span class="info-box-number">
                                {{ $guru }}
                            </span>
                        </div>
                        <a href="#" class="small-box-footer nav-link">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
    
                </div>
    
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-users"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Data Siswa</span>
                            <span class="info-box-number">{{ $siswa }}</span>
                        </div>
    
                    </div>
    
                </div>
    
    
                <div class="clearfix hidden-md-up"></div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-chalkboard"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Data Kelas</span>
                            <span class="info-box-number">{{ $kelas }}</span>
                        </div>
    
                    </div>
    
                </div>
    
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-book"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Data Mapel</span>
                            <span class="info-box-number">{{ $mapel }}</span>
                        </div>
    
                    </div>
    
                </div>
    
            </div>
        </div>

    </section>
@endsection