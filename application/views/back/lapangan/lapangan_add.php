<?php $this->load->view('back/meta') ?>
<style>
    /* Style untuk select option */
    select {
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
            <?php echo validation_errors() ?>
            <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');} ?>
            <?php echo form_open_multipart($action);?>
						  <div class="box box-primary">
                <div class="box-body">
  								<div class="form-group"><label>Cabang Olahraga</label>
                      <select class="form-control" name="cabor" required>
                        <option value="">Pilih Cabor</option>
                        <?php foreach($cabor as $cabor){ ?>
                          <option value="<?= $cabor->id_cabor ?>" ><?= $cabor->nama_cabor ?></option>
                        <?php } ?>
                      
                      </select>
  								</div>
  								<div class="form-group"><label>Nama Lapangan</label>
  									<?php echo form_input($nama_lapangan);?>
  								</div>
                  <div class="form-group"><label>Foto</label>
                    <input type="file" class="form-control" name="foto" id="foto" onchange="tampilkanPreview(this,'preview')"/>
                    <br><p><b>Preview Foto</b><br>
                    <img id="preview" src="" alt="" width="350px"/>
                  </div>
                </div>
                <div class="box-footer">
  								<button type="submit" name="submit" class="btn btn-success"><?php echo $button_submit ?></button>
  								<button type="reset" name="reset" class="btn btn-danger"><?php echo $button_reset ?></button>
                </div>
						  </div>
            <?php echo form_close(); ?>
          </div><!-- ./col -->
        </div><!-- /.row -->
      </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
    <?php $this->load->view('back/footer') ?>
  </div><!-- ./wrapper -->
  <?php $this->load->view('back/js') ?>
  <script type="text/javascript">
  function tampilkanPreview(foto,idpreview)
  { //membuat objek gambar
    var gb = foto.files;
    //loop untuk merender gambar
    for (var i = 0; i < gb.length; i++)
    { //bikin variabel
      var gbPreview = gb[i];
      var imageType = /image.*/;
      var preview=document.getElementById(idpreview);
      var reader = new FileReader();
      if (gbPreview.type.match(imageType))
      { //jika tipe data sesuai
        preview.file = gbPreview;
        reader.onload = (function(element)
        {
          return function(e)
          {
            element.src = e.target.result;
          };
        })(preview);
        //membaca data URL gambar
        reader.readAsDataURL(gbPreview);
      }
      else
      { //jika tipe data tidak sesuai
        alert("Tipe file tidak sesuai. Gambar harus bertipe .png, .gif atau .jpg.");
      }
    }
  }
  </script>
</body>
</html>
