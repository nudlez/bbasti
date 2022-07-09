@extends('admin.layout')

@section('contents')
    <div class="row">
        <div class="col-12 border-bottom">
            <span class="fs-1 fw-bold">Users</span>
        </div>
        <div class="col-8">
            <table class="table table-striped table-borderless">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Name</td>
                        <td>&nbsp;</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>U{{ str_pad($user->id, 4, '0', STR_PAD_LEFT) }}</td>
                            <td>{{ $user->name }}</td>
                            <td>
                                <a href="{{ route('admin.user', $user->id) }}">view</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection