<div>
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between g-3">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Donatur Terdaftar</h3>

            </div><!-- .nk-block-head-content -->

        </div><!-- .nk-block-between -->
    </div><!-- .nk-block-head -->
    <div class="nk-block">
        <input type="text"  class="form-control mb-1" placeholder="Search" wire:model="searchTerm" />

        <div class="card card-stretch">
            <div class="card-inner-group py-1">

                    @if($users->count() == 0 && $searchTerm == '')
                        <div class="alert alert-fill alert-danger alert-icon"><em class="icon ni ni-cross-circle"></em> <strong>Data Kosong</strong>!<br> Tambahkan data baru.</div>
                    @elseif($users->count() == 0)
                        <div class="alert alert-fill alert-danger alert-icon"><em class="icon ni ni-cross-circle"></em> <strong>Data tidak ditemukan</strong>!<br> Tidak ada data dengan kata kunci <br> <strong>{{$searchTerm}}</strong>.</div>
                    @else

                        @foreach ($users as $user)
                        <div class="card-inner card-inner-md">
                            <div class="user-card">
                                <div class="user-avatar bg-primary-dim">
                                    <span>{{$user->name[0]}}</span>
                                </div>
                                <div class="user-info">
                                    <span class="lead-text">{{$user->name}}</span>
                                    <span class="sub-text">{{$user->email}}</span>
                                    <span class="sub-text">{{$user->created_at->diffForHumans()}}</span>
                                </div>

                            </div>
                        </div>
                        @endforeach
                        <div class="w-100 align-items center my-1">
                            {{($users->links()) }}
                        </div>

                    @endif
            </div><!-- .card-inner-group -->
        </div><!-- .card -->
    </div><!-- .nk-block -->
</div>
