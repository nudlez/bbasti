<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>bbasti Admin</title>
    <link rel="stylesheet" href="{{ asset('css/admin-style.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="row mt-5 pt-5">
            <div class="col-4 mx-auto border p-2">
                @if (session()->has('alert'))
                    <div class="alert alert-danger">
                        <small><i data-feather="alert-circle"></i> {{ session()->get('alert') }}</small>
                    </div>
                @endif
                <form action="{{ route('admin.login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <input type="text" class="form-control" name="email" placeholder="Email or Mobile Number">
                        @if ($errors->has('email'))
                            <small class="text-danger">{{ $errors->first('email') }}</small>
                        @endif
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                        @if ($errors->has('password'))
                            <small class="text-danger">{{ $errors->first('password') }}</small>
                        @endif
                    </div>
                    <div>
                        <button class="btn btn-outline-dark" type="submit">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        feather.replace();
    </script>
</body>
</html>