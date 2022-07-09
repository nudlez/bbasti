@extends('layouts.base')

@section('main-contents')
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12 col-12 mx-auto">
                <div class="row row-cols-lg-2 row-cols-md-2 row-cols-sm-1 row-cols-1">
                    <div class="col">
                        <img class="img-fluid" src="{{asset('storage/images/'.$item->main_img)}}" alt="{{$item->name}}">
                    </div>
                    <div class="col mt-3">
                        <div>
                            <span class="item-title fw-bold">{{ $item->name }}</span>
                            <br>
                            <span class="fw-light item-price" style="color:rgba(0,0,0,0.5)">
                                <s><i>&#8369;{{number_format($item->price)}}</i></s>
                            </span>
                            &nbsp;-&nbsp;
                            <span class="item-price text-danger">
                                &#8369;{{number_format($item->disc_price)}}
                            </span>
                        </div>
                        <div class="my-3 py-3 border-top border-bottom">
                            {!! $item->description !!}
                        </div>
                        <div class="mt-3">
                            <a href="{{ route('cart.add', Crypt::encrypt($item->id)) }}" class="btn btn-outline-dark" type="button">Add to cart</a>
                            <button class="btn btn-outline-dark">Buy now</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection