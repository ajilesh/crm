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
                <table id="tasktable" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Name</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Task</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                    if(isset($data)):
                    $i=1; 
                    foreach($data->result() as $cnt): 
                        //echo $cnt->user_id;
                    //    $query = $this->db->select('*')->from('task as t')
                    //     ->where('t.id',$cnt->user_id)
                    //     ->join('department_tbl as dt','st.department_id = dt.id')
                    //     ->get();
                        $query = $this->db->select('*')->from('staff_tbl')
                        ->where('id',$cnt->assign_to)->get();
                         
                            //echo $d->department_name;
                        //}
                        switch($cnt->status){
                            case "incomplete" :
                                $stat = '<a class="badge badge-success" style="background-color: red;">Incomplete</a>';
                                break;
                            case "complete" :
                                $stat = '<a class="badge badge-success" style="background-color: green;">Complete</a>';
                                break;  
                                default:
                                $stat = '<a class="badge badge-success" style="background-color: yellow;">Inproceess</a>';
                                break;
                                  
                          }
                  ?>
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $cnt->title; ?></td>
                        <?php foreach($query->result() as $d)
                         {?>
                        <td><?php echo $d->staff_name; ?></td>
                        <?php }?>
                        <td><?php echo $cnt->stime; ?></td>
                        <td><?php echo $cnt->etime; ?></td>
                        <td><?php echo $cnt->task; ?></td>
                        <td><?php echo $stat; ?></td>
                        <td>
                          <a href="<?= base_url() ?>edit-task-list/<?= $cnt->id?>" class="btn btn-success">Edit</a>
                          <a href="" class="btn btn-danger">View</a>
                          <a href="<?= base_url() ?>delete-task-list/<?= $cnt->id?>" class="btn btn-danger">Delete</a>
                        </td>
                      </tr>
                    <?php 
                        //}
                      $i++;
                      //$statu = $cnt->status;
                      
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
<script>
    $(document).ready(function(){
        $('#tasktable').DataTable();
    });
    </script>
    