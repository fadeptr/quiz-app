<div>
    <div class="container">
        <h1>Invoices</h1>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eos harum quod ab, officia aspernatur id, totam, quam odit eius nobis quos neque porro vero quae reiciendis labore qui commodi fugiat.</p>
        <hr>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Order Id</th>
                    <th>Paket</th>
                    <th>Total Pembayaran</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($invoices as $key => $item)
                    <tr>
                        <td>{{ $invoices->firstItem() + $key }}</td>
                        <td>{{ $item->order_id }}</td>
                        <td>{{ $item->product_name }}</td>
                        <td>Rp.{{ number_format($item->total_payment) }}</td>
                        <td>{{ $item->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $invoices->links() }}
    </div>
</div>
