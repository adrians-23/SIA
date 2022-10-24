@extends('layout.app')

@section('title')
    Dashboard
@endsection

@section('content')
    
    <section class="content-header">
        <div class="container-fluid">
            <div class="row callout callout-info">
                <h1>{{ !empty(Auth()->user()->name) ? Auth()->user()->name : '-' }}</h1>
            </div>
        </div>
    </section>

    <section class="content">

        <div class="container-fluid">
            <div class="row">
                @if(auth()->user()->role == 'admin')
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-chalkboard-teacher"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">
                                Data Guru
                            </span>
                            <span class="info-box-number">
                                {{ $guru->count() }}
                            </span>
                        </div>
                        <a href="{{ route('guru.index') }}" class="small-box-footer nav-item">Lihat data <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
    
                </div>
    
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-users"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Data Siswa</span>
                            <span class="info-box-number">{{ $siswa->count() }}</span>
                        </div>
                        <a href="{{ route('siswa.index') }}" class="small-box-footer nav-item">Lihat data <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
    
                </div>
    
    
                <div class="clearfix hidden-md-up"></div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-chalkboard"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Data Kelas</span>
                            <span class="info-box-number">{{ $kelas->count() }}</span>
                        </div>
                        <a href="{{ route('kelas.index') }}" class="small-box-footer nav-item">Lihat data <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
    
                </div>
    
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-book"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Data Mapel</span>
                            <span class="info-box-number">{{ $mapel->count() }}</span>
                        </div>
                        <a href="{{ route('mapel.index') }}" class="small-box-footer nav-item">Lihat data <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
    
                </div>
                @endif

            </div>

            @if(auth()->user()->role == 'siswa')
            <div class="card">
                <div class="card-header">
                    <table class="table table-hover text-nowrap" style="width: 100%;">
                    
                        <thead>
                            <tr>
                                <th scope="col">Mata Pelajaran</th>
                                <th scope="col">Kelas</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($mapel as $item)
                                <tr>
                                    <th>{{ $item->nama }}</th>
                                    <th>{{ $item->nama }}</th>
                                </tr>      
                            @endforeach
                        </tbody>
                        
                    </table>
                </div>
            </div>
            @endif

        </div>

    </section>
@endsection

{{-- @push('script')
    <script>
        let table;

        $(function() {
            table = $('.table').DataTable({
                proccesing: true,
                autowidth: false,
                ajax: {
                    url: '{{ route('guru.data') }}'
                },
                columns: [
                    {data: 'DT_RowIndex'},
                    {data: 'mata pelajaran'},
                    {data: 'guru'},
                ]
            });
        })
    </script>
@endpush --}}