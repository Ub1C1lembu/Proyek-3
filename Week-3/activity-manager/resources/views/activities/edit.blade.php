<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kegiatan</title>
    <style>
        body { font-family: sans-serif; max-width: 600px; margin: 30px auto; padding: 0 20px; }
        .form-group { margin-bottom: 16px; }
        label { display: block; font-weight: bold; margin-bottom: 4px; }
        input, select, textarea { width: 100%; padding: 8px; border: 1px solid #d1d5db; border-radius: 4px; box-sizing: border-box; }
        .error { color: #ef4444; font-size: 13px; margin-top: 4px; }
        .btn { padding: 10px 18px; border-radius: 4px; border: none; cursor: pointer; font-size: 14px; text-decoration: none; }
        .btn-primary { background: #3b82f6; color: white; }
        .btn-secondary { background: #6b7280; color: white; }
    </style>
</head>
<body>
    <h1>Edit Kegiatan</h1>

    <form action="{{ route('activities.update', $activity) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Judul Kegiatan</label>
            <input type="text" id="title" name="title" value="{{ old('title', $activity->title) }}" required>
            @error('title') <p class="error">{{ $message }}</p> @enderror
        </div>

        <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea id="description" name="description" rows="3">{{ old('description', $activity->description) }}</textarea>
            @error('description') <p class="error">{{ $message }}</p> @enderror
        </div>

        <div class="form-group">
            <label for="activity_date">Tanggal Kegiatan</label>
            <input type="date" id="activity_date" name="activity_date"
                   value="{{ old('activity_date', $activity->activity_date->format('Y-m-d')) }}" required>
            @error('activity_date') <p class="error">{{ $message }}</p> @enderror
        </div>

        <div class="form-group">
            <label for="category">Kategori</label>
            <input type="text" id="category" name="category" value="{{ old('category', $activity->category) }}" required>
            @error('category') <p class="error">{{ $message }}</p> @enderror
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select id="status" name="status" required>
                @foreach(['Planned', 'Ongoing', 'Done'] as $s)
                    <option value="{{ $s }}" {{ old('status', $activity->status) == $s ? 'selected' : '' }}>{{ $s }}</option>
                @endforeach
            </select>
            @error('status') <p class="error">{{ $message }}</p> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Perbarui</button>
        <a href="{{ route('activities.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</body>
</html>
