<?php $this->load->view('back/meta') ?>
<style>
    /* Custom Bootstrap v3 badge styles */
 .badge-custom-info {
    background-color: #428bca; /* Slightly darker blue color */
    color: #fff;
}
.badge-custom-success {
    background-color: #5cb85c;
    color: #fff;
}

.badge-custom-danger {
    background-color: #d9534f;
    color: #fff;
}

.badge-custom-secondary {
    background-color: #555;
    color: #fff;
}

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
                        <label for="statusChange">Status Pengajuan:</label>
                        <select id="statusChange">
                            <option value="">Pilih status</option>
                            <option value="0" >Pengajuan</option>
                            <option value="1" >Pengajuan diterima</option>
                            <option value="2" >Pengajuan Ditolak</option>
                            <option value="3" >Pengajuan Ditangguhkan</option>
                        </select>
                    </div>
                </div>
              </div>
              <div class="box-body">
								<hr>
								<?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                <div class="table-responsive no-padding">
                    <table id="datarequest" class="table table-striped">
                        <thead>
                            <tr>
                                <th style="text-align: center">No.</th>
                                <th style="text-align: center">Nama</th>
                                <th style="text-align: center">Email</th>
                                <th style="text-align: center">No Hp</th>
                                <th style="text-align: center">Foto KTP</th>
                                <th style="text-align: center">Status</th>
                                <th style="text-align: center">Keterangan</th>
                                <th style="text-align: center">Tgl Pengajuan</th>
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

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><center><b>Konfirmasi Pengajuan</b></center></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
     
             <form id="konfirmPengajuan">
                  <div class="form-group">
                    <input type="hidden" id="idP" name="id">
                      <label for="statusChange1">Status Pengajuan:</label>
                        <select id="statusChange1" class="form-control" name="status" required>
                            <option value="">Pilih status</option>
                            <option value="0" >Pengajuan</option>
                            <option value="1" >Pengajuan diterima</option>
                            <option value="2" >Pengajuan Ditolak</option>
                            <option value="3" >Pengajuan Ditangguhkan</option>
                        </select>
                        <!-- Text warning untuk menampilkan pesan kesalahan status -->
                         <p id="statusWarning" style="color: red; display: none;">Harap pilih status pengajuan!</p>
                   </div>
                   <div class="form-group">
                      <label for="exampleFormControlTextarea1">Keterangan</label>
                      <textarea required class="form-control" id="exampleFormControlTextarea1" rows="3" name="ket">-</textarea>
                        <!-- Text warning untuk menampilkan pesan kesalahan keterangan -->
                         <p id="keteranganWarning" style="color: red; display: none;">Harap isi keterangan!</p>
                    </div>
              
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onclick="submitForm()">Save changes</button>
          </div>
          </form>
        </div>
      </div>
    </div>

    <?php $this->load->view('back/footer') ?>
  </div><!-- ./wrapper -->
  <?php $this->load->view('back/js') ?>
	<!-- DATA TABLES-->
  <link href="<?php echo base_url('assets/plugins/') ?>datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
  <script src="<?php echo base_url('assets/plugins/') ?>datatables/jquery.dataTables.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url('assets/plugins/') ?>datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>

  <script>
    function submitForm() {
          var selectedStatus = $('#statusChange1').val();
          var keterangan = $('#exampleFormControlTextarea1').val();
          
          // Validasi status
          if (selectedStatus === "") {
              $('#statusWarning').show();
              return;
          } else {
              $('#statusWarning').hide();
          }
          
          // Validasi keterangan
          if (keterangan.trim() === "") {
              $('#keteranganWarning').show();
              return;
          } else {
              $('#keteranganWarning').hide();
          }
        
          var formData = $('#konfirmPengajuan').serialize();
        
        $.ajax({
            type: 'POST',
            url: '<?= base_url('admin/request_member/konfirmaction') ?>', // Ganti dengan URL yang benar
            data: formData,
            success: function(response) {
                // Tanggapan dari server
                console.log(response);
                // Tambahkan kode di sini untuk menangani tanggapan dari server jika diperlukan
                $('#konfirmPengajuan')[0].reset();
                $('#exampleModal').modal('hide'); // Menutup modal setelah pengiriman berhasil
                refreshData();
                // Menampilkan pesan dengan SweetAlert
                swal({
                    title: "Success",
                    text: response.message,
                    icon: "success",
                });
            },
            error: function(xhr, status, error) {
                // Tanggapan dari server jika terjadi kesalahan
                console.error(xhr.responseText);

                // Menampilkan pesan dengan SweetAlert
                swal({
                    title: "Error",
                    text: "Terjadi kesalahan saat memproses permintaan.",
                    icon: "error",
                });
            }
        });
    }
</script>
	
<script>
      $(document).ready(function() {
      // $('#dataTable').DataTable();
          $("#statusChange").change(function() {
                var status= $(this).val();

          table = $('#datarequest').DataTable({
               responsive: true,
              "destroy": true,
              "processing": true,
              "serverSide": true,
              "order": [],
          
                
                "ajax": {
                    data: {'status': status },
                    "url": "<?= base_url('admin/request_member/ambildata'); ?>",
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
              
                  "url": "<?= base_url('admin/request_member/ambildata'); ?>",
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
      function refreshData(){
         document.getElementById('statusChange').selectedIndex = 0;
         table = $('#datarequest').DataTable({
              responsive: true,
              "destroy": true,
              "processing": true,
              "serverSide": true,
              "order": [],
          
              "ajax": {
              
                  "url": "<?= base_url('admin/request_member/ambildata'); ?>",
                  "type": "POST"
              },
          
          
              "columnDefs": [{
                  "targets": [0],
                  "orderable": false,
                  "width": 5
              }],
          
          });
      }
   </script>



<script>
    $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Tombol yang membuka modal
        var id = button.data('id'); // Mengambil nilai data-id dari tombol
        var modal = $(this);
        modal.find('.modal-body #idP').val(id); // Menambahkan nilai data-id ke dalam modal
    });
</script>

</body>
</html>
