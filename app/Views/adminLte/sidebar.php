
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= base_url() ?>/template/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        
        <div class="pull-left info">
          <p>Admin Labusta</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                <i class="fa fa-search"></i>
                </button>
          </span>
        </div>
      </form>

      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MASTER DATA</li>
        
        <li>
          <a href="<?= base_url('Materi')?>">
            <i class="fa fa-files-o"></i>
            <span>Kelola Materi</span>
          </a>
        </li>

        <li>
          <a href="<?= base_url('percakapan') ?>">
            <i class="fa fa-comment"></i>
            <span>Riwayat Percakapan</span>
          </a>
        </li>
  
        <li>
          <a href="https://dialogflow.cloud.google.com/#/agent/labustabot-teei/intents">
            <i class="fa fa-external-link"></i>
            <span>Kelola Chatbot</span>
          </a>
        </li>
        
       
        
        <li>
          <a href="<?= base_url('kelola_siswa') ?>">
            <i class="fa fa-edit"></i> 
            <span>Kelola Siswa</span>
          </a>
        </li>

        <li>
          <a href="<?=base_url('Guru')?>">
            <i class="fa fa-edit"></i>
            <span>Kelola Guru</span>
           
          </a>
        </li>
        </ul>
        
    </section>
    
  </aside>
  </div>