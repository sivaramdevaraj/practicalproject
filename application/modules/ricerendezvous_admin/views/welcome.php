    <!-- Page header -->
   <div class="page-header">
      <div class="col-sm-6 pull-left" >
        <div class="page-title" >
            <h3>Dashboard <small>Welcome to Rice Rendezvous Admin <?php echo timespan($this->session->userdata('old_last_login'), time()) ;?> since last visit</small></h3>
        </div>
      </div>
      <div class="col-sm-5 light pull-right" id="clock" >
        <div class="display">
        <div class="weekdays"></div>
        <div class="ampm"></div>
        <div class="alarm"></div>
        <div class="digits"></div>
      </div>
      </div>
    </div>
    <!-- /page header -->
    <!-- Breadcrumbs line -->
    <div class="breadcrumb-line">
      <ul class="breadcrumb">
        <li><a href="<?php echo site_url().admin?>">Dashboard</a></li>
      </ul>
    </div>
    
    <!-- /breadcrumbs line -->
    <ul class="info-blocks">     
      <li class="bg-warning">
        <a href="<?php echo site_url().admin?>products">
        <div class="top-info">Add new product<small>Shop now</small></div>
        <i class="icon-cart2"></i><span class="bottom-info bg-primary">Shop now</span></a>
      </li>
      <li class="bg-primary">
        <a href="<?php echo site_url().admin?>order_details/index/1">
        <div class="top-info">Orders<small>Order history</small></div>
        <i class="icon-spinner7 spin form-control-feedback"></i><span class="bottom-info bg-danger">Orders</span></a>
      </li>
      <li class="bg-info">
        <a href="<?php echo site_url().admin?>whole_sales">
        <div class="top-info">Wholse sale zone<small>Product list</small></div>
        <i class="icon-folder-plus"></i><span class="bottom-info bg-primary">New product</span></a>
      </li>
      <li class="bg-danger">
        <a href="<?php echo site_url().admin?>cities/index/1">
        <div class="top-info">Zip Codes<small></small>City Pincode list</div>
        <i class="icon-barcode2"></i><span class="bottom-info bg-primary">Pincode</span></a>
      </li>           
    </ul>
  <!-- bar charts will starts here -->

<div style="margin: 0 1em">
<script src="<?php echo base_url()?>assets/chart_js/highcharts.js"></script>
<script src="<?php echo base_url()?>assets/chart_js/data.js"></script>
<script src="<?php echo base_url()?>assets/chart_js/exporting.js"></script>
<style type="text/css">
.sr{
  overflow-x:hidden;
}</style>
</div>
  
  <script type="text/javascript">
  $(document).ready(function(){ 
    $(document).on('change','#select_present_year',function(){
      $('#yearform').submit();
    });   
      $('#view_modal').modal({       
        show:true,        
      });
  });
  </script>
   <script type="text/javascript">
    $('#dashboard').addClass('active');
  </script> 
