@extends('layouts.app')

@section('content')
@if($konteks == 'pengetahuan')
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
                                                <div class="float-end">
                                                    @if(Auth::user()->role==0)
                                                        <a href="{{Route('pengetahuan.detail',['id' => $item->id,'konteks' => 'liat'])}}" class="btn btn-outline-primary">Liat</a>
                                                        <a href="{{Route('pengetahuan.detail',['id' => $item->id,'konteks' => 'edit'])}}" class="btn btn-outline-secondary">Edit</a>
                                                        <a href="{{Route('pengetahuan.delete',['id' => $item->id])}}" class="btn btn-outline-danger">Hapus</a>
                                                    @else
                                                        @if(Auth::user()->id == $item->user_id)
                                                            <a href="{{Route('pengetahuan.detail',['id' => $item->id,'konteks' => 'liat'])}}" class="btn btn-outline-primary">Liat</a>
                                                            <a href="{{Route('pengetahuan.detail',['id' => $item->id,'konteks' => 'edit'])}}" class="btn btn-outline-secondary">Edit</a>
                                                            <a href="{{Route('pengetahuan.delete',['id' => $item->id])}}" class="btn btn-outline-danger">Hapus</a>
                                                        @else
                                                            <a href="{{Route('pengetahuan.detail',['id' => $item->id,'konteks' => 'liat'])}}" class="btn btn-outline-primary">Liat</a>
                                                        @endif
                                                    @endif
                                                    
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div>
                                            <p class="card-text">{{$item->keterangan}}</p>
                                        </div>
                                        <div>
                                            <br>
                                            <p class="btn rounded-pill btn-outline-success">{{$item->jenis}}</p>
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
@elseif($konteks == 'dokumen')
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
                            @if(count($dokumen) == 0)
                                <h4>Data Tidak Ada</h4>
                            @else
                                @foreach ($dokumen as $item)
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title">{{$item->judul}}</h5>
                                            </div>
                                            <div class="col">
                                                <div class="float-end">
                                                    @if(Auth::user()->role==0)
                                                        <a href="{{Route('dokumen.detail',['id' => $item->id,'konteks' => 'liat'])}}" class="btn btn-outline-primary">Liat</a>
                                                        <a href="{{Route('dokumen.detail',['id' => $item->id,'konteks' => 'edit'])}}" class="btn btn-outline-secondary">Edit</a>
                                                        <a href="{{Route('dokumen.delete',['id' => $item->id])}}" class="btn btn-outline-danger">Hapus</a>
                                                    @else
                                                        @if(Auth::user()->id == $item->user_id)
                                                            <a href="{{Route('dokumen.detail',['id' => $item->id,'konteks' => 'liat'])}}" class="btn btn-outline-primary">Liat</a>
                                                            <a href="{{Route('dokumen.detail',['id' => $item->id,'konteks' => 'edit'])}}" class="btn btn-outline-secondary">Edit</a>
                                                            <a href="{{Route('dokumen.delete',['id' => $item->id])}}" class="btn btn-outline-danger">Hapus</a>
                                                        @else
                                                            <a href="{{Route('dokumen.detail',['id' => $item->id,'konteks' => 'liat'])}}" class="btn btn-outline-primary">Liat</a>
                                                        @endif
                                                    @endif
                                                    
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div>
                                            <p class="card-text">{{$item->keterangan}}</p>
                                        </div>
                                        <div>
                                            <br>
                                            <p class="btn rounded-pill btn-outline-success">{{$item->jenis_dokumen->label}}</p>
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

@elseif($konteks == 'diskusi')
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
                        <div class="row">
                            <div class="col">
                            </div>
                            <div class="col">
                                <div class="float-end">
                                    <a href="{{Route('diskusi')}}" class="btn btn-outline-primary"><b>+</b> Tambah</a>
                                </div>
                            </div>
                        </div>  
                        <br>
                        <ul class="list-group list-group-flush">
                            @if(count($diskusi) == 0)
                                <h4>Data Tidak Ada</h4>
                            @else
                                @foreach ($diskusi as $item)
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title">{{$item->judul}}</h5>
                                            </div>
                                            <div class="col">
                                                <div class="float-end">
                                                    @if(Auth::user()->role==0)
                                                        <a href="{{Route('diskusi.detail',['id' => $item->id,'konteks' => 'liat'])}}" class="btn btn-outline-primary">Liat</a>
                                                        <a href="{{Route('diskusi.detail',['id' => $item->id,'konteks' => 'edit'])}}" class="btn btn-outline-secondary">Edit</a>
                                                        <a href="{{Route('diskusi.delete',['id' => $item->id])}}" class="btn btn-outline-danger">Hapus</a>
                                                    @else
                                                        @if(Auth::user()->id == $item->user_id)
                                                            <a href="{{Route('diskusi.detail',['id' => $item->id,'konteks' => 'liat'])}}" class="btn btn-outline-primary">Liat</a>
                                                            <a href="{{Route('diskusi.detail',['id' => $item->id,'konteks' => 'edit'])}}" class="btn btn-outline-secondary">Edit</a>
                                                            <a href="{{Route('diskusi.delete',['id' => $item->id])}}" class="btn btn-outline-danger">Hapus</a>
                                                        @else
                                                            <a href="{{Route('diskusi.detail',['id' => $item->id,'konteks' => 'liat'])}}" class="btn btn-outline-primary">Liat</a>
                                                        @endif
                                                    @endif
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div>
                                            <p class="card-text">{{$item->pertanyaan}}</p>
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

@elseif($konteks == 'user')
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
                        <div class="row">
                            <div class="col">
                            </div>
                            <div class="col">
                                <div class="float-end">
                                    <a href="{{Route('user',['konteks' => 'tambah','id'=>'123'])}}" class="btn btn-outline-primary"><b>+</b> Tambah</a>
                                </div>
                            </div>
                        </div>  
                        <br>
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">Nama</th>
                                <th scope="col">Email</th>
                                <th scope="col">Bagian Kerja</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                              </tr>
                            </thead>
                            <tbody>
                                @if(count($user) == 0)
                                    <h4>Data Tidak Ada</h4>
                                @else
                                    @foreach ($user as $item)
                                        <tr>
                                            <th scope="row">{{$item->name}}</th>
                                            <td>{{$item->email}}</td>
                                            <td>{{$item->bagker->label}}</td>
                                            @if($item->status == 1)
                                                <td>Aktif</td>
                                            @else
                                                <td>Aktig</td>
                                            @endif
                                            <td><a href="{{Route('user',['konteks' => 'edit','id' => $item->id])}}" class="btn btn-outline-secondary">Edit</a>
                                                <a href="{{Route('user.delete',['id' => $item->id])}}" class="btn btn-outline-danger">Hapus</a></td>
                                        </tr>
                                    @endforeach  
                                @endif

                            </tbody>
                          </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
@endsection
