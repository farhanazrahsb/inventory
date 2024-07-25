<section class="content-header">
    <h1>
        Transaction
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Transaction</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <?php $this->view('message') ?>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?= ucfirst($page) ?> Data Transaction</h3>
            <div class="pull-right">
                <a href="<?= site_url('transaction') ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="<?= site_url('transaction/process') ?>" method="post">
                        <div class="form-group">
                            <label for="date">Tanggal *</label>
                            <input type="hidden" name="transaction_id" value="<?= $row->transaction_id ?>">
                            <?php if (isset($page) && $page == 'edit') {
                                echo '<input type="date" name="transaction_date" id="date" value="' . $row->date . '" class="form-control" required>';
                            } else {
                                echo '<input type="date" name="transaction_date" id="date" value="' . date('Y-m-d') . '" class="form-control" required>';
                            } ?>
                        </div>
                        <div class="form-group">
                            <label for="item">Nama Produk *</label>
                            <select name="item" id="item" class="form-control" required>
                                <option value="">-- Pilih Produk --</option>
                                <?php foreach ($item->result() as $key => $data) { ?>
                                    <option value="<?= $data->item_id ?>" <?= $data->item_id == $row->item_id ? "selected" : null ?>><?= $data->name ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="item_total">Total Beli *</label>
                            <input type="number" name="item_total" id="item_total" value="<?= $row->item_total ?>" class="form-control" placeholder="Total Beli" required>
                        </div>
                        <div class="form-group">
                            <label for="price_total">Total Harga *</label>
                            <input type="number" name="price_total" id="price_total" value="<?= $row->price_total ?>" class="form-control" placeholder="Total Harga" required>
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