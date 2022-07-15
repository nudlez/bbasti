@extends('layouts.base')

@section('main-contents')
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-lg-6 col-md-6 col-sm-12 col-12 mx-auto">
                <div class="row">
                    <div class="col-12 pb-3 border-bottom">
                        <span class="fs-3 fw-bold">My Cart</span>
                    </div>
                </div>
                <div class="row">
                    @if (count($items) == 0)
                        <div class="col-12 mt-3">
                            You do not have items on your cart yet.
                        </div>
                    @else
                        @foreach ($items as $item)
                            <div class="col-12 mt-3">
                                <div>
                                    <small class="fw-bold">{{ $item->name }}</small>
                                </div>
                            </div>
                            <div class="col-12 border-bottom pb-3 mt-1">
                                <div class="d-flex">
                                    <a href="{{ route('item-page', $item->id) }}" class="me-auto">
                                        <img src="{{ asset('storage/images/'.$item->attributes[0]['image']) }}" alt="">
                                    </a>
                                    <div class="ms-auto my-auto">
                                        &#8369;{{ number_format($item->price) }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-12 mt-3">
                            <div class="d-flex">
                                <div class="me-auto">
                                    <span class="fs-5">Total</span>
                                </div>
                                <div class="ms-auto">
                                    <span class="fs-5">&#8369;{{ number_format($total) }}</span>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="mb-5 pb-5"></div>
        </div>
    </div>
@endsection