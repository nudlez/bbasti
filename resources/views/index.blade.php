@extends('layouts.base')

@section('main-contents')
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-12 mx-auto">
                <div class="row row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-2 g-0">   
                    @foreach ($items as $item)
                        <div class="col p-2 text-center">
                            <div class="w-100 h-100 d-flex flex-column">
                                <div>
                                    <a href="{{ route('item-page', $item->id) }}">
                                        <img src="{{ asset('storage/images/'.$item->main_img) }}" class="img-fluid" alt="">
                                    </a>
                                </div>
                                <div class="mt-2">
                                    <span class="fw-light"><i><s>&#8369;{{ number_format($item->price) }}</s></i></span>
                                    -
                                    <span class="fw-bold text-danger">&#8369;{{ number_format($item->disc_price) }}</span>
                                </div>
                                <div class="mt-2">
                                    <button type="button" class="btn btn-sm btn-outline-dark" onclick="addCart('{{Crypt::encrypt($item->id)}}')">Add To Cart</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <x-add_to_cart />
@endsection