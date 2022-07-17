<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>bbasti</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    @yield('head')
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
</head>
<body>
    <x-mobile-menu />
    <div class="toast" id="alertToast" style="position:fixed;top:0;right:0;z-index:99999">
        <div class="toast-body"></div>
    </div>
    <div class="container-fluid">
        <div class="row  border-bottom">
            <div class="col-12">
                <div class="row g-0">
                    <div class="col-lg-8 col-md-12 col-sm-12 col-12 mx-auto">
                        <div class="row">
                            <a href="#" class="col-sm-2 col-2 d-md-none border-end d-sm-block text-white text-decoration-none bg-dark" data-bs-toggle="modal" data-bs-target="#menuModal">
                                <div class="w-100 h-100 d-flex">
                                    <div class="m-auto">
                                        <i data-feather="menu"></i>
                                    </div>
                                </div>
                            </a>
                            <div class="col-lg-4 col-md-4 col-sm-8 col-8 logo">
                                <a href="{{ route('home') }}" class="fs-1 fw-bold text-decoration-none text-dark">bbasti</a>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-12 col-12 my-auto d-none d-md-block">
                                <nav class="d-flex flex-row justify-content-between">
                                    <div>mens</div>
                                    <div>womens</div>
                                    <div>kids</div>
                                    <div>
                                        @if (!Auth::user())
                                            <a href="{{ route('login') }}">login</a>
                                            
                                        @else
                                            <div class="dropdown-center">
                                                <a href="#" class="text-decoration-none text-dark dropdown-toggle" role="button" id="userDropDown" data-bs-toggle="dropdown">
                                                    {{ Auth::user()->name }}
                                                </a>
                                                <ul class="dropdown-menu p-2" aria-labelledby="userDropDown">
                                                    <li class="py-2"><a href="{{ route('user.home') }}">Profile</a></li>
                                                    <li class="py-2"><a href="{{ route('cart.get') }}">My Shopping Bag</a></li>
                                                    <li class="py-2">
                                                        <a href="#" onclick="document.getElementById('logout').submit()">Logout</a>
                                                        <form action="{{ route('logout') }}" class="hidden" id="logout" method="POST">@csrf</form>
                                                    </li>
                                                </ul>
                                            </div>
                                        @endif
                                    </div>
                                </nav>
                            </div>
                            <div class="col-sm-2 col-2 d-md-none d-sm-block border-start">
                                <a href="{{ route('cart.get') }}" class="w-100 h-100 d-flex text-center text-dark">
                                    <div class="m-auto">
                                        <i data-feather="shopping-bag"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @yield('main-contents')
    @include('layouts.modals')
    <script src="{{asset('css/bs/dist/js/bootstrap.bundle.js')}}"></script>
    <script src="{{asset('js/inc.js')}}"></script>
    <script>
        feather.replace()
    </script>
    @if (Session::has('alert'))
        <script>
            alertContent.innerHTML = "{{ Session::get('alert') }}";
            alert.show();
        </script>
    @endif

    @if (Session::has('cart-alert'))
        <script>
            alertModalContent.innerHTML = "{{ Session::get('cart-alert') }}";
            alertModal.show();
        </script>
    @endif

    @yield('scripts')
</body>
</html>