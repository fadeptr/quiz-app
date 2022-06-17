<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Exams</div>
                    <div class="card-body">
                        <a href="{{ route('admin.exams.create') }}" class="btn btn-primary">Tambah Ujian</a>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Category</th>
                                    <th>Year</th>
                                    <th>Type</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($examsList as $key => $item)
                                    <tr>
                                        <td>{{ $examsList->firstItem() + $key }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ $item->category }}</td>
                                        <td>{{ $item->year }}</td>
                                        <td>{{ $item->type }}</td>
                                        <td>
                                            <button wire:click="hapusData({{ $item->id }})" onclick="confirm('yakin?')" class="btn btn-sm btn-danger">Delete</button>
                                            <a href="{{ route('admin.exams.edit',$item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                            <a href="" class="btn btn-sm btn-info">Details</a>
                                            <a href="" class="btn btn-sm btn-info">Users</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $examsList->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
