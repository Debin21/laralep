<x-layout>
    <h1>Tambah Prodi</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/prodi" method="POST">
        @csrf
        <div class="form-group mb-3">
    <label>Fakultas</label>

    <select name="fakultas_id"
        class="form-control @error('fakultas_id') is-invalid @enderror">

        <option value="">-- Pilih Fakultas --</option>

        @foreach($fakultas as $f)
            <option value="{{ $f->id }}"
                {{ old('fakultas_id') == $f->id ? 'selected' : '' }}>
                {{ $f->nama_fakultas }}
            </option>
        @endforeach

    </select>

    @error('fakultas_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
        <div class="form-group mb-3">
            <label>Nama Prodi</label>
            <input name="nama_prodi" type="text" placeholder="Nama Prodi"
                class="form-control @error('nama_prodi') is-invalid @enderror"
                value="{{ old('nama_prodi') }}">
            @error('nama_prodi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label>Nama Kaprodi</label>
            <input name="nama_kaprodi" type="text" placeholder="Nama Kaprodi"
                class="form-control @error('nama_kaprodi') is-invalid @enderror"
                value="{{ old('nama_kaprodi') }}">
            @error('nama_kaprodi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label>Alias Prodi</label>
            <input name="alias_prodi" type="text" placeholder="Contoh: SI, IF, AK"
                class="form-control @error('alias_prodi') is-invalid @enderror"
                value="{{ old('alias_prodi') }}">
            @error('alias_prodi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</x-layout>