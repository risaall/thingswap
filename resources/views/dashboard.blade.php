<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', sans-serif;
        }
    </style>
</head>
<body>

<div class="container py-5">
    <h2 class="mb-4 fw-semibold text-center">Dashboard Admin</h2>

    <div class="row g-4">

        <div class="col-md-4">
            <div class="card border-start border-success border-4 shadow-sm">
                <div class="card-body">
                    <h6 class="text-muted">Total User</h6>
                    <h3 class="fw-bold">{{ $userCount }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-start border-info border-4 shadow-sm">
                <div class="card-body">
                    <h6 class="text-muted">User yang Berdonasi</h6>
                    <h3 class="fw-bold">{{ $donorUserCount }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-start border-primary border-4 shadow-sm">
                <div class="card-body">
                    <h6 class="text-muted">Barang Dijual</h6>
                    <h3 class="fw-bold">{{ $productCount }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-start border-warning border-4 shadow-sm">
                <div class="card-body">
                    <h6 class="text-muted">Barang Didonasikan</h6>
                    <h3 class="fw-bold">{{ $donationCount }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-start border-secondary border-4 shadow-sm">
                <div class="card-body">
                    <h6 class="text-muted">Barang Daur Ulang</h6>
                    <h3 class="fw-bold">{{ $recycledCount }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-start border-danger border-4 shadow-sm">
                <div class="card-body">
                    <h6 class="text-muted">Mitra Bekerja Sama</h6>
                    <h3 class="fw-bold">{{ $partnerCount }}</h3>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
