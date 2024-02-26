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
         <div class="row" style="margin:5px;">
            <div class="col">
              <a href="<?php echo base_url('admin/transaksi/create')?>" class="btn btn-primary">+ Transaksi</a>
            </div>
          </div>
      </section>
      <!-- Main content -->
      <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-12">
						<div class="box box-primary">
              <div class="box-body">
								<?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                <div class="table-responsive no-padding">
									<table id="datarequest" class="table table-striped">
										<thead>
											<tr>
                        <th style="text-align: center">No.</th>
                        <th style="text-align: center">Invoice</th>
                        <th style="text-align: center">Atas Nama</th>
      									<th style="text-align: center">Dibuat</th>
      									<th style="text-align: center">Grand Total</th>
      									<th style="text-align: center">Status</th>
                        <th style="text-align: center">Aksi</th>
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

          table = $('#datarequest').DataTable({
              responsive: true,
              "destroy": true,
              "processing": true,
              "serverSide": true,
              "order": [],
          
                
                "ajax": {
                    "url": "<?= base_url('admin/transaksi/ambildata'); ?>",
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
</body>
</html>
