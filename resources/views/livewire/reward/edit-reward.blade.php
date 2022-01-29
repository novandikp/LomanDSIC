<div>
    <div class="card card-preview">
        <div class="card-inner">
            <div class="preview-block">
                <span class="preview-title-lg overline-title">Edit Reward</span>
                <form  wire:submit.prevent="save">
                <div class="row gy-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="default-01">Nama Judul</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" wire:model="reward" >
                                @error('reward') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="default-01">Minimal Koin</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" wire:model="minimal" >
                                @error('minimal') <span class="error">{{ $message }}</span> @enderror
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
