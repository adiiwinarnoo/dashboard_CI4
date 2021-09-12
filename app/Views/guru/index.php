<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLabusta | Dashboard</title>
  <link rel="shortcut icon" type="image/png" href="/labusta.png"/>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>


<?= $this->include('adminLte/navbar') ?>
<?= $this->include('adminLte/sidebar') ?>

<body class="hold-transition skin-blue sidebar-mini">


<div class="wrapper">

  <!-- Left side column. contains the logo and sidebar -->
  
  <!-- Content Wrapper. Contains page content -->
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
    <div class="box">
        <?php if (session()->getFlashdata('success')): ?> 
            <div class="alert alert-success alert-dismissible showfade">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">x</button>
                    <b>Success !!</b>
                    <?=session()->getFlashdata('success')?>
                </div>
            </div>
        <?php endif;?>
        <?php if (session()->getFlashdata('error')): ?> 
            <div class="alert alert-danger alert-dismissible showfade">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">x</button>
                    <b>Error !!</b>
                    <?=session()->getFlashdata('error')?>
                </div>
            </div>
        <?php endif;?>

            <div class="box-header">
              <h3 class="box-title">Data Guru SMK Lab Business School Tangerang</h3>
              <div class="section-header-button">
                <a href="<?=base_url('Guru/new')?>" class="btn btn-primary pull-right">Tambah Guru</a>
                            <div class="pull-right" style="margin-top: 10px">
                              <div class="col-lg-14">
                                <form action="" method="get">
                                    <div class="input-group">
                                      <input type="text" class="form-control" placeholder="Cari Berdasarkan nama.." name="cari">
                                      <span class="input-group-btn">
                                        <button class="btn btn-primary pull-right" name="submit" type="submit" >Cari</button>
                                      </span>
                                    </div><!-- /input-group -->
                                </form>
                              </div><!-- /.col-lg-6 -->
                            </div>
                              
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                        <th></th>
                            <th>No</th>
                            <th>Mata Pelajaran</th>
                            <th>Nama</th>
                            <th>Nomor Induk</th>
                            <th>Kelas</th>
                            <th>Jenis Kelamin</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                        <?php $i = 1 + (5 *($pageurut - 1 ));?>
                        <?php foreach ($gurus as $key => $value):?>
                        <tr>
                        <td></td>
                            <td><?=$i++ ?></td>
                            <td><?=$value->Pelajaran?></td>
                            <td><?=$value->Nama?></td>
                            <td><?=$value->Nomor_Induk?></td>
                            <td><?=$value->kelas?></td>
                            <td><?=$value->jeniskelamin?></td>
                            <td><img src="<?=base_url('photo/'. $value->photo)?>" width="100" ></td>
                            
                            
                            <td>
                                <a href="<?= base_url('Guru/edit/'.$value->id)?>" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                <form action="<?=base_url('Guru/delete/'. $value->id)?>" method="post" class="inline" onsubmit="return confirm('Yakin Hapus Data?')">
                                    <input type="hidden" name="_method" value="DELETE">                        
                                    <button class="btn btn-danger">
                                    <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                       
                        <?php endforeach;?>
                    </tbody>
                    
                </table>
                <div class="pull-right" style="margin:20px"> 
                <?= $pager->links()?>
                </div>
                <div style="margin: 20px">
                showing
                <?=$i-1?>
                data

            </div>
            <!-- /.box-body -->
          </div>
    
                
              
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?= $this->include('adminLte/footer') ?>

  <!-- Control Sidebar -->
 
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?= base_url() ?>/template/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url() ?>/template/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url() ?>/template/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="<?= base_url() ?>/template/bower_components/raphael/raphael.min.js"></script>
<script src="<?= base_url() ?>/template/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url() ?>/template/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?= base_url() ?>/template/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?= base_url() ?>/template/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url() ?>/template/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url() ?>/template/bower_components/moment/min/moment.min.js"></script>
<script src="<?= base_url() ?>/template/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?= base_url() ?>/template/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?= base_url() ?>/template/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?= base_url() ?>/template/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url() ?>/template/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>/template/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url() ?>/template/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>/template/dist/js/demo.js"></script>
</body>
</html>
