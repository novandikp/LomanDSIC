<div class="card card-bordered">
    <div class="card-aside-wrap">
        <div class="card-inner card-inner-lg">
            <div class="nk-block-head nk-block-head-lg">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <h4 class="nk-block-title">Data Profil</h4>

                    </div>

                </div>
            </div><!-- .nk-block-head -->
            <div class="nk-block">
                <div class="nk-data data-list">
                    <div class="data-head">
                        <h6 class="overline-title">Data</h6>
                    </div>
                    <form wire:submit.prevent="validatedData">
                    <div class="row">

                        <div class="col-12">
                            <div class="form-group mt-2">
                                <label class="form-label" for="default-01">Nama</label>
                                <div class="form-control-wrap">
                                    <input value="{{$user->name}}" type="text" class="form-control" wire:model="name" >
                                    @error('name') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group mt-2">
                                <label class="form-label" for="default-01">No HP</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" wire:model="nohp" >
                                    @error('nohp') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary update-info mt-2"><em class="icon mr-2 ni ni-save"></em> Simpan</button>
                    </form>
                </div><!-- data-list -->
                <div class="nk-data data-list">
                    <div class="data-head">
                        <h6 class="overline-title">Ubah Password</h6>
                    </div>
                    <form  wire:submit.prevent="validatedPass">
                    <div class="form-group">
                        <div class="form-label-group">
                            <label class="form-label" for="password">Password</label>

                        </div>
                        <div class="form-control-wrap">
                            <a href="#" class="form-icon form-icon-right passcode-switch" data-target="password">
                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                            </a>
                            <input wire:model.lazy="password" type="password" class="form-control form-control-lg" id="password" placeholder="Masukkan Password">

                        </div>
                        @error('password') <span class="error text-danger">{{ $message }}</span> @enderror
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
                            <input wire:model.lazy="password_confirmation" type="password" class="form-control form-control-lg" id="password-confirm" placeholder="Masukkan Password">

                        </div>
                        @error('password_confirmation') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <label class="form-label" for="new-password">Password Lama</label>

                        </div>
                        <div class="form-control-wrap">
                            <a href="#" class="form-icon form-icon-right passcode-switch" data-target="old_password">
                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                            </a>
                            <input wire:model.lazy="old_password" type="password" class="form-control form-control-lg" id="old_password" placeholder="Masukkan Password">

                        </div>
                        @error('old_password') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <button class="btn btn-primary update-password"><em class="icon ni ni-save mr-2"></em> Ubah Password</button>
                </form>
                </div><!-- data-list -->
            </div><!-- .nk-block -->
        </div>

    </div><!-- .card-aside-wrap -->
</div>
@push('scripts')
<script>
    document.addEventListener('livewire:load', function () {
        // Get the value of the "count" property
        Livewire.on("confirmed", function(mode){

            if(mode==1){
                Swal.fire({
                title: 'Apakah anda yakin ?',
                text: "Merubah data profil anda",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Konfirmasi'
                }).then((result) => {
                    if (result.value) {
                        @this.save()
                        Swal.fire(
                            'Sukses!',
                            'Data telah diubah.',
                            'success'
                        )
                    }
                });
            }else{
                Swal.fire({
                title: 'Apakah anda yakin ?',
                text: "Merubah password anda",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ubah'
            }).then((result) => {
                if (result.value) {
                    @this.setPassword()
                    Swal.fire(
                        'Sukses!',
                        'Data telah diubah.',
                        'success'
                    )
                }else{
                    e.preventDefault();
                }
            });
            }

        });
    })

</script>
@endpush
