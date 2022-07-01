<div>
    <div class="container">
        <h1>Memberships</h1>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eos harum quod ab, officia aspernatur id, totam, quam odit eius nobis quos neque porro vero quae reiciendis labore qui commodi fugiat.</p>
        <hr>
        <section class="mt-5">
            <div class="row">
                @foreach ($payments as $item)
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">{{ $item->title }}</div>
                            <div class="card-body">
                                <p>{{ $item->body }}</p>
                                <h6 class="text-danger">
                                    <s>Rp.{{ number_format($item->normal_price) }}</s>
                                </h6>
                                <h3>Rp.{{ number_format($item->price) }}</h3>
                                <button wire:click="pay({{ $item->id }})" class="btn btn-primary">Beli Sekarang</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
    @push('styles')
        <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.clientKey') }}"></script>
    @endpush
    @push('scripts')
        <script>
            Livewire.on('getSnap', snap_token => {
                snap.pay(snap_token, {
                    // Optional
                    onSuccess: function(result){
                        window.location.replace(`{{ route('user.invoices.home') }}`)
                    },
                    // Optional
                    onPending: function(result){
                        window.location.replace(`{{ route('user.invoices.home') }}`)
                    },
                    // Optional
                    onError: function(result){
                        window.location.replace(`{{ route('user.memberships.home') }}`)
                    }
                });
            })
        </script>
    @endpush
</div>
