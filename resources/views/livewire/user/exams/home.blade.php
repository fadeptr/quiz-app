<div>
    <div class="container py-4">
        <h1>Daftar Ujian</h1>
        <hr>
        <div class="row">
            @foreach ($exams as $item)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-header">{{ $item->title }}</div>
                    <div class="card-body">
                        <div class="mb-2">Kategori: {{ $item->category }}, Tahun: {{ $item->year }}, Type: {{ $item->type }}</div>
                        <p class="text-secondary">{{ $item->description }}</p>
                        <a href="{{ route('user.exams.show',$item->id) }}" class="btn btn-primary">Lihat Ujian</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        {{ $exams->links() }}
    </div>
</div>
