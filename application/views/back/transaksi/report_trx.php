<?php $this->load->view('back/meta') ?>
  <div class="wrapper">
    <?php $this->load->view('back/navbar') ?>
    <?php $this->load->view('back/sidebar') ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1><?php echo $title ?></h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#"><?php echo $module ?></a></li>
					<li class="active"><?php echo $title ?></li>
        </ol>
       
      </section>
      <!-- Main content -->
      <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-12">
						<div class="box box-primary">
              <div class="box-body">
              <small>Select a range</small>
                 <div class="row" style="margin:20px;">
                      <div class="col-lg-6">
                          <form id="priode" class="m-3" action="javascript:void(0)">
                            <div class="row mb-2">
                              <div class="col">
                                <small class="mb-1">From Date</small>
                                <input type="date" class="form-control fromDate3" id="fromDate" name="fromDate">
                              </div>
                            </div>
                            <div class="row mb-2">
                              <div class="col">
                                <small class="mb-1">To Date</small>
                                <input type="date" class="form-control toDate3" id="toDate" name="toDate">
                              </div>
                            </div>
                            <div class="row mt-2" style="margin-top:5px;">
                              <div class="col">
                                <button type="submit" class="btn btn-primary m-2">Apply</button>
                                 <button type="button" class="btn btn-success m-2" id="exportData">Export Data</button>
                              </div>
                            </div>
                          </form>
                          
                      </div>
                  </div>
                  <hr>
                  <div class="table-responsive no-padding">
                      <table id="datarequest" class="table table-striped">
                          <thead>
                              <tr>
                                  <th style="text-align: center">No.</th>
                                  <th style="text-align: center">Transaksi</th>
                                  <th style="text-align: center">Tanggal Buat</th>
                                  <th style="text-align: center">Lapangan</th>
                                  <th style="text-align: center">Waktu</th>
                                  <th style="text-align: center">Diskon</th>
                                  <th style="text-align: center">Harga</th>
                                  <th style="text-align: center">Total</th>
                              </tr>
                          </thead>
                          <tbody>
                        
                          </tbody>
                      </table>
                  </div>
							</div>
						</div>
          </div><!-- ./col -->
        </div><!-- /.row -->
      </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
    <?php $this->load->view('back/footer') ?>
  </div><!-- ./wrapper -->
  <?php $this->load->view('back/js') ?>
	<!-- DATA TABLES-->
  <link href="<?php echo base_url('assets/plugins/') ?>datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
  <script src="<?php echo base_url('assets/plugins/') ?>datatables/jquery.dataTables.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url('assets/plugins/') ?>datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>

<script>
      $(document).ready(function() {
      // $('#dataTable').DataTable();
         $('#priode').submit(function(event) {
                // Mencegah form dari pengiriman langsung
                event.preventDefault();

                // Mengambil nilai dari inputan tanggal
                var fromDate = $('#fromDate').val();
                var toDate = $('#toDate').val();


                table = $('#datarequest').DataTable({
                    responsive: true,
                    "destroy": true,
                    "processing": true,
                    "serverSide": true,
                    "order": [],
                
                      
                      "ajax": {
                          data: {
                                fromDate: fromDate,
                                toDate: toDate
                                 },
                          "url": "<?= base_url('admin/report_trx/ambildata'); ?>",
                          "type": "POST"
                      },
                  
                  
                      "columnDefs": [{
                          "targets": [0],
                          "orderable": false,
                          "width": 5
                      }],
                  
                  });
        
        });

        table = $('#datarequest').DataTable({
              responsive: true,
              "destroy": true,
              "processing": true,
              "serverSide": true,
              "order": [],
          
              "ajax": {
              
                  "url": "<?= base_url('admin/report_trx/ambildata'); ?>",
                  "type": "POST"
              },
          
          
              "columnDefs": [{
                  "targets": [0],
                  "orderable": false,
                  "width": 5
              }],
          
          });
      });
   </script>
   <script>
    $(document).ready(function() {
        // Event saat tombol "Export Data" diklik
        $('#exportData').click(function() {
            // Mengambil nilai dari inputan tanggal
            var fromDate = $('#fromDate').val();
            var toDate = $('#toDate').val();

            // Mengarahkan browser untuk mengunduh file Excel
            window.location.href = '<?= base_url('admin/report_trx/ambildataExcel'); ?>?fromDate=' + fromDate + '&toDate=' + toDate;
        });
    });

   </script>
</body>
</html>
