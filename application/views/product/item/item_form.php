<section class="content-header">
    <h1>
        Item
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Item</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <?php $this->view('message') ?>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?= ucfirst($page) ?> Data Item</h3>
            <div class="pull-right">
                <a href="<?= site_url('item') ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="<?= site_url('item/process') ?>" method="post">
                        <div class="form-group">
                            <label for="barcode">ID Produk *</label>
                            <input type="hidden" name="item_id" value="<?= $row->item_id ?>">
                            <input type="text" name="item_barcode" id="barcode" value="<?= $row->barcode ?>" class="form-control" placeholder="ID Produk" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Nama Produk *</label>
                            <input type="text" name="item_name" id="name" value="<?= $row->name ?>" class="form-control" placeholder="Nama Produk" required>
                        </div>
                        <div class="form-group">
                            <label for="category">Kategori *</label>
                            <select name="category" id="category" class="form-control" required>
                                <option value="">-- Pilih Kategori --</option>
                                <?php foreach ($category->result() as $key => $data) { ?>
                                    <option value="<?= $data->category_id ?>" <?= $data->category_id == $row->category_id ? "selected" : null ?>><?= $data->name ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="unit">Unit *</label>
                            <select name="unit" id="unit" class="form-control" required>
                                <option value="">-- Pilih Unit --</option>
                                <?php foreach ($unit->result() as $key => $data) { ?>
                                    <option value="<?= $data->unit_id ?>" <?= $data->unit_id == $row->unit_id ? "selected" : null ?>><?= $data->name ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="price">Harga *</label>
                            <input type="number" name="item_price" id="price" value="<?= $row->price ?>" class="form-control" placeholder="Harga" required>
                        </div>
                        <div class="form-group">
                            <label for="stock">Stok *</label>
                            <input type="number" name="stock" id="stock" value="<?= $row->stock ?>" class="form-control" placeholder="Stok" required>
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