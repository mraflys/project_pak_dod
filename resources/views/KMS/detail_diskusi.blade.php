@extends('layouts.app')

@section('content')
@if($konteks == 'liat')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Detail Diskusi</div>
                    <div class="card-body">
                        @if (\Session::has('success'))
                            <div class="alert alert-success">
                                {!! \Session::get('success') !!}
                            </div>
                        @endif
                        <div>
                            <div class="mb-3">
                                <label for="judul" class="form-label">Judul</label>
                                <h5>{{$diskusi->judul}}</h5>
                            </div>
                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Pertanyaan</label>
                                <h5>{{$diskusi->pertanyaan}}</h5>
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                @if($diskusi->status == 1)
                                    <h5>Aktif</h5>
                                @elseif($diskusi->status == 0)
                                    <h5>Tidak Aktif</h5>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="card-body">
                        @if (\Session::has('success'))
                            <div class="alert alert-success">
                                {!! \Session::get('success') !!}
                            </div>
                        @endif
                        <form method="POST" action="{{Route('diskusi.store.komentar')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <input required type="text" name="id" hidden value="{{$diskusi->id}}">
                                <input required type="text" name="konteks" hidden value="edit">
                                <label for="pertanyaan" class="form-label">Pertanyaan</label>
                                <textarea required class="form-control" id="pertanyaan" name="pertanyaan" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>          
                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="card-header">Komentar Diskusi</div>
                    <div class="card-body">
                        <div>
                            @if(count($diskusi->komentar)==0)
                                <h4>Tidak ada Komentar</h4>
                            @else
                                @foreach ($diskusi->komentar as $item)
                                    <b>{{$item->user->name}}</b>
                                    <div class="mb-3">
                                        <label for="pertanyaan" class="form-label">{{$item->pertanyaan}}</label>
                                    </div>
                                @endforeach
                            @endif
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
                        <form method="POST" action="{{Route('diskusi.update')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <input required type="text" name="id" hidden value="{{$diskusi->id}}">
                                <input required type="text" name="konteks" hidden value="edit">
                                <label for="judul" class="form-label">Judul</label>
                                <input required type="text" name="judul" class="form-control" id="judul" placeholder="Judul" value="{{$diskusi->judul}}">
                            </div>
                            <div class="mb-3">
                                <label for="pertanyaan" class="form-label">Pertanyaan</label>
                                <textarea required class="form-control" id="pertanyaan" name="pertanyaan" rows="3">{{$diskusi->pertanyaan}}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="jenisdiskusi" class="form-label">Status</label>
                                <select class="form-select form-control" id="jenisdiskusi" name="jenisdiskusi" aria-label="Default select example">
                                    <option @if($diskusi->status == 1) selected @endif value="1">Aktif</option>
                                    <option @if($diskusi->status == 0) selected @endif value="0">Tidak Aktif</option>
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
