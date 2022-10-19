@extends('layouts.app')

@section('content')

<div class="container mt-5 mx-auto chat-box p-5 row border">
    <div class="chat-box-message col-10 p-5 border">
        <div class="container-message mb-3 border p-4" style="height: 60vh;">
            <div class="message border p-2 mb-3">
                <p><span class="fw-bold">Andre >></span> Halo ada yang bisa dibantu?</p>
            </div>
            <div class="message border p-2 mb-3">
                <p><span class="fw-bold">You >></span>Ya, Bagaimana caranya mengunduh dokumen</p>
            </div>
        </div>
        <div class="container-input">
            <form action="" class="row px-2">
                <div class="col-11 px-0">
                    <input type="text" placeholder="Tulis pesan disini..." class="col-12 px-2 py-3">
                </div>
                <button class="btn btn-primary col-1 m-0 p-0">Kirim</button>
            </form>
        </div>
    </div>
    <div class="user-message col-2" style="max-height: 80vh; overflow-y: scroll; overflow-x: hidden;">
        <div class="user-box d-flex align-items-center justify-content-between border border-start-0 border-end-0 py-2 px-5">
            <h1 class="fs-3">Andre</h1>
            <div class="status bg-success rounded-circle col-1" style="width: 20px; height: 20px;"></div>
        </div>
    </div>
</div>

@endsection
