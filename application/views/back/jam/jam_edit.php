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
              <div class="box-header">
               <h1> Data Waktu : <?= $jam['jam'] . '-' . $jam['jam_selesai'] ; ?> </h1>
              </div>
              <div class="box-body">
								<?php echo validation_errors() ?>
								<?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');} ?>
								<?php echo form_open($action);?>
									<div class="form-group"><label>Harga Normal</label>
										<?php echo form_input($harga, $jam['harga_jual']);?>
									</div>
									<div class="form-group"><label>Harga Sabtu</label>
										<?php echo form_input($harga_sabtu, $jam['harga_jual_sabtu']);?>
									</div>
									<div class="form-group"><label>Harga Minggu</label>
										<?php echo form_input($harga_minggu, $jam['harga_jual_minggu']);?>
									</div>
									<?php echo form_input($id_jam,$jam['id']);?>
								
									<button type="submit" name="submit" class="btn btn-success"><?php echo $button_submit ?></button>
									<button type="reset" name="reset" class="btn btn-danger"><?php echo $button_reset ?></button>
								<?php echo form_close(); ?>
							</div>
						</div>
          </div><!-- ./col -->
        </div><!-- /.row -->
      </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
    <?php $this->load->view('back/footer') ?>
  </div><!-- ./wrapper -->
  <?php $this->load->view('back/js') ?>
</body>
</html>
