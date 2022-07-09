@extends('admin.layout')

@section('head')
    <script src="{{ asset('js/ckeditor/build/ckeditor.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
@endsection

@section('contents')
    @if ($errors)
        @foreach ($errors->all() as $error)
            {{ $error }}
        @endforeach        
    @endif
    <div class="row">
        <div class="col-12 border-bottom">
            <div class="d-flex">
                <div>
                    <span class="fs-1 fw-bold">Item ITM{{ str_pad($item->id, 4, '0', STR_PAD_LEFT) }}</span>
                </div>
                <div class="ms-auto my-auto">
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delModal">
                        <i data-feather="trash-2"></i>
                        <span class="my-auto">Delete</span>
                    </button>
                </div>
            </div>
        </div>
        <div class="col-12 mt-3">
            <form action="{{ route('admin.item-edit', $item->id) }}" class="row" method="POST">
                @csrf
                <div class="col-12 mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $item->name }}">
                </div>
                <div class="col-2 mb-3">
                    <label for="price" class="form-label">Price</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">&#8369;</span>
                        </div>
                        <input type="text" class="form-control" name="price" value="{{ $item->price }}">
                    </div>
                </div>
                <div class="col-2">
                    <label for="disc-price" class="form-label">Discount Price</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">&#8369;</span>
                        </div>
                        <input type="text" class="form-control" name="disc_price" value="{{ $item->disc_price }}">
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description">
                        {{$item->description}}
                    </textarea>
                </div>
                <div class="col-3 mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="avail" {{ ($item->status == 'avail') ? 'selected' : '' }}>Available</option>
                        <option value="sold" {{ ($item->status == 'sold') ? 'selected' : '' }}>Sold</option>
                        <option value="reserv" {{ ($item->status == 'reserv') ? 'selected' : '' }}>Reserved</option>
                    </select>
                </div>
                <div class="col-12 mb-3">
                    Images <br>
                    <div class="row row-cols-2">
                        <div class="col">
                            Primary: <br>
                            <img src="{{ asset('storage/images/'. $item->main_img) }}" alt="{{ $item->name }}" class="img-fluid" style="height:300px"><br>
                            <button type="button" class="btn btn-outline-dark mt-2" data-bs-toggle="modal" data-bs-target="#imgModal">Change</button>
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-3 border-top">
                    <div class="row row-cols-2">
                        <div class="col">
                            <a href="{{ url()->previous() }}" class="btn btn-dark mt-3" type="button">
                                <i data-feather="arrow-left"></i>
                                Back
                            </a>
                        </div>
                        <div class="col text-end">
                            <button type="submit" class="btn btn-outline-dark mt-3">
                                <i data-feather="save"></i>
                                Save Changes
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-12 my-5"><!-- spacer --></div>
    </div>
@endsection

@section('modals')
    <div class="modal" id="imgModal">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="{{ route('admin.change-img', $item->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="main_img" class="form-label">Choose Image File</label><br>
                            <input type="file" class="custom-file-input mt-3" id="main_img" name="main_img">
                        </div>
                        <div>
                            <button type="submit" class="btn btn-outline-dark">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="delModal">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    Do you really want to delete this item? <br><br>
                    <a class="btn btn-danger" href="{{ route('admin.item-delete', $item->id) }}">Yes</a>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a class="btn btn-success" data-bs-dismiss="modal" href="#">No</a>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script>
        ClassicEditor.create(document.querySelector('#description'));
    </script>
    <script>
        feather.replace();
    </script>
@endsection