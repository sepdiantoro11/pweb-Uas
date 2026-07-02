<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deluxe Laundry - Edit Cucian</title>

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

        .form-card {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
            border: 1px solid #e2e8f0;
            width: 100%;
            max-width: 700px;
            margin: 0 auto;
            padding: 40px 50px;
        }

        .form-group-row {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            width: 100%;
        }

        .label-field {
            font-weight: 600;
            color: #3b71ca;
            font-size: 1.05rem;
            width: 160px;
            flex-shrink: 0;
        }

        .input-field {
            border: 1px solid #b4b4b4;
            border-radius: 6px;
            padding: 9px 15px;
            font-size: 1rem;
            color: #333333;
            width: 100%;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        .input-field:focus {
            border-color: #3b71ca;
            box-shadow: 0 0 0 0.2rem rgba(59, 113, 202, 0.25);
            outline: 0;
        }

        .input-field.is-invalid {
            border-color: #dc3545;
        }

        .error-validation {
            color: #dc3545;
            font-size: 0.85rem;
            margin-top: -15px;
            margin-bottom: 15px;
            padding-left: 160px;
            width: 100%;
        }

        .button-action-area {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 35px;
            width: 100%;
        }

        .btn-simpan {
            background-color: #4ec2e0;
            color: #ffffff;
            font-weight: 500;
            font-size: 1.1rem;
            padding: 8px 50px;
            border-radius: 8px;
            border: none;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .btn-simpan:hover {
            background-color: #3aaecb;
            transform: translateY(-1px);
        }

        .btn-batal {
            background-color: #6c757d;
            color: #ffffff;
            font-weight: 500;
            font-size: 1.1rem;
            padding: 8px 50px;
            border-radius: 8px;
            border: none;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn-batal:hover {
            background-color: #5a6268;
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
            .form-card {
                padding: 25px 20px;
            }
            .form-group-row {
                flex-direction: column;
                align-items: flex-start;
                margin-bottom: 15px;
            }
            .label-field {
                width: 100%;
                margin-bottom: 5px;
            }
            .error-validation {
                padding-left: 0;
                margin-top: -10px;
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

        <h2 class="page-title">Edit Data Cucian</h2>

        <?php if($this->session->flashdata('message')): ?>
            <div style="max-width: 700px; width: 100%; margin: 0 auto 15px auto;">
                <?php echo $this->session->flashdata('message'); ?>
            </div>
        <?php endif; ?>

        <div class="form-card">
            <?php echo form_open('daftarcucian/update/' . $cucian['id_cucian']); ?>

                <div class="form-group-row">
                    <label class="label-field" for="id_cucian">ID Cucian:</label>
                    <input type="text" class="input-field" id="id_cucian" value="<?php echo $cucian['id_cucian']; ?>" disabled style="background:#f0f0f0;">
                </div>

                <div class="form-group-row">
                    <label class="label-field" for="no_resi">No. Resi:</label>
                    <input type="text" class="input-field <?php echo form_error('no_resi') ? 'is-invalid' : (isset($_POST['no_resi']) ? 'is-valid' : ''); ?>" id="no_resi" name="no_resi" value="<?php echo set_value('no_resi', $cucian['no_resi']); ?>" autocomplete="off">
                </div>
                <?php if(form_error('no_resi')): ?>
                    <div class="error-validation"><?php echo form_error('no_resi', '', ''); ?></div>
                <?php endif; ?>

                <div class="form-group-row">
                    <label class="label-field" for="nama">Nama:</label>
                    <input type="text" class="input-field <?php echo form_error('nama') ? 'is-invalid' : (isset($_POST['nama']) ? 'is-valid' : ''); ?>" id="nama" name="nama" value="<?php echo set_value('nama', $cucian['nama_pelanggan']); ?>" autocomplete="off">
                </div>
                <?php if(form_error('nama')): ?>
                    <div class="error-validation"><?php echo form_error('nama', '', ''); ?></div>
                <?php endif; ?>

                <div class="form-group-row">
                    <label class="label-field" for="nomor_hp">Nomor HP:</label>
                    <input type="text" class="input-field <?php echo form_error('nomor_hp') ? 'is-invalid' : (isset($_POST['nomor_hp']) ? 'is-valid' : ''); ?>" id="nomor_hp" name="nomor_hp" value="<?php echo set_value('nomor_hp', $cucian['nomor_wa']); ?>" autocomplete="off">
                </div>
                <?php if(form_error('nomor_hp')): ?>
                    <div class="error-validation"><?php echo form_error('nomor_hp', '', ''); ?></div>
                <?php endif; ?>

                <div class="form-group-row">
                    <label class="label-field" for="alamat">Alamat:</label>
                    <input type="text" class="input-field <?php echo form_error('alamat') ? 'is-invalid' : (isset($_POST['alamat']) ? 'is-valid' : ''); ?>" id="alamat" name="alamat" value="<?php echo set_value('alamat', $cucian['alamat']); ?>" autocomplete="off">
                </div>
                <?php if(form_error('alamat')): ?>
                    <div class="error-validation"><?php echo form_error('alamat', '', ''); ?></div>
                <?php endif; ?>

                <div class="form-group-row">
                    <label class="label-field" for="paket">Paket:</label>
                    <select class="input-field form-select" id="paket" name="paket">
                        <option value="">Pilih Paket Laundry</option>
                        <?php foreach($paket_list as $pk): ?>
                            <option value="<?php echo $pk['id_paket']; ?>" <?php echo set_select('paket', $pk['id_paket'], $pk['id_paket'] == $cucian['id_paket']); ?>>
                                <?php echo $pk['nama_paket']; ?> (Rp <?php echo number_format($pk['harga_per_kg'], 0, ',', '.'); ?>/Kg)
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <?php if(form_error('paket')): ?>
                    <div class="error-validation"><?php echo form_error('paket', '', ''); ?></div>
                <?php endif; ?>

                <div class="form-group-row">
                    <label class="label-field" for="berat">Berat (Kg):</label>
                    <input type="text" class="input-field <?php echo form_error('berat') ? 'is-invalid' : (isset($_POST['berat']) ? 'is-valid' : ''); ?>" id="berat" name="berat" value="<?php echo set_value('berat', $cucian['berat_laundry']); ?>" placeholder="Contoh: 3 atau 3.5" autocomplete="off">
                </div>
                <?php if(form_error('berat')): ?>
                    <div class="error-validation"><?php echo form_error('berat', '', ''); ?></div>
                <?php endif; ?>

                <div class="button-action-area">
                    <a href="<?php echo site_url('daftarcucian'); ?>" class="btn-batal">Batal</a>
                    <button type="submit" class="btn-simpan">Update</button>
                </div>

            <?php echo form_close(); ?>
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
