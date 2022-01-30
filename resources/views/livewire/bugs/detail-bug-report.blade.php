<div class="card">
    <div class="card-inner card-inner-xl">
        <article class="entry">
            <h3>{{$report->title}}</h3>
            <div class="entry-meta">
                <span class="entry-meta-item mr-1">
                    <i class="ni ni-calendar"></i>
                    <span>{{$report->created_at->format('d/m/Y')}}</span>
                </span>
                <span class="entry-meta-item">
                    <i class="ni ni-user"></i>
                    <span>{{$report->users->name}}</span>
                </span>
            </div>
            @if($report->status == 0)
            <span class="badge badge-dot  badge-warning ml-1">Pending</span>
            @else
            <span class="badge badge-dot  badge-success ml-1">Completed</span>
            @endif
            <img src="{{$report->photo}}" class="my-2" alt="">
            <small class="font-weight-bold">Deskripsi :</small>
            <div class="description d-block">

                {{$report->description}}
            </div>
            @if($report->status == 0)
            <button  class="btn btn-success mt-2 btn-block update-status">Ubah status Selesai</button>
            @endif
        </article>
    </div>
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
