@push("css")
    <link rel="stylesheet" href="{{ asset('css/tinymce.css') }}">
@endpush
<div>
    <div class="card card-preview">
        <div class="card-inner">

             <div class="preview-block">
                <span class="preview-title-lg overline-title">Tambah Program Donasi</span>
                <form >
                <div class="row gy-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="default-01">Judul Program</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" wire:model="title" >
                                @error('title') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="fw-nationality">Kategori</label>
                            <div class="form-control-wrap ">
                                <div class="form-control-select">
                                    <select class="form-control"  wire:model="category_id" >
                                        <option value="">Pilih Kategori</option>
                                        @foreach ($categories as $item)
                                            <option value="{{$item->id}}"">{{$item->category}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('category_id') <span class="error  text-danger">{{ $message }}</span> @enderror

                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group" >
                            <label class="form-label" for="mce_0">Deskripsi</label>
                            <div wire:ignore>
                                <textarea   class="tinymce-basic form-control" id="mce_0"  aria-hidden="true" wire:model="description"></textarea>

                            </div>
                            @error('description') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>

                    </div>
                    <div class="col-12">
                        @if ($pictures != null)
                        <b>Photo Preview:</b>
                        <br>
                        <div class="row">
                            @foreach ($pictures as $item)
                            <div class="col-md-3">
                                <img style="max-height: 200px;object-fit:cover" class="w-100 mt-1" src="{{ $item->temporaryUrl() }}" alt="">
                            </div>
                            @endforeach
                        </div>
                        <button type="button" wire:click="cancel()" class="btn mt-1 btn-danger btn-block">
                           <i class="ni ni-trash icon mr-1"></i> Batalkan Gambar
                        </button>

                        @else
                            <div class="form-group">
                                <label class="form-label" for="customFileLabel">Gambar</label>
                                <div class="form-control-wrap">
                                    <div class="custom-file">

                                        <input  type="file" class="custom-file-input" wire:model="pictures" multiple  accept="image/x-png,image/jpeg,image/jpg" >
                                        <small>Pilih Beberapa file jika dibutuhkan</small>
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                        @error('picture.*') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                        @endif

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="default-01">Target Uang</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" type-currency="IDR" wire:model="target_amount" >
                                @error('target_amount') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div  class="form-group"><label class="form-label">Target Tanggal</label><div class="form-control-wrap" ><input type="text" wire:model="target_date" class="form-control date-picker-alt" data-date-format="yyyy-mm-dd">   @error('target_date') <span class="error">{{ $message }}</span> @enderror</div></div>
                    </div>


                    <div class="col-12">
                        <button class="btn btn-primary btn-block" id="save-data">
                            <i class="ni ni-save mr-1"></i> Simpan
                        </button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@push("scripts")
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="{{url('js/donation.js')}}"></script>
<script>
    document.addEventListener('livewire:load', function () {
        // Get the value of the "count" property
        $('form').on("submit", function(e){
            e.preventDefault()
            $("#save-data").attr("disabled",true)
            @this.target_date = $(".date-picker-alt").data('datepicker').getFormattedDate('yyyy-mm-dd');
            @this.description=tinyMCE.activeEditor.getContent();
            console.log(@this.description)
            @this.save()
        });
    })

</script>
<script>
    document.querySelectorAll('input[type-currency="IDR"]').forEach((element) => {
        element.addEventListener('keyup', function(e) {
        let cursorPostion = this.selectionStart;
          let value = parseInt(this.value.replace(/[^,\d]/g, ''));
          let originalLenght = this.value.length;
          if (isNaN(value)) {
            this.value = "";
          } else {
            this.value = value.toLocaleString('id-ID', {
              currency: 'IDR',
              style: 'decimal',
              minimumFractionDigits: 0
            });
            cursorPostion = this.value.length - originalLenght + cursorPostion;
            this.setSelectionRange(cursorPostion, cursorPostion);
          }
        });
      });
</script>
@endpush
