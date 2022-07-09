@extends('layouts.base')

@section('main-contents')
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-12 mx-auto">
                <span class="fs-5 fw-bold">Hi, {{ Auth::user()->name }}</span>
            </div>
        </div>
    </div>
@endsection