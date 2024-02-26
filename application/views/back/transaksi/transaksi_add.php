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
            <div class="col-lg-4">
              <?php echo form_open('#', array('id' => 'ctmForm')); ?>
                  <select class="form-control" name='customer' id="ctm">
                  <?php if (!isset($_SESSION['ctm-change'])): ?>
                    <option value="">...Pilih  Customer...</option>
                  <?php endif; ?>
                      <?php foreach($users as $usr) : ?>
                      <option value='<?= $usr->id ; ?>' <?php echo (isset($_SESSION['ctm-change']) && $_SESSION['ctm-change'] == $usr->id) ? 'selected' : ''; ?>><?= $usr->name ; ?></option>
                      <?php endforeach ; ?>
                  </select>
              <?php echo form_close(); ?>
           </div>
            <div class="col-lg-1">
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                +Customer
              </button>
           </div>
           <div class="col-lg-4">
              <select class="form-control" name='venue' id="lapanganSelect">
                 <option value="">.Pilih Lapang Dulu...</option>
                  <?php foreach($lapangan_new as $pay) : ?>
                   <option value='<?= $pay->id_lapangan ; ?>'><?= $pay->nama_lapangan.' (Cabor:'.$pay->nama_cabor.')' ; ?></option>
                  <?php endforeach ; ?>
              </select>
           </div>
           <div class="col-lg-1">
             <a class="btn btn-primary" type="button" id="showCartBtn"><i class="fa fa-shopping-cart fa-lg"></i> <span id="show-count" style=" background-color: red; color: white; border-radius: 50%; padding: 5px 10px; font-size: 12px; top: -5px; right: -5px;"></span></a>
           </div>
        </div>
        <div class="row" style="margin-top:10px;">
                <div class="col-lg-12">
                            <div class="row" style="margin:2px;">

                                <div class="col-lg-6 v1">
                                    <h4>Booking schedule </h4>
                                </div>
                                <div class="col-lg-6" style="padding-top:6px;">
                                    <div class="row">
                                        <div class="col-lg-4 v" style="padding-top:8px;">
                                            <lable >Pilih Tanggal Booking :</lable>
                                        </div>
                                        <div class="col-lg-8 v">
                                            <?php 
                                                $segment_4 = $this->uri->segment(4);
                                                if ($segment_4) {
                                                echo form_input($tanggal) ;

                                                echo "<script>
                                                            $(document).ready(function() {
                                                            refresdataWaktu();
                                                            });
                                                    </script>";
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <hr>
                    <div id="output-container"></div>
                </div>
        </div><!-- /.row -->
      </section><!-- /.content -->
     </div><!-- /.content-wrapper -->
    
    
      <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <?php echo form_open("admin/transaksi/registerCtm");?>
            <div class="modal-body">
          
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Email</label>
                  <input name="email" required type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlinput1" class="form-label">Nama Customer</label>
                  <input  name="nama" required class="form-control" id="exampleFormControlinput1" rows="3">
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlinput2" class="form-label">No Hp</label>
                  <input  name="nohp" required class="form-control" id="exampleFormControlinput2" rows="3">
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>


    
<!-- Modal Cart -->
<div id="cartModal" class="modal modal-s">
    <div class="modal-content modal-content-s">
        <span class="close" id="closeCartModal">&times;</span>
        <h4>Daftar Pemesanan</h4>
        <!-- Tampilkan item keranjang di sini -->
        <div id="cartItemsContainer"></div>
        
    </div>
</div>
    
    <?php $this->load->view('back/footer') ?>
  </div><!-- ./wrapper -->
  <?php $this->load->view('back/js') ?>
 <link href="<?php echo base_url('assets/plugins/') ?>datepicker/css/bootstrap-datepicker.css" rel="stylesheet">
		<script src="<?php echo base_url('assets/plugins/') ?>datepicker/js/bootstrap-datepicker.js"></script>
            <script>
                $(document).ready(function() {
                    $('#show-count').load("<?php echo base_url();?>admin/transaksi/show_countSesiCart");
                });
            </script>
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
        </script>
		<script type="text/javascript">
			const numberWithCommas = (x) => {
				var parts = x.toString().split(".");
				parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
				return parts.join(".");
			}

			$(function() {
				$(document).on("focus", ".tanggal", function() {
					$(this).datepicker({
						startDate: '0',
						autoclose: true,
						todayHighlight: true,
						format: 'yyyy-mm-dd'
					});
				});

        $('.tanggal').on('changeDate', function(ev) {
                    tanggal_el = $(this);
                    tanggal_val = $(this).val();

                    $.post('<?php echo base_url(); ?>admin/transaksi/getJamMulai', {
                        tanggal: tanggal_val,
                        lapangan_id: '<?= $segment_4 ?>',
                        id_cabor: '<?= $lapang->id_cabor ?>'
                    }, function(data) {
                        var html = '';

                        // Kelompokkan data berdasarkan tanggal
                        var groupedData = {};
                        data.forEach(function(item, index) {
                            var tgl = item.tgl;

                            if (!groupedData[tgl]) {
                                groupedData[tgl] = [];
                            }

                            groupedData[tgl].push(item);
                        });

                       // ...

                        // Buat grid dan kelompokkan berdasarkan tanggal
                        for (var tgl in groupedData) {
                            // Konversi string tanggal menjadi objek Date
                            var dateObj = new Date(tgl);

                            // Ambil informasi tanggal, nama bulan, dan nama hari
                            var tanggal = dateObj.getDate();
                            var namaBulan = new Intl.DateTimeFormat('id-ID', { month: 'long' }).format(dateObj);
                            var namaHari = new Intl.DateTimeFormat('id-ID', { weekday: 'long' }).format(dateObj);

                            html += '<div class="tanggal-group">';
                            
                             // Tampilkan tanggal dan nama bulan di atas
                            html += '<div class="header-w">';
                            html += '<div class="date-header">';
                            html += '<span >' + tanggal +', '+ namaBulan + '</span>';
                            html += '</div>';

                            // Tampilkan nama hari di bawah
                            html += '<div class="day-header">' + namaHari + '</div>';
                            html +='</div>';


                            groupedData[tgl].forEach(function(item, index) {
                                var lapangan_id1= '<?= $segment_4 ?>';
                                var id = item.id;
                                var tgl1 = item.tgl;
                                var jam_mulai = item.jam_mulai;
                                var durasi = item.durasi;
                                var jam_selesai = item.jam_selesai;
                                var harga_jual = item.harga_jual;
                                var harga_jual_sabtu = item.harga_jual_sabtu;
                                var harga_jual_minggu = item.harga_jual_minggu;
                                var is_booked = item.is_booked;
                                var rowSesi = item.is_sesicart;
                                var idBlend=lapangan_id1+id+tgl1;


                                if(is_booked != null) {
                                   var sts='Booked';
                                   var clsbook='secondary';
                                   var clsbtn='disabled';
                                } else {
                                    var clsbook='success';
                                    var sts='Available';
                                    var clsbtn='';
                                }

                                if (namaHari == 'Sabtu') {
                                    var hargaFix=harga_jual_sabtu;
                                } else  if (namaHari == 'Minggu') {
                                    var hargaFix=harga_jual_minggu;
                                } else {
                                    var hargaFix=harga_jual; 
                                }

                              
                                if (rowSesi == true) {
                                        var gridCek='grid-item-delete bgGriditem';
                                }
                                else {
                                    var gridCek='grid-item ';
                                }

                                var formattedHarga = formatRupiah(hargaFix);

                                    html += '<div class="'+gridCek + clsbtn+'" data-id="'+id+'" data-bland="'+idBlend+'"  data-tgl="'+item.tgl+'" data-harga="'+hargaFix+'"  >';
                                    if (rowSesi == true) {
                                    html += '<div class="rowHead"><div class="col"><button data-id="'+id+'" data-tgl="'+item.tgl+'" data-harga="'+hargaFix+'" class="colHead'+idBlend+' btnBatal2">-</button></div><div class="col">'+tanggal+namaBulan+'</div></div>';
                                    }
                                    else {
                                    html += '<div class="rowHead"><div class="col"><button data-id="'+id+'" data-tgl="'+item.tgl+'" data-harga="'+hargaFix+'" class="colHead'+idBlend+' buttonHead '+clsbtn+'">+</button></div><div class="col">'+tanggal+namaBulan+'</div></div>';
                                    }
                                    html += '<small>' + jam_mulai + ' - '+jam_selesai+'</small><br>';
                                    html += '<b>Rp: ' +formattedHarga+'</b><br><br>';
                                    html += '<span class="badge badge-'+clsbook+'">' + sts + '</span>';
                                    html += '</div>';

                               });

                               html += '</div>';
                            }

                        // ...



                        $("#output-container").html(html);
                    }, 'json');
                });



			});

		</script>

    <script>
        document.getElementById('lapanganSelect').addEventListener('change', function() {
            var selectedValue = this.value;
            if (selectedValue) {
                window.location.href = '<?php echo base_url("admin/transaksi/create/"); ?>' + selectedValue; // Gantilah 'link_anda/' dengan URL yang sesuai
            }
        });
    </script>
      
<script>
    $(document).ready(function () {
        // Menangani peristiwa perubahan pada elemen <select>
        $('#ctm').change(function () {
            // Mengambil nilai yang dipilih
            var selectedCtm = $(this).val();

            // Mengeksekusi permintaan Ajax
            $.ajax({
                type: 'POST',
                url: '<?= base_url('admin/transaksi/setCtm') ?>', // Gantilah dengan URL yang sesuai
                data: { selected_Ctm: selectedCtm },
                success: function (data) {
                    // Menampilkan hasil Ajax di div atau elemen lain
                     // Refresh the page after successful Ajax request
                     location.reload();

                },
                error: function () {
                    alert('Error in Ajax request');
                }
            });
        });
    });
</script>


<script>
           


            function refresdataWaktu() {
                 // Fungsi yang ingin dijalankan saat dokumen siap
                 var currentDate = new Date(); // Mendapatkan tanggal sekarang

                    // Format tanggal sebagai YYYY-MM-DD
                    var formattedDate = currentDate.getFullYear() + '-' +
                                        ('0' + (currentDate.getMonth() + 1)).slice(-2) + '-' +
                                        ('0' + currentDate.getDate()).slice(-2);

                    // Jalankan fungsi dengan tanggal sekarang
                    retrieveData(formattedDate);

                    // Fungsi untuk mengambil data berdasarkan tanggal
                    function retrieveData(tanggal) {

                        $.post('<?php echo base_url(); ?>admin/transaksi/getJamMulai', {
                            tanggal: tanggal,
                            lapangan_id: '<?= $segment_4 ?>',
                            id_cabor: '<?= $lapang->id_cabor ?>'
                        }, function(data) {
                            var html = '';

                            // Kelompokkan data berdasarkan tanggal
                            var groupedData = {};
                            data.forEach(function(item, index) {
                                var tgl = item.tgl;

                                if (!groupedData[tgl]) {
                                    groupedData[tgl] = [];
                                }

                                groupedData[tgl].push(item);
                            });

                        // ...

                            // Buat grid dan kelompokkan berdasarkan tanggal
                            for (var tgl in groupedData) {
                                // Konversi string tanggal menjadi objek Date
                                var dateObj = new Date(tgl);

                                // Ambil informasi tanggal, nama bulan, dan nama hari
                                var tanggal = dateObj.getDate();
                                var namaBulan = new Intl.DateTimeFormat('id-ID', { month: 'long' }).format(dateObj);
                                var namaHari = new Intl.DateTimeFormat('id-ID', { weekday: 'long' }).format(dateObj);

                                html += '<div class="tanggal-group">';
                                
                                html += '<div class="header-w">';
                                html += '<div class="date-header">';
                                html += '<span >' + tanggal +', '+ namaBulan + '</span>';
                                html += '</div>';

                                // Tampilkan nama hari di bawah
                                html += '<div class="day-header">' + namaHari + '</div>';
                                html +='</div>';


                                groupedData[tgl].forEach(function(item, index) {
                                    var lapangan_id1= '<?= $segment_4 ?>';
                                    var id = item.id;
                                    var tgl1 = item.tgl;
                                    var jam_mulai = item.jam_mulai;
                                    var durasi = item.durasi;
                                    var jam_selesai = item.jam_selesai;
                                    var harga_jual = item.harga_jual;
                                    var harga_jual_sabtu = item.harga_jual_sabtu;
                                    var harga_jual_minggu = item.harga_jual_minggu;
                                    var is_booked = item.is_booked;
                                    var rowSesi = item.is_sesicart;
                                    var idBlend=lapangan_id1+id+tgl1;

                                    
                                    if(is_booked != null) {
                                    var sts='Booked';
                                    var clsbook='secondary';
                                    var clsbtn='disabled';
                                    } else {
                                        var clsbook='success';
                                        var sts='Available';
                                        var clsbtn='';
                                    }

                                    if (namaHari == 'Sabtu') {
                                        var hargaFix=harga_jual_sabtu;
                                    } else  if (namaHari == 'Minggu') {
                                        var hargaFix=harga_jual_minggu;
                                    } else {
                                        var hargaFix=harga_jual; 
                                    }

                                    if (rowSesi == true) {
                                        var gridCek='grid-item-delete bgGriditem';
                                    }
                                    else {
                                        var gridCek='grid-item ';
                                    }


                                    var formattedHarga = formatRupiah(hargaFix);


                             
                                    html += '<div class="'+gridCek + clsbtn+'" data-id="'+id+'" data-bland="'+idBlend+'"  data-tgl="'+item.tgl+'" data-harga="'+hargaFix+'"  >';
                                    if (rowSesi == true) {
                                    html += '<div class="rowHead"><div class="col"><button data-id="'+id+'" data-tgl="'+item.tgl+'" data-harga="'+hargaFix+'" class="colHead'+idBlend+' btnBatal2">-</button></div><div class="col">'+tanggal+namaBulan+'</div></div>';
                                    }
                                    else {
                                    html += '<div class="rowHead"><div class="col"><button data-id="'+id+'" data-tgl="'+item.tgl+'" data-harga="'+hargaFix+'" class="colHead'+idBlend+' buttonHead '+clsbtn+'">+</button></div><div class="col">'+tanggal+namaBulan+'</div></div>';
                                    }
                                    html += '<small>' + jam_mulai + ' - '+jam_selesai+'</small><br>';
                                    html += '<b>Rp: ' +formattedHarga+'</b><br><br>';
                                    html += '<span class="badge badge-'+clsbook+'">' + sts + '</span>';
                                    html += '</div>';
                                });

                                html += '</div>';
                            }

                            // ...



                            $("#output-container").html(html);
                        }, 'json');
                    }

            }

        </script>

    <script>

    // Fungsi untuk mengirim data ke server batal
    function sendDataToBatalServer(data) {
        $.ajax({
        url: '<?php echo base_url(); ?>admin/transaksi/removeCartItem', // Gantilah dengan URL tujuan server Batal Anda
        type: 'POST', // Sesuaikan dengan metode HTTP yang diperlukan
        data: data,
        success: function(response) {
            // Tindakan yang akan diambil jika permintaan berhasil
            console.log(response);
            showCartItems1();
          
        },
        error: function(error) {
            // Tindakan yang akan diambil jika permintaan gagal
            console.error('Gagal mengirim data Batal ke server:', error);
        }
        });
    }
    </script>
    <script>
        // Tambahkan event listener untuk tombol batal
        $(document).on('click', '.grid-item-delete', function() {
            var clickedButton = $(this);
            var databland = clickedButton.data('bland');

            var btnElment='colHead'+databland;
            var btnElment1='.colHead'+databland;
            var otherElement = $(btnElment1);
            otherElement.text('+');
            
            // Ganti class tombol
            otherElement.removeClass('btnBatal2').addClass('buttonHead');
            clickedButton.removeClass('grid-item-delete').addClass('grid-item');
            clickedButton.removeClass('bgGriditem');
            // Dapatkan data yang ingin Anda kirim ke server batal
            var dataToSend = {
            // Tentukan data yang ingin Anda kirim, misalnya tanggal dan namaBulan
            idblend: databland
            };
            // Tambahkan pengiriman data ke server batal
            sendDataToBatalServer(dataToSend);
            
            // // Sembunyikan tombol yang diklik
            // clickedButton.hide();
            // clickedButton.after('<button data-id="'+dataId+'" data-tgl="'+tgl+'" data-harga="'+harga+'" class="colHead buttonHead">+</button>');
        });
    </script>

        
    <script>
    // Fungsi untuk menampilkan item keranjang di dalam modal
        function showCartItems1() {
            $('#show-count').load("<?php echo base_url();?>admin/transaksi/show_countSesiCart");
            // Ambil semua data item dari server menggunakan AJAX
            $.ajax({
                url: '<?php echo base_url(); ?>admin/transaksi/getCartItems', // Gantilah dengan URL yang sesuai di CodeIgniter Anda
                method: 'GET',
                dataType: 'json',
                success: function (response) {
                    var cartItems = response.cart_items;

                    // Ambil container untuk menampilkan item keranjang
                    var cartItemsContainer = document.getElementById('cartItemsContainer');

                    // Bersihkan isi container
                    cartItemsContainer.innerHTML = '';
                    // Cek apakah session cart_items tersedia
                    if (cartItems && Object.keys(cartItems).length > 0) {
                            Object.keys(cartItems).forEach(function (idblend) {
                                // Buat tampilan untuk setiap item
                                var cartItem = cartItems[idblend];
                                var itemHtml = '<div style="display: flex; justify-content: space-between; margin-bottom: 10px;">' +
                                                '<div style="flex-grow: 1;">' +
                                                    '<b>' + cartItem.nama_lapangan + '</b>' +
                                                    '<br>' + cartItem.tgl + ' <br> ' + cartItem.jam_mulai + ' - ' + cartItem.jam_selesai + '<br>' +
                                                    '<hr></div>' +
                                                '<div style="text-align: right; margin-left: 20px;">' +
                                                    '<span style="font-size: 1.6em;">Rp. ' + cartItem.harga_fix + '</span>' +
                                                    '<br>' +
                                                    '<button data-id="' + cartItem.idblend + '" onclick="hapusItem(this)" type="button" style="margin-top: 5px ; background: none; border: none; cursor: pointer;">' +
                                                        '<i class="fa fa-trash" style="color: red; font-size: 1.1em;"></i>' +
                                                    '</button>' +
                                                '</div></div>';
                                // Tambahkan tampilan item ke dalam container
                                cartItemsContainer.innerHTML += itemHtml;
                            });

                                var lanjutBayar='<a type="button" class="lanjutBayar" href="<?php echo base_url('admin/transaksi/confirmCart') ?>">Lanjut Pembayaran</a>';
                                cartItemsContainer.innerHTML += lanjutBayar;
                        } else {
                            // Tampilkan pesan jika keranjang kosong
                            cartItemsContainer.innerHTML = '<p>Keranjang kosong</p>';
                        }
                },
                error: function (error) {
                    console.error('Error fetching cart items:', error);
                }
            });
        }

      // Function to handle item deletion
        function hapusItem(button) {
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
                        showCartItems1();
                        refresdataWaktu();
                    
                    },
                    error: function(error) {
                        // Tindakan yang akan diambil jika permintaan gagal
                        console.error('Gagal mengirim data Batal ke server:', error);
                    }
                    });
        }

    </script>

    <script>
    // Tambahkan event listener ke elemen grid-item (elemen induk)
        $(document).on('click', '.grid-item', function() { 
            // Dapatkan tombol yang diklik
            var clickedButton = $(this);
            var dataId = clickedButton.data('id');
            var databland = clickedButton.data('bland');
            var btnElment1='.colHead'+databland;
            var otherElement = $(btnElment1);
                otherElement.text('-');
            
                // Ganti class tombol
                otherElement.removeClass('buttonHead').addClass('btnBatal2');
                clickedButton.removeClass('grid-item').addClass('grid-item-delete');
                clickedButton.addClass('bgGriditem');



                var tgl = clickedButton.data('tgl');
                var harga = clickedButton.data('harga');
                var lapangan_id= '<?= $segment_4 ?>';
                var idblend =  lapangan_id+dataId+tgl;

                // Dapatkan data yang ingin Anda kirim ke server
                var dataToSend = {
                // Tentukan data yang ingin Anda kirim, misalnya tanggal dan namaBulan
                    idblend: idblend,
                    id: dataId,
                    lapangan_id: lapangan_id,
                    harga_fix: harga,
                    tgl: tgl
                };

                // Jika tidak memiliki, maka ini adalah tombol +
                // Lakukan permintaan Ajax ke server
                $.ajax({
                    url: '<?php echo base_url(); ?>admin/transaksi/saveCart', // Gantilah dengan URL tujuan server tambahan Anda
                    type: 'POST', // Sesuaikan dengan metode HTTP yang diperlukan
                    data: dataToSend,
                    success: function(response) {
                    // Tindakan yang akan diambil jika permintaan berhasil
                    console.log('Data berhasil dikirim ke server');
                    console.log('Respon dari server:', response);
                
                    showCartItems1();
                    },
                    error: function(error) {
                    // Tindakan yang akan diambil jika permintaan gagal
                    console.error('Gagal mengirim data ke server:', error);
                    }
                });
        
    
        });

    </script>

    <script>
         // Tambahkan event listener untuk tombol triger modal
          document.getElementById('showCartBtn').addEventListener('click', function() {
              // Tampilkan modal saat tombol ditekan
              document.getElementById('cartModal').style.display = 'block';

              // Tampilkan item keranjang di dalam modal
              showCartItems1();
          });

          // Tambahkan event listener untuk tombol tutup modal
          document.getElementById('closeCartModal').addEventListener('click', function() {
              // Tutup modal saat tombol ditekan
              document.getElementById('cartModal').style.display = 'none';
          });

    </script>
     
</body>
</html>
