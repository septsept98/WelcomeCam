<?php include_once 'header.php'; ?>

<div class="inner">
<div class="table-wrapper">
    <div style="margin-bottom: 20px;">
            <a href="<?=site_url('stok/add'); ?>"><button>Tambah</button></a>
        </div>
  <table class="data">
    <tr>
    <th>No</th>
    <th>Nama</th>
    <th>Kode</th>
    <th>Jenis</th>
    <th>Jumlah</th>
            
    </tr>
    <?php
    $no = 1;
    foreach ($isi as $b => $row) { ?>
        <tr>
            <th><?=$no++; ?></th>
            <th><?=$row->nama; ?></th>
            <th><?=$row->kode; ?></th>
            <th><?=$row->jenis; ?></th>
            <th><?=$row->jumlah; ?></th>
            <th>
                <a href="<?= site_url('stok/edit/'.$row->id_pho); ?>"><button>Edit</button></a>
                <a href="<?= site_url('stok/delete/'.$row->id_pho); ?>" onclick="return confirm('Yakin akan menghapus data?')"><button>Delete</button></a>
            </th>
        </tr>
    <?php
    } ?>
</table>
</div>
</div>

<?php include_once 'footer.php'; ?>
<?php include_once('master.php');  ?>