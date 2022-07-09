@extends('admin.layout')

@section('contents')
    <div class="row">
        <div class="col-12 border-bottom">
            <span class="fs-1 fw-bold">
                {{ $user->name }}
            </span>
        </div>
        <div class="col-8 mt-3">
            <div class="mb-3">
                UID: U{{ str_pad($user->id, 4, '0', STR_PAD_LEFT) }}
            </div>
            <div class="mb-3">
                Email: <br>
                {{ $user->email }}
            </div>
            <div class="mb-3">
                Address: <br>
                {{ $user->address }}
            </div>
            <div class="mb-3">
                Number: <br>
                {{ $user->number }}
            </div>
            <div class="mb-3">
                Joined: <br>
                {{ date('F d, Y', strtotime($user->created_at)) }}
            </div>
        </div>
    </div>
@endsection