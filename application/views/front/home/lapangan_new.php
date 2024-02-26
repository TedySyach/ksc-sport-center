<style>
    h4 a{
        color:black !important;
    }
    .layout-lapangan{
        width:1180px;
        margin:auto;
        padding:40px 0;
        padding-bottom:65px !important;
        background-color:white;
    }
    .btn-success{
        background:#FED308 !important;
        color:#000 !important;
        border-color:#FED308 !important;
    }
    .heading-text{
        display:flex;
        justify-content:space-between;
        align-items:flex-end;
        text-align:center;
        color:#000 !important;
    }
    .heading-text h3{
        font-size:23px;
        margin:0;
        font-weight:600;
    }
    .heading-text a{
        font-size:23px;
        color:black;
        margin:0;
    }
    /*.grid-lapangan{*/
    /*    width:1180px;*/
    /*    margin:auto;*/
    /*    display: flex;*/
    /*    flex-wrap: wrap;*/
    /*    justify-content: center;*/
    /*    gap: 20px; */
    /*    row-gap:50px;*/
    /*}*/
    /*.grid-lapangan-box{*/
    /*    flex: 0 1 calc(50% - 20px);*/
        
    /*    text-align: center;*/
    /*}*/
    /*.grid-lapangan-box img{*/
    /*    width:100%;*/
       
    /*}*/
    .grid-lapangan{
        width:1180px;
        margin:auto;
        display:grid;
        grid-template-columns:repeat(4, 1fr);
        grid-gap:15px;
    }
    .grid-lapangan-box{
        width:100%;
        height:370px;
        position:relative;
        border-radius:15px;
        overflow:hidden;
        box-shadow: 0px 0px 22px 0px rgba(45, 49, 79, 0.14);
    }
    .grid-lapangan-box img{
        position:absolute;
        width:100%;
        height:100%;
        top:0;
        left:0;
        object-fit:cover;
        z-index:1;
        transition:.2s all;
    }
    .grid-lapangan-box:hover{
        box-shadow: 0px 0px 22px 0px #98863070;
    }
    .grid-lapangan-box:hover img{
        transform:scale(1.1);
    }
    .caption-venue{
        z-index:2;
        position:absolute;
        bottom:2%;
        left:50%;
        transform:translate(-50%);
        background: rgba(255, 255, 255, 0.26);
        backdrop-filter: blur(71.4000015258789px);
        border-radius:10px;
        border:1px solid #988630;
        width:95%;
        padding:15px;
        
    }
    .btn-venue{
        width:100%;
        border-radius:100px;
        border:1px solid #988630;
        outline:none;
        background:white;
        color:#988630;
        font-size:15px;
        display:flex;
        gap:5px;
        align-items:center;
        justify-content:center;
        padding:8px;
        font-weight:400;
        transition:.2s all;
    }
    .heading-venue{
        font-size:18px;
        font-weight:500;
        margin-bottom:15px;
        color:white;
        text-align:center;
    }
    .btn-venue:hover{
        background:#988630;
        color:White;
        
    }
    /*.btn-venue{*/
    /*    background:#FED308;*/
    /*    border:none;*/
    /*    outline:none;*/
    /*    color:#000;*/
    /*    border-radius:100px;*/
    /*    padding:9px 16px;*/
    /*    border:2px solid transparent;*/
    /*}*/
    /*.btn-venue:hover{*/
    /*    border:2px solid #FED308;*/
    /*}*/
    /*.venue-image{*/
    /*    width:100%;*/
    /*    height:320px;*/
    /*    object-fit:cover;*/
    /*    position:relative;*/
    /*    border-radius:15px;*/
    /*    margin-bottom:13px;*/
    /*    overflow:hidden;*/
    /*     border:2px solid #FED308;*/
    /*}*/
    /*.venue-image img{*/
    /*    width:100%;*/
    /*    height:100%;*/
    /*    position:absolute;*/
    /*    left:0;*/
    /*    top:0;*/
    /*    transition:.4s all;*/
    /*}*/
    .venue-image:hover img{
        transform:scale(1.2);
    }
    
     .container-select {
        display: grid;
        grid-template-columns: repeat(1, 1fr); /* 2 kolom */
        margin-bottom:15px;
    }

    /* Style untuk kolom (col) */
    .col {
        display: flex;
        flex-direction: column;
        width: 280px;
    }

   /* Style untuk select option */
    select {
        padding: 8px;
        margin: 5px 0;
        border-radius: 15px;
    }

    /* Style untuk option pada select */
    option {
        background-color: black; /* Warna latar belakang hitam */
        color: white; /* Warna teks putih */
    }
    
    @media(max-width:768px){
        .layout-lapangan{
            width:100%;
            padding:20px 20px !important;
            padding-bottom:65px !important;
            background-color:white;
        }
        .heading-text h3{
            font-size:17px;
        }
        .heading-text a{
            font-size:16px;
        }
        /*.grid-lapangan{*/
        /*    width:90%;*/
        /*    flex-direction:column;*/
        /*}*/
        .grid-lapangan{
            width:100%;
            margin:auto;
            display:grid;
            grid-template-columns:repeat(2, 1fr);
            grid-gap:15px;
        }
        .grid-lapangan-box{
            height:240px;
            
        }
        .caption-venue{
            width:93%;
            bottom:3%;
            padding:10px;
        }
        .heading-venue{
            font-size:16px;
            margin-bottom:9px;
        }
        .btn-venue{
            font-size:13px;
            padding:5px;
        }
        .col {
            width: 100%;
        }
    }
</style>
<div class="layout-lapangan">
    <?php $id = isset($_GET['id']) ? $_GET['id'] : null; ?>
    <div class="heading-text">
        <h3>Lapangan Kami</h3>
        <a href="">Selengkapnya</a>
    </div>
    <hr>
    <div class="container-select">
        <div class="col">
            <label for="option1">Cabang Olahraga:</label>
            <select id="option1">
               <option value="">Pilih Cabor</option>
              <?php foreach($cabor as $cabor){ ?>
                <option value="<?= $cabor->id_cabor ?>" <?php if ($id == $cabor->id_cabor) { echo 'selected'; } ?> ><?= $cabor->nama_cabor ?></option>
               <?php } ?>
             
            </select>
        </div>
    </div>
    <div class="grid-lapangan">
      <?php foreach($lapangan_new as $lapangan){ ?>
        <div class="grid-lapangan-box">
        <a href="<?php echo base_url('cart/beforeCart/').$lapangan->id_lapangan ?>">
                <?php
                if(empty($lapangan->foto)) {echo "<img class='card-img-top' src='".base_url()."assets/images/no_image_thumb.png'>";}
                else { echo "<img src='".base_url()."assets/images/lapangan/".$lapangan->foto."'> ";}
                ?>
            
        </a>
            
            <div class="caption-venue">
              <p class="heading-venue"><?php echo $lapangan->nama_lapangan ?></p>
              <a href="<?php echo base_url('beforeCart/').$lapangan->id_lapangan ?>">
                <button class="btn-venue"><i class="fa fa-eye"></i>Lihat Jadwal</button>
              </a>
            </div>
        </div>
      <?php } ?>
    </div>
</div>

