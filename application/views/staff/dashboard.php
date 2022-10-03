  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php 
              if(isset($leave))
              {
                echo sizeof($leave);
              }
              else{
                echo 0;
              }
              ?></h3>

              <p>Leaves</p>
            </div>
            <div class="icon">
              <i class="ionicons ion-log-out"></i>
            </div>
            
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <a href="<?= base_url()?>staff-list-task">
          <div class="small-box bg-blue">
            <div class="inner">
              <h3><?php 
              if(isset($task))
              {
                echo sizeof($task);
              }
              else{
                echo 0;
              }
              ?></h3>

              <p>Tasks</p>
            </div>
            <div class="icon">
              <i class="ionicons ion-log-out"></i>
            </div>
            
          </div>
            </a>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <a href="<?= base_url()?>staff-list-task">
          <div class="small-box bg-orange">
            <div class="inner">
              <h3><?php 
              if(isset($task))
              {
                echo sizeof($task);
              }
              else{
                echo 0;
              }
              ?></h3>

              <p>Completed Tasks</p>
            </div>
            <div class="icon">
              <i class="ionicons ion-log-out"></i>
            </div>
            
          </div>
            </a>
        </div>

        <!-- ./col -->
      </div>
        <!-- ./col -->
      </div>
      
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
