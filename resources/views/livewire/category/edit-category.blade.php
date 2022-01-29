<div>
    <div class="card card-preview">
        <div class="card-inner">
            <div class="preview-block">
                <span class="preview-title-lg overline-title">Edit Kategori</span>
                <form  wire:submit.prevent="save">
                <div class="row gy-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="default-01">Nama Kategori</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" wire:model="category" >
                                @error('category') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        @if ($icon)
                        <div class="d-flex flex-column justify-center align-items-center">
                            Photo Preview:
                            <img   class="img-icon" src="{{ $icon->temporaryUrl() }}">
                        </div>
                        @else
                        <div class="d-flex flex-column justify-center align-items-center">
                            Photo Preview:
                            <img   class="img-icon" src="{{ $categories->icon }}">
                        </div>
                        @endif
                        <div class="form-group">
                            <label class="form-label" for="customFileLabel">Icon</label>
                            <div class="form-control-wrap">
                                <div class="custom-file">

                                    <input  type="file" class="custom-file-input" wire:model="icon"  accept="image/x-png,image/jpeg,image/jpg" >
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                    @error('icon') <span class="error">{{ $message }}</span> @enderror
                                </div>
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
