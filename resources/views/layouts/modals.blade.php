<div class="modal" id="modal_large">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
            </div>
        </div>
    </div>
</div>

<div class="modal" id="modal_small">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
            </div>
        </div>
    </div>
</div>

<div class="modal" id="menuModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                SMPLE
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="userModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                Profile <br>
                <a href="#" class="text-decoration-none text-dark" onclick="document.getElementById('logout').submit()">
                    Logout
                </a>
                <form action="{{ route('logout') }}" class="hidden" id="logout" method="POST">@csrf</form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="alertModal">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="text-center">
                    <i data-feather="check-circle"></i>
                </div>
                <div class="mt-2 text-center" id="content">
                </div>
            </div>
            <button class="btn btn-dark w-100" data-bs-dismiss="modal">Close</button>
        </div>
    </div>
</div>