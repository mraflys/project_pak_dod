@extends('layouts.app')

@section('content')
@if($konteks == 'liat')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Detail dokumen</div>
                    <div class="card-body">
                        @if (\Session::has('success'))
                            <div class="alert alert-success">
                                {!! \Session::get('success') !!}
                            </div>
                        @endif
                        <div>
                            <div class="mb-3">
                                <label for="judul" class="form-label">Judul</label>
                                <h5>{{$dokumen->judul}}</h5>
                            </div>
                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <p>{{$dokumen->keterangan}}</p>
                            </div>
                            <div class="mb-3">
                                <label for="jenisdokumen" class="form-label">Jenis dokumen</label>
                                <h5>{{$dokumen->jenis_dokumen->label}}</h5>
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">File</label>
                                <p>{{$dokumen->berkas}}</p>
                                <a href="{{Route('dokumen.download',['id' => $dokumen->id])}}" class="btn btn-outline-primary">Download</a>
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
                        <form method="POST" action="{{Route('dokumen.update')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <input required type="text" name="id" hidden value="{{$dokumen->id}}">
                                <input required type="text" name="konteks" hidden value="edit">
                                <label for="judul" class="form-label">Judul</label>
                                <input required type="text" name="judul" class="form-control" id="judul" placeholder="Judul" value="{{$dokumen->judul}}">
                            </div>
                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <textarea required class="form-control" id="keterangan" name="keterangan" rows="3">{{$dokumen->keterangan}}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="jenisdokumen" class="form-label">Jenis dokumen</label>
                                <select class="form-select form-control" id="jenisdokumen" name="jenisdokumen" aria-label="Default select example">
                                    @foreach ($jenisDokumen as $value)
                                        <option @if($dokumen->jenis_id == $value->id) 
                                            selected
                                            @endif
                                            value="{{$value->id}}">{{$value->label}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">File</label>
                                @if(is_null($dokumen->berkas) || $dokumen->berkas == '')
                                    <input required class="form-control" type="file" accept="application/pdf,application/msword,application/vnd.ms-excel,application/vnd.ms-powerpoint"id="formFile" name="formFile">
                                @else
                                    <p>{{$dokumen->berkas}}</p>
                                    <a href="{{Route('dokumen.hapusfile',['id' => $dokumen->id,'konteks' => 'edit'])}}" class="btn btn-outline-danger">Hapus</a>
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
