@extends('layouts.app')

@section('content')
@if($konteks == 'pengetahuan')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Tambah Pengetahuan</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if (\Session::has('success'))
                            <div class="alert alert-success">
                                {!! \Session::get('success') !!}
                            </div>
                        @endif
                        <form method="POST" action="{{Route('pengetahuan.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="judul" class="form-label">Judul</label>
                                <input required type="text" name="judul" class="form-control" id="judul" placeholder="Judul">
                            </div>
                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <textarea required class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="jenisPengetahuan" class="form-label">Jenis Pengetahuan</label>
                                <select class="form-select form-control" id="jenisPengetahuan" name="jenisPengetahuan" aria-label="Default select example">
                                    <option selected>---Jenis Pengetahuan---</option>
                                    <option value="Matematika">Matematika</option>
                                    <option value="Sains">Sains</option>
                                    <option value="Sosial">Sosial</option>
                                    <option value="Politik">Politik</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">File</label>
                                <input required class="form-control" type="file" accept="application/pdf,application/msword,application/vnd.ms-excel,application/vnd.ms-powerpoint"id="formFile" name="formFile">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@elseif($konteks == 'dokumen')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Tambah Dokumen</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if (\Session::has('success'))
                            <div class="alert alert-success">
                                {!! \Session::get('success') !!}
                            </div>
                        @endif
                        <form method="POST" action="{{Route('dokumen.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="judul" class="form-label">Judul</label>
                                <input required type="text" name="judul" class="form-control" id="judul" placeholder="Judul">
                            </div>
                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <textarea required class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="jenisDokumen" class="form-label">Jenis Dokumen</label>
                                <select class="form-select form-control" id="jenisDokumen" name="jenisDokumen" aria-label="Default select example">
                                    <option selected>---Jenis Dokumen---</option>
                                    @foreach ($jenisDokumen as $value)
                                        <option value="{{$value->id}}">{{$value->label}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">File</label>
                                <input required class="form-control" type="file" accept="application/pdf,application/msword,application/vnd.ms-excel,application/vnd.ms-powerpoint"id="formFile" name="formFile">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@elseif($konteks == 'diskusi')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Tambah Diskusi</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if (\Session::has('success'))
                            <div class="alert alert-success">
                                {!! \Session::get('success') !!}
                            </div>
                        @endif
                        <form method="POST" action="{{Route('diskusi.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="judul" class="form-label">Judul</label>
                                <input required type="text" name="judul" class="form-control" id="judul" placeholder="Judul">
                            </div>
                            <div class="mb-3">
                                <label for="pertanyaan" class="form-label">Pertanyaan</label>
                                <textarea required class="form-control" id="pertanyaan" name="pertanyaan" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select form-control" id="status" name="status" aria-label="Default select example">
                                    <option value="1">Aktif</option>
                                    <option value="0">Tidak Aktif</option>
                                </select>
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
