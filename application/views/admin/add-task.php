  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Report Management
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Assign Task</a></li>
        <li class="active">Add Task</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

        <?php echo validation_errors('<div class="col-md-12">
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-check"></i> Failed!</h4>', '</div>
          </div>'); ?>

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

        <!-- column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Add Task</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo form_open_multipart('task/taskInsert');?>
              <div class="box-body">
              <div class="col-md-6">
                  <div class="form-group">
                    <label>Task</label>
                    <input type="text" name="task" id="task" class="form-control">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Staff</label>
                    <select class="form-control" name="staff" id="staff">
                      <option value="">Select</option>
                      <?php foreach($staff as $staff)
                    {?>
                      <option value="<?= $staff['id'];?>"><?= $staff['staff_name'];?></option>
                      <?php }?>
                    
                    </select>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Start Time</label>
                    <input id="stime" type="datetime-local" name="stime" class="form-control">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>End Time</label>
                    <input type="datetime-local" name="etime" id="etime" class="form-control">
                  </div>
                </div>

                <div class="col-md-12">
                <textarea class='editor' id="taskcontent" name='content' >
      
                </textarea>
                </div>
                
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-success pull-right">Submit</button>
                <?php echo $this->session->flashdata('success'); ?>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (left) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- tynymce script -->
  <!-- tynymce -->
  <style>
    #hws{
      display:none;
    }
    </style>
<script src='<?= base_url() ?>resources/tinymce/tinymce.min.js'></script>
  <script>
    //radio button
    $("input[name='software']").click(function(){
      var va = $("input[name='software']:checked").val();
      if(va == 'yes')
      {
          $('#hws').show();
      }
      else{
        $('#hws').hide();
      }
    });
    
    $(document).ready(function() {
        ///alert('hi');
        tinymce.init({ 
				selector:'.editor',
				theme: 'modern',
				height: 200
			});

    });
  </script>