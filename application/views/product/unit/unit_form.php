<section class="content-header">
    <h1>
        Unit
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Unit</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?= ucfirst($page) ?> Data Unit</h3>
            <div class="pull-right">
                <a href="<?= site_url('unit') ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="<?= site_url('unit/process') ?>" method="post">
                        <div class="form-group">
                            <label for="name">Nama Unit *</label>
                            <input type="hidden" name="unit_id" value="<?= $row->unit_id ?>">
                            <input type="text" name="unit_name" value="<?= $row->name ?>" class="form-control" placeholder="Nama unit" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="<?= $page ?>" class="btn btn-success btn-flat"><i class="fa fa-paper-plane"></i> Simpan</button>
                            <button type="reset" class="btn btn-warning btn-flat"><i class="fa fa-undo"></i> Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>