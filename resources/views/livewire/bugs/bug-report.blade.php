<div>
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between g-3">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Laporan Bugs</h3>

            </div><!-- .nk-block-head-content -->

        </div><!-- .nk-block-between -->
    </div><!-- .nk-block-head -->
    <div class="nk-block">
        <input type="text"  class="form-control mb-1" placeholder="Search" wire:model="searchTerm" />

        <div class="card card-stretch">
            <div class="card-inner-group py-1">

                    @if($bugs->count() == 0 && $searchTerm == '')
                        <div class="alert alert-fill alert-danger alert-icon"><em class="icon ni ni-cross-circle"></em> <strong>Data Kosong</strong>!<br> Tambahkan data baru.</div>
                    @elseif($bugs->count() == 0)
                        <div class="alert alert-fill alert-danger alert-icon"><em class="icon ni ni-cross-circle"></em> <strong>Data tidak ditemukan</strong>!<br> Tidak ada data dengan kata kunci <br> <strong>{{$searchTerm}}</strong>.</div>
                    @else

                        @foreach ($bugs as $item)
                        <div class="card-inner card-inner-md">
                            <div class="user-card">

                                <div class="user-info">
                                    <span class="lead-text">{{$item->title}}</span>
                                    @if($item->status == 0)
                                    <span class="badge badge-dot  badge-warning ml-1">Pending</span>
                                    @else
                                    <span class="badge badge-dot  badge-success ml-1">Completed</span>
                                    @endif
                                    <span class="sub-text">{{$item->users->email}}</span>
                                    <span class="sub-text">{{$item->created_at->diffForHumans()}}</span>
                                </div>
                                <div class="user-action">
                                    <div class="drodown">
                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger mr-n1" data-toggle="dropdown" aria-expanded="false"><em class="icon ni ni-more-h"></em></a>
                                        <div class="dropdown-menu dropdown-menu-right" style="">
                                            <ul class="link-list-opt no-bdr">
                                                <li><a href="{{url('admin/bugs/'.$item->id)}}"><em class="icon ni ni-note-add-fill"></em><span>Lihat Detail</span></a></li>
                                                @if($item->status == 0)
                                                <li><a href="#" wire:click="setId({{$item->id}})"  class="update-status"><em class="icon ni ni-property-add"></em><span>Tandai telah diselesaikan</span></a></li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="w-100 align-items center my-1">
                            {{($bugs->links()) }}
                        </div>

                    @endif
            </div><!-- .card-inner-group -->
        </div><!-- .card -->
    </div><!-- .nk-block -->
</div>
@push('scripts')
<script>
    document.addEventListener('livewire:load', function () {
        // Get the value of the "count" property
        $('.update-status').on("click", function(e){
        Swal.fire({
                title: 'Apakah anda yakin ?',
                text: "Merubah status bug menjadi telah diselesaikan",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ubah'
            }).then((result) => {
                if (result.value) {
                    @this.updateStatus()
                    Swal.fire(
                        'Sukses!',
                        'Data telah diubah.',
                        'success'
                    )
                }
            });
            e.preventDefault();
        });
    })

</script>
@endpush
