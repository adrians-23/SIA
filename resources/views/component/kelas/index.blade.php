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
                <button type="button" onclick="addForm('{{ route('kelas.store') }}')" class="btn btn-tool">
                    <div class="btn btn-sm btn-primary">
                        <i class="fa fa-plus"></i>
                    </div>
                </button>
            </div>
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
                        <th scope="row">{{  $key+1  }}</th>
                        <td>{{ $item->nama }}</td>
                        <td>
                            <button onclick="editData('{{ route('kelas.update', $item->id) }}')" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></button>
                            <button onclick="deleteData('{{ route('kelas.destroy', $item->id) }}')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- <div class="card-footer">
            Footer
        </div> --}}

    </div>

</section>

@include('component.kelas.form')

@endsection

@push('script')
    <script>

        // Data Tables
        let table;

        $(function() {
            table = $('.table').DataTable()
        })

        $('#modalForm').on('submit', function(e){
            if(! e.preventDefault()){
                $.post($('#modalForm form').attr('action'), $('#modalForm form').serialize())
                .done((response) => {
                    $('#modalForm').modal('hide');
                })
                .fail((errors) => {
                    alert('Tidak Dapat Menyimpan Data');
                    return;
                })
            }
        })

        function addForm(url){
            $('#modalForm').modal('show');
            $('#modalForm .modal-title').text('Tambah Data Kelas');
            $('#modalForm form')[0].reset();

            $('#modalForm form').attr('action', url);
            $('#modalForm [name=_method]').val('post');
        }

        function editData(url){
            $('#modalForm').modal('show');
            $('#modalForm .modal-title').text('Edit Data Kelas');

            $('#modalForm form')[0].reset();
            $('#modalForm form').attr('action', url);
            $('#modalForm [name=_method]').val('put');

            $.get (url)
                .done((response) => {
                    $('#modalForm [name=nama]').val(response.nama);
                    // console.log(response.nama);
                })
                .fail((errors) => {
                    alert('Tidak Dapat Menampilkan Data');
                    return;
                })
        }

        function deleteData(url){
            if(confirm('Yakin Ingin Menghapus Data?')){
                $.post(url, {
                    '_token' : $('[name=csrf-token]').attr('content'),
                    '_method' : 'delete'
                })
                .done((response) => {
                    alert('Data Berhasil Dihapus');
                    return;
                })
                .fail((errors) => {
                    alert('Data Gagal Dihapus!');
                    return;
                })
            }
        }
    </script>
@endpush