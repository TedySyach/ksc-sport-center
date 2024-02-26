<?php $this->load->view('back/meta') ?>
  <style>
   .container-select {
        display: grid;
        grid-template-columns: repeat(1, 1fr); /* 2 kolom */
        margin-bottom:5px;
    }

    /* Style untuk kolom (col) */
    .col {
        display: flex;
        flex-direction: column;
        width: 450px;
    }

   /* Style untuk select option */
    select {
        padding: 8px;
        margin: 5px 0;
        border-radius: 15px;
    }

    /* Style untuk option pada select */
    option {
        background-color: black; /* Warna latar belakang hitam */
        color: white; /* Warna teks putih */
    }
 </style>
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
		      <div class="box-header">
                 <div class="container-select">
                    <div class="col">
                        <label for="caborChange">Cabang Olahraga:</label>
                        <select id="caborChange">
                          <option value="">Pilih Cabor</option>
                          <?php foreach($cabor as $cabor){ ?>
                            <option value="<?= $cabor->id_cabor ?>" <?php if ($id == $cabor->id_cabor) { echo 'selected'; } ?> ><?= $cabor->nama_cabor ?></option>
                          <?php } ?>
                        
                        </select>
                    </div>
                </div>
              </div>
              <div class="box-body">
								<hr>
								<?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                <div class="table-responsive no-padding">
                    <table  class="table table-striped" id="dataJam">
                        <thead>
                            <tr>
                                <th style="text-align: center">No.</th>
                                <th style="text-align: center">Jam Mulai</th>
                                <th style="text-align: center">Durasi</th>
                                <th style="text-align: center">Jam Selesai</th>
                                <th style="text-align: center">Harga</th>
                                <th style="text-align: center">Harga Sabtu</th>
                                <th style="text-align: center">Harga Minggu</th>
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
          // $('#dataTable').DataTable();
              $("#caborChange").change(function() {
                    var caborId= $(this).val();
                
              table = $('#dataJam').DataTable({
                   responsive: true,
                  "destroy": true,
                  "processing": true,
                  "serverSide": true,
                  "order": [],
              
                    
                    "ajax": {
                        data: {'caborId': caborId },
                        "url": "<?= base_url('admin/jam/ambildata'); ?>",
                        "type": "POST"
                    },
                
                
                    "columnDefs": [{
                        "targets": [0],
                        "orderable": false,
                        "width": 5
                    }],
                
                });
            
            });
            table = $('#dataJam').DataTable({
                  responsive: true,
                  "destroy": true,
                  "processing": true,
                  "serverSide": true,
                  "order": [],
              
                  "ajax": {
                  
                      "url": "<?= base_url('admin/jam/ambildata'); ?>",
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
