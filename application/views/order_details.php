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
               <li class="hidden-xs"><a href="#" class="red"></i> My Account</a></li>
               <li class="active">My order</li>
            </ol>
         </div>
      </div>
   </div>
</div>
<div class="container-fluid">
   <div class="container">
      <div class="row">
         <div class="col-md-3 col-sm-3">
            <div class="panel panel-default">
               <div class="panel-heading head_padd">
                  <h5 class="text-uppercase br_bt red f_h5">MY Account</h5>
               </div>
               <div class="panel-body padd_5">
                  <?php include_once('includes/account.php'); ?>
               </div>
            </div>
         </div>
         <div class="col-md-9 col-sm-9">
            <div class="panel panel-default">
               <div class="panel-heading head_padd">
                  <h5 class="text-uppercase br_bt red f_h5">Order Details</h5>
               </div>
               <div class="panel-body">
                  <div class="hidden-xs">
                     <table class="table table-striped tcart hidden-xs">
                        <!-- start table header -->
                        <thead>
                           <tr>
                              <th class="table_f">Order Id</th>
                              <th class="table_f">Delivery charge (<i class="fa fa-dollar"></i>)</th>
                              <th class="table_f">Total price (<i class="fa fa-dollar"></i>)</th>
                              <th class="table_f">Order Date</th>
                              <th class="table_f">Status</th>
                              <th> </th>
                           </tr>
                        </thead>
                        <!-- end table header -->
                        <tbody>
                           <?php if(isset($order_details) && is_array($order_details) && count($order_details)) : ?>
                           <?php foreach ($order_details as $key => $order) { ?>
                           <tr>
                              <td><a href="<?php echo site_url('usersinfo/orders_list').'/'.$order->id;?>"># <?= $order->order_number; ?></a></td>
                              <td>
                                 <div align="center">                                  
                                    <?php if($order->delivery_charge==0):
                                       echo "Free";
                                       else :  echo $order->delivery_charge;
                                       endif; ?>
                                 </div>
                              </td>
                              <td><?= price_format($order->grand_total); ?></td>
                              <td><?= date('d-m-Y h:i A',strtotime($order->order_date)); ?></td>
                              <td>
                                 <?php
                                    if($order->status==0) echo "<span class='red'>Payment failed</span>";
                                    elseif($order->status==1) echo "<span class='blue'>Order Placed</span>";
                                    elseif($order->status==2)echo  "<span class='saffron'>Shipping</span>";
                                    elseif($order->status==3)echo  "<span class='green'>Delivered</span>";
                                    elseif($order->status==4)echo  "<span class='red'>Cancelled</span>";
                                    elseif($order->status==5)echo  "<span class='blue'>Returned</span>";
                                    ?>
                              </td>
                              <td>
                                 <div class="icons-group hidden-xs hidden-sm"> 
                                    <?php if($order->status!=4 && $order->status!=5 && $order->status!=0) : ?>
                                    <a href="#" role="button" title="Delete" class="tip scancel_button cancel_order btn btn-danger btn-sm" data-title="<?php echo $order->order_number?>" data="<?php echo $order->id?>">Cancel</a>                                            
                                    <?php endif; ?>                                     
                                 </div>
                                 <div class="icons-group visible-sm visible-xs"> 
                                    <?php if($order->status!=4 && $order->status!=5) : ?>
                                    <a title="Delete" class="tip cancel_button cancel_order" data-title="<?php echo $order->order_number?>" data="<?php echo $order->id?>">X</a>                                            
                                    <?php endif; ?>                                    
                                 </div>
                              </td>
                           </tr>
                           <?php } ?>
                           <?php else :  ?>
                           <tr>
                              <td>Oops! Looks like you haven’t ordered anything.</td>
                           </tr>
                           <?php endif; ?>
                        </tbody>
                     </table>
                  </div>
                  <!--mobile-->
                  <div class="visible-xs">
                     <div class="col-xs-12 bord_bottom">
                        <div class="col-xs-6">
                           <p><b>Order Id</b></p>
                        </div>
                        <div class="col-xs-6">
                           <p class="green"><a href="#"># 4235268</a></p>
                           <p class="green"><a href="#"># 4235268</a></p>
                        </div>
                     </div>
                     <div class="col-xs-12 bord_bottom">
                        <div class="col-xs-6">
                           <p><b>Delivery charge (<i class="fa fa-dollar"></i>)</b></p>
                        </div>
                        <div class="col-xs-6">
                           <p>1</p>
                           <p>2</p>
                        </div>
                     </div>
                     <div class="col-xs-12 bord_bottom">
                        <div class="col-xs-6">
                           <p><b>Total price (<i class="fa fa-dollar"></i>) </b></p>
                        </div>
                        <div class="col-xs-6">
                           <p>839</p>
                           <p>739</p>
                        </div>
                     </div>
                     <div class="col-xs-12 bord_bottom">
                        <div class="col-xs-6">
                           <p><b>Order Date</b></p>
                        </div>
                        <div class="col-xs-6">
                           <p>16-10-2015 04:30 PM</p>
                           <p>16-10-2015 04:30 PM</p>
                        </div>
                     </div>
                     <div class="col-xs-12 bord_bottom">
                        <div class="col-xs-6">
                           <p><b>Status</b></p>
                        </div>
                        <div class="col-xs-6">
                           <p>Order Placed</p>
                           <p>Order Placed</p>
                        </div>
                     </div>
                     <div class="col-xs-12 bord_bottom">
                        <div class="col-xs-6">
                           <p><b>Cancel </b></p>
                        </div>
                        <div class="col-xs-6">
                           <p><a href="#" role="button" class=" btn btn-danger btn-sm">Cancel</a></p>
                           <p><a href="#" role="button" class=" btn btn-danger btn-sm">Cancel</a></p>
                        </div>
                     </div>
                  </div>
                  <!--mobil end-->
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Canecl popup model-->
<div class="modal fade canelpopmodal" id="canel_popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         </div>
         <div class="modal-body">
            <p class="text-center">Are you sure you want to cancel the order?</p>
         </div>
         <div class="modal-footer">
            <button type="button"  value="ok" class="btn btn-success cancel_button1" data-title="<?php echo $order->order_number?>" data="<?php echo $order->id?>">YES</button>
            <button type="button"  value="cancel" class="btn btn-default cancel_button1" data-dismiss="modal">NO</button>
         </div>
      </div>
   </div>
</div>
<!-- Canecl popup model end-->
<!-- Return popup model -->
<div class="modal fade canelpopmodal" id="return_popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         </div>
         <div class="modal-body">
            <p class="text-center">Are you sure you want to return the order?</p>
         </div>
         <div class="modal-footer">
            <button type="button"  value="ok" class="btn btn-success return_button1" data-title="<?php echo $order->order_number?>" data="<?php echo $order->id?>">YES</button>
            <button type="button"  value="cancel" class="btn btn-default return_button1" data-dismiss="modal">NO</button>
         </div>
      </div>
   </div>
</div>
<!-- Return popup model end popup-->
<!-- Modal for Login Starts Here -->
<div class="modal fade cancel_product" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog modal_dialog">
      <div class="modal-content modal_content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">Cancel your order (#<span id="order_title"></span>)</h4>
         </div>
         <div class="modal-body">
            <form class="form-horizontal" action="<?php echo site_url()?>usersinfo/cancel_order" method="post" id="order_cancel_form">
               <fieldset>
                  <div class="form-group">
                     <label for="name" class="col-sm-2 control-label">Reason to Cancel <span class="red">*</span></label>
                     <div class="col-sm-10">             
                        <textarea title="Please enter your text" class="form-control required" cols="15" rows="4" name="cancel_reason"></textarea>
                     </div>
                  </div>
                  <div class="form-group" style="margin-bottom:10px !important;">
                     <div class="col-md-12">
                        <button type="submit" class="btn btn-success pull-right cancel_submit">Submit</button>
                        <input type="hidden" id="order_id" value="" name="order_id">
                     </div>
                  </div>
               </fieldset>
            </form>
         </div>
      </div>
   </div>
</div>
<!-- Modal for Login Ends Here -->
<!-- Modal for Login Starts Here -->
<div class="modal fade return_product" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog modal_dialog">
      <div class="modal-content modal_content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">Return your order (#<span id="order_titles"></span>)</h4>
         </div>
         <div class="modal-body">
            <form class="form-horizontal" action="<?php echo site_url()?>usersinfo/return_order" method="post" id="order_return_form">
               <fieldset>
                  <div class="form-group">
                     <label for="name" class="col-sm-2 control-label">Reason to return <span class="red">*</span></label>
                     <div class="col-sm-10">             
                        <textarea title="Please enter your text" class="form-control required" cols="15" rows="4" name="cancel_reason"></textarea>
                     </div>
                  </div>
                  <div class="form-group" style="margin-bottom:10px !important;">
                     <div class="col-md-12">
                        <button type="submit" class="btn btn-primary pull-right cancel_submit">Submit</button>
                        <input type="hidden" id="order_ids" value="" name="order_id">
                     </div>
                  </div>
               </fieldset>
            </form>
         </div>
      </div>
   </div>
</div>
<!-- Modal for Login Ends Here -->
<?php include_once('includes/footer.php'); ?>
<script type="text/javascript">
   $(document).ready(function () {
       $('#myorder').addClass('current');
   });
</script>
<script>
   $(document).on('click','.cancel_button1',function(){
       $('#order_cancel_form').valid();
       var cancelval=$(this).val();
       if(cancelval=="ok"){
         $('#canel_popup').hide();
           $('.cancel_product').modal({
             keyboard: false,
             show:true,
             backdrop:'static'
           });
           $('#order_cancel_form')[0].reset();
           $('label.error').hide();
           var data = eval($(this).attr('data'));
           var edata = $(this).attr('data-title');        
           $('#order_title').html(edata);
           $('#order_id').val(data);
       }                 
   });
   $(document).on('click','.scancel_button',function(){
       $('#canel_popup').modal({
       keyboard: false,
       show:true,
       backdrop:'static'
       }); 
    return false;          
   });
    $(document).on('click','.return_button',function(){
       $('#return_popup').modal({
       keyboard: false,
       show:true,
       backdrop:'static'
       }); 
    return false;          
   }); 
   $(document).on('click','.return_button1',function(){
     $('#order_return_form').valid();
     var returnlval=$(this).val();
     if(returnlval=='ok'){
         $('#return_popup').hide();
   
       $('.return_product').modal({
       keyboard: false,
       show:true,
       backdrop:'static'
       });
       $('#order_return_form')[0].reset();
       $('label.error').hide();
       var sdata = eval($(this).attr('data'));
       var sedata = $(this).attr('data-title');        
       $('#order_titles').html(sedata);
       $('#order_ids').val(sdata);
     }                 
   });
</script>