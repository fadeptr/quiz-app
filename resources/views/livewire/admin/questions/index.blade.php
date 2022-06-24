<div>
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('admin.exams.home') }}">Exam</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{ $exam->title }}( {{ $exam->description }} )</li>
            </ol>
        </nav>
        <hr>
        <a href="{{ route('admin.questions.create',$exam->id) }}" class="btn btn-primary mb-3">Tambah Soal</a>
        <ol>
            @foreach ($questions as $item)
            <li>
                <div class="card mb-2">
                    <div class="card-header">
                        <a href="{{ route('admin.questions.edit',[$exam->id,$item->id]) }}" class="text-warning">Edit</a>
                        <button wire:click="deleteQuestion({{ $item->id }})" class="btn text-danger">Delete</a>
                    </div>
                    <div class="card-body">
                        {!! $item->body !!}
                    </div>
                </div>
            </li>
            <ol type="A" class="mb-4">
                @foreach (json_decode($item->options) as $key => $item2)
                    @if ($item->answer == $key)
                        <li class="text-primary">{{ $item2 }}</li>
                    @else
                        <li>{{ $item2 }}</li>
                    @endif
                @endforeach
            </ol>
            @endforeach
        </ol>
    </div>
</div>
