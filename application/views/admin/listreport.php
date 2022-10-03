<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Report
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Report Management</a></li>
        <li class="active">Report List</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

        <?php if($this->session->flashdata('success')): ?>
          <div class="col-md-12">
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-check"></i> Success!</h4>
                  <?php echo $this->session->flashdata('success'); ?>
            </div>
          </div>
        <?php elseif($this->session->flashdata('error')):?>
        <div class="col-md-12">
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-check"></i> Failed!</h4>
                  <?php echo $this->session->flashdata('error'); ?>
            </div>
          </div>
        <?php endif;?>

        <div class="col-xs-12">
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Report List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Staff Name</th>
                    <th>Department</th>
                    <th>Date</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                    if(isset($data)):
                    $i=1; 
                    foreach($data->result() as $cnt): 
                        //echo $cnt->user_id;
                       $query = $this->db->select('*')->from('staff_tbl as st')
                        ->where('st.id',$cnt->user_id)
                        ->join('department_tbl as dt','st.department_id = dt.id')
                        ->get();
                        
                        foreach($query->result() as $d)
                        {
                            //echo $d->department_name;
                        //}
                  ?>
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $d->staff_name; ?></td>
                        <td><?php echo $d->department_name; ?></td>
                        <td><?php echo $cnt->date; ?></td>
                        <td>
                          <a href="<?php //echo base_url(); ?>edit-staff/<?php //echo $cnt['id']; ?>" class="btn btn-success">Edit</a>
                          <a target="_blank" href="<?php echo base_url(); ?>report-pdf/<?php echo $cnt->id; ?>" class="btn btn-danger">Pdf</a>
                        </td>
                      </tr>
                    <?php 
                        }
                      $i++;
                      endforeach;
                      endif; 
                    ?>
                  
                  </tbody>
                </table>
              </div>
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

    