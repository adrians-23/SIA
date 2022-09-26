@extends('layout.app')

@section('breadcrumbs')
    / Tabel Kelas
@endsection

@section('title')
    Data Kelas
@endsection

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Kelas</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Blank Page</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Kelas</h3>
            <div class="card-tools">
                <form action="/kelas" class="d-flex" role="search" method="GET">
                    <input class="form-control" type="search" name="search" placeholder="Cari Kelas" aria-label="Search" style="width: 200px;">
                    <button class="btn btn-outline-secondary mx-1" type="submit">Cari</button>
                </form>
            </div>
            <br>
            <button type="button" onclick="addForm('{{ route('kelas.store') }}')" class="btn btn-tool">
                <div class="btn btn-sm btn-primary">
                    <i class="fa fa-plus"></i>
                </div>
            </button>
        </div>
        <div class="card-body">
            {{-- Judul Data Kelas --}}
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th scope="col" width="50px">ID</th>
                        <th scope="col">Nama</th>
                        <th scope="col" width="84px">Action</th>
                    </tr>
                </thead>
        
        {{-- Data Kelas --}}
                <tbody class="table-group-divide">
                    @foreach ($kelas as $key => $item)
                    <tr>
                        <th scope="row">{{  $kelas -> firstItem() + $key  }}</th>
                        <td>{{ $item->nama }}</td>
                        <td>
                            <button onclick="editData()" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></button>
                            <button onclick="" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-3">
                {{ $kelas->links() }}
            </div>

        </div>

        {{-- <div class="card-footer">
            Footer
        </div> --}}

    </div>

</section>

@include('component.kelas.create')

@endsection

@push('script')
    <script>
        function addForm(){
            $('#modalForm').modal('show');
            $('#modalForm .modal-title').text('Tambah Data Kelas');
        }

        function editData(){
            $('#modalForm').modal('show');
            $('#modalForm .modal-title').text('Edit Data Kelas');
        }
    </script>
@endpush