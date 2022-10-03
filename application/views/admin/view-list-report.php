<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        View Report
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">View Report</a></li>
        <li class="active">View Report</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">View report</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              
              <table class="table">
                
                  <?php
                  if($data->source != '')
                  {
                  ?>
                  <tr>
                  <td>Source</td>
                  <td><?php echo $data->source;?></td>
                  </tr>
                  <?php 
                  }
                  ?>
                  <?php
                  if($data->cust_name != '')
                  {
                  ?>
                  <tr>
                  <td>Customer Name</td>
                  <td><?php echo $data->name;?></td>
                  </tr>
                  <?php 
                  }
                  ?>
                  <?php
                  if($data->cmobile != '')
                  {
                  ?>
                  <tr>
                  <td>Customer Mobile</td>
                  <td><?php echo $data->cmobile;?></td>
                  </tr>
                  <?php 
                  }
                  ?>
                  <?php
                  if($data->shop_name != '')
                  {
                  ?>
                  <tr>
                  <td>Shop Name</td>
                  <td><?php echo $data->shop_name;?></td>
                  </tr>
                  <?php 
                  }
                  ?>
                  <?php
                  if($data->area != '')
                  {
                  ?>
                  <tr>
                  <td>Area</td>
                  <td><?php echo $data->area;?></td>
                  </tr>
                  <?php 
                  }
                  ?>
                  <?php
                  if($data->city != '')
                  {
                  ?>
                  <tr>
                  <td>City</td>
                  <td><?php echo $data->city;?></td>
                  </tr>
                  <?php 
                  }
                  ?>
                  <?php
                  if($data->mobile != '')
                  {
                  ?>
                  <tr>
                  <td>Mobile</td>
                  <td><?php echo $data->mobile;?></td>
                  </tr>
                  <?php 
                  }
                  ?>
                  <?php
                  if($data->whatsapp != '')
                  {
                  ?>
                  <tr>
                  <td>WhatsApp</td>
                  <td><?php echo $data->whatsapp;?></td>
                  </tr>
                  <?php 
                  }
                  ?>
                  <?php
                  if($data->date != '')
                  {
                  ?>
                  <tr>
                  <td>Date</td>
                  <td><?php echo $data->date;?></td>
                  </tr>
                  <?php 
                  }
                  ?>
                  <?php
                  if($data->wsoftware != '')
                  {
                  ?>
                  <tr>
                  <td>Used Software</td>
                  <td><?php echo $data->wsoftware;?></td>
                  </tr>
                  <?php 
                  }
                  ?>
                  <?php
                  if($data->start_time != '')
                  {
                  ?>
                  <tr>
                  <td>Start Time</td>
                  <td><?php echo $data->start_time;?></td>
                  </tr>
                  <?php 
                  }
                  ?>
                  <?php
                  if($data->end_time != '')
                  {
                  ?>
                  <tr>
                  <td>End Time</td>
                  <td><?php echo $data->end_time;?></td>
                  </tr>
                  <?php 
                  }
                  ?>
                  <?php
                  if($data->report_file != '')
                  {
                  ?>
                  <tr>
                  <td>Report File</td>
                  <td><a href="<?= base_url() ?>uploads/reports/<?= $data->report_file?>"><?php echo $data->report_file; ?></a></td>
                  </tr>
                  <?php 
                  }
                  ?>
                  <?php
                  if($data->report_content != '')
                  {
                  ?>
                  <tr>
                  <td>Report</td>
                  <td><?php echo $data->report_content;?></td>
                  </tr>
                  <?php 
                  }
                  ?>
                  
                  
                
              </table>
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
