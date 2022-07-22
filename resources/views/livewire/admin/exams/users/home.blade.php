<div>
    <div class="container">
        <div class="card">
            <div class="card-header">Table</div>
            <div class="card-body">
                <h1>{{ $exam->title }}</h1>
                <p>{{ $exam->year }} - {{ $exam->category }} - {{ $exam->description }}</p>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Point</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($exam_users as $key => $item)
                            <tr>
                                <td>{{ $exam_users->firstItem() + $key }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item->user->email }}</td>
                                <td>{{ round(($item->point * 100) / count($item->exam->questions),1) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $exam_users->links() }}
            </div>
        </div>
    </div>
</div>
