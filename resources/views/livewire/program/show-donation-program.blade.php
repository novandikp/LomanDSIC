<div>
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between g-3">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Program Donasi</h3>

            </div><!-- .nk-block-head-content -->
            <div class="nk-block-head-content">
                <ul class="nk-block-tools g-3">
                    <li>
                        <a href="{{url("admin/program/add")}}" class="btn btn-icon btn-primary"><em class="icon ni ni-plus"></em></a>
                    </li>
                </ul>
            </div><!-- .nk-block-head-content -->
        </div><!-- .nk-block-between -->
    </div><!-- .nk-block-head -->
    <div class="nk-block">
        <input type="text"  class="form-control mb-1" placeholder="Search" wire:model="searchTerm" />

        <div class="card card-stretch">
            <div class="card-inner-group">

                    @if($program->count() == 0 && $searchTerm == '')
                        <div class="alert alert-fill alert-danger alert-icon"><em class="icon ni ni-cross-circle"></em> <strong>Data Kosong</strong>!<br> Tambahkan data baru.</div>
                    @elseif($program->count() == 0)
                        <div class="alert alert-fill alert-danger alert-icon"><em class="icon ni ni-cross-circle"></em> <strong>Data tidak ditemukan</strong>!<br> Tidak ada data dengan kata kunci <br> <strong>{{$searchTerm}}</strong>.</div>
                    @else
                        <div class="card-inner p-0">
                            <table class="table table-tranx">
                                <thead>
                                    <tr class="tb-tnx-head bg-blue text-white">

                                        <th class="tb-tnx-info">
                                            <span class="tb-tnx-desc text-white d-none d-sm-inline-block">
                                                <span>Judul</span>
                                            </span>
                                            <span class="tb-tnx-date text-white d-md-inline-block d-none">
                                                <span class="d-none d-md-block">
                                                    <span>Tanggal Target</span>
                                                    <span>Target Uang</span>
                                                </span>
                                            </span>
                                        </th>
                                        <th class="tb-tnx-amount is-alt">
                                            <span class="tb-tnx-total text-white d-none d-md-inline-block">Saldo</span>
                                            <span class="tb-tnx-status d-none d-md-inline-block text-white">Status</span>
                                        </th>
                                        <th class="tb-tnx-action">
                                            <span>&nbsp;</span>
                                        </th>
                                    </tr><!-- tb-tnx-item -->
                                </thead>
                                <tbody>
                                    @foreach ($program as $item)
                                    <tr class="tb-tnx-item">

                                        <td class="tb-tnx-info">
                                            <div class="tb-tnx-desc">
                                                <span class="title">{{$item->title}}</span>
                                            </div>
                                            <div class="tb-tnx-date">
                                                <span class="date">
                                                    {{$item->target_date}}
                                                    <span class="font-weight-bold d-block d-md-none">
                                                        {{$item->target_amount}}
                                                    </span>
                                                </span>
                                                <span class="date d-none d-md-inline">Rp.{{number_format($item->target_amount,0,', env','.')}}</span>
                                            </div>
                                        </td>
                                        <td class="tb-tnx-amount is-alt">
                                            <div class="tb-tnx-total">
                                                <span class="amount d-none d-md-block">Rp.{{number_format($item->total_amount,0,', env','.')}}</span>
                                            </div>
                                            <div class="tb-tnx-status">
                                                @if($item->total_amount == $item->target_amount)
                                                <span class="badge badge-dot badge-success d-none d-md-inline">Complete</span>
                                                @else
                                                <span class="badge badge-dot badge-warning d-none d-md-inline">Due</span>
                                                @endif

                                            </div>
                                        </td>
                                        <td class="tb-tnx-action">
                                            <div class="dropdown">
                                                <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                                    <ul class="link-list-plain">
                                                        <li><a href="#">View</a></li>
                                                        <li><a href="#">Edit</a></li>
                                                        <li><a class="delete-programs" wire:click="deleteId({{$item->id}})" href="#">Remove</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                    </tr><!-- tb-tnx-item -->


                                    @endforeach

                                </tbody>
                            </table>
                        </div><!-- .card-inner -->

                        <div class="w-100 align-items center my-2">
                            {{ $program->links() }}
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
        $('.delete-programs').on("click", function(e){
        e.preventDefault();
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
