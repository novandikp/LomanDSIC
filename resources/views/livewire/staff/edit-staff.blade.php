<div>
    <div class="card card-preview">
        <div class="card-inner">
            <div class="preview-block">
                <span class="preview-title-lg overline-title">Edits Staff</span>
                <form  wire:submit.prevent="save">
                <div class="row gy-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="default-01">Email</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" wire:model="email" >
                                @error('email') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="default-01">Nama</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" wire:model="name" >
                                @error('name') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="default-01">Password</label>
                            <div class="form-control-wrap">
                                <input type="password" class="form-control" wire:model="password" >
                                @error('password') <span class="error">{{ $message }}</span> @enderror
                                <small>*) Kosongi jika tidak ada perubahan</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="default-01">No HP</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" wire:model="nohp" >
                                @error('nohp') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary btn-block">
                            <i class="ni ni-save mr-1"></i> Simpan
                        </button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
