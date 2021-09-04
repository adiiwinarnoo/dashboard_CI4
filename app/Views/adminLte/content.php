<div class="content-wrapper">
  
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
     </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
<section class="content">
      <!-- Small boxes (Stat box) -->

      <!-- ini contoh gambar kotak dashboard kesatu -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?= $total_siswa?></h3>

              <p>Total Siswa SMK Lab Business School Tangerang</p>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
        </div>
      </div>

      <!-- ini dashboard kotak kedua -->
      <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?=$total_admin?></h3>

              <p>Total Admin SMK Lab Business School Tangerang</p>
            </div>
            <div class="icon">
              <i class="ion ion-man"></i>
            </div>
            </div>
        </div>

        <!-- ini dashboard kotak ketiga -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?=$total_percakapan?></h3>

              <p>Total Percakapan Chatbot SMK Lab Business School Tangerang</p>
            </div>
            <div class="icon">
              <i class="ion ion-chatbubbles"></i>
            </div>
          </div>     
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?=$total_percakapan?></h3>

              <p>Total Percakapan Chatbot SMK Lab Business School Tangerang</p>
            </div>
            <div class="icon">
              <i class="ion ion-chatbubbles"></i>
            </div>
          </div>     
        </div>
          

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <?= $this->include('adminLte/chart') ?>
        </div>

          <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <?= $this->include('adminLte/chart1') ?>
        </div>
       

      </div>
      
  
      

      
      

        
    
    <!-- /.content -->
  </div>
