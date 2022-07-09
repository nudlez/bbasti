<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>bbasti - Admin</title>
    <link rel="stylesheet" href="{{ asset('css/admin-style.css') }}">
    @yield('head')
</head>
<body>
    <div class="toast" id="alert" style="position:fixed;top:0;right:0;z-index:1049">
        <div class="toast-body"></div>
    </div>
    </div>
    <div class="container-fluid" style="height:100vh;">
        <div class="row h-100">
            <div class="col-2 border-end">
                <div class="row row-cols-1">
                    <div class="col border-bottom text-center">
                        <span class="fs-1 fw-bold">bbasti</span>
                    </div>
                    <div class="col mt-3">
                        <a href="#" class="text-decoration-none" data-bs-toggle="collapse" data-bs-target="#itemCollapse">ITEMS</a>
                        <div class="collapse mt-2 {{ (str_contains(Route::current()->getName(), 'item')) ? 'show' : ''}}" id="itemCollapse">
                            <a class="text-decoration-none" href="{{ route('admin.items') }}">All Items</a> <br>
                            <a class="text-decoration-none" href="{{ route('admin.item-add') }}">Add Item</a>
                        </div>
                    </div>
                    <div class="col mt-3">
                        <a href="#" class="text-decoration-none" data-bs-toggle="collapse" data-bs-target="#userCollapse">USERS</a>
                        <div class="collapse mt-2 {{ ( str_contains(Route::current()->getName(), 'user') ) ? 'show' : '' }}" id="userCollapse">
                            <a href="{{ route('admin.users') }}" class="text-decoration-none">All Users</a> <br>
                            <a href="#" class="text-decoration-none">Add User</a>
                        </div>

                    </div>
                    <div class="col mt-5">
                        <a href="#" class="text-decoration-none" data-bs-toggle="collapse" data-bs-target="#adminCollapse">
                            {{ Auth::guard('admin')->user()->lname }}, {{ Auth::guard('admin')->user()->fname }}
                        </a>
                        <div class="collapse mt-2" id="adminCollapse">
                            <a href="#" class="text-decoration-none">Profile</a><br>
                            <a href="#" class="text-decoration-none" onclick="document.getElementById('logoutForm').submit()">Logout</a>
                            <form action="{{ route('admin.logout') }}" class="hidden" id="logoutForm" method="post">
                                @csrf
                            </form>
                        </div>
                    </div>  
                </div>
            </div>
            <div class="col-10">
                @yield('contents')
            </div>
        </div>
    </div>

    @yield('modals')

    <script src="{{ asset('css/bs/dist/js/bootstrap.js') }}"></script>
    <script>
        var alertToast = new bootstrap.Toast(document.querySelector('#alert'));
        var alertToastBody = document.querySelector('.toast .toast-body');
    </script>
    @if (Session::has('alert'))
        <script>
            alertToastBody.innerHTML = "{{ Session::get('alert') }}";
            alertToast.show();
        </script>
    @endif
    @yield('scripts')
</body>
</html>