<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<body>
  <table align="center">
    <tr>
      <th rowspan="3"></th>
      <td align="center">
        <font style="font-size: 18px"><b><?php echo $company_data->company_name;?></b></font>
        <br><?php echo $company_data->company_address;?>
        <br>No. HP: <?php echo $company_data->company_phone;?> | Telp: <?php echo $company_data->company_phone2;?> | Email: <?php echo $company_data->company_email;?>
      </td>
    </tr>
  </table>
  <hr/>
  <div align="center">
    <b>INVOICE NO. <?php echo $cart_finished_row->id_invoice ?>
      <?php if($cart_finished_row->status == '1'){ ?>
        <p style='color:red'>(BELUM LUNAS)</p>
      <?php }elseif($cart_finished_row->status == '2'){ ?>
        <p style='color:green'>(LUNAS)</p>
      <?php } ?>
    </b>

  </div>
    <table align="left" width="100%">
      <tbody>
        <tr>
          <th scope="row">Payment Type</th>
          <td style="text-align:left;width: ">:</td>
          <td style="text-align:left;width: 80px"><b><?php echo $cart_finished_row->payment_type ?></b></td>
        </tr>
        <?php 
          if($cart_finished_row->payment_type == 'bank_transfer') {
         ?>
        <tr>
          <th scope="row">Company code</th>
          <td style="text-align:left;width: ">:</td>
          <td style="text-align:left;width: 80px"><b><?php echo $cart_finished_row->company_code ?></b></td>
        </tr>
        <tr>
          <th scope="row">Bank transfer</th>
          <td style="text-align:left;width: ">:</td>
          <td style="text-align:left;width: 80px"><b><?php echo $cart_finished_row->bank_transfer ?></b></td>
        </tr>
        <tr>
          <th scope="row">Virtual account number</th>
          <td style="text-align:left;width: ">:</td>
          <td style="text-align:left;width: 80px"><b><?php echo $cart_finished_row->va ?></b></td>
        </tr>
        <?php } ?>
      </tbody>
    </table>

  <?php if($this->session->userdata('user_id') != NULL){ ?>
    <table >
      <thead>
        <tr>
          <th style="text-align: center; background: #ddd; width: 30px">No.</th>
          <th style="text-align: center; background: #ddd; width: 130px">Nama Lapangan</th>
          <th style="text-align: center; background: #ddd; width: 160px">Harga Per 2 Jam</th>
          <th style="text-align: center; background: #ddd; width: 120px">Tanggal</th>
          <th style="text-align: center; background: #ddd; width: 80px">Mulai</th>
          <th style="text-align: center; background: #ddd; width: 80px">Selesai</th>
          <th style="text-align: center; background: #ddd; width: 70px">Total</th>
        </tr>
      </thead>
      <tbody>
      <?php $no=1; foreach ($cart_finished as $cart){ ?>
        <tr>
          <td style="text-align:center;width: 30px"><?php echo $no++ ?></td>
          <td style="text-align:center;width: 130px"><?php echo $cart->nama_lapangan ?></td>
          <td style="text-align:center;width: 100px"><?php echo number_format($cart->harga_jual) ?></td>
          <td style="text-align:center;width: 100px; padding-top:15px"><?php echo tgl_indo($cart->tanggal) ?></td>
          <td style="text-align:center;width: 83px"><?php echo $cart->jam_mulai ?></td>
          <td style="text-align:center;width: 83px"><?php echo $cart->jam_selesai ?></td>
          <td style="text-align:right;width: 75px"><?php echo number_format($cart->total) ?></td>
        </tr>
      <?php } ?>
      </tbody>
    </table>
    <hr>
    <table align="right" width="100%">
      <tbody>
        <tr>
          <th scope="row">SubTotal:</th>
          <td style="text-align:right;width: ">Rp</td>
          <td style="text-align:right;width: 80px"><?php echo number_format($cart_finished_row->subtotal) ?></td>
        </tr>
        <tr>
          <th scope="row">Diskon (Member):</th>
          <td style="text-align:right;width: ">Rp</td>
          <td style="text-align:right;width: 80px"><?php echo number_format($cart_finished_row->diskon) ?></td>
        </tr>
        <tr>
          <th scope="row">Grand Total:</th>
          <td style="text-align:right;width: ">Rp</td>
          <td style="text-align:right;width: 80px"><b><?php echo number_format($cart_finished_row->grand_total) ?></b></td>
        </tr>
      </tbody>
    </table>

	  <b>Venue Terms and Condition</b><hr>
		<ul>
      <li>Dilarang Membawa Sajam Dan Miras Ke Dalam Area Venue.</li>
      <li>Dilarang Merusak  Seluruh Fasilitas & Properti Venue.</li>
      <li>Wajib menjaga kebersihan lingkungan di dalam area venue.</li>
		</ul>
		<p align="center"><b>~ Terima Kasih ~</b></p>

  <?php } ?>

</body>
</html><!-- Akhir halaman HTML yang akan di konvert -->
