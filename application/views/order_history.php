<?php include_once('includes/header.php'); ?>
<div class="container-fluid b_top_menu">
   <div class="container ni_pad_tp_bt">
      <div class="row">
         <div class="col-md-12">
            <ol class="breadcrumb breadc_b">
               <li>
                  <a href="index.php" class="red">
                     <i class="fa fa-home"></i> 
                     <sapn class="hidden-xs">Home</sapn>
                  </a>
               </li>
               <li><a href="<?php echo site_url('usersinfo/orders'); ?>" class="red"></i> My Order</a></li>
               <li class="active"><?= $order_id->order_number; ?></li>
            </ol>
         </div>
      </div>
   </div>
</div>
<div class="container-fluid">
<div class="container">
   <div class="row">
      <div class="col-md-3 col-sm-4">
         <div class="panel panel-default">
            <div class="panel-heading head_padd">
               <h5 class="text-uppercase br_bt red f_h5">MY Account</h5>
            </div>
            <div class="panel-body padd_5">
               <?php include_once('includes/account.php'); ?>
            </div>
         </div>
      </div>
      <div class="col-md-9 col-sm-8">
         <div class="panel panel-default">
            <div class="panel-heading head_padd">
               <h5 class="text-uppercase br_bt red f_h5">Order History</h5>
            </div>
            <div class="panel-body">
               <div class="hidden-xs">
                  <table class="table table-striped tcart">
                     <!-- start table header -->
                     <!-- start table header -->
                     <thead>
                        <tr>
                           <th>S.No</th>
                           <th>Product name</th>
                           <th>Quantity</th>
                           <th>Price (<i class="fa fa-dollar"></i>)</th>
                        </tr>
                     </thead>
                     <!-- end table header -->
                     <tbody>
                        <?php if(isset($order_details) && is_array($order_details) && count($order_details)) : $i=1;?>
                        <?php foreach ($order_details as $key => $order) { ?>
                        <tr>
                           <td><?php echo $i; ?></td>
                           <td><?= $order->product_name;?></td>
                           <td><?= $order->qty;?></td>
                           <td><?= price_format($order->price);?></td>
                        </tr>
                        <?php $i++; } ?>
                        <?php endif; ?>
                     </tbody>
                  </table>
               </div>
               <!--mobile-->
               <div class="visible-xs">
                  <div class="col-xs-12 bord_bottom">
                     <div class="col-xs-6">
                        <p><b>Product name</b></p>
                     </div>
                     <div class="col-xs-6">
                        <p class="green">Sona Masuri Stream Rice-Sliver</p>
                     </div>
                  </div>
                  <div class="col-xs-12 bord_bottom">
                     <div class="col-xs-6">
                        <p><b>Quantity</b></p>
                     </div>
                     <div class="col-xs-6">
                        <p>2</p>
                     </div>
                  </div>
                  <div class="col-xs-12 bord_bottom">
                     <div class="col-xs-6">
                        <p><b>Price (<i class="fa fa-dollar"></i>) </b></p>
                     </div>
                     <div class="col-xs-6">
                        <p>4,000</p>
                     </div>
                  </div>
                  <!--mobil end-->
               </div>
            </div>
         </div>
      </div>
   </div>
   </div>
</div>
<?php include_once('includes/footer.php'); ?>
<script type="text/javascript">
   $(document).ready(function () {
       $('#myorder').addClass('current');
   });
   
</script>