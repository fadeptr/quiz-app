<div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 class="text-capitalize">{{ $exam->title }}</h1>
                <p>{{ $exam->description }}</p>
                <hr>
                <div class="card">
                    <div class="card-header">Aturan Ujian</div>
                    <div class="card-body">
                        <ol>
                            <li>Selesaikan Dalam waktu ditentukan</li>
                            <li>Jawablah dengan benar</li>
                            <li>Total Soal {{ $total_questions }}</li>
                            <li>Kategori: {{ $exam->category }}</li>
                            <li>Tahun Terbit: {{ $exam->year }}</li>
                            <li>Waktu Ujian: {{ $exam->timer }} Menit</li>
                        </ol>
                        @if ($membership)
                            @if ($exam_user)
                                @if ($exam_user->answers)
                                    <a href="{{ route('user.questions.index',$exam->id) }}" class="btn btn-warning">Review</a>
                                @else
                                    <a href="{{ route('user.questions.index',$exam->id) }}" class="btn btn-danger">Lanjut Ujian</a>
                                @endif
                            @else
                                <button wire:click="start" class="btn btn-primary">Mulai Ujian</button>
                            @endif
                        @else
                            <button class="btn btn-secondary" disabled>Kamu Belum Membership</button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
