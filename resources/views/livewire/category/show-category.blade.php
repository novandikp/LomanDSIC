<div>
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Kategori</h3>
            </div><!-- .nk-block-head-content -->
            <div class="nk-block-head-content">
                <ul class="nk-block-tools g-3">
                    <li>
                        <a href="{{url("admin/categories/add")}}" class="btn btn-icon btn-primary"><em class="icon ni ni-plus"></em></a>
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

                    @if($categories->count() == 0 && $searchTerm == '')
                        <div class="alert alert-fill alert-danger alert-icon"><em class="icon ni ni-cross-circle"></em> <strong>Data Kosong</strong>!<br> Tambahkan data baru.</div>
                    @elseif($categories->count() == 0)
                        <div class="alert alert-fill alert-danger alert-icon"><em class="icon ni ni-cross-circle"></em> <strong>Data tidak ditemukan</strong>!<br> Tidak ada data dengan kata kunci <br> <strong>{{$searchTerm}}</strong>.</div>
                    @else

                        <div class="table-responsive">
                            <table class="table">
                                <thead class="bg-blue text-white">
                                    <tr>
                                    <th scope="col">Ikon</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($categories as $row => $category)
                                    <tr class="py-1">
                                        <td><img src="{{$category->icon}}" alt="" class="img-icon"></td>
                                        <td>{{$category->category}}</td>
                                        <td>
                                        <div class="d-flex">
                                            <button wire:click="deleteId({{$category->id}})"  class="btn btn-danger delete-categories text-white  mr-1">
                                                <i class="ni ni-trash mr-1"></i>
                                                Hapus
                                            </button>
                                            <a href="{{url('admin/categories/edit/'.$category->id)}}" class="btn btn-primary text-white">
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
                            {{ $categories->links() }}
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
        $('.delete-categories').on("click", function(e){
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
