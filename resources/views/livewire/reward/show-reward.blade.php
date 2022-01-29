<div>
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Reward</h3>
            </div><!-- .nk-block-head-content -->
            <div class="nk-block-head-content">
                <ul class="nk-block-tools g-3">
                    <li>
                        <a href="{{url("admin/rewards/add")}}" class="btn btn-icon btn-primary"><em class="icon ni ni-plus"></em></a>
                    </li>
                </ul>
            </div><!-- .nk-block-head-content -->
        </div><!-- .nk-block-between -->
    </div><!-- .nk-block-head -->
    <div class="nk-block">
        <div class="row g-gs">

            <div class="col-xxl-12">

                <div class="card  my-1">
                    <input type="text"  class="form-control mb-1" placeholder="Search" wire:model="searchTerm" />

                    @if($rewards->count() == 0 && $searchTerm == '')
                        <div class="alert alert-fill alert-danger alert-icon"><em class="icon ni ni-cross-circle"></em> <strong>Data Kosong</strong>!<br> Tambahkan data baru.</div>
                    @elseif($rewards->count() == 0)
                        <div class="alert alert-fill alert-danger alert-icon"><em class="icon ni ni-cross-circle"></em> <strong>Data tidak ditemukan</strong>!<br> Tidak ada data dengan kata kunci <br> <strong>{{$searchTerm}}</strong>.</div>
                    @else

                        <div class="table-responsive">
                            <table class="table">
                                <thead class="bg-blue text-white">
                                    <tr>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Minimal Koin</th>
                                    <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($rewards as $row => $reward)
                                    <tr class="py-1">
                                         <td>{{$reward->reward}}</td>
                                         <td>{{$reward->minimal}} <i class="icon ni ni-coins"></i></td>
                                        <td>
                                        <div class="d-flex">
                                            <button wire:click="deleteId({{$reward->id}})"  class="btn btn-danger delete-rewards text-white  mr-1">
                                                <i class="ni ni-trash mr-1"></i>
                                                Hapus
                                            </button>
                                            <a href="{{url('admin/rewards/edit/'.$reward->id)}}" class="btn btn-primary text-white">
                                                <i class="ni ni-edit  mr-1"></i>
                                                Edit
                                            </a>
                                        </div>
                                        </td>
                                    </tr>
                                    @endforeach


                                </tbody>
                            </table>

                        </div>
                        <div class="w-100 align-items center my-2">
                            {{ $rewards->links() }}
                        </div>

                    @endif
                </div><!-- .card -->
            </div><!-- .col -->

        </div><!-- .row -->
    </div><!-- .nk-block -->
</div>
@push('scripts')
<script>
    document.addEventListener('livewire:load', function () {
        // Get the value of the "count" property
        $('.delete-rewards').on("click", function(e){
        Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    @this.delete()
                    Swal.fire(
                        'Deleted!',
                        'Your data has been deleted.',
                        'success'
                    )
                }
            });
            e.preventDefault();
        });
    })

</script>
@endpush
