  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Report Management
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Report Management</a></li>
        <li class="active">Add Report</li>
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
              <h3 class="box-title">Add Report</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo form_open_multipart('workreport/workReportInsert');?>
              <div class="box-body">
              <?php if($this->session->userdata('dep_id') == '5'){?>
              <div class="col-md-5">
                  <div class="form-group">
                    <label>Source</label>
                    <select class="form-control" name="source" id="source">
                      <option value="">Select</option>
                      <option value="social media">Social Media</option>
                      <option value="whatsapp">WhatsApp</option>
                      <option value="direct office">Direct office</option>
                      <option value="existing customer">Existing Customer</option>
                      <option value="direct walk">Direct Walk</option>
                      <option value="others">Others</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="form-group">
                    <label>Customer Name</label>
                    <select class="form-control" name="cname" id="cname">
                      <option value="">Select</option>
                      <?php 
                      foreach($customer->result() as $customer)
                      {
                        ?>
                      <option value="<?php echo $customer->id;?>"><?php echo $customer->name;?></option>
                      <?php }?>
                    </select>
                  </div>
                </div>
                <div class="col-md-2">
                <a href="<?php echo base_url();?>add-customer"><button type="button" style="margin-top: 30px;">Add Customer</button></a>
                </div>  
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Shop Name</label>
                    <input type="text" name="shop_name" id="shop_name" class="form-control">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Area</label>
                    <input type="text" name="shop_area" class="form-control">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>City</label>
                    <input type="text" name="shop_city" class="form-control">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Mobile</label>
                    <input type="tel" id="phone" name="phone" class="form-control"  pattern="+94[7-9]{2}-[0-9]{3}-[0-9]{4}" value="+968">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>WhatsApp</label>
                    <input type="tel" id="phone" name="whatsapp" class="form-control"  pattern="+94[7-9]{2}-[0-9]{3}-[0-9]{4}" value="+968">
                  </div>
                </div>
              <?php }?>  
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Start Time</label>
                    <input id="stime" type="time" name="stime" class="form-control">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>End Time</label>
                    <input type="time" name="etime" id="etime" class="form-control">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Department</label>
                    <select class="form-control" name="department" id="department">
                      <option value="">Select</option>
                      <?php
                      foreach ($department as $row)
                      {
                         
                      ?>
                      <option value="<?php echo $row['id'];?>"><?php echo $row['department_name'];?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <!-- <div class="col-md-6">
                  <div class="form-group">
                    <label>Photo</label>
                    <input type="file" name="sphoto" class="form-control">
                  </div>
                </div> -->
                <div class="col-md-6">
                <div class="col-md-4">
                <label>Used Software</label>
                </div>
                <div class="col-md-4">
                  <label>Yes</label>
                  <input type="radio" name="software" value="yes">
                </div>
                <div class="col-md-4">
                <label>No</label>
                  <input type="radio" name="software" value="no" checked>
                </div>
                  <!-- <div class="form-group">
                    <label>Currently Used Software</label>
                    <input type="checkbox">
                  </div> -->
                </div>
                <div class="col-md-6">
                <div class="form-group" id="hws">
                    <label>Which Software</label>
                    <input type="text" id="wsoftware" name="wsoftware" class="form-control" >
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="formFile" class="form-label">Upload Report</label>
                      <input class="form-control" type="file" id="ureport" name="ureport">
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                <textarea class='editor' id="report" name='content' >
      
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