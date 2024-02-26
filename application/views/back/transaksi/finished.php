<?php $this->load->view('back/meta') ?>
<style>
	
	.cartItemsContainer2 {
		width: 100%;
	}
	.image-style {
        max-width: 200px; /* Adjust the max-width to your desired size */
        height: auto;
        margin-bottom: 10px;
        border-radius: 19px; /* Adjust the border-radius for rounded corners */
        margin:11px;
        padding:5px;
    }

    /* Add this style to your CSS file or within a <style> tag in your HTML document */
    .cart-item-container {
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
        background-color: rgb(37, 37, 37);
        color: white;
        border-radius: 19px; /* Adjust the border-radius for rounded corners */
    }

	.flex-grow-1 {
        flex-grow: 1;
        padding-top:15px;
        width:65%;
    }

    /* Add this style to your CSS file or within a <style> tag in your HTML document */
    .text-right-margin-20 {
        padding-top:28px;
        margin-right:30px;
        width:35%;
    }

    /* Add this style to your CSS file or within a <style> tag in your HTML document */
   
    .total-card-col {
        box-sizing: border-box; /* Adjust the box-sizing property */
        padding:10px;
        background-color: grey;
        color: white;
        border-radius: 8px; /* Adjust the border-radius for rounded corners */
        margin:3px;
       
    }
    .text-content {
		font-size: 1.2em;
       
    }
    .text-harga {
		font-size: 1.3em;
        color:#B8860B;
    }

	#pay-button {
    width: 100%; /* Lebar penuh sesuai dengan parent div */
		border-radius: 10px; /* Radius sudut untuk memberikan efek border melengkung */
		padding: 10px; /* Menambahkan padding agar tombol terlihat lebih baik */
		box-sizing: border-box; /* Menyertakan padding dalam hitungan lebar total */
		/* Tambahan gaya lainnya sesuai kebutuhan */
	}
	#pay-tunai {
    width: 100%; /* Lebar penuh sesuai dengan parent div */
		border-radius: 10px; /* Radius sudut untuk memberikan efek border melengkung */
		padding: 10px; /* Menambahkan padding agar tombol terlihat lebih baik */
		box-sizing: border-box; /* Menyertakan padding dalam hitungan lebar total */
    margin-top:10px;
		/* Tambahan gaya lainnya sesuai kebutuhan */
	}
	
	#inv-unduh {
         width: 100%; /* Lebar penuh sesuai dengan parent div */
		border-radius: 10px; /* Radius sudut untuk memberikan efek border melengkung */
		padding: 10px; /* Menambahkan padding agar tombol terlihat lebih baik */
		box-sizing: border-box; /* Menyertakan padding dalam hitungan lebar total */
        margin-top:10px;
		/* Tambahan gaya lainnya sesuai kebutuhan */
	}
	#pay-back {
        width: 100%; /* Lebar penuh sesuai dengan parent div */
		border-radius: 10px; /* Radius sudut untuk memberikan efek border melengkung */
		padding: 10px; /* Menambahkan padding agar tombol terlihat lebih baik */
		box-sizing: border-box; /* Menyertakan padding dalam hitungan lebar total */
         margin-top:10px;
		/* Tambahan gaya lainnya sesuai kebutuhan */
	}
	.countdown {
		font-size: 37px; /* Jika Anda ingin memberikan gaya pada kelas countdown juga */
		font-weight: bold; /* Menambahkan ketebalan pada teks */
		/* Tambahan gaya lainnya sesuai kebutuhan */
	}
	.inv {
		font-size: 25px; /* Jika Anda ingin memberikan gaya pada kelas countdown juga */
	}




    /* Media query for smaller screens */
    @media only screen and (max-width: 600px) {
        .cart-item-container {
            font-size: 12px; /* Adjust the font size for smaller screens */
        }
        .image-style {
            max-width: 100px; /* Adjust the max-width to your desired size */
        }

        .flex-grow-1 {
            flex-grow: 1;
            padding-top:9px;
            padding-left:0;
            width:65%;
        }

        /* Add this style to your CSS file or within a <style> tag in your HTML document */
        .text-right-margin-20 {
            padding-top:15px;
            padding-bottom:15px;
            padding-right:30px;
            width:35%;
			margin-right:0px;
        }

        .total-card-col {
            box-sizing: border-box; /* Adjust the box-sizing property */
            padding:5px;
            border-radius: 5px; /* Adjust the border-radius for rounded corners */
            margin:3px;
            max-width:100%;
        
        }

		.text-content {
		font-size: 0.7em;
       
		}
		.text-harga {
			font-size: 0.9em;
		}

	    .countdown {
			font-size: 27px; /* Jika Anda ingin memberikan gaya pada kelas countdown juga */
	
		}

		.inv {
		 font-size: 13px; /* Jika Anda ingin memberikan gaya pada kelas countdown juga */
		}


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
                    <h4>INVOICE NO. <?php echo $cart_finished_row->id_invoice ?> (<font color='red'>BELUM LUNAS</font>)</h4>
                    <div class="row">
                      <div class="col-lg-8">
                          <div class="cartItemsContainer2">
                            <?php $no=1; foreach ($cart_finished as $cart){ ?>
                              <div class="cart-item-container">
                                <img src="<?= base_url('assets/images/lapangan/') .$cart->foto ?>" alt="Image Description" class="image-style">
                                <div class="flex-grow-1"> 
                                  <span  class="text-content">
                                  <b>  <?= $cart->nama_lapangan ?>  </b> 
                                  <br> <?= $cart->jam_mulai  .  ' - '  . $cart->jam_selesai ?>  <br>  <?= tgl_indo($cart->tanggal) ?>  <br> 
                                  </span>
                                  <span class="text-harga"  ><b>Rp.<?= number_format($cart->harga_jual).' / '.$cart->durasi ?> Jam</b><span> 
                                </div> 
                                <div class="text-right-margin-20"> 
                                  <div class="row"> 
                                    <div class="col-lg-12 total-card-col"> 
                                    <label style="font-size: 1.1em;">Total:</label><br> 
                                    <span style="font-size: 1.0em; color:#00FFFF;">Rp. <b>  <?= number_format($cart->harga_jual) ?>  </b></span> 
                                    </div> 
                                  </div> 
                                </div>
                              </div>
                            <?php } ?>
                          </div>
                      </div>
                      <div class="col-lg-4">
                
                          <table class="table table-striped table-bordered">
                          <tbody>
                          <tr>
                            <th scope="row">SubTotal</th>
                            <td align="right">Rp</td>
                                <td align="right"><?php echo number_format($cart_finished_row->subtotal) ?></td>
                            </tr>
                              <tr>
                            <th scope="row">Diskon Member  (<?= $cart_finished_row->diskonPersen. '%' ?> )</th>
                            <td align="right">Rp</td>
                                <td align="right"><?php echo number_format($cart_finished_row->diskon) ?></td>
                            </tr>
                              <tr>
                            <th scope="row">Grand Total</th>
                            <td align="right">Rp</td>
                                <td align="right"><b><?php echo number_format($cart_finished_row->grand_total) ?></b></td>
                            </tr>
                            </tbody>
                          </table>

                          <button id="pay-button" class="btn btn-primary">Bayar CashLez</button>
                          <a href="<?php echo base_url('admin/transaksi/set_lunas/').$cart_finished_row->id_trans ?>" onclick="return confirm('Apakah Anda yakin ingin melanjutkan?')">
                              <button name="update" id="pay-tunai" class="btn btn-success"><i class="fa fa-check"></i>Bayar Tunai</button>
                          </a>
                           <?php echo form_open('admin/transaksi/download_invoice/'.$cart_finished_row->id_trans, array("target"=>"_blank")) ?>
						   	<button type="submit"  id="inv-unduh" name="download_invoice" class="btn btn-info">Download Invoice</button>
						  <?php echo form_close() ?>
                          <a id="pay-back" href="<?= base_url('admin/transaksi') ?>" class="btn btn-primary">Ke List Transaksi</a>
                          
                      </div>
                  
                    </div>

                 
          </div>

</div><!-- /.row -->
</section><!-- /.content -->
</div><!-- /.wrapper -->
<?php $this->load->view('back/footer') ?>
<?php $this->load->view('back/js') ?>

<!-- TODO: Remove ".sandbox" from script src URL for production environment. Also input your client key in "data-client-key" -->
<script src="https://app.midtrans.com/snap/snap.js" data-client-key="Mid-client-CMMvQbbR-Df185dW"></script>
    <script type="text/javascript">
      document.getElementById('pay-button').onclick = function(){
        // SnapToken acquired from previous step
        snap.pay('<?=$snapToken?>', {
          // Optional
          onSuccess: function(result){
          
            window.location.href = "<?php echo base_url('admin/transaksi/finishedSukses') ?>";
          },
          // Optional
          onPending: function(result){
            
          },
          // Optional
          onError: function(result){
            
          }
        });
      };
    </script>
    </body>
</html>