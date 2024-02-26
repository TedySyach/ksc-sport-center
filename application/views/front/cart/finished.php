<?php $this->load->view('front/header'); ?>
<?php $this->load->view('front/navbar'); ?>
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
            padding-top:10px;
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
		font-size: 0.8em;
       
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
<div class="container">
	<div class="row">
    <div class="col-sm-12 col-lg-12">
			<nav aria-label="breadcrumb">
			  <ol class="breadcrumb">
			    <li class="breadcrumb-item"><a href="<?php echo base_url() ?>"><i class="fa fa-home"></i> Home</a></li>
					<li class="breadcrumb-item active">Pembayaran</li>
			  </ol>
			</nav>
    </div>

   <div class="col-lg-12"><h1 id="countdown" class="countdown">Waktu Tersisa: 3:00</h1>
			<h4 class="inv">INVOICE NO. <?php echo $cart_finished_row->id_invoice ?> (<font color='red'>BELUM LUNAS</font>)</h4>
			<hr>
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
								<th scope="row">Diskon (Member)</th>
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

							<button id="pay-button" class="btn btn-primary">Bayar Sekarang</button>
							
					</div>
  		
  			</div>

	  </div>
  </div>
</div>



<!-- TODO: Remove ".sandbox" from script src URL for production environment. Also input your client key in "data-client-key" -->
<script src="https://app.midtrans.com/snap/snap.js" data-client-key="Mid-client-CMMvQbbR-Df185dW"></script>
    <script type="text/javascript">
      document.getElementById('pay-button').onclick = function(){
        // SnapToken acquired from previous step
        snap.pay('<?=$snapToken?>', {
          // Optional
          onSuccess: function(result){
			 // Redirect to another page after successful payment
			 window.location.href = "<?php echo base_url('cart/finishedSukses') ?>";
		},
          // Optional
          onPending: function(result){
             window.location.href = "<?php echo base_url('') ?>";
          },
          // Optional
          onError: function(result){
            window.location.href = "<?php echo base_url('') ?>";
          }
        });
      };
    </script>
    
    
    

<script>
// Set waktu awal dalam detik
var countdownTime = 180; // 3 menit

// Fungsi untuk mengupdate hitung mundur
function updateCountdown() {
    var minutes = Math.floor(countdownTime / 60);
    var seconds = countdownTime % 60;

    // Tampilkan hitung mundur pada elemen dengan ID "countdown"
    document.getElementById('countdown').innerText = 'Waktu Tersisa: ' + minutes + ':' + (seconds < 10 ? '0' : '') + seconds;

    // Kurangi waktu mundur
    countdownTime--;

    // Jika waktu mundur habis, redirect ke halaman lain
    if (countdownTime < 0) {
        window.location.href = '<?php echo base_url() ?>';
    }
}

// Jalankan updateCountdown setiap detik
setInterval(updateCountdown, 1000);
</script>

<?php $this->load->view('front/footer'); ?>
