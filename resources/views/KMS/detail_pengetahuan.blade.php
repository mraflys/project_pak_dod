@extends('layouts.app')

@section('content')
@if($konteks == 'liat')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Detail Pengetahuan</div>
                    <div class="card-body">
                        @if (\Session::has('success'))
                            <div class="alert alert-success">
                                {!! \Session::get('success') !!}
                            </div>
                        @endif
                        <div>
                            <div class="mb-3">
                                <label for="judul" class="form-label">Judul</label>
                                <h5>{{$pengetahuan->judul}}</h5>
                            </div>
                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <p>{{$pengetahuan->keterangan}}</p>
                            </div>
                            <div class="mb-3">
                                <label for="jenisPengetahuan" class="form-label">Jenis Pengetahuan</label>
                                <h5>{{$pengetahuan->jenis}}</h5>
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">File</label>
                                <p>{{$pengetahuan->berkas}}</p>
                                <a href="{{Route('pengetahuan.download',['id' => $pengetahuan->id])}}" class="btn btn-outline-primary">Download</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@elseif($konteks == 'edit')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        @if (\Session::has('success'))
                            <div class="alert alert-success">
                                {!! \Session::get('success') !!}
                            </div>
                        @endif
                        <form method="POST" action="{{Route('pengetahuan.update')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <input type="text" name="id" hidden value="{{$pengetahuan->id}}">
                                <input type="text" name="konteks" hidden value="edit">
                                <label for="judul" class="form-label">Judul</label>
                                <input type="text" name="judul" class="form-control" id="judul" placeholder="Judul" value="{{$pengetahuan->judul}}">
                            </div>
                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <textarea class="form-control" id="keterangan" name="keterangan" rows="3">{{$pengetahuan->keterangan}}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="jenisPengetahuan" class="form-label">Jenis Pengetahuan</label>
                                <select class="form-select form-control" id="jenisPengetahuan" name="jenisPengetahuan" aria-label="Default select example">
                                    <option @if($pengetahuan->jenis == 'Matematika') selected @endif value="Matematika">Matematika</option>
                                    <option @if($pengetahuan->jenis == 'Sains') selected @endif value="Sains">Sains</option>
                                    <option @if($pengetahuan->jenis == 'Sosial') selected @endif value="Sosial">Sosial</option>
                                    <option @if($pengetahuan->jenis == 'Politik') selected @endif value="Politik">Politik</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">File</label>
                                @if(is_null($pengetahuan->berkas) || $pengetahuan->berkas == '')
                                    <input class="form-control" type="file" id="formFile" name="formFile">
                                @else
                                    <p>{{$pengetahuan->berkas}}</p>
                                    <a href="{{Route('pengetahuan.hapusfile',['id' => $pengetahuan->id,'konteks' => 'edit'])}}" class="btn btn-outline-danger">Hapus</a>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>          
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
@endsection
