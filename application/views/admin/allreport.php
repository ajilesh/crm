  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Report
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Reports</a></li>
        <li class="active">Reports</li>
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

        <!-- column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Reports</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form id="search">
              <div class="box-body">
               
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Staff Name</label>
                    <select class="form-control" id="staff" name="staff" >
                      <option value="all">All</option>
                        <?php
                          if(isset($staff))
                          {
                            foreach($staff as $staffs)
                            {
                              print "<option value='".$staffs['id']."'>".$staffs['staff_name']."</option>";
                            }
                          } 
                        ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Start Date</label>
                    <input class="form-control" id="sdate" type="date" name="sdate">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                  <label for="exampleInputPassword1">End Date</label>
                    <input class="form-control" id="edate" type="date" name="edate">

                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                  <label for="exampleInputPassword1">filter</label>
                  <button type="button" id="search_date" class="btn btn-primary form-control">Search</button>

                  </div>
                </div>
              </div>
              <!-- /.box-body -->

              <div id="salarydiv">
              </div>
              
            </form>
          </div>
          <!-- /.box -->
          
          <div class="box box-info">
            <div class="table-responsive res">
            <table class="table" id="reporttable">
            </table>
            </div>
          </div>
        </div>
        <!--/.col (left) -->
        
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script>
    $(document).ready(function(){
        $('#search_date').click(function(){
            var data = $('#search').serialize();
            $.ajax({
                url:'<?= base_url()?>search-report',
                type:'POST',
                data:data,
                success:function(data)
                {
                    console.log(data);
                    
                    $('#reporttable').html(data);
                    $('#reporttable').dataTable({
                        "bDestroy": true,
                        dom: 'Blfrtip',
     buttons: [
       {  
          extend: 'copy'
       },
       {
          extend: 'pdf',
          
       },
       {
          extend: 'csv',
       },
       {
          extend: 'excel',
       } 
     ] 

                    });
                    
    
                    
                }
            });
        });
        
    });
    $(document).on('click','#print_date',function(){
        printDiv();
               function printDiv() {
                
                var divToPrint = document.getElementById('reporttable');
       var popupWin = window.open('', '_blank');
       popupWin.document.open();
       popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
        popupWin.close();
               }
    });
    // $(document).on('click','#print_report',function(){
    //     $.ajax({
    //         url:'<?= base_url();?>search-report',
    //         type:'POST',
    //         success:function(data)
    //         {
    //             $('#reporttable').DataTable();
    //             console.log(data);
    //         }
    //     });
    // });
    </script>
    <style>
        @media print{
            #print_date{
                display: none !important;
            }
        }
        </style>
    