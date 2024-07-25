<section class="content-header">
    <h1>
        Pengguna
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Pengguna</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Tambah Data Pengguna</h3>
            <div class="pull-right">
                <a href="<?= site_url('user') ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="" method="post">
                        <div class="form-group <?= form_error('name') ? 'has-error' : null ?>">
                            <label for="name">Nama *</label>
                            <input type="text" name="name" value="<?= set_value('name') ?>" class="form-control" placeholder="Nama">
                            <span class="help-block"><?= form_error('name') ?></span>
                        </div>
                        <div class="form-group <?= form_error('username') ? 'has-error' : null ?>">
                            <label for="username">Username *</label>
                            <input type="text" name="username" value="<?= set_value('username') ?>" class="form-control" placeholder="Username">
                            <?= form_error('username') ?>
                        </div>
                        <div class="form-group <?= form_error('password') ? 'has-error' : null ?>">
                            <label for="password">Password *</label>
                            <input type="password" name="password" value="<?= set_value('password') ?>" class="form-control" placeholder="Password">
                            <?= form_error('password') ?>
                        </div>
                        <div class="form-group <?= form_error('passconf') ? 'has-error' : null ?>">
                            <label for="password">Konfirmasi Password *</label>
                            <input type="password" name="passconf" value="<?= set_value('passconf') ?>" class="form-control" placeholder="Konfirmasi Password">
                            <?= form_error('passconf') ?>
                        </div>
                        <div class="form-group">
                            <label for="address">Alamat</label>
                            <textarea name="address" class="form-control" placeholder="Alamat"><?= set_value('address') ?></textarea>
                            <?= form_error('address') ?>
                        </div>
                        <div class="form-group <?= form_error('level') ? 'has-error' : null ?>">
                            <label for="level">Level *</label>
                            <select name="level" class="form-control">
                                <option value="">-- Pilih Level --</option>
                                <option value="1" <?= set_value('level') == 1 ? "selected" : null ?>>Admin</option>
                                <option value="2" <?= set_value('level') == 2 ? "selected" : null ?>>Kasir</option>
                            </select>
                            <?= form_error('level') ?>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-paper-plane"></i> Simpan</button>
                            <button type="reset" class="btn btn-warning btn-flat"><i class="fa fa-undo"></i> Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>