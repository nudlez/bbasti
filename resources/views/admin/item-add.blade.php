@extends('admin.layout')

@section('head')
    <script src="{{ asset('js/ckeditor/build/ckeditor.js') }}"></script>
@endsection

@section('contents')
    @if ($errors)
        @foreach ($errors->all() as $error)
            {{ $error }}
        @endforeach        
    @endif
    <div class="row">
        <div class="col-12 border-bottom">
            <span class="fs-1 fw-bold">Add Item</span>
        </div>
        <div class="col-8 mx-auto mt-5">
            <form action="{{ route('admin.item-add') }}" class="row" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-12 mb-3">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Item Name">
                </div>
                <div class="col-6 mb-3">
                    <input type="number" class="form-control" name="price" placeholder="Price">
                </div>
                <div class="col-6 mb-3">
                    <input type="number" class="form-control" name="disc_price" placeholder="Discounted Price">
                </div>
                <div class="col-12 mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description"></textarea>
                </div>
                <div class="col-6 mb-3">
                    <label for="main_img" class="form-label">Main Image</label><br>
                    <input type="file" class="custom-file-input mt-3" id="main_img" name="main_img">
                </div>
                <div class="col-6">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" id="status" class="form-select">
                        <option value="avail">Available</option>
                        <option value="sold">Sold</option>
                        <option value="reserv">Reserved</option>
                    </select>
                </div>
                <div class="col-12 text-end">
                    <button class="btn btn-outline-dark" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        ClassicEditor.create(document.querySelector('#description'));
    </script>
@endsection