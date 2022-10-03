
<?php 
foreach($datas->result() as $data)
{
    $staffname = $data->user_id; 
    $custname = $data->cust_name; 
    $source = $data->source; 
    $shopname = $data->shop_name; 
    if(($data->area != '') || ($data->city != ''))
    {
        $address = $data->area.','.$data->city; 
    }
    else{
        $address = '';
    }
    
    $phone = $data->mobile; 
    $whatsapp = $data->whatsapp; 
    $starttime = $data->start_time; 
    $endtime = $data->end_time; 
    $report = $data->report_content;
    $date = $data->date;
   

}
$query = $this->db->select('staff_name') ->from('staff_tbl') ->where('id',$staffname)->get();
$sname = $query->row();
if($custname != '')
{
    $cquery = $this->db->select('name') ->from('customer') ->where('id',$custname)->get();
    $nquery = $cquery->num_rows();
    $cname = $cquery->row();
}
else{
    $nquery = 0;
}


?>
<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 5px;
  text-align: left;
}
</style>
</head>
<body>
<h2>REPORT</h2>

<table style="width:100%">
   <?php
  if($query->num_rows() > 0)
  {
  ?>
  <tr>
    <th>Staff name:</th>
    <td><?= $sname->staff_name; ?></td>
  </tr>
  <?php } ?>
  <?php
  if($nquery > 0)
  {
  ?>
  <tr>
    <th>Customer Name:</th>
    <td><?= $cname->name; ?></td>
  </tr>
  <?php } ?>
  <?php
  if($source != '')
  {
  ?>
  <tr>
    <th>Source:</th>
    <td><?= $source; ?></td>
  </tr>
  <?php }?>
  <?php
  if($shopname != '')
  {
  ?>
  <tr>
    <th>Shop Name:</th>
    <td><?= $shopname; ?></td>
  </tr>
  <?php 
  }
  ?>
  <?php
  if($address != '')
  {
  ?>
  <tr>
    <th>Address:</th>
    <td><?= $address; ?></td>
  </tr>
  <?php }?>
  <?php
  if($phone != '')
  {
  ?>
  <tr>
    <th>Phone:</th>
    <td><?= $phone; ?></td>
  </tr>
  <?php }?>
  <?php
  if($whatsapp != '')
  {
  ?>
  <tr>
    <th>WhatsApp:</th>
    <td><?= $whatsapp; ?></td>
  </tr>
  <?php }?>
  
  <!-- <tr>
    <th>Used Software:</th>
    <td>555 77 855</td>
  </tr> -->
  <?php
  if($date != '')
  {
  ?>
  <tr>
    <th>Date:</th>
    <td><?= $date; ?></td>
  </tr>
  <?php }?>
  <?php
  if($starttime != '')
  {
  ?>
  <tr>
    <th>Start Time:</th>
    <td><?= $starttime; ?></td>
  </tr>
  <?php }?>
  <?php
  if($endtime != '')
  {
  ?>
  <tr>
    <th>End Time:</th>
    <td><?= $endtime; ?></td>
  </tr>
  <?php }?>
  
  <?php
  if($report != '')
  {
  ?>
  <tr>
    <th>Reports:</th>
    <td><?= $report; ?></td>
  </tr>
  <?php }?>
</table>

</body>
</html>
