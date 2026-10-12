<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Tugas 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <nav class="navbar navbar-dark bg-primary shadow">
        <div class="container d-flex justify-content-between align-items-center">
            <span class="navbar-brand fw-bold mb-0 h1">Dashboard Tugas 1</span>
            <form action="{{ route('logout') }}" method="POST" class="m-0">
                @csrf
                <button type="submit" id="btn-logout" class="btn btn-danger btn-sm fw-bold">Logout</button>
            </form>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card border-0 shadow-sm">
                    <div class="card-body text-center p-5">
                        <div class="mb-3">
                            <span style="font-size: 60px;">👋</span>
                        </div>
                        <h2 class="fw-bold text-primary">
                            Selamat datang, {{ Auth::user()->nama_lengkap }}!
                        </h2>
                        <p class="text-muted mt-2 fs-6">Anda berhasil login sebagai <strong>{{ Auth::user()->username }}</strong>.</p>
                        <hr>
                        <p class="text-muted small">Halaman ini hanya dapat diakses oleh pengguna yang sudah login. Jika Anda membuka URL ini tanpa login, sistem akan otomatis mengarahkan ke halaman Login.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
