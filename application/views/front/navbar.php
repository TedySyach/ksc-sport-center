<!--<nav class="navbar navbar-default navbar-fixed-top">-->
<!--  <div class="container">-->
<!--    <div>-->
<!--      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">-->
<!--        <span class="sr-only">Toggle navigation</span>-->
<!--        <span class="icon-bar"></span>-->
<!--        <span class="icon-bar"></span>-->
<!--        <span class="icon-bar"></span>-->
<!--      </button>-->
<!--      <a href="<?php echo base_url() ?>">-->
<!--        <img src="<?php echo base_url('assets/images/company/').$company_data->foto.$company_data->foto_type ?>" alt="<?php echo $company_data->company_name ?>" width="100px">-->
<!--      </a>-->
<!--    </div>-->

    <!-- Collect the nav links, forms, and other content for toggling -->
<!--    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">-->
<!--      <ul class="nav navbar-nav">-->
<!--        <li class="<?php if($this->uri->segment(1) == ""){echo "active";} ?>">-->
<!--          <a href="<?php echo base_url() ?>">Home </a>-->
<!--        </li>-->
<!--        <li class="dropdown <?php if($this->uri->segment(1) == "about" or $this->uri->segment(1) == "contact"){echo "active";} ?>">-->
<!--          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Profil <span class="caret"></span></a>-->
<!--          <ul class="dropdown-menu">-->
<!--            <li class="<?php if($this->uri->segment(1) == "about"){echo "active";} ?>">-->
<!--              <a href="<?php echo base_url('about') ?>"> Tentang Kami</a>-->
<!--            </li>-->
<!--            <li class="<?php if($this->uri->segment(1) == "contact"){echo "active";} ?>">-->
<!--              <a href="<?php echo base_url('contact') ?>"> Hubungi Kami</a>-->
<!--            </li>-->
<!--          </ul>-->
<!--        </li>-->
<!--        <li class="<?php if($this->uri->segment(1) == "cart" && $this->uri->segment(2) == ""){echo "active";} ?>">-->
<!--          <a href="<?php echo base_url('cart') ?>"> Keranjang</a>-->
<!--        </li>-->
<!--      </ul>-->

<!--      <?php if($this->session->userdata('usertype') != NULL){ ?>-->
<!--        <ul class="nav navbar-nav navbar-right">-->
<!--          <li class="dropdown">-->
<!--            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hi, <?php echo $this->session->userdata('username') ?> <span class="caret"></span></a>-->
<!--            <ul class="dropdown-menu">-->
<!--              <li><a href="<?php echo base_url('cart/history') ?>">Riwayat Booking</a></li>-->
<!--              <li><a href="<?php echo base_url('auth/edit_profil/').$this->session->userdata('user_id') ?>">Edit Profil</a></li>-->
<!--              <li><a href="<?php echo base_url('auth/profil') ?>">Profil Saya</a></li>-->
<!--              <li role="separator" class="divider"></li>-->
<!--              <li><a href="<?php echo base_url('auth/logout') ?>">Logout</a></li>-->
<!--            </ul>-->
<!--          </li>-->
<!--        </ul>-->
<!--      <?php }else{ ?>-->
<!--        <ul class="nav navbar-nav navbar-right">-->
<!--          <li><a href="<?php echo base_url('auth/register') ?>">Register</a></li>-->
<!--          <li><a href="<?php echo base_url('auth/login') ?>">Login</a></li>-->
<!--        </ul>-->
<!--      <?php } ?>-->
<!--    </div>-->
<!--  </div>-->
<!--</nav>-->
<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap');
    *{
        padding:0;
        margin:0;
        box-sizing:border-box;
    }
    body{
        padding:0 !important;
    }
    .navbar{
        width:100%;
        background-color:white;
        z-index:5;
        margin-bottom:0;
        box-shadow: 0px 2px 9px 0px rgba(0, 0, 0, 0.19);
        position:relative;
        top:0;
        left:0;
    }
    .navbar-layout{
        width:1180px;
        margin:auto;
        display:grid;
        padding:7px 0;
        grid-template-columns:20% 60% 20%;
        align-items:center;
    }
    .navbar-menu .navbar-layout{
            display:none;
        }
    .navbar-menu ul{
        display:flex;
        justify-content:center;
        gap:35px;
        align-items:center;
        margin-bottom:0;
    }
    .navbar-menu ul li{
        list-style:none;
    }
    .navbar-menu ul li a{
        text-decoration:none;
        color:#252525;
        font-size:16px;
        font-weight:500;
    }
    .navbar-menu ul li a:hover{
        color:#FED308;
    }
    .logo{
        position:relative;
    }
    .logo img{
        width:135px;
    }
    .navbar-button{
        display:flex;
        justify-content:flex-end;
        gap:10px;
        margin-top:0;
    }
    .navbar-menu .navbar-button{
        display:none;
    }
    .navbar-button ul{
        margin:0 !important;
    }
    .navbar-button ul li{
        list-style:none;
    }
    .navbar-button button{
        padding:6px 22px;
        padding-bottom:5px;
        border-radius:100px;
        transition:.2s all;
    }
    .navbar-button a:nth-child(1) button{
        background:transparent;
        border:2px solid #FDD202;
        font-size:15px;
        color:#FDD202;
    }
    .navbar-button a:nth-child(1) button:hover{
        background:#FDD202;
        color:white;
    }
    .navbar-button a:nth-child(2) button{
        background:#FDD202;
        border:2px solid #FDD202;
        font-size:15px;
        color:white;
    }
    .navbar-button a:nth-child(2) button:hover{
        background:#FDD202;
        color:white;
    }
    .hamburger{
        display:none;
    }
    .divider{
            display:block;
        }
    .mobile-cart{
        display:none;
    }
    .dekstop-cart{
        display:flex;
        align-items:center;
        gap:4px;
    }
    .dekstop-cart span{
        width:19px;
        height:19px;
        border-radius:100px;
        background-color:#B31312;
        color:white;
        font-size:10px;
        display:flex;
        align-items:center;
        justify-content:center;
    }
    .menu-hamburger-layout{
        display:none;
    }
    @media(max-width:768px){
        .navbar{
            position:relative;
        }
        .navbar-button{
            display:none;
        }
        .navbar-layout{
            display:flex;
            justify-content:space-between;
            width:100%;
            padding:5px 12px;
        }
        .navbar-menu .navbar-layout{
            display:flex;
        }
        .navbar-menu{
            position:fixed;
            top:0;
            left:0;
            transform:translateX(-300%);
            background:white;
            transition:.5s all;
            width:100%;
            height:100vh;
            z-index:5;
        }
        .navbar-menu logo a img{
            filter: brightness(0) invert(1);
        }
        .navbar-menu ul{
            display:flex;
            flex-direction:column;
            align-items:flex-start;
            justify-content:flex-start;
            padding:0 17px;
            gap:0;
            padding-top:20px;
            width:100%;
        }
        .navbar-menu ul li{
            /*border-top:1px solid #2FA385;*/
            border-bottom:1px solid #9C8200;
            width:100%;
            padding:11px 0;
        }
        .navbar-menu ul li a{
            font-size:18px;
        }
        #navbarMenu.active-menu{
            transform:translateX(0);
            z-index:5;
        }
        .navbar-menu .navbar-button{
            display:flex;
            justify-content:center;
            padding:0 17px;
            margin-top:30px;
        }
        .navbar-menu .navbar-button button{
            padding:7px 28px;
            padding-bottom:6px;
            border-radius:100px;
            transition:.2s all;
            font-size:18px !important;
            width:100%;
        }
        .dropdown-menu{
            background-color:transparent;
            border:none;
            box-shadow:none;
        }
        .divider{
            display:none;
        }
        .navbar-menu .navbar-button ul{
            padding-top:0;
            padding:0;
        }
        .hamburger{
            background:transparent;
            border:1px solid #988630;
            outline:none;
            padding:0;
            margin:0;
            width:46px;
            height:46px;
            position:relative;
            display:block;
            border-radius:100px;
        }
        .hamburger iconify-icon{
            font-size:24px;
            color:#988630;
            position:absolute;
            left:50%;
            top:50%;
            transform:translate(-50%, -50%);
        }
        .dropdown .dropdown-menu{
            padding:0;
        }
        .dropdown-menu li a{
            padding:0 !important;
        }
        .dekstop-cart{
            display:none;
        }
        .mobile-cart{
            display:block;
            background:transparent;
            outline:none;
            border:none;
            margin-bottom:-5px;
            position:relative;
        }
        .mobile-cart iconify-icon{
            font-size:36px;
            color:#988630;
        }
        .mobile-cart span{
            position:absolute;
            top:0;
            right:0;
            background-color:#B31312;
            color:white;
            width:16px;
            height:16px;
            border-radius:100px;
            font-size:9px;
            display:flex;
            align-items:center;
            justify-content:center;
        }
        .menu-hamburger-layout{
            display:flex;
            justify-content:flex-start;
            gap:10px;
            align-items:center;
        }
        
    }

   /* CSS untuk modal */
    .modal {
        position: fixed;
        top: 0;
        display:none;
        right: 0;
        width: 100%;
        height:100%;
    }

    .modal-content {
        width:300px;
        background-color:white;
        position:absolute;
        left:0;
        top:0;
        box-sizing: border-box;
        animation:modal-content .6s;
        padding:17px;
        box-shadow:none;
        border-radius:0;
        height:100vh;
        overflow-y:scroll;
    }
    .modal-content::-webkit-scrollbar {
      width: 8px;
    }
    
    /* Track */
    .modal-content::-webkit-scrollbar-track {
      box-shadow: #988630; 
      border-radius: 6px;
    }
     
    /* Handle */
    .modal-content::-webkit-scrollbar-thumb {
      background: #988630; 
      border-radius: 6px;
    }
    @keyframes modal-content{
        0%{
            transform:translateX(-100%);
        }
        100%{
            transform:translateX(0);
        }
    }
    .overlay{
        background:#00000042;
        width:100%;
        left:0;
        bottom:0;
        height:100%;
    }
    .modal-top-heading{
        display:flex;
        justify-content:space-between;
        align-items:center;
        border-bottom:1px solid #988630;
        /*margin-bottom:10px;*/
    }
    .modal-top-heading h4{
        font-size:17px;
    }
    .modal-top-heading iconify-icon{
        font-size:26px;
        color:black;
        position:absolute;
        right:10px;
        top:7px;
        cursor:pointer;
        
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
    .lanjutBayar1 {
        
        bottom:0;
        left:0;
        width:100%;
        padding:11px;
        text-align:center;
        color:white;
        background:#988630;
    }

    .lanjutBayar1:hover {
        background-color: black; /* Warna latar belakang saat tombol dihover */
        color: #fff; /* Warna teks saat tombol dihover */
    }
    
     .lanjutBayar2 {
        position:relative;
        bottom:0;
        /*left:15px;*/
        /*right:15px;*/
        width:100%;
        padding:11px;
        text-align:center;
        color:white;
        background:#988630;
        border-radius: 8px; /* Adjust the border-radius for rounded corners */
    }

    .lanjutBayar:hover2 {
        background-color: black; /* Warna latar belakang saat tombol dihover */
        color: #fff; /* Warna teks saat tombol dihover */
    }

    #cartModal {
        display:none;
        
    }
    
    #cartModal.active {
        display:block;
    }
    .book-box{
        display:grid;
        grid-template-columns:100%;
        align-items:flex-start;
        padding:15px 0;
        border-bottom:1px solid #988630;
    }
    .book-venue-box{
        display:flex;
        flex-direction:column;
        align-items:flex-start;
        justify-content:flex-start;
    }
    .book-venue-box h1{
        font-size:16px;
        margin:0;
        margin-bottom:7px;
        font-weight:600;
    }
    .book-detail{
        display:flex;
        gap:4px;
        flex-direction:column;
    }
    .book-detail span{
        font-size:15px;
    }
    .book-price{
        display:flex;
        justify-content:space-between;
        margin-top:8px;
    }
    
      @media only screen and (max-width: 600px) {
          .lanjutBayar {
           position:fixed;
           left:0;
           bottom:0;
           border-radius:0;
          }
          .modal-content {
            width:100%;
          }
          #cartItemsContainer{
              padding-bottom:20px;
          }
      }
    
</style>

<div class="navbar">
    <div class="navbar-layout">
        <div class="logo">
            <a href="<?php echo base_url() ?>">
                <img src="<?php echo base_url('assets/images/company/').$company_data->foto.$company_data->foto_type ?>" alt="<?php echo $company_data->company_name ?>" width="100px">
            </a>
        </div>
        <div class="menu-hamburger-layout">
            <button class="mobile-cart" id="showCartBtn1" type="button" onClick="showModalNew();"><iconify-icon icon="ion:cart-sharp"></iconify-icon><span id="show-countt"></span></button>
            <button class="hamburger" onclick="clickMenu()">
                <iconify-icon icon="line-md:close-to-menu-alt-transition"></iconify-icon>
            </button>
        </div>
        
        <div class="navbar-menu" id="navbarMenu">
            <div class="navbar-layout">
                <div class="logo">
                    <a href="<?php echo base_url() ?>">
                        <img src="<?php echo base_url('assets/images/company/').$company_data->foto.$company_data->foto_type ?>" alt="<?php echo $company_data->company_name ?>" width="100px">
                    </a>
                </div>
                
                    <button class="hamburger" onclick="clickMenu()">
                        <iconify-icon icon="line-md:menu-to-close-alt-transition"></iconify-icon>
                    </button>
                
                
            </div>
            
            <ul>
                <li><a href="<?php echo base_url() ?>">Beranda</a></li>
                <li><a href="<?php echo base_url('about') ?>">Tentang Kami</a></li>
                <li><a href="<?php echo base_url('contact') ?>">Hubungi kami</a></li>
                <!-- <li><a href="<?php echo base_url('cart') ?>">Pemesanan</a></li> -->
                <li class="dekstop-cart"><a id="showCartBtn" type="button" onClick="showModalNew();">Daftar Pemesanan</a> <span id="show-count"></span></li>
            </ul>
            <div class="navbar-button">
                <?php if($this->session->userdata('usertype') != NULL){ ?>
                <ul>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><button>Hi, <?php echo $this->session->userdata('username') ?> <span class="caret"></span></button></a>
                    <ul class="dropdown-menu">
                      <li><a href="<?php echo base_url('cart/history') ?>">Riwayat Booking</a></li>
                      <li><a href="<?php echo base_url('auth/edit_profil/').$this->session->userdata('user_id') ?>">Edit Profil</a></li>
                      <li><a href="<?php echo base_url('auth/profil') ?>">Profil Saya</a></li>
                      <li><a href="<?php echo base_url('auth/membership') ?>">Membership</a></li>
                      <li role="separator" class="divider"></li>
                      <li><a href="<?php echo base_url('auth/logout') ?>">Logout</a></li>
                    </ul>
                  </li>
                </ul>
                <?php }else{ ?>
                <a href="<?php echo base_url('auth/login') ?>"><button>Masuk</button></a>
                <a href="<?php echo base_url('auth/register') ?>"><button>Daftar</button></a>
                <?php } ?>
            </div>
        </div>
        <div class="navbar-button">
            <?php if($this->session->userdata('usertype') != NULL){ ?>
            <ul>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><button>Hi, <?php echo $this->session->userdata('username') ?> <span class="caret"></span></button></a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo base_url('cart/history') ?>">Riwayat Booking</a></li>
                  <li><a href="<?php echo base_url('auth/edit_profil/').$this->session->userdata('user_id') ?>">Edit Profil</a></li>
                  <li><a href="<?php echo base_url('auth/profil') ?>">Profil Saya</a></li>
                  <li><a href="<?php echo base_url('auth/membership') ?>">Membership</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="<?php echo base_url('auth/logout') ?>">Logout</a></li>
                </ul>
              </li>
            </ul>
            <?php }else{ ?>
            <a href="<?php echo base_url('auth/login') ?>"><button>Masuk</button></a>
            <a href="<?php echo base_url('auth/register') ?>"><button>Daftar</button></a>
            <?php } ?>
        </div>
    </div>
</div>

<!-- Modal Cart -->
<div id="cartModal" class="modal">
    <div class="overlay" onClick="showModalNew();"></div>
    <div class="modal-content">
        <div class="modal-top-heading">
            <h4>Daftar Pemesanan</h4>
            <iconify-icon icon="iconamoon:close-duotone" onClick="showModalNew();"></iconify-icon>
        </div>
        
        <!-- Tampilkan item keranjang di sini -->
        <div id="cartItemsContainer"></div>
    </div>
</div>

   <script>
        $(document).ready(function() {
            $('#show-count').load("<?php echo base_url();?>Cart/show_countSesiCart");
            $('#show-countt').load("<?php echo base_url();?>Cart/show_countSesiCart");
        });
    </script>

<script>
   // Fungsi untuk menampilkan item keranjang di dalam modal
    function showCartItems() {
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

    function showCartItemsNav() {
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
                                var itemHtml = '<div style="display: flex; justify-content: space-between; margin-bottom: 10px;">' +
                                                '<div style="flex-grow: 1;">' +
                                                    '<b>' + cartItem.nama_lapangan + '</b>' +
                                                    '<br>' + cartItem.tgl + '<br>' + cartItem.jam_mulai + ' - ' + cartItem.jam_selesai + '<br>' +
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

    // Fungsi untuk menutup modal
    // function closeCartModal() {
    //     // Dapatkan elemen modal
    //     var modal = document.getElementById('cartModal');
    
    //     // Hapus class 'active' dari elemen modal
    //     modal.classList.remove('active');
    // }
    
  
    
    // // Tambahkan event listener untuk tombol tutup modal
    // document.getElementById('closeCartModal').addEventListener('click', closeCartModal);
    
    // // Tambahkan event listener untuk overlay
    // document.getElementById('overlay').addEventListener('click', function() {
    //     closeCartModal();
    // });
    
     // Tambahkan event listener untuk tombol triger modal
    document.getElementById('showCartBtn').addEventListener('click', function() {
       
        // Tampilkan item keranjang di dalam modal
        showCartItems();
    });
    document.getElementById('showCartBtn1').addEventListener('click', function() {
       
        // Tampilkan item keranjang di dalam modal
        showCartItems();
    });
    
    function showModalNew() {
      const showModalNewVar = document.getElementById('cartModal');
      showModalNewVar.classList.toggle('active');
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
                    showCartItems();
                    showCartItemsUpdate();
                
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
    function clickMenu() {
      const menuLayout = document.getElementById('navbarMenu');
      menuLayout.classList.toggle('active-menu');
    }
</script>
