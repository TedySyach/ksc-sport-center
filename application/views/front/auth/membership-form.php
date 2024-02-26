<?php $this->load->view('front/header'); ?>
<?php $this->load->view('front/navbar'); ?>
<!-- Add this link to include Font Awesome 4 CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
    .container {
        max-width: 800px;
        margin: 0 auto;
    }

    .breadcrumb {
        background-color: #f8f9fa;
    }

    h1 {
        color: #007bff;
    }

    label {
        font-weight: bold;
    }

    .form-group {
        margin-bottom: 20px;
    }

    input[type="file"] {
        padding: 10px;
        margin-top: 5px;
        border: 1px solid #ced4da;
        border-radius: 4px;
    }

    button {
        background-color: #007bff;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    button:hover {
        background-color: #0056b3;
    }
    
     .my-btn {
        padding: 10px 20px;
        font-size: 14px;
        cursor: pointer;
        border: none;
        border-radius: 5px;
    }

    .my-btn-info {
        background-color: #3498db;
        color: #ffffff;
    }

    .my-btn-secondary {
        background-color: #7f8c8d;
        color: #ffffff;
    }

    .my-btn-success {
        background-color: #2ecc71;
        color: #ffffff;
    }

    .my-btn-danger {
        background-color: #e74c3c;
        color: #ffffff;
    }

    .my-btn-warning {
        background-color: #f39c12;
        color: #ffffff;
    }

    .my-btn:disabled {
        opacity: 0.6;
        cursor: not-allowed;
    }

  
</style>

<div class="container">
	<div class="row">
    <div class="col-lg-12">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="<?php echo base_url() ?>"><i class="fa fa-home"></i> Home</a></li>
					<li class="breadcrumb-item active">Membership</li>
				</ol>
			</nav>
    </div>

		<div class="col-lg-12"><h1>INFORMASI DATA DIRI</h1><hr>
			<div class="row">
				<div class="col-sm-6"><label>Nama</label><br>
		      <?php echo $profil->name ?><br><br>
		    </div>
		    <div class="col-sm-6"><label>Username</label><br>
		      <?php echo $profil->username ?><br><br>
		    </div>
			</div>
			<div class="row">
		    <div class="col-sm-6"><label>No. HP</label><br>
		      <?php echo $profil->phone ?><br><br>
		    </div>
		    <div class="col-sm-6"><label>Email</label><br>
		      <?php echo $profil->email ?><br><br>
		    </div>
			</div>
	    <div class="form-group"><label>Alamat</label><br>
	      <?php echo $profil->address.', '.$profil->nama_kota.', '.$profil->nama_provinsi ?>
	    </div>
        <hr>
              <!-- Membership Submission Form -->
             <form action="<?= base_url('auth/submitFormPengajuan') ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                     <label for="identity_card">
                        <i class="fa fa-id-card-o"></i> Kartu Identitas
                    </label>
                    <input type="file" class="form-control" id="identity_card" name="identity_card" accept="image/*" required>
                </div>
                <?php
                    if ($cekRequest == null) {
                        echo '<button type="submit" class="my-btn my-btn-info">Ajukan Member Premium</button>';
                    } else {
                        $status = $cekRequest['status']; 

                        if ($status == 0) {
                            echo '<button type="button" class="my-btn my-btn-secondary" disabled>Sedang Di Prosess Admin</button>';
                        } else if ($status == 1) {
                            echo '<button type="button" class="my-btn my-btn-success" disabled>Pengajuan Diterima</button>';
                        } else if ($status == 2) {
                            echo '<button type="button" class="my-btn my-btn-danger" disabled>Pengajuan DiTolak</button>';
                        } else {
                            echo '<button type="button" class="my-btn my-btn-warning" disabled>Pengajuan Di Tangguhkan</button>';
                        }
                    }
                  ?>


            </form>
            <!-- End of Membership Submission Form -->

		</div>
	</div>
</div>

<?php $this->load->view('front/footer'); ?>
