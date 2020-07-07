<?php include_once 'header.php'; ?>

<div class="inner">
<div class="table-wrapper">


<?php echo form_open('barang/proses', '', array('id' => $barang->id_barang)); ?>
<table>
	<h1>Edit Data Jual Beli</h1>
	<tr>
		<td>Nama Lengkap</td>
		<td>:</td>
		<td>
			<?php echo form_input('nama', $barang->nama, 'required="required"'); ?>
		</td>
	</tr>
	<tr>
		<td>Alamat</td>
		<td>:</td>
		<td>
			<?php echo form_input('alamat', $barang->alamat, 'required="required"'); ?>
		</td>
	</tr>
	<tr>
        <td>Nomor HP</td>
        <td>:</td>
        <td>
            <?php echo form_input(array('type' => 'number', 'name' => 'telp', 'required' => $barang->telp,'required' => 'required')); ?>
        </td>
    </tr>
	<tr>
		<td>Tanggal Pembelian</td>
		<td>:</td>
		<td>
			<?php echo form_input(array('type' => 'date', 'name' => 'tgl', 'value' => $barang->tgl, 'required' => 'required')); ?>
		</td>
	</tr>
	<tr>
		<td>Nama Barang</td>
		<td>:</td>
		<td>
			<?php echo form_input('jenis', $barang->jenis, 'required="required"'); ?>
		</td>
	</tr>
	<tr>
		<td>Harga Satuan</td>
		<td>:</td>
		<td>
			<?php echo form_input('hrgs', $barang->hrgs, 'required="required"'); ?>
		</td>
	</tr>
	<tr>
		<td>Jumlah Barang</td>
		<td>:</td>
		<td>
			<?php echo form_input('jmlbrg', $barang->jmlbrg, 'required="required"'); ?>
		</td>
	</tr>
	<tr>
		<td>Harga Total</td>
		<td>:</td>
		<td>
			<?php echo form_input('hrgt', $barang->hrgt, 'required="required"'); ?>
		</td>
	</tr>
	<tr>
		<td>Masa Garansi</td>
		<td>:</td>
		<td>
			<?php echo form_input('garansi', $barang->garansi, 'required="required"'); ?>
		</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td>
			<?php echo form_input(array('type' => 'submit', 'name' => 'edit', 'value' => 'Edit')); ?>
		</td>
	</tr>
</table>
<?php echo form_close(); ?>

</div>
</div>

<?php include_once 'footer.php'; ?>
<?php include_once('master.php');  ?>