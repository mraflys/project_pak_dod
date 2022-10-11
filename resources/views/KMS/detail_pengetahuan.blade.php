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
                        <ul class="list-group list-group-flush">
                            @if(count($pengetahuan) == 0)
                                <h4>Data Tidak Ada</h4>
                            @else
                                @foreach ($pengetahuan as $item)
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title">{{$item->judul}}</h5>
                                            </div>
                                            <div class="col">
                                                <div class="float-right">
                                                    <a href="" class="btn btn-outline-primary">Liat</a>
                                                    <a href="#" class="btn btn-outline-secondary">Edit</a>
                                                    <a href="{{Route('pengetahuan.delete',['id' => $item->id])}}" class="btn btn-outline-danger">Hapus</a>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div>
                                            <p class="card-text">{{$item->keterangan}}</p>
                                        </div>
                                    </li>
                                @endforeach  
                            @endif
                        </ul>                   
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
@endsection
