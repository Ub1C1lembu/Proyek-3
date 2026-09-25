<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Kegiatan</title>
    <style>
        body { font-family: sans-serif; max-width: 600px; margin: 30px auto; padding: 0 20px; }
        .detail-row { display: flex; padding: 10px 0; border-bottom: 1px solid #e5e7eb; }
        .detail-label { font-weight: bold; width: 150px; flex-shrink: 0; }
        .btn { padding: 10px 18px; border-radius: 4px; border: none; cursor: pointer; font-size: 14px; text-decoration: none; margin-top: 16px; display: inline-block; }
        .btn-secondary { background: #6b7280; color: white; }
    </style>
</head>
<body>
    <h1>Detail Kegiatan</h1>

    <div class="detail-row">
        <span class="detail-label">Judul</span>
        <span>{{ $activity->title }}</span>
    </div>
    <div class="detail-row">
        <span class="detail-label">Deskripsi</span>
        <span>{{ $activity->description ?? '-' }}</span>
    </div>
    <div class="detail-row">
        <span class="detail-label">Tanggal</span>
        <span>{{ $activity->activity_date->format('d M Y') }}</span>
    </div>
    <div class="detail-row">
        <span class="detail-label">Kategori</span>
        <span>{{ $activity->category }}</span>
    </div>
    <div class="detail-row">
        <span class="detail-label">Status</span>
        <span>{{ $activity->status }}</span>
    </div>

    <a href="{{ route('activities.index') }}" class="btn btn-secondary">← Kembali</a>
</body>
</html>
