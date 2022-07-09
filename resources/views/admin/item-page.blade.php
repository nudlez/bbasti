@extends('admin.layout')

@section('contents')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 border-bottom">
                <span class="fs-1 fw-bold">Items</span>
            </div>
            <div class="col-12 mt-3">
                <table class="table table-striped table-borderless">
                    <thead class="bg-dark text-light">
                        <tr>
                            <th scope="col">Item ID</th>
                            <th scope="col">Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <td>ITM{{ str_pad($item->id, 4, '0', STR_PAD_LEFT) }}</td>
                                <td>
                                    <a href="{{ route('admin.item', $item->id) }}">{{ $item->name }}</a>
                                </td>
                            </tr>
                        @endforeach 
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection