<div class="modal fade" id="modalForm" style="display: none; padding-right: 17px;" aria-modal="true" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">

                        {{-- Add Nama --}}
                        <div class="my-1">
                            <label class="mb-2" for="nama">Nama Guru</label>
                            <input type="text" name="nama" id="nama" value="{{ old('nama')}}" class="form-control @error('nama') is-invalid @enderror">
                            @error('nama')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Add Alamat --}}
                        <div class="my-1">
                            <label class="mb-2" for="floatingTextarea">Alamat</label>
                            <textarea class="form-control @error('alamat') is-invalid @enderror"  id="floatingTextarea" name="alamat" placeholder="Alamat"></textarea>
                            @error('alamat')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Add Jenis Kelamin --}}
                        <div class="my-1">
                            <label class="mb-2" for="nama">Jenis Kelamin</label>
                            <br>
                            <select name="jenis_kelamin" id="jenis_kelamin" value="{{ old('jenis_kelamin')}}" class="form-control @error('jenis_kelamin') is-invalid @enderror">
                                <option selected>Pilih...</option>
                                <option value="Laki-laki"> Laki-Laki</option>
                                <option value="Perempuan"> Perempuan</option>
                            </select>

                            {{-- Jika menggunakan radio button --}}

                            {{-- <div class="form-check form-check-inline">
                                <label for="jenis_kelamin">
                                    {{$siswa->jenis_kelamin == 'L'? 'checked' : ''}}
                                    {{$siswa->jenis_kelamin == 'P'? 'checked' : ''}}
                                    <input type="radio" name="jenis_kelamin" value="Laki-laki" id="jenis_kelamin"  > Laki-Laki
                                    <input type="radio" name="jenis_kelamin" value="Perempuan" id="jenis_kelamin"  > Perempuan
                                </label>
                            </div> --}}
                            
                            @error('jenis_kelamin')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Add Mapel ID --}}
                        <div class="my-1">
                            <label class="mb-2" for="nama">Mapel</label>
                            <select name="mapel_id" id="mapel_id" value="{{ old('mapel_id')}}" class="form-control @error('mapel_id') is-invalid @enderror">
                                <option selected>Pilih...</option>
                                @foreach($mapel_id as $mid)
                                    <option value="{{$mid->id}}">{{$mid->nama}}</option>
                                @endforeach
                            </select>
                            @error('mapel_id')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                    
                </form>
            </div>
        </div>

    </div>

</div>