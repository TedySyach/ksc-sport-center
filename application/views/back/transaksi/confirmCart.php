<?php $this->load->view('back/meta') ?>

<style>
    .btn-secondary {
        background-color: #6c757d;
        border-color: #6c757d;
        color: #fff;
        pointer-events: none;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
        border-color: #545b62;
        color: #fff;
    }
    /* Add this style to your CSS file or within a <style> tag in your HTML document */
    .image-style {
        max-width: 150px; /* Adjust the max-width to your desired size */
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
        padding-top:11px;
        width:55%;
    }

    /* Add this style to your CSS file or within a <style> tag in your HTML document */
    .text-right-margin-20 {
        padding-top:20px;
        width:35%;
    }

    /* Add this style to your CSS file or within a <style> tag in your HTML document */
    .tombolHapus {
        text-align: center;
        box-sizing: border-box; /* Adjust the box-sizing property */
        background-color: red;
        color: white;
        border-radius: 8px; /* Adjust the border-radius for rounded corners */
        padding:20px;
        margin:3px;
        cursor: pointer;
    }

   
    .total-card-col {
        box-sizing: border-box; /* Adjust the box-sizing property */
        padding:10px;
        background-color: grey;
        color: white;
        border-radius: 8px; /* Adjust the border-radius for rounded corners */
        margin:3px;
       
    }

    .rounded-input {
        border-radius: 14px;
        /* Tambahan properti styling lainnya, sesuaikan sesuai kebutuhan */
        border: 1px solid #ccc;
        padding: 5px;
        padding-left: 10px; /* Ganti nilai ini sesuai kebutuhan */
        /* Dan lain-lain */
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
            padding-top:30px;
            width:65%;
        }

        /* Add this style to your CSS file or within a <style> tag in your HTML document */
        .text-right-margin-20 {
            padding-top:15px;
            padding-bottom:15px;
            padding-right:30px;
            width:35%;
        }

        .total-card-col {
            box-sizing: border-box; /* Adjust the box-sizing property */
            padding:5px;
            border-radius: 5px; /* Adjust the border-radius for rounded corners */
            margin:3px;
            max-width:100%;
        
        }

        .tombolHapus {
            text-align: center;
            box-sizing: border-box; /* Adjust the box-sizing property */
            border-radius: 5px; /* Adjust the border-radius for rounded corners */
            padding:5px;
            margin:3px;
            max-width:100%;
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
            <div class="row">
                <div class="col-lg-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active">Konfirmasi Pesanan</li>
                        </ol>
                    </nav>
                </div>

                <div class="col-lg-12">
                    <h1>KONFIRMASI PESANAN</h1>
                    <hr>
                    <div id="cartItemsContainer2"></div>
                </div>
             </div>
             <div class="row" >
                <div class="col-lg-12">
                   <a type="button" id="tombolAksi"  class="lanjutBayar" href="<?php echo base_url('admin/transaksi/confirmPesan') ?>">Konfirmasi Pesanan</a>
                </div> 
            </div>     
                        
      </section>
	</div>
</div>
<?php $this->load->view('back/footer') ?>
<?php $this->load->view('back/js') ?>
<script>
         function formatRupiah(angka) {
                var number_string = angka.toString();
                var split = number_string.split(',');
                var sisa = split[0].length % 3;
                var rupiah = split[0].substr(0, sisa);
                var ribuan = split[0].substr(sisa).match(/\d{3}/gi);

                if (ribuan) {
                var separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
                }

                rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
                return rupiah;
            }

            // Fungsi untuk mendapatkan nama bulan dari indeks bulan
            function getNamaBulan(index) {
                const namaBulan = [
                    "Januari", "Februari", "Maret", "April",
                    "Mei", "Juni", "Juli", "Agustus",
                    "September", "Oktober", "November", "Desember"
                ];

                return namaBulan[index];
            }

            // Fungsi untuk memformat tanggal
            function formatTanggal(tanggal) {
                const date = new Date(tanggal);
                const tgl = date.getDate();
                const namaBulan = getNamaBulan(date.getMonth());
                const tahun = date.getFullYear();

                return `${tgl} - ${namaBulan} - ${tahun}`;
            }

</script>     
<script>
        // Fungsi untuk menampilkan item keranjang di dalam modal
           $(document).ready(function () {
                // Ambil semua data item dari server menggunakan AJAX
                var submitButton = document.getElementById('tombolAksi'); // Tambahkan id pada tombol submit
                $.ajax({
                    url: '<?php echo base_url(); ?>admin/transaksi/getCartItems', // Gantilah dengan URL yang sesuai di CodeIgniter Anda
                    method: 'GET',
                    dataType: 'json',
                    success: function (response) {
                        var cartItems = response.cart_items;
                        submitButton.removeAttribute('disabled');
                        submitButton.classList.remove('btn-secondary'); // Hapus kelas btn-secondary jika tombol diaktifkan
                        // Ambil container untuk menampilkan item keranjang
                        var cartItemsContainer = document.getElementById('cartItemsContainer2');

                        // Bersihkan isi container
                        cartItemsContainer.innerHTML = '';
                      // Cek apakah session cart_items tersedia
                        if (cartItems && Object.keys(cartItems).length > 0) {
                            Object.keys(cartItems).forEach(function (idblend) {
                                // Buat tampilan untuk setiap item
                                var cartItem = cartItems[idblend];
                                var formattedHarga = formatRupiah(cartItem.harga_fix);
                                const tanggalFormatted = formatTanggal(cartItem.tgl);
                                var itemHtml = '<div class="cart-item-container">' +
                                                 '<img src="<?= base_url('assets/images/lapangan/') ?>' + cartItem.foto + '" alt="Image Description" class="image-style">' + // Add this line for the image
                                                '<div class="flex-grow-1">' +
                                                   '<span  style="font-size: 0.8em;">'+
                                                    '<b>' + cartItem.nama_lapangan + '</b>' +
                                                    '<br>' + cartItem.jam_mulai + ' - ' + cartItem.jam_selesai + '<br>' + tanggalFormatted + '<br>' +
                                                   '</span>'+
                                                    '<span style="font-size: 1.0em; color:#B8860B;"><b>Rp. ' + formattedHarga + ' / 2 Jam</b><span>' +
                                                '</div>' +
                                                '<div class="text-right-margin-20">' +
                                                      '<div class="row">' +
                                                      '<div class="col-lg-7 total-card-col">' +
                                                       
                                                        '<label style="font-size: 1.1em;">Total:</label><br>' +
                                                        '<span style="font-size: 1.0em; color:#00FFFF;">Rp. <b>' + formattedHarga + '</b></span>' +
                                                      '</div>' +
                                                      '<div class="col-lg-3 tombolHapus"  data-id="' + cartItem.idblend + '" onclick="hapusItem1(this)">' +
                                                       
                                                        '<button  type="button" style="margin-top: 5px ; background: none; border: none; cursor: pointer;">' +
                                                            '<i class="fa fa-trash" style=" font-size: 1.6em;"></i>' +
                                                        '</button>' +
                                                     '</div>' +
                                                     '</div>' +
                                                '</div></div>';
                                // Tambahkan tampilan item ke dalam container
                                cartItemsContainer.innerHTML += itemHtml;
                            });

                             
                        } else {
                            // Tampilkan pesan jika keranjang kosong
                            cartItemsContainer.innerHTML = '<p>Belum Ada Jadwal Yang Di Pesan</p>';
                            submitButton.setAttribute('disabled', 'disabled');
                            submitButton.classList.add('btn-secondary'); // Tambahkan warna secondary jika tombol dinonaktifkan
                        }
                    },
                    error: function (error) {
                        console.error('Error fetching cart items:', error);
                    }
                });
            });


            // Function to handle item deletion
            function hapusItem1(button) {
            var itemId = button.getAttribute('data-id');
                var dataToSend = {
                    // Tentukan data yang ingin Anda kirim, misalnya tanggal dan namaBulan
                    idblend: itemId
                };

                $.ajax({
                url: '<?php echo base_url(); ?>admin/transaksi/removeCartItem', // Gantilah dengan URL tujuan server Batal Anda
                type: 'POST', // Sesuaikan dengan metode HTTP yang diperlukan
                data: dataToSend,
                success: function(response) {
                    // Tindakan yang akan diambil jika permintaan berhasil
                    console.log(response);
                    showCartItemsUpdate();

                
                },
                error: function(error) {
                    // Tindakan yang akan diambil jika permintaan gagal
                    console.error('Gagal mengirim data Batal ke server:', error);
                }
                });
            }


            function showCartItemsUpdate() {
                 // Ambil semua data item dari server menggunakan AJAX
                 var submitButton = document.getElementById('tombolAksi'); // Tambahkan id pada tombol submit
                 $.ajax({
                    url: '<?php echo base_url(); ?>admin/transaksi/getCartItems', // Gantilah dengan URL yang sesuai di CodeIgniter Anda
                    method: 'GET',
                    dataType: 'json',
                    success: function (response) {
                        var cartItems = response.cart_items;
                        submitButton.removeAttribute('disabled');
                        submitButton.classList.remove('btn-secondary'); // Hapus kelas btn-secondary jika tombol diaktifkan

                        // Ambil container untuk menampilkan item keranjang
                        var cartItemsContainer = document.getElementById('cartItemsContainer2');

                        // Bersihkan isi container
                        cartItemsContainer.innerHTML = '';
                      // Cek apakah session cart_items tersedia
                        if (cartItems && Object.keys(cartItems).length > 0) {
                            Object.keys(cartItems).forEach(function (idblend) {
                                // Buat tampilan untuk setiap item
                                var cartItem = cartItems[idblend];
                                var formattedHarga = formatRupiah(cartItem.harga_fix);
                                const tanggalFormatted = formatTanggal(cartItem.tgl);
                                var itemHtml = '<div class="cart-item-container">' +
                                                 '<img src="<?= base_url('assets/images/lapangan/') ?>' + cartItem.foto + '" alt="Image Description" class="image-style">' + // Add this line for the image
                                                '<div class="flex-grow-1">' +
                                                   '<span  style="font-size: 0.8em;">'+
                                                    '<b>' + cartItem.nama_lapangan + '</b>' +
                                                    '<br>' + cartItem.jam_mulai + ' - ' + cartItem.jam_selesai + '<br>' + tanggalFormatted + '<br>' +
                                                   '</span>'+
                                                    '<span style="font-size: 1.0em; color:#B8860B;"><b>Rp. ' + formattedHarga + ' / 2 Jam</b><span>' +
                                                '</div>' +
                                                '<div class="text-right-margin-20">' +
                                                      '<div class="row">' +
                                                      '<div class="col-lg-7 total-card-col">' +
                                                       
                                                        '<label style="font-size: 1.1em;">Total:</label><br>' +
                                                        '<span style="font-size: 1.0em; color:#00FFFF;">Rp. <b>' + formattedHarga + '</b></span>' +
                                                      '</div>' +
                                                      '<div class="col-lg-3 tombolHapus"  data-id="' + cartItem.idblend + '" onclick="hapusItem1(this)">' +
                                                       
                                                        '<button   type="button" style="margin-top: 5px ; background: none; border: none; cursor: pointer;">' +
                                                            '<i class="fa fa-trash" style=" font-size: 1.6em;"></i>' +
                                                        '</button>' +
                                                     '</div>' +
                                                     '</div>' +
                                                '</div></div>';
                                // Tambahkan tampilan item ke dalam container
                                cartItemsContainer.innerHTML += itemHtml;
                            });

                               
                        } else {
                               // Tampilkan pesan jika Belum Ada Jadwal Yang Di Pesan
                                cartItemsContainer.innerHTML = '<p>Belum Ada Jadwal Yang Di Pesan</p>';
                                submitButton.setAttribute('disabled', 'disabled');
                                submitButton.classList.add('btn-secondary'); // Tambahkan warna secondary jika tombol dinonaktifkan
                        }
                    },
                    error: function (error) {
                        console.error('Error fetching cart items:', error);
                    }
                });
            }


        </script>