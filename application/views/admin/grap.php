        <!-- Footer -->
        <footer class="site-footer">
            <div class="footer-inner bg-white">
                <div class="row">
                    <div class="col-sm-6">
                        Copyright &copy; 2018 Ela Admin
                    </div>
                    <div class="col-sm-6 text-right">
                        Designed by <a href="https://colorlib.com">Colorlib</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- /.site-footer -->
    </div>
    <!-- /#right-panel -->

    <!-- /#right-panel -->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/main.js"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Kategori', 'Jumlah'],
          <?php 
          foreach ($graph as $data) {
            echo "['".$data->kategori."', ".$data->jumlah."], ";
          }
          ?>
        ]);

        var options = {
          title: 'Jumlah Kategori Barang'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>


    <script type="text/javascript">
        jQuery(document).ready( function ($) {
            $('#table_id').DataTable();
        } );
        // new Morris.Line({
        //   // ID of the element in which to draw the chart.
        //   element: 'myfirstchart',
        //   // Chart data records -- each entry in this array corresponds to a point on
        //   // the chart.
        //   data: [
        //     <?php echo $jumlah;?>,
        //   ],
        //   // The name of the data record attribute that contains x-values.
        //   xkey: <?php echo $jumlah;?>,
        //   // A list of names of data record attributes that contain y-values.
        //   ykeys: ['Action Cam', 'Aksesoris', 'Drone', 'DSLR', 'Lensa', 'Mirrorless'],
        //   // Labels for the ykeys -- will be displayed when you hover over the
        //   // chart.
        //   labels: ['Action Cam', 'Aksesoris', 'Drone', 'DSLR', 'Lensa', 'Mirrorless']
        // });
</script>

</body>
</html>
