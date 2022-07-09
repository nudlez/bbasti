<div class="container-fluid d-md-none d-sm-inline-block" style="position:fixed;bottom:0;right:0;z-index:99999">
    <div class="row bg-dark py-2 text-white">
        <div class="col text-center">
            <a href="{{ (Route::current()->getName() != 'home') ? url()->previous() : '#' }}" class="text-decoration-none {{ (Route::current()->getName() != 'home') ? 'text-light' : 'text-secondary' }}">
                <i data-feather="arrow-left"></i>
            </a>
        </div>
        <a href="{{ route('home') }}" class="col text-center text-decoration-none text-white">
            <i data-feather="home"></i>
        </a>
        <div class="col text-center">
            @if (!Auth::check())
                <a href="{{ route('login') }}" class="text-decoration-none text-white"><i data-feather="log-in"></i></a>
            @else
                <a href="#" class="text-white" data-bs-toggle="modal" data-bs-target="#userModal"><i data-feather="user"></i></a>
            @endif
        </div>
    </div>
</div>