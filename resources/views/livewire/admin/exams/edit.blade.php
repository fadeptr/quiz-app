<div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Form Edit</div>
                    <div class="card-body">
                        <form wire:submit.prevent="changeUjian">
                            <div class="mb-3">
                                <label class="form-label">Judul Ujian</label>
                                <select class="form-select @error('judul') is-invalid @enderror" aria-label="Default select example" wire:model="judul">
                                    <option selected hidden>Pilih judul Ujian</option>
                                    <option value="bahasa indonesia">Bahasa Indonesia</option>
                                    <option value="matematika">Matematika</option>
                                    <option value="bahasa inggris">Bahasa Inggris</option>
                                </select>
                                @error('judul')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Deskripsi Ujian</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" placeholder="Tulis Deskripsi Ujian" wire:model="description"></textarea>
                                @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Waktu Ujian</label>
                                <input type="number" class="form-control @error('timer') is-invalid @enderror" placeholder="Masukkan Waktu Ujian" wire:model="timer">
                                @error('timer')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Kategori Ujian</label>
                                <select class="form-select @error('category') is-invalid @enderror" aria-label="Default select example" wire:model="category">
                                    <option selected hidden>Pilih Kategori Ujian</option>
                                    <option value="SD">Sekolah Dasar</option>
                                    <option value="SMP">Sekolah Menengah Pertama</option>
                                    <option value="SMA">Sekolah Menengah Atas</option>
                                </select>
                                @error('category')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tahun UN</label>
                                <input type="number" class="form-control @error('year') is-invalid @enderror" placeholder="Tulis Tahun Ujian" wire:model="year">
                                @error('year')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-warning">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
