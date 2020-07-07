<?php include_once 'header.php'; ?>

<div class="inner">
<div class="table-wrapper">


<?php echo form_open('stok/proses', '', array('id' => $stok->id_pho)); ?>
<table>
	<tr>
		<td>Nama Lengkap</td>
		<td>:</td>
		<td>
			<?php echo form_input('nama', $stok->nama, 'required="required"'); ?>
		</td>
	</tr>
	<tr>
		<td>Alamat Lengkap</td>
		<td>:</td>
		<td>
			<?php echo form_input('alamat', $stok->alamat, 'required="required"'); ?>
		</td>
	</tr>
	<tr>
		<td>No HP</td>
		<td>:</td>
		<td>
			<?php echo form_input('telp', $stok->telp, 'required="required"'); ?>
		</td>
	<tr>
		<td>Tanggal Booking</td>
		<td>:</td>
		<td>
			<?php echo form_input(array('type' => 'date', 'name' => 'tgl', 'value' => $stok->tgl, 'required' => 'required')); ?>
		</td>
	</tr>	
	<tr>
		<td>Nama Paket</td>
		<td>:</td>
		<td>
			<?php echo form_input('paket', $stok->paket, 'required="required"'); ?>
		</td>
	<tr>
		<td>Tema stok</td>
		<td>:</td>
		<td>
			<?php echo form_input('tema', $stok->tema, 'required="required"'); ?>
		</td>	
	</tr>
	<tr>
		<td>Lokasi Lengkap stok</td>
		<td>:</td>
		<td>
			<?php echo form_input('lokasi', $stok->lokasi, 'required="required"'); ?>
		</td>	
	</tr>
	<tr>
		<td>Jumlah Orang</td>
		<td>:</td>
		<td>
			<?php echo form_input('jmlo', $stok->jmlo, 'required="required"'); ?>
		</td>	
	</tr>
	<tr>
		<td>Jumlah Tim Fotographer</td>
		<td>:</td>
		<td>
			<?php echo form_input('jmlp', $stok->jmlp, 'required="required"'); ?>
		</td>	
	</tr>		
	<tr>
		<td>Nama Fotographer</td>
		<td>:</td>
		<td>
			<?php echo form_input('namaf', $stok->namaf, 'required="required"'); ?>
		</td>	
	</tr>		
	<tr>
		<td>Kelengkapan Fotographer</td>
		<td>:</td>
		<td>
			<?php echo form_input('kelengkapan', $stok->kelengkapan, 'required="required"'); ?>
		</td>	
	</tr>	
	<tr>
		<td>Harga</td>
		<td>:</td>
		<td>
			<?php echo form_input('hrg', $stok->hrg, 'required="required"'); ?>
		</td>	
	</tr>		
	<tr>
		<td>Uang Jaminan</td>
		<td>:</td>
		<td>
			<?php echo form_input('dp', $stok->dp, 'required="required"'); ?>
		</td>	
	</tr>			
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