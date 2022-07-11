@extends('layouts.base')

@section('main-contents')
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-lg-8 col-md-8 col-sm-12 col-12 mx-auto">
                <div class="row">
                    @foreach ($items as $item)
                        <div class="col-12 mt-3">
                            <div>
                                <small>{{ $item->name }}</small>
                            </div>
                            <div class="d-flex flex-columns py-2 border-bottom">
                                <div style="width:100px">
                                    <img src="{{ asset('storage/images/'.$item->attributes[0]['image']) }}" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection