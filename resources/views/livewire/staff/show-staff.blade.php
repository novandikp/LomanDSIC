<div>
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Staff</h3>
            </div><!-- .nk-block-head-content -->
            <a href="{{url('admin/staff/add')}}" class="btn btn-primary pull-right mb-1">
                <i class="ni ni-plus-circle mr-1"></i>
                Tambah
            </a>
        </div><!-- .nk-block-between -->
    </div><!-- .nk-block-head -->
    <div class="nk-block">
        <div class="row g-gs">

            <div class="col-xxl-12">

                <div class="card  my-1">
                    <input type="text"  class="form-control mb-1" placeholder="Search" wire:model="searchTerm" />

                    @if($users->count() == 0 && $searchTerm == '')
                        <div class="alert alert-fill alert-danger alert-icon"><em class="icon ni ni-cross-circle"></em> <strong>Data Kosong</strong>!<br> Tambahkan data baru.</div>
                    @elseif($users->count() == 0)
                        <div class="alert alert-fill alert-danger alert-icon"><em class="icon ni ni-cross-circle"></em> <strong>Data tidak ditemukan</strong>!<br> Tidak ada data dengan kata kunci <br> <strong>{{$searchTerm}}</strong>.</div>
                    @else

                        <div class="table-responsive">
                            <table class="table">
                                <thead class="bg-blue text-white">
                                    <tr>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($users as $row => $user)
                                    <tr class="py-1">
                                         <td>{{$user->name}}</td>
                                         <td>{{$user->email}}</td>
                                        <td>
                                        <div class="d-flex">
                                            <button wire:click="deleteId({{$user->id}})"  class="btn btn-danger delete-users text-white  mr-1">
                                                <i class="ni ni-trash mr-1"></i>
                                                Hapus
                                            </button>
                                            <a href="{{url('admin/staff/edit/'.$user->id)}}" class="btn btn-primary text-white">
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
                            {{ $users->links() }}
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
        $('.delete-users').on("click", function(e){
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
