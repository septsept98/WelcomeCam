<?php include_once 'header.php'; ?>

<div class="inner">
<div class="table-wrapper">

<?php echo form_open('stok/proses'); ?>
<!-- Aslinya sama saja dengan script yang ditulis dibawah
     hanya saja kita mengikuti aturan dari CI nya sendiri
    <table method="post" action="mahasiswa/proses"> -->
<table>
    <h1 style="text-align: center;">Tambah Data stok</h1>
    <tr>
        <td>Nama Barang</td>
        <td>:</td>
        <td>
            <?php echo form_input('nama', '', 'required="required"'); ?>
        </td>
    </tr>
    <tr>
        <td>Kode Barang</td>
        <td>:</td>
        <td>
            <?php echo form_input('kode', '', 'required="required"'); ?>
        </td>
    </tr>
    <tr>
        <td>Jenis Barang</td>
        <td>:</td>
        <td>
            <?php echo form_input('jenis', '', 'required="required"'); ?>
        </td>
    </tr>
    <tr>
        <td>Jumlah Barang</td>
        <td>:</td>
        <td>
            <?php echo form_input('jumlah', '', 'required="required"'); ?>
        </td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td>
            <?php echo form_input(array('type' => 'submit', 'name' => 'add', 'value' => 'Tambah')); ?>
        </td>
    </tr>
</table>
<?php echo form_close(); ?>
</div>
</div>

<?php include_once 'footer.php'; ?>
<?php include_once('master.php');  ?>