<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Crud dengan ignited dataTables pada CodeIgniter</title>
  <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>assets/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
  <link href="<?php echo base_url(); ?>assets/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css"/>
</head>
<body>
  <div class="container">
    <h2>Product List</h2>
        <button class="btn btn-success" data-toggle="modal" data-target="#myModalAdd">Add New</button>
    <table class="table table-striped" id="mytable">
      <thead>
        <tr>
          <th>Nama Barang</th>
          <th>Jumlah Barang</th>
          <th>Harga Barang</th>
          <th>Kategori</th>
          <th>Action</th>
        </tr>
      </thead>
    </table>
  </div>
 
    <!-- Modal Add Produk-->
      <form id="add-row-form" action="<?php echo base_url().'kategoriadmin/simpan'?>" method="post">
         <div class="modal fade" id="myModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
               <div class="modal-content">
                   <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                       <h4 class="modal-title" id="myModalLabel">Add New</h4>
                   </div>
                   <div class="modal-body">
                       <<!-- div class="form-group">
                           <input type="text" name="kode_barang" class="form-control" placeholder="Kode Barang" required>
                       </div> -->
                                         <div class="form-group">
                           <input type="text" name="nm_barang" class="form-control" placeholder="Nama Barang" required>
                       </div>
                                         <div class="form-group">
                           <select name="kategori" class="form-control" placeholder="Kode Barang" required>
                                                      <?php foreach ($kategori->result() as $row) :?>
                                                            <option value="<?php echo $row->id;?>"><?php echo $row->kategori;?></option>
                                                        <?php endforeach;?>
                                                 </select>
                       </div>
                                         <div class="form-group">
                           <input type="text" name="harga" class="form-control" placeholder="Harga" required>
                       </div>
                       <div class="form-group">
                           <input type="text" name="jumlah" class="form-control" placeholder="jumlah" required>
                       </div>
 
                   </div>
                   <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" id="add-row" class="btn btn-success">Save</button>
                   </div>
                    </div>
            </div>
         </div>
     </form>
 
     <!-- Modal Update Produk-->
      <form id="add-row-form" action="<?php echo base_url().'kategoriadmin/update'?>" method="post">
         <div class="modal fade" id="ModalUpdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
               <div class="modal-content">
                   <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                       <h4 class="modal-title" id="myModalLabel">Update Produk</h4>
                   </div>
                   <div class="modal-body">
                       <!-- <div class="form-group">
                           <input type="text" name="kode_barang" class="form-control" placeholder="Kode Barang" required>
                       </div> -->
                                         <div class="form-group">
                           <input type="text" name="nm_barang" class="form-control" placeholder="Nama Barang" required>
                       </div>
                                         <div class="form-group">
                           <select name="kategori" class="form-control" placeholder="Kode Barang" required>
                                                      <?php foreach ($kategori->result() as $row) :?>
                                                            <option value="<?php echo $row->id;?>"><?php echo $row->kategori;?></option>
                                                        <?php endforeach;?>
                                                 </select>
                       </div>
                                         <div class="form-group">
                           <input type="text" name="harga" class="form-control" placeholder="Harga" required>
                       </div>
                       <div class="form-group">
                           <input type="text" name="jumlah" class="form-control" placeholder="jumlah" required>
                       </div>
 
                   </div>
                   <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" id="add-row" class="btn btn-success">Update</button>
                   </div>
                    </div>
            </div>
         </div>
     </form>
 
     <!-- Modal Hapus Produk-->
      <form id="add-row-form" action="<?php echo base_url().'kategoriadmin/delete'?>" method="post">
         <div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
               <div class="modal-content">
                   <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                       <h4 class="modal-title" id="myModalLabel">Hapus Produk</h4>
                   </div>
                   <div class="modal-body">
                           <input type="hidden" name="id" class="form-control" placeholder="Kode Barang" required>
                                                 <strong>Anda yakin mau menghapus record ini?</strong>
                   </div>
                   <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" id="add-row" class="btn btn-success">Hapus</button>
                   </div>
                    </div>
            </div>
         </div>
     </form>
 
<script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap.js"></script>
 
<script>
    $(document).ready(function(){
        // Setup dataTables
        $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
      {
          return {
              "iStart": oSettings._iDisplayStart,
              "iEnd": oSettings.fnDisplayEnd(),
              "iLength": oSettings._iDisplayLength,
              "iTotal": oSettings.fnRecordsTotal(),
              "iFilteredTotal": oSettings.fnRecordsDisplay(),
              "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
              "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
          };
      };
 
      var table = $("#mytable").dataTable({
          initComplete: function() {
              var api = this.api();
              $('#mytable_filter input')
                  .off('.DT')
                  .on('input.DT', function() {
                      api.search(this.value).draw();
              });
          },
              oLanguage: {
              sProcessing: "loading..."
          },
              processing: true,
              serverSide: true,
              ajax: {"url": "<?php echo base_url().'kategoriadmin/get_produk_json'?>", "type": "POST"},
                    columns: [
                                                {"data": "id"},
                                                {"data": "nm_barang"},
                                                //render harga dengan format angka
                        {"data": "harga", render: $.fn.dataTable.render.number(',', '.', '')},
                        {"data": "jumlah"},
                        {"data": "kategori"},
                        {"data": "view"}
                  ],
                order: [[1, 'asc']],
          rowCallback: function(row, data, iDisplayIndex) {
              var info = this.fnPagingInfo();
              var page = info.iPage;
              var length = info.iLength;
              $('td:eq(0)', row).html();
          }
 
      });
            // end setup dataTables
            // get Edit Records
            $('#mytable').on('click','.edit_record',function(){
            var kode=$(this).data('kode');
                        var nama=$(this).data('nama');
                        var harga=$(this).data('harga');
                        var jumlah=$(this).data('jumlah');
                        var kategori=$(this).data('kategori');
            $('#ModalUpdate').modal('show');
            $('[name="id"]').val(kode);
                        $('[name="nm_barang"]').val(nama);
                        $('[name="harga"]').val(harga);
                        $('[name="jumlah"]').val(jumlah);
                        $('[name="kategori"]').val(kategori);
      });
            // End Edit Records
            // get Hapus Records
            $('#mytable').on('click','.hapus_record',function(){
            var kode=$(this).data('kode');
            $('#ModalHapus').modal('show');
            $('[name="id"]').val(kode);
      });
            // End Hapus Records
 
    });
</script>
</body>
</html>