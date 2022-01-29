<div class="card">

    <div class="card-inner card-inner-lg">
        <div class="nk-block-head">
            <div class="nk-block-head-content">
                <h4 class="nk-block-title">Masuk</h4>
                <div class="nk-block-des">
                    <p>Login untuk melakukan donasi</p>
                </div>
            </div>
        </div>
        <form  data-turbolinks="false"  wire:submit.prevent="login">
            <div class="form-group">
                <div class="form-label-group">
                    <label class="form-label" for="default-01">Email</label>
                </div>
                <input type="text" wire:model="email" class="form-control form-control-lg" id="default-01" placeholder="Masukkan Email">
                @error('email') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <div class="form-label-group">
                    <label class="form-label" for="password">Password</label>
                    <a class="link link-primary link-sm" href="#"  data-toggle="modal" data-target="#modalForm">Forgot Code?</a>
                </div>
                <div class="form-control-wrap">
                    <a href="#" class="form-icon form-icon-right passcode-switch" data-target="password">
                        <em class="passcode-icon icon-show icon ni ni-eye"></em>
                        <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                    </a>
                    <input wire:model="password" type="password" class="form-control form-control-lg" id="password" placeholder="Masukkan Password">
                    @error('password') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div wire:ignore.self class="alert alert-success d-none" id="statusforget">
                Email berhasil terkirim harap cek email anda
            </div>
            <div class="form-group">
                <button class="btn btn-lg btn-primary btn-block">Masuk</button>
            </div>
        </form>
        <div class="form-note-s2 text-center pt-4"> Tidak punya akun ? <a href="/register">Buat Akun</a>
        </div>

    </div>
    <div class="modal fade"  id="modalForm" wire:ignore.self>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Lupa Password</h5>
                    <a href="#" id="modalclose" class="close" data-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>
                <div class="modal-body">
                    <form id="forgetForm" wire:submit.prevent="sendEmail" >
                        <div class="form-group">
                            <label class="form-label" for="full-name" >Email</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="full-name" wire:model="forgetEmail">
                                @error('forgetEmail') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-lg btn-primary">Kirim Email</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

@push("script")
<script>
Livewire.on('resultSend', () => {

    $("#modalForm").modal("hide")
    $(document.body).removeClass("modal-open");
     $(".modal-backdrop").remove();
     $("#modalForm").modal("hide")
    $("#statusforget").removeClass("d-none")
});
Livewire.on('loginSuccess', () => {

location.reload();
});
</script>

@endpush
