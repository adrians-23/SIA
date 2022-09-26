@extends('layout.app')

@section('title')
    Data Siswa
@endsection

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Siswa</h1>
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
            <h3 class="card-title">Data Siswa</h3>
            <div class="card-tools">
                <form action="/siswa" class="d-flex" role="search" method="GET">
                    <input class="form-control" type="search" name="search" placeholder="Cari Siswa" aria-label="Search" style="width: 200px;">
                    <button class="btn btn-outline-secondary mx-1" type="submit">Cari</button>
                </form>
            </div>
            <br>
            <button type="button" onclick="addForm('{{ route('siswa.store')}}')" class="btn btn-tool">
                <div class="btn btn-sm btn-primary">
                    <i class="fa fa-plus"></i>
                </div>
            </button>
        </div>
        <div class="card-body">
            {{-- Judul Data Siswa --}}
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th scope="col" width="50px">ID</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Kelas ID</th>
                        <th scope="col">Mapel ID</th>
                        <th scope="col" width="84px">Action</th>
                    </tr>
                </thead>
        
        {{-- Data Siswa --}}
                <tbody class="table-group-divide">
                    @foreach ($siswa as $key => $item)
                    <tr>
                        <th scope="row">{{ $siswa -> firstItem() + $key }}</th>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>{{ $item->jenis_kelamin }}</td>
                        <td>{{ ! empty($item->kelas->nama) ?  $item->kelas->nama : '' }}</td>
                        <td>{{ ! empty($item->mapel->nama) ?  $item->mapel->nama : '' }}</td>
                        <td>
                            <button onclick="editForm('')" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></button>
                            <button onclick="" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-3">
                {{ $siswa->links() }}
            </div>

        </div>

        {{-- <div class="card-footer">
            Footer
        </div> --}}

    </div>

</section>

@include('component.siswa.create')

@endsection

@push('script')
    <script>
        function addForm(){
            $('#modalForm').modal('show');
            $('#modalForm .modal-title').text('Tambah Data Guru');
        }

        function editData(){
            $('#modalForm').modal('show');
            $('#modalForm .modal-title').text('Edit Data Guru');
        }
    </script>
@endpush