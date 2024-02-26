<!DOCTYPE html>
<html>
  <head>
    <title><?php echo $title;?></title>
    <meta charset="UTF-8">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="<?php echo base_url('assets/template/backend/')?>bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- FontAwesome 4.3.0 -->
    <link href="<?php echo base_url('assets/plugins/')?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Jquery -->
    <script src="<?php echo base_url('assets/plugins/')?>jquery/jquery-3.3.1.js"></script>
    <!-- Theme style -->
    <link href="<?php echo base_url('assets/template/backend/')?>dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
    <link href="<?php echo base_url('assets/template/backend/')?>dist/css/skins/skin-yellow.min.css" rel="stylesheet" type="text/css" />
    <script src="<?php echo base_url()?>assets/template/frontend/js/moment.min.js" rel="stylesheet"></script>
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo base_url('assets/images/fav.ico') ?>" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">

    
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

      .header-w {
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

       /* CSS untuk modal */
    .modal-s {
        display: none;
        position: fixed;
        top: 0;
        right: 0;
        width: 300px; /* Atur lebar sesuai kebutuhan Anda */
        height: auto;
        overflow-y: auto; /* Aktifkan gulir vertikal jika kontennya panjang */
        background-color: #fff;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    .modal-content-s {
        width: 100%;
        padding: 20px;
        box-sizing: border-box;
    }

    /* Tombol penutup */
    .close {
        color: #aaaaaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
        cursor: pointer;
    }

    .close:hover,
    .close:focus {
        color: #000;
        text-decoration: none;
    }

  

    .lanjutBayar {
        position:sticky;
        bottom:0;
        left:0;
        width:100%;
        padding:11px;
        text-align:center;
        color:white;
        background:#988630;
        border-radius: 8px; 
        display:inline-block;
        width:100%;
    }

    .lanjutBayar:hover {
        background-color: black; /* Warna latar belakang saat tombol dihover */
        color: #fff; /* Warna teks saat tombol dihover */
    }

  </style>
  </head>
  <body class="skin-yellow sidebar-mini">
