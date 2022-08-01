@extends('layouts.base')

@section('main-contents')
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-lg-6 col-md-6 col-sm-12 col-12 mx-auto">
                <div class="row">
                    <div class="col-12 pb-3 border-bottom">
                        <div class="d-flex">
                            <div class="me-auto">
                                <span class="fs-3 fw-bold">My Cart</span>
                            </div>
                            <div class="ms-auto">
                                <button class="btn btn-sm btn-outline-dark" id="edit-btn">
                                    Edit
                                </button>
                                <button class="btn btn-sm btn-outline-danger" @if (count($items)<= 0)
                                    disabled
                                @endif onclick="test(returnajx)">Clear All</button>
                            </div>
                        </div>
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
                                    <div class="my-auto pe-2 del-button" style="display:none;">
                                        <button type="button" class="btn btn-sm btn-link text-decoration-none text-danger" onclick="confirmRemove({{ $item->id }})">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                                        </button>
                                    </div>
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
                        <div class="col-12 mt-3">
                            <button class="btn btn-dark w-100">
                                Checkout
                            </button>
                        </div>
                    @endif
                </div>
            </div>
            <div class="mb-5 pb-5 spacer"></div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/cart.js') }}"></script>
@endsection