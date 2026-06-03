<x-layout>
    <h1>List Prodi</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="/prodi/create" class="btn btn-primary mb-3">Tambah Prodi</a>

    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Prodi</th>
                <th>Nama Kaprodi</th>
                <th>Alias</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($prodi as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama_prodi }}</td>
                <td>{{ $item->nama_kaprodi }}</td>
                <td>{{ $item->alias_prodi }}</td>
                <td>
                    <a href="/prodi/{{ $item->id }}/edit" class="btn btn-warning">Edit</a>
                    <form action="/prodi/{{ $item->id }}" method="post" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>