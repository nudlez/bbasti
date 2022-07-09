@extends('layouts.base')

@section('main-contents')
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 col-12 p-3 mx-auto login-box">
                <div class="mb-3">
                    <span class="fs-4 fw-bold">Login</span>
                </div>
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <input type="text" class="form-control" name="email" placeholder="Email">
                    </div>
                    <div class="mb-3">  
                        <div class="input-group">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                            <div class="input-group-append">
                                <a href="#" class="text-decoration-none input-group-text text-dark" id="showpass" onclick="showPassword()">show</a>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-outline-dark">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function showPassword(){
            var x = document.getElementById('password');
            if(x.type === "password"){
                x.type = "text";
                document.getElementById('showpass').innerHTML = "hide";
            }else{
                x.type = "password";
                document.getElementById('showpass').innerHTML = "show";
            }
        }
    </script>
@endsection