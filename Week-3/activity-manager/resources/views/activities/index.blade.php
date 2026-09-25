<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kegiatan</title>
    <style>
        body { font-family: sans-serif; max-width: 800px; margin: 30px auto; padding: 0 20px; }
        .btn { padding: 8px 14px; border-radius: 4px; text-decoration: none; border: none; cursor: pointer; font-size: 14px; }
        .btn-primary { background: #3b82f6; color: white; }
        .btn-warning { background: #f59e0b; color: white; }
        .btn-danger  { background: #ef4444; color: white; }
        .alert { padding: 12px 16px; border-radius: 4px; margin-bottom: 16px; background: #d1fae5; color: #065f46; }
        table { width: 100%; border-collapse: collapse; margin-top: 16px; }
        th, td { padding: 10px 12px; border: 1px solid #e5e7eb; text-align: left; }
        th { background: #f3f4f6; }
    </style>
</head>
<body>
    <h1>Daftar Kegiatan</h1>
    <a href="{{ route('activities.create') }}" class="btn btn-primary">+ Tambah Kegiatan</a>

    @if(session('success'))
        <div class="alert">{{ session('success') }}</div>
    @endif

    <table>
        <thead>
            <tr>
                <th>Judul</th>
                <th>Tanggal</th>
                <th>Kategori</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($activities as $activity)
            <tr>
                <td>{{ $activity->title }}</td>
                <td>{{ $activity->activity_date->format('d M Y') }}</td>
                <td>{{ $activity->category }}</td>
                <td>{{ $activity->status }}</td>
                <td>
                    <a href="{{ route('activities.edit', $activity) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('activities.destroy', $activity) }}" method="POST" style="display:inline"
                          onsubmit="return confirm('Yakin ingin menghapus kegiatan ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" style="text-align:center">Belum ada kegiatan.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
