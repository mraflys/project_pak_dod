@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Knowlage Managment System</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Knowlage Managment System adalah bagian dari perangkat lunak manajemen konten perusahaan, yang berisi serangkaian perangkat lunak yang mengkhususkan diri dalam cara informasi dikumpulkan, disimpan, dan/atau diakses. Konsep manajemen pengetahuan didasarkan pada berbagai praktik yang digunakan oleh individu, bisnis, atau perusahaan besar untuk mengidentifikasi, membuat, mewakili, dan mendistribusikan kembali informasi untuk berbagai tujuan. Perangkat lunak yang memungkinkan praktik informasi atau berbagai praktik di bagian mana pun dari proses manajemen informasi dapat dianggap disebut perangkat lunak manajemen informasi. Sebuah subset dari perangkat lunak manajemen informasi yang menekankan pendekatan untuk membangun pengetahuan dari informasi yang dikelola atau terkandung sering disebut perangkat lunak manajemen pengetahuan.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
