<div class="card">

    <div class="card-inner card-inner-lg">
        <div class="nk-block-head">
            <div class="nk-block-head-content">
                <h4 class="nk-block-title">Lupa Password</h4>
                <div class="nk-block-des">
                    <p>Ganti Password baru</p>
                </div>
            </div>
        </div>
        <form wire:submit.prevent="save">

            <div class="form-group">
                <div class="form-label-group">
                    <label class="form-label" for="password">Password</label>

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

            <div class="form-group">
                <div class="form-label-group">
                    <label class="form-label" for="password-confirm">Confirm Password</label>

                </div>
                <div class="form-control-wrap">
                    <a href="#" class="form-icon form-icon-right passcode-switch" data-target="password-confirm">
                        <em class="passcode-icon icon-show icon ni ni-eye"></em>
                        <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                    </a>
                    <input wire:model="password_confirmation" type="password" class="form-control form-control-lg" id="password-confirm" placeholder="Masukkan Password">
                    @error('password_confirmation') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="form-group">
                <button class="btn btn-lg btn-primary btn-block">Lupa Password</button>
            </div>
        </form>


    </div>

</div>

