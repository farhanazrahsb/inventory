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
            <h3 class="box-title">Tabel Data Transaction</h3>
            <div class="pull-right">
                <a href="<?= site_url('transaction/add') ?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-plus"></i> Tambah
                </a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th style="width:5%;">#</th>
                        <th>Tanggal</th>
                        <th>Nama Produk</th>
                        <th>Jumlah Terjual</th>
                        <th>Harga Total</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($row->result() as $key => $data) {
                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $data->date ?></td>
                            <td><?= $data->item_name ?></td>
                            <td><?= $data->item_total ?></td>
                            <td><?= indo_currency($data->price_total) ?></td>
                            <td>
                                <a href="<?= site_url('transaction/edit/' . $data->transaction_id) ?>" class="btn btn-warning btn-xs" title="Ubah">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                |
                                <a href="<?= site_url('transaction/delete/' . $data->transaction_id) ?>" onclick="return confirm('Yakin hapus data?')" class="btn btn-danger btn-xs" title="Hapus">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</section>