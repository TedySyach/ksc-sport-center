<?php $this->load->view('front/header'); ?>
<?php $this->load->view('front/navbar'); ?>
<style>
   #output-container {
    overflow: auto; /* Mengaktifkan scrollbar jika kontennya melebihi dimensi elemen */
    white-space: nowrap;
    visibility: visible; /* Menetapkan visibilitas menjadi terlihat */
    }

    #output-container::-webkit-scrollbar {
        height: 12px; /* Mengatur tinggi scrollbar horizontal */
        width: 12px; /* Mengatur lebar scrollbar vertical */
    }

    #output-container::-webkit-scrollbar-thumb {
        background-color: #888; /* Warna thumb (bagian yang dapat digeser) */
        border-radius: 10px; /* Membuat ujung thumb tumpul */
    }

    #output-container::-webkit-scrollbar-track {
        background-color: rgb(189, 183, 107); /* Warna track (bagian yang tidak dapat digeser) */
    }


    .badge-success {
        background-color: #28a745; /* Warna hijau sukses, sesuaikan dengan preferensi Anda */
        color: #fff; /* Warna teks putih agar kontras dengan latar belakang */
        padding: 5px 10px; /* Padding agar lebih mudah dibaca */
        border-radius: 4px; /* Corner border radius */
        display: inline-block; /* Agar span tidak mengambil lebar penuh */
    }
    .badge-secondary {
        background-color: #6c757d; /* Warna sekunder, sesuaikan dengan preferensi Anda */
        color: #fff; /* Warna teks putih agar kontras dengan latar belakang */
        padding: 5px 10px; /* Padding */
        border-radius: 4px; /* Corner border radius */
        display: inline-block; /* Agar span tidak mengambil lebar penuh */
    }

    .tanggal-group {
    box-sizing: border-box;
    margin-bottom: 20px;
    padding: 10px;
    text-align: center;
    white-space: nowrap; /* agar kontennya tidak mematahkan baris */
    display: inline-block; /* agar elemen dapat digeser */
    }

    @media (min-width: 600px) {
        .tanggal-group {
            width: 48%;
        }
    }

    @media (min-width: 768px) {
        .tanggal-group {
           width: 16.6%;
        }
    }

    .date-header {
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .tanggal {
        margin-top:5px;
        font-size: 0.9em;
        border-radius: 5px; /* Sesuaikan nilai border-radius sesuai keinginan Anda */
        padding-left: 10px; /* Nilai padding ditingkatkan agar geser lebih ke dalam */
        padding-top: 8px; /* Nilai padding ditingkatkan agar geser lebih ke dalam */
        padding-bottom: 8px; /* Nilai padding ditingkatkan agar geser lebih ke dalam */
        border: 1px solid #ddd; /* Contoh properti border */
        width: 100%;
    }
    .bulan {
        font-size: 1em;
    }

    .day-header {
        font-weight: bold;
        margin-top: 5px;
        margin-bottom: 5px;
    }

    .header {
        width: 100%;
        box-sizing: border-box;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 15px; /* Memberikan nilai untuk membuat sudut bulat */
        margin-bottom: 15px; /* Menambahkan margin-bottom sebanyak 5px */
        background-color: rgb(189, 183, 107);
        color: white;
    }

    .grid-item {
        width: 100%;
        box-sizing: border-box;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 15px; /* Memberikan nilai untuk membuat sudut bulat */
        margin-bottom: 15px; /* Menambahkan margin-bottom sebanyak 5px */
    }
    .grid-item-delete {
        width: 100%;
        box-sizing: border-box;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 15px; /* Memberikan nilai untuk membuat sudut bulat */
        margin-bottom: 15px; /* Menambahkan margin-bottom sebanyak 5px */
    }

  

    .rowHead {
    display: flex;
    justify-content: space-between;
    align-items: center;
   }

    .colHead {
        font-size: 12px; /* Sesuaikan ukuran font sesuai kebutuhan */
    }

    .buttonHead {
    background-color: #00CED1; /* Warna hijau toska */
    color: white;
    border: none;
    border-radius: 50%; /* Membuat tombol menjadi bulat */
    width: 30px; /* Menentukan lebar tombol */
    height: 30px; /* Menentukan tinggi tombol */
    font-size: 14px; /* Menentukan ukuran font tombol */
    cursor: pointer;
    transition: background-color 0.3s ease; /* Animasi perubahan warna latar belakang */
  }

  .buttonHead:hover {
    background-color: #008B8B; /* Warna hijau toska yang berbeda saat hover */
  }

  .itemAddedAnimation {
    animation: itemAdded 0.5s ease; /* Animasi item masuk ke keranjang */
  }

  @keyframes itemAdded {
    0% { transform: translateY(0); opacity: 0; }
    100% { transform: translateY(-50px); opacity: 1; }
  }

  .btnBatal2 {
    background-color: #FF0000; /* Warna merah untuk tombol batal */
    color: white;
    border: none;
    border-radius: 50%;
    width: 30px;
    height: 30px;
    font-size: 14px;
    cursor: pointer;
  }
    .buttonHead.disabled {
        background-color: gray;
        color: white;
        cursor: not-allowed;
    }

     /* CSS untuk datepicker pada tampilan mobile */
    @media only screen and (max-width: 767px) {
        .datepicker-dropdown {
            background-color: rgb(35, 35, 35); /* Ganti dengan warna latar belakang yang diinginkan */
            color: white;
        }
    }

    /* CSS untuk datepicker pada tampilan desktop atau tablet */
    @media only screen and (min-width: 768px) {
        .datepicker-dropdown {
            /* Atur gaya sesuai kebutuhan tampilan desktop atau tablet */
            background-color: rgb(35, 35, 35); /* Ganti dengan warna latar belakang yang diinginkan */
            color: white;
        }
    }

   .btnBatalDiv {
    background-color: #FF0000; /* Warna merah untuk tombol batal */
    color: white;
    border: none;
    width: 30px;
    height: 30px;
    font-size: 14px;
    cursor: pointer;
  }


  .disabled {
    pointer-events: none;
    opacity: 0.9; /* Atur transparansi atau gaya lainnya sesuai kebutuhan Anda */
    /* Gaya atau aturan CSS lainnya untuk menunjukkan elemen dinonaktifkan */
  }

  .bgGriditem {
    background-color: rgba(255, 0, 0, 0.5); /* Warna merah dengan tingkat transparansi 0.5 */
    color: white; /* Warna teks putih */
  }
  
   @media (min-width: 768px) {
        .col-lg-5 {
            text-align: right;
        }
        .v {
            text-align: right;
        }
    }

    @media (max-width: 767px) {
        .col-lg-5 {
            text-align: left;
        }
        .v {
            text-align: left;
        }
    }
    h4 {
        font-size: 28px; /* Sesuaikan dengan ukuran yang diinginkan */
    }
</style>


<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="<?php echo base_url() ?>"><i class="fa fa-home"></i> Home</a></li>
					<li class="breadcrumb-item active">Booking schedule</li>
				</ol>
			</nav>
		</div>

	    <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-7">
                    <h4>Booking schedule </h4>
                </div>
                <div class="col-lg-5" style="padding-top:6px;">
                    <div class="row">
                        <div class="col-lg-6 v" style="padding-top:8px;">
                            <lable >Pilih Tanggal Booking :</lable>
                        </div>
                        <div class="col-lg-6 v">
                            <?php echo form_input($tanggal) ?>
                        </div>
                    </div>
                </div>
            </div>
			<hr>
            <div id="output-container"></div>
		</div>




		<link href="<?php echo base_url('assets/plugins/') ?>datepicker/css/bootstrap-datepicker.css" rel="stylesheet">
		<script src="<?php echo base_url('assets/plugins/') ?>datepicker/js/bootstrap-datepicker.js"></script>
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

                    $.post('<?php echo base_url(); ?>Cart/getJamMulai', {
                        tanggal: tanggal_val,
                        lapangan_id: '<?= $id ?>',
                        id_cabor: '<?= $lapang->id_cabor ?>'
                    }, function(data) {
                        $('#show-count').load("<?php echo base_url();?>Cart/show_countSesiCart");
                        $('#show-countt').load("<?php echo base_url();?>Cart/show_countSesiCart");
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
                            html += '<div class="header">';
                            html += '<div class="date-header">';
                            html += '<span >' + tanggal +', '+ namaBulan + '</span>';
                            html += '</div>';

                            // Tampilkan nama hari di bawah
                            html += '<div class="day-header">' + namaHari + '</div>';
                            html +='</div>';

                            groupedData[tgl].forEach(function(item, index) {
                                var lapangan_id1= '<?= $id ?>';
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
            $(document).ready(function() {
                refresdataWaktu();
                // Tambahan: Apakah Anda ingin menjalankan sesuatu yang lain di sini saat dokumen dimuat?
            });


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

                        $.post('<?php echo base_url(); ?>Cart/getJamMulai', {
                            tanggal: tanggal,
                            lapangan_id: '<?= $id ?>',
                            id_cabor: '<?= $lapang->id_cabor ?>'
                        }, function(data) {
                            $('#show-count').load("<?php echo base_url();?>Cart/show_countSesiCart");
                            $('#show-countt').load("<?php echo base_url();?>Cart/show_countSesiCart");
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
                                html += '<div class="header">';
                                html += '<div class="date-header">';
                                html += '<span >' + tanggal +', '+ namaBulan + '</span>';
                                html += '</div>';

                                // Tampilkan nama hari di bawah
                                html += '<div class="day-header">' + namaHari + '</div>';
                                html +='</div>';

                                groupedData[tgl].forEach(function(item, index) {
                                    var lapangan_id1= '<?= $id ?>';
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
        url: '<?php echo base_url(); ?>Cart/removeCartItem', // Gantilah dengan URL tujuan server Batal Anda
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
            $('#show-count').load("<?php echo base_url();?>Cart/show_countSesiCart");
            $('#show-countt').load("<?php echo base_url();?>Cart/show_countSesiCart");
            // Ambil semua data item dari server menggunakan AJAX
            $.ajax({
                url: '<?php echo base_url(); ?>Cart/getCartItems', // Gantilah dengan URL yang sesuai di CodeIgniter Anda
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
                                 var itemHtml = '<div class="book-box">' +
                                                '<div class="book-venue-box">' +
                                                    '<h1>' + cartItem.nama_lapangan + '</h1>' + 
                                                    '<div class="book-detail">' + '<span>' + cartItem.tgl + '</span>' + '<span>' + cartItem.jam_mulai + ' - ' + cartItem.jam_selesai + '</span>' + '</div>' + 
                                                    '</div>' +
                                                '<div class="book-price">' +
                                                    '<span>Rp. ' + cartItem.harga_fix + '</span>' +
                                                    '<button data-id="' + cartItem.idblend + '" onclick="hapusItem(this)" type="button" style="background: none; border: none; cursor: pointer;">' +
                                                        '<i class="fa fa-trash" style="color: red; font-size: 1.1em;"></i>' +
                                                    '</button>' +
                                                '</div></div>';
                                // Tambahkan tampilan item ke dalam container
                                cartItemsContainer.innerHTML += itemHtml;
                            });

                                var lanjutBayar='<a type="button" class="lanjutBayar" href="<?php echo base_url('confirmCart') ?>">Lanjut Pembayaran</a>';
                                cartItemsContainer.innerHTML += lanjutBayar;
                        } else {
                            // Tampilkan pesan jika keranjang kosong
                            cartItemsContainer.innerHTML = '<p>Belum Ada Jadwal Yang Di Pesan</p>';
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
                url: '<?php echo base_url(); ?>Cart/removeCartItem', // Gantilah dengan URL tujuan server Batal Anda
                type: 'POST', // Sesuaikan dengan metode HTTP yang diperlukan
                data: dataToSend,
                success: function(response) {
                    // Tindakan yang akan diambil jika permintaan berhasil
                    console.log(response);
                    showCartItems1();
                    showCartItemsUpdate();
                    refresdataWaktu();
                
                },
                error: function(error) {
                    // Tindakan yang akan diambil jika permintaan gagal
                    console.error('Gagal mengirim data Batal ke server:', error);
                }
                });
    }

    function showCartItemsUpdate() {
        console.log('fungsi temporary');
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
            var lapangan_id= '<?= $id ?>';
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
                url: '<?php echo base_url(); ?>Cart/saveCart', // Gantilah dengan URL tujuan server tambahan Anda
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
	</div>
</div>
<?php $this->load->view('front/footer'); ?>