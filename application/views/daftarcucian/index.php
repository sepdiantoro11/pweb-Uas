<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deluxe Laundry - Daftar Cucian</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            display: flex;
            background: #ffffff;
            overflow-x: hidden;
        }

        .sidebar {
            width: 280px;
            background-color: #002d72;
            min-height: 100vh;
            padding: 30px 0;
            display: flex;
            flex-direction: column;
            flex-shrink: 0;
        }

        .sidebar-brand {
            text-align: center;
            padding-bottom: 40px;
        }

        .sidebar-brand img {
            width: 200px;
            height: auto;
            object-fit: contain;
        }

        .sidebar-menu {
            list-style: none;
            padding: 0;
            margin: 0;
            width: 100%;
        }

        .sidebar-item {
            width: 100%;
            margin-bottom: 10px;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            padding: 15px 25px;
            color: #ffffff;
            text-decoration: none;
            font-size: 1.05rem;
            font-weight: 500;
            transition: all 0.2s ease-in-out;
        }

        .sidebar-link i {
            font-size: 1.5rem;
            margin-right: 20px;
            display: inline-block;
            vertical-align: middle;
        }

        .sidebar-item.active .sidebar-link {
            background-color: rgba(255, 255, 255, 0.12);
            border-left: 5px solid #ffffff;
            padding-left: 20px;
        }

        .sidebar-link:hover {
            background-color: rgba(255, 255, 255, 0.08);
            color: #ffffff;
        }

        .main-content {
            flex-grow: 1;
            background: linear-gradient(135deg, #ffffff 60%, #46fde1 100%);
            padding: 30px 40px;
            display: flex;
            flex-direction: column;
            position: relative;
        }

        .content-header {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            margin-bottom: 20px;
            width: 100%;
        }

        .btn-logout {
            background-color: #4ec2e0;
            color: #ffffff;
            font-weight: 500;
            font-size: 1rem;
            padding: 8px 30px;
            border-radius: 8px;
            border: none;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn-logout:hover {
            background-color: #3aaecb;
            color: #ffffff;
        }

        .page-title {
            text-align: center;
            color: #3873e0;
            font-weight: 600;
            font-size: 1.85rem;
            margin-bottom: 25px;
        }

        .table-card {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
            border: 1px solid #e2e8f0;
            width: 100%;
            padding: 0;
            overflow: hidden;
        }

        .table-card .card-header {
            background-color: #002d72;
            color: #ffffff;
            padding: 15px 25px;
            font-weight: 600;
            font-size: 1.1rem;
        }

        .table {
            margin-bottom: 0;
        }

        .table thead th {
            background-color: #f8f9fc;
            color: #002d72;
            font-weight: 600;
            border-bottom: 2px solid #e2e8f0;
            padding: 12px 15px;
            font-size: 0.95rem;
        }

        .table tbody td {
            padding: 12px 15px;
            vertical-align: middle;
            border-bottom: 1px solid #f0f0f0;
            font-size: 0.95rem;
        }

        .table tbody tr:hover {
            background-color: #f8f9fc;
        }

        .table-empty {
            text-align: center;
            padding: 40px 20px;
            color: #888;
        }

        .table-empty i {
            font-size: 3rem;
            display: block;
            margin-bottom: 15px;
            color: #ccc;
        }

        .btn-proses {
            background-color: #4ec2e0;
            color: #ffffff;
            font-weight: 500;
            font-size: 0.85rem;
            padding: 5px 15px;
            border-radius: 8px;
            border: none;
            transition: all 0.3s ease;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }

        .btn-proses:hover {
            background-color: #3aaecb;
            color: #ffffff;
        }

        @media (max-width: 991px) {
            body {
                flex-direction: column;
            }
            .sidebar {
                width: 100%;
                min-height: auto;
                padding: 15px 0 0 0;
            }
            .sidebar-brand {
                padding-bottom: 15px;
            }
            .sidebar-menu {
                display: flex;
                justify-content: center;
            }
            .sidebar-item {
                width: auto;
                margin-bottom: 0;
            }
            .sidebar-item.active .sidebar-link {
                border-left: none;
                border-bottom: 4px solid #ffffff;
                padding-left: 20px;
            }
            .main-content {
                padding: 20px 15px;
            }
        }
    </style>
</head>
<body>

    <div class="sidebar">
        <div class="sidebar-brand">
            <img src="<?php echo base_url('assets/images/logo1.png'); ?>" alt="Logo Deluxe Laundry">
        </div>
        <ul class="sidebar-menu">
            <li class="sidebar-item">
                <a href="<?php echo site_url('pelanggan'); ?>" class="sidebar-link">
                    <i class="bi bi-person-circle"></i> Pelanggan
                </a>
            </li>
            <li class="sidebar-item active">
                <a href="<?php echo site_url('daftarcucian'); ?>" class="sidebar-link">
                    <i class="bi bi-mailbox"></i> Daftar Cucian
                </a>
            </li>
            <li class="sidebar-item">
                <a href="<?php echo site_url('riwayat'); ?>" class="sidebar-link">
                    <i class="bi bi-clock-history"></i> Riwayat
                </a>
            </li>
        </ul>
    </div>

    <div class="main-content">

        <div class="content-header">
            <a href="<?php echo site_url('auth/logout'); ?>" class="btn-logout">Logout</a>
        </div>

        <h2 class="page-title">Daftar Cucian</h2>

        <?php if($this->session->flashdata('message')): ?>
            <div style="max-width: 100%; width: 100%; margin: 0 auto 15px auto;">
                <?php echo $this->session->flashdata('message'); ?>
            </div>
        <?php endif; ?>

        <div class="table-card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span><i class="bi bi-mailbox me-2"></i>Data Cucian Aktif</span>
                <form action="<?php echo site_url('daftarcucian'); ?>" method="GET" class="d-flex" style="gap:8px;">
                    <input type="text" name="search" class="form-control form-control-sm" style="width:200px; border-radius:6px;" placeholder="Cari nama pelanggan..." value="<?php echo isset($search) ? htmlspecialchars($search) : ''; ?>">
                    <button type="submit" class="btn btn-sm btn-light" style="border-radius:6px;"><i class="bi bi-search"></i></button>
                    <?php if(!empty($search)): ?>
                        <a href="<?php echo site_url('daftarcucian'); ?>" class="btn btn-sm btn-light" style="border-radius:6px;"><i class="bi bi-x-circle"></i></a>
                    <?php endif; ?>
                </form>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Cucian</th>
                            <th>Nama Pelanggan</th>
                            <th>Nama Paket</th>
                            <th>Kasir</th>
                            <th>Berat (Kg)</th>
                            <th>Total Biaya</th>
                            <th>Tgl Masuk</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($daftar_cucian)): ?>
                            <?php $no = 1; ?>
                            <?php foreach ($daftar_cucian as $c): ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $c['id_cucian']; ?></td>
                                    <td><?php echo htmlspecialchars($c['nama_pelanggan']); ?></td>
                                    <td><?php echo htmlspecialchars($c['nama_paket']); ?></td>
                                    <td><?php echo htmlspecialchars($c['nama_kasir']); ?></td>
                                    <td><?php echo number_format($c['berat_laundry'], 2, ',', '.'); ?></td>
                                    <td>Rp <?php echo number_format($c['total_biaya'], 0, ',', '.'); ?></td>
                                    <td><?php echo date('d-m-Y H:i', strtotime($c['tgl_masuk'])); ?></td>
                                    <td>
                                        <?php
                                        $badge_class = '';
                                        switch ($c['status_cucian']) {
                                            case 'Diproses':  $badge_class = 'bg-secondary';  break;
                                            case 'Dicuci':    $badge_class = 'bg-info text-dark'; break;
                                            case 'Disetrika': $badge_class = 'bg-warning text-dark'; break;
                                            case 'Selesai':   $badge_class = 'bg-primary'; break;
                                            case 'Diambil':   $badge_class = 'bg-success'; break;
                                            default:          $badge_class = 'bg-secondary';
                                        }
                                        ?>
                                        <span class="badge <?php echo $badge_class; ?>">
                                            <?php echo $c['status_cucian']; ?>
                                        </span>
                                    </td>
                                    <td>
                                        <a href="<?php echo site_url('daftarcucian/edit/' . $c['id_cucian']); ?>"
                                           class="btn btn-sm btn-primary">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <a href="<?php echo site_url('daftarcucian/ubahStatus/' . $c['id_cucian']); ?>"
                                           class="btn-proses"
                                           onclick="return confirm('Apakah cucian ini sudah selesai dan akan diambil? Data akan dipindahkan ke riwayat.');">
                                            <i class="bi bi-check-circle"></i> Selesai / Diambil
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="10">
                                    <div class="table-empty">
                                        <i class="bi bi-inbox"></i>
                                        Belum ada data cucian aktif.
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        <?php if($this->session->flashdata('swal')): ?>
            Swal.fire({
                icon: '<?php echo $this->session->flashdata('swal')['icon']; ?>',
                title: '<?php echo $this->session->flashdata('swal')['title']; ?>',
                text: '<?php echo $this->session->flashdata('swal')['text']; ?>'
            });
        <?php endif; ?>
    </script>
</body>
</html>
