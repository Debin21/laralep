<x-layout>
    <h1>Edit Fakultas</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/fakultas/{{ $fakultas->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label>Nama Fakultas</label>
            <input name="nama_fakultas" type="text" placeholder="Nama Fakultas"
                class="form-control @error('nama_fakultas') is-invalid @enderror"
                value="{{ old('nama_fakultas', $fakultas->nama_fakultas) }}">
            @error('nama_fakultas')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label>Nama Dekan</label>
            <input name="nama_dekan" type="text" placeholder="Nama Dekan"
                class="form-control @error('nama_dekan') is-invalid @enderror"
                value="{{ old('nama_dekan', $fakultas->nama_dekan) }}">
            @error('nama_dekan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</x-layout>