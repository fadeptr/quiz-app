<div>
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('admin.exams.home') }}">Exam</a></li>
              <li class="breadcrumb-item"><a href="{{ route('admin.questions.index',$exam->id) }}">{{ $exam->title }}( {{ $exam->description }} )</a></li>
              <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>
        <hr>
        <div class="card">
            <div class="card-header">Formulir</div>
            <div class="card-body">
                <form wire:submit.prevent="store">
                    <div class="mb-3" wire:ignore>
                        <label class="form-label">Soal</label>
                        <textarea id="my-editor" class="form-control" rows="5" wire:model.defer="question" required></textarea>
                    </div>
                    @error('question')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <hr>
                    @foreach (range(0,3) as $item)
                        <div class="mb-3">
                            <label class="form-label">Option {{ $item }}</label>
                            <input type="text" class="form-control" wire:model.defer="options.{{ $item }}" required>
                            @error("options.$item")
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    @endforeach
                    <hr>
                    <div class="mb-3">
                        <label class="form-label">Answer</label>
                        <select class="form-select" wire:model="answer" required>
                            <option selected hidden>Pilih Jawaban Benar</option>
                            @foreach (range(0,3) as $item)
                                <option value="{{ $item }}">{{ $item }}</option>
                            @endforeach
                        </select>
                        @error('answer')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </form>
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
        <script>
            var options = {
                filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
                filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
            };
            const editor = CKEDITOR.replace('my-editor');
            editor.on('change', function(event){
                console.log(event.editor.getData())
                @this.set('question', event.editor.getData());
            })

        </script>
    @endpush
</div>
