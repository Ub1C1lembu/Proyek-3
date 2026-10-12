<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Tugas 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e9ecef;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        .login-card {
            width: 100%;
            max-width: 420px;
            padding: 40px;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 6px 20px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <div class="login-card">
        <h3 class="text-center fw-bold mb-1">Selamat Datang</h3>
        <p class="text-center text-muted mb-4">Silakan masuk menggunakan akun Anda</p>

        <?php if($errors->has('loginError')): ?>
            <div class="alert alert-danger text-center">
                <?php echo e($errors->first('loginError')); ?>

            </div>
        <?php endif; ?>

        <form action="<?php echo e(route('login')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="mb-3">
                <label for="username" class="form-label fw-semibold">Username</label>
                <input type="text" id="username" name="username" class="form-control" value="<?php echo e(old('username')); ?>" required autofocus placeholder="Masukkan username">
            </div>
            <div class="mb-4">
                <label for="password" class="form-label fw-semibold">Password</label>
                <input type="password" id="password" name="password" class="form-control" required placeholder="Masukkan password">
            </div>
            <button type="submit" class="btn btn-primary w-100 py-2 fw-bold">Masuk</button>
        </form>
    </div>
</body>
</html>
<?php /**PATH D:\Proyek 3\Task1\resources\views/login.blade.php ENDPATH**/ ?>