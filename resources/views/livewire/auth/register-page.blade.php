<div class="card">
    <div class="card-inner card-inner-lg">
        <div class="nk-block-head">
            <div class="nk-block-head-content">
                <h4 class="nk-block-title">Daftar</h4>
                <div class="nk-block-des">
                    <p>Buat akun baru</p>
                </div>
            </div>
        </div>
        <form  wire:submit.prevent="register">
            <div class="row gy-4">
                <div class="col-12">
                    <div class="form-group">
                        <label class="form-label" for="default-01">Email</label>
                        <div class="form-control-wrap">
                            <input
                            @if($auth)
                            readonly
                            @endif
                            type="text" class="form-control" wire:model.lazy="user.email" >
                            @error('user.email') <span class="error">{{ $message }}</span> @enderror

                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label class="form-label" for="default-01">Nama</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" wire:model.lazy="user.name" >
                            @error('user.name') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label class="form-label" for="default-01">Password</label>
                        <div class="form-control-wrap">
                            <input type="password" class="form-control" wire:model.lazy="user.password" >
                            @error('user.password') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label class="form-label" for="default-01">No HP</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" wire:model.lazy="user.nohp" >
                            @error('user.nohp') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary btn-block">
                         Daftar
                    </button>
                </div>
            </div>
            </form>
        <div class="form-note-s2 text-center pt-4"> Sudah punya akun? <a href="{{url('login')}}"><strong>Masuk</strong></a>
        </div>

    </div>
</div>
