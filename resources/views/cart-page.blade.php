@extends('layouts.base')

@section('main-contents')
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-lg-8 col-md-8 col-sm-12 col-12 mx-auto">
                <div class="row">
                    <div class="col-12 pb-3 border-bottom">
                        <span class="fs-3 fw-bold">My Cart</span>
                    </div>
                </div>
                <div class="row">
                    @foreach ($items as $item)
                        <div class="col-12 mt-3">
                            <div>
                                <small>{{ $item->name }}</small>
                            </div>
                        </div>
                        <div class="col-12 border-bottom pb-3">
                            <div class="row">
                                <div class="col-2">
                                    <img src="{{ asset('storage/images/'.$item->attributes[0]['image']) }}" alt="" class="img-fluid">
                                </div>
                                <div class="col-10 text-end my-auto">
                                    &#8369;{{ number_format($item->price) }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection