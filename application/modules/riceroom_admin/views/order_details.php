<!-- Page header -->
<div class="page-header">
  <div class="page-title">
    <h3><?php 
        if($category==1) echo "Recent";
        else if($category==2) echo "Shipping";
        else if($category==3) echo "Delivered";
        else if($category==4) echo "Cancelled";
      ?> order list</h3>
  </div>
</div>
<!-- Breadcrumbs line -->
<div class="breadcrumb-line">
  <ul class="breadcrumb">
    <li><a href="<?php echo site_url().admin?>home">Home</a></li>
    <li class="active"><a href="#">
      <?php 
        if($category==1) echo "Recent";
        else if($category==2)  echo "Shipping";
        else if($category==3) echo "Delivered";
        else if($category==4) echo "Cancelled";        
      ?> order list</a>
      </li>  
  </ul>
</div>
<!-- /breadcrumbs line -->
<?php if($this->session->flashdata('message')){?>
  <div class="alert alert-success fade in block-inner">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <i class="icon-checkmark-circle"></i> <?php echo $this->session->flashdata('message')?> </div>
<?php } ?>
<?php if($this->session->flashdata('error')){?>
  <div class="alert alert-danger fade in block-inner">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <i class="icon-checkmark-circle"></i> <?php echo $this->session->flashdata('error')?> </div>
<?php } ?>    
<?php if(isset($mode) && $mode =='all'): ?>   
  <!-- Datatable with tools menu -->
   <div class="panel panel-default">
      <div class="panel-heading">
        <h6 class="panel-title"><i class="icon-user"></i>Order details</h6>                 
      </div>
            <div class="datatable-media">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th >#</th>
                    <th>Name</th>
                    <th>Email_id</th>
                    <th>Order id</th>                
                    <th>Mobile no</th>
                    <?php if($this->uri->segment(4) == 4) : ?>
                       <th>Message</th>
                    <?php endif; ?>

                    <?php if($this->uri->segment(4) == 0) : ?>
                       <th>Payment Message</th>
                    <?php endif; ?>

                    <th>Order date</th>
                    <?php if($this->uri->segment(4) != 4 && $this->uri->segment(4) !=0) : ?>                     
                       <th>Change status</th>                        
                    <?php endif; ?>
                    <th>Actions</th>
                  </tr>                    
                </thead>
                <tbody>
                <?php 
                if(isset($oprder_process) && is_array($oprder_process) && count($oprder_process)): $i=1;?>
                  <?php foreach ($oprder_process as $key => $user) { ?>
                      <tr>
                        <td> <?php echo $i++; ?></td>
                        <td>  <?php echo $user-> name; ?></span> </td>
                        <td id="ps<?php echo $user -> id ?>"> <a href="<?php echo site_url().admin?>order_details/order_list/<?php echo $user -> id ?> " ><?php echo $user -> email ?></a> </td> 
                        <td>  <?php echo $user -> order_number; ?> </td>                      
                        <td>  <?php echo $user -> shipping_phone ?> </td>
                        <?php if($this->uri->segment(4) == 4):?>
                          <td>
                              <div align="center">                                
                                   <a class="tip" title="<?php echo $user->cancel_msg?>"><i class="icon-envelop"></i></a>
                              </div> 
                          </td>
                        <?php endif; ?>  
                        <?php if($this->uri->segment(4) == 0):?>
                          <td>
                              <div align="center">
                                   <a class="tip" title="<?php echo $user->payment_errors?>"><i class="icon-mail-send"></i></a>
                              </div> 
                          </td>
                        <?php endif; ?>                      
                        <td> <?php echo date('d-m-Y h:i A',strtotime($user->order_date)) ?></td>
                        <?php if($this->uri->segment(4) != 4 && $this->uri->segment(4) != 5 && $this->uri->segment(4) != 0) : ?>
                          <td>  
                            <input type="hidden" data_id="<?php echo $user->id ;?>" class="ord" value="<?php echo $user->id ;?>"/>                    
                            <?php if($user -> status == 1) :  ?>
                              <div align="center">
                                <a data-show="order_packed" data-id="<?php echo $user->id ?>" data="<?php echo 'subcat_'.$user->id ?>" class="models_forms"><span data-icon="&#xe0a2;"></span></a>
                              </div>
                            <?php elseif($user -> status == 2) : ?>
                              <div class="col-sm-6">
                                <select data-placeholder="Change status" dat_id="chane_status" name="chane_status" class="select ch_status">
                                    <option value="" ></option>
                                    <option value="">Select Status</option>
                                    <option data1="3" value="3">Delivered</option>
                                    <option data1="4" value="4">Cancel</option>
                                </select>
                              </div>
                            <?php elseif($user -> status == 3 && $this->uri->segment(4) == 3) : ?>
                              <div class="col-sm-6">
                                <select data-placeholder="Change status" dat_id="chane_status" name="chane_status" class="select ch_status">
                                  <option value=""></option>
                                  <option value="">Select Status</option>
                                  <option data1="4" value="4">Cancel</option>
                                </select>
                              </div>
                            <?php elseif($user -> status == 3 && $this->uri->segment(4) == 4): ?>
                              <div class="col-sm-6">
                                <?php echo $user -> courier; ?>
                              </div>
                             <?php elseif($user->status ==0): echo ''; ?> 
                             <?php endif; ?>                                                  
                          </td>
                         <?php endif; ?>
                        <td>
                        <script>var subcat_<?php echo $user->id ?> = <?php echo json_encode($user);?></script>
                          <div class="icon-group">
                               <a title="view" data-id="<?php echo $user->id ?>" data="<?php echo 'subcat_'.$user->id ?>" role="button" class="tip btn btn-link btn-icon models_form"><i class="icon-eye"></i></a>
                         
                           <?php  if ($user -> status==4 || $user -> status=='0'):?>
                                <a title="Delete" class="btn btn-link btn-icon tip delete" data="<?php echo $user->id?>"><i class="icon-close"></i></a>                         
                           <?php endif; ?> 
                           <?php if($user -> status == 2 || $user -> status == 3) : ?>
                              <a title="Invoice"  data-id="<?php echo $user->id ?>" data="<?php echo 'subcat_'.$user->id ?>" class="btn tip invoice_model btn-default btn-link btn-icon"><i class="icon-file6"></i></a>                              
                           <?php endif; ?>   
                          </div>
                        </td>
                      </tr> 
                  <?php } ?>
                <?php endif; ?>
                </tbody>
              </table>
            </div>     
    <div id="view_modal" class="modal fade" tabindex="-1" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title"><i class="icon-paragraph-justify2"></i> View user order information</h4>
          </div>          <!-- Form inside modal -->
          <div class="modal-body with-padding">              
            <div class="panel-body">
              <div class="table-responsive userinfos">
                <table class="table  table-striped">
                  <tbody>
                    <tr>
                        <th style="width:200px">Name</th>
                        <td id="name"></td>
                    </tr>
                    <tr>
                        <th style="width:200px">Email</th> 
                        <td id="email"></td>
                    </tr>
                    <tr>
                        <th style="width:200px">Order id</th> 
                        <td id="invoice"></td>
                    </tr>                    
                    <tr>
                        <th style="width:200px">Phone</th> 
                        <td id="phone"></td>
                    </tr>                    
                    <tr>
                        <th style="width:200px">Shipping address</th> 
                        <td id="shipping_address"></td>
                    </tr>
                    <tr>
                        <th style="width:200px">City</th> 
                        <td id="shipping_city"></td>
                    </tr>
                    <tr>
                        <th style="width:200px">Postcode</th> 
                        <td id="shipping_zipcode"></td>
                    </tr>                  
                    <tr>
                        <th style="width:200px">Total no products</th> 
                        <td id="total_no_products"></td>
                    </tr>
                    <tr>
                        <th style="width:200px">Payment type</th> 
                        <td id="payment_type"></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <h3> Ordered Product list</h3>
              <div id="product_tbl"></div>               
              <div class="clearfix"></div> <br/>         
            </div>
          </div>                  
        </div>
      </div>
    </div>
    <div id="message" class="modal fade" tabindex="-1" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title"><i class="icon-paragraph-justify2"></i> Message </h4>
          </div>          <!-- Form inside modal -->
          <div class="modal-body with-padding">              
            <div class="panel-body">
              <div class="table-responsive userinfos">
                <table class="table  table-striped">
                  <tbody>
                    <tr>
                        <th style="width:200px">Name</th>
                        <td id="name"></td>
                    </tr> 
                  </tbody>
                </table>
              </div>
              <div class="clearfix"></div> <br/>         
            </div>
          </div>                  
        </div>
      </div>
    </div>
    <div id="view_modals" class="modal fade" tabindex="-1" role="dialog">
      <div class="modal-dialog">
        <!-- Set delivery date -->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title"><i class="icon-paragraph-justify2"></i> <span>Change order status </span></h4>
          </div>
          <!-- Form inside modal -->
          <?php echo form_open_multipart(site_url().admin.'order_details/order_packed', 'id="cat_form" class=".validate"');?>
            <div class="modal-body with-padding">
                <div class="form-group">
                  <div class="row">
                    <label class="col-sm-10 control-label">Change the Order status</label>
                    <div class="col-sm-12">
                      <select name="status" data-placeholder="Select distributor" class="select-full required" tabindex="2">               
                          <option value="2">Shipping</option>                          
                          <option value="3">Delivered</option>
                          <option value="4">Cancel</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <label class="col-sm-10 control-label">Shipping Track order id</label>
                      <div class="col-sm-12">
                          <input class="form-control required" type="text" name="shipment_track">
                      </div>
                    </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <label class="col-sm-10 control-label">Courier distributor</label>
                    <div class="col-sm-12">
                      <select name="courier" data-placeholder="Select distributor" class="select-full required" tabindex="2">
                        <option value="">Select distributor</option>
                        <option value="India Post">India Post</option>
                        <option value="Delhivery">Delhivery</option>
                        <option value="Fedex">Fedex</option>                   
                      </select>
                    </div>
                  </div>
                </div> 
                <div class="form-group">
                  <div class="row">
                    <label class="col-sm-10 control-label">Delivery Date</label>
                      <div class="col-sm-12">
                          <input class="form-control required" canellDate type="text" name="delivery_date">
                      </div>
                    </div>
                </div>              
                                                                              
            </div>            
          <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
              <input type="hidden" name="curl" value="<?=current_url()?>">
              <input type="hidden" id="orders_id" name="orders_id">
              <button type="submit" class="btn btn-primary" id="add_city">Submit</button>
          </div>
          </form>
        </div>
      <!-- Set delivery date -->
      </div>
    </div>
    <!-- Invoice model -->
    <div id="invoice_model" class="modal fade" tabindex="-1" role="dialog">
     <div id="invoice_order"></div>
    </div>
    <!-- / Invoice model -->
    <!-- Invoice model -->
      <div id="manif_model" class="modal fade" tabindex="-1" role="dialog">
       <div id="manif_order"></div>
      </div>
    <!-- / Invoice model -->
    <!-- Cancell order image -->
    <div id="cancell_model" class="modal fade" tabindex="-1" role="dialog">
      <div class="modal-dialog">
        <!-- Set delivery date -->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title"><i class="icon-paragraph-justify2"></i> <span>Approval order status</span></h4>
          </div>
          <!-- Form inside modal -->
          <?php echo form_open_multipart(site_url().admin.'order_details/cancel_approvel', 'id="cat_form" class=".validate"');?>
            <div class="modal-body with-padding">
              <div class="form-group">
                <div class="row">
                  <label class="col-sm-8 control-label">Order product cancel confirmation</label>
                    <div class="col-sm-8">
                       <label class="radio-inline radio-success">
                       <input type="radio" name="cancel_status" value="1" checked="checked" class="styled">Accept</label>
                      <label class="radio-inline radio-success"><input type="radio" value="2" name="cancel_status" class="styled">Reject</label>
                    </div>
                </div>
              </div>                                       
            </div>            
          <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
              <input type="hidden" name="curl" value="<?=current_url()?>">
              <input type="hidden" id="o_ids" name="orders_id">
              <button type="submit" class="btn btn-primary" id="add_city">Submit</button>
          </div>
          </form>
        </div>
      <!-- Set delivery date -->
      </div>
    </div>
    <!-- End cancell order image -->



</div>              

<?php endif;?>
 <script>
  $(document).ready(function(){   
     $('form').validate({       
     });    
    $(document).on('click','.models_form',function(){
      $('#view_modal').modal({
        keyboard: false,
        show:true,
        backdrop:'static'
      });
      $.ajax({url:"<?php echo site_url().admin?>order_details/report_table/"+$(this).attr('data-id'), 
          success:function(data)
          {
            $('#product_tbl').html(data);
          }
      });            
      var edata = eval($(this).attr('data'));      
      $('#orders_id').val(edata.id);      
      $('#name').html(edata.name);      
      $('#email').html(edata.email);      
      $('#invoice').html(edata.order_number);      
      $('#grand_total').html(edata.grand_total);      
      $('#payment_type').html(edata.payment_type);      
      $('#discount_amount').html(edata.discount_amount);      
      $('#shipping_address').html(edata.shipping_address);
      $('#shipping_city').html(edata.shipping_city);
      $('#shipping_zipcode').html(edata.shipping_postcode);
      $('#billing_address').html(edata.billing_address);
      $('#phone').html(edata.shipping_phone);        
      $('#payment_type').html(edata.payment_type);      
      $('#track').html(edata.track_id);
      $('#delivery_date').show();
      $('#total_no_products').html(edata.total_no_products);
      $.uniform.update();
    });
    $(document).on('click','.invoice_model',function(){
      $('#invoice_model').modal({
        keyboard: false,
        show:true,
        backdrop:'static'
      });
      $.ajax({url:"<?php echo site_url().admin?>order_details/invoice_model/"+$(this).attr('data-id'), 
          success:function(data)
          {
            $('#invoice_order').html(data);
          }
      });
      $.uniform.update();
    });
    $(document).on('click','.cancell_order',function(){
      $('#cancell_model').modal({
        keyboard: false,
        show:true,
        backdrop:'static'
      });
       var o_ids = $(this).attr('data-id');
       $('#o_ids').val(o_ids);     
      $.uniform.update();
    });
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
      })
    $(document).on('click','.models_forms',function(){
      $('#view_modals').modal({
        keyboard: false,
        show:true,
        backdrop:'static'
      });                  
      var edata = eval($(this).attr('data'));
      if(edata.status==1){
          $('#courier_delivery').show();          
        }
      $('#orders_id').val(edata.id);
      $.uniform.update();
    });
    $(document).on('click','.delete',function(){
      if(confirm('Are you sure to delete')){
        $.ajax({url:"<?php echo site_url().admin?>order_details/order_delete/"+$(this).attr('data'), 
          success:function(data){window.location.reload(true);
          }});
      }
    });
    $(document).on('click','.status_checks',function(){
      var status = ($(this).hasClass("btn-success")) ? '0' : '1';
      var msg = (status=='1')? 'Delivered' : 'Not Delivered';
      if(confirm(""+ msg+"")){
        var current_element = $(this);
        url = "<?php echo site_url().admin;?>/report/delivery_update";
        $.ajax({
          type:"POST",
          url: url,
          data: {abs_id:$(current_element).attr('data'),status:status},
          success:function(data){window.location.reload(true);
        }});
      }      
    });

  });
  $(document).on('change','.ch_status',function(){
      if($(this).val()!="" && confirm("Are you sure to do this action?")){
       var current_element = $(this);
       var orderid = $('.ord').val();      
       var status = $(this).children(":selected").attr("data1");   
       url = "<?php echo site_url().admin?>order_details/update_order_status/"+orderid; 
        $.ajax({
          type:"POST",
          url: url,
          data: {ct_id:status},
          success: function(data)
          {       
           location.reload();      
          }
        });
      } 
      else{
        $('.ch_status').select2("val","");
      }     
  });
  $(document).on('click','.manifast_all',function(){               
    if($(".o_id").is(':checked'))
    {
      var manifast_orders=check_box_values('o_id'); 
      var url = "<?php echo site_url().admin?>order_details/manifast_all/";           
        $.ajax({
        type:"POST",
        url: url,
        data: {manifast_orders:manifast_orders},
        success:function(data){
          $('#manif_order').html(data);
        }}); 

        $('#manif_model').modal({
        keyboard: false,
        show:true,
        backdrop:'static'
      });     
      
    }
    else
    {
       alert('Please Select minimum 1 orders');
    }
  });
  $('#order_report').addClass('active');
  $('#order_report a').attr('id','second-level');
    $('#order_report li a').each(function() {
       if($(this).attr('href') == '<?php echo current_url();?>' )
        $(this).closest('li').addClass('active');
    });

    /*$(document).on("click",'#btnPrint', function () {
        var divContents = $("#dvContainer").html();
        var printWindow = window.open('', '', 'height=400,width=800');
        printWindow.document.write('<html><head><title>Invoice</title>');
        printWindow.document.write('</head><body >');
        printWindow.document.write(divContents);
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.print();
    });*/
  function check_box_values(check_box_class){
    var values = new Array();
          $("."+check_box_class+":checked").each(function() {
             values.push($(this).val());
          });
    return values;
  }
  function invoicePrint(){
    $("#dvContainer").print({
        //Use Global styles
        globalStyles : true,
        //Add link with attrbute media=print
        mediaPrint : true,
        //Custom stylesheet
        stylesheet : "http://fonts.googleapis.com/css?family=Open+Sans",
        //Print in a hidden iframe
        iframe : true,
        //Don't print this
        noPrintSelector : ".avoid-this",
        //Add this on top
        append : "Hello World!!!<br/>",
        //Add this at bottom
        prepend : "<br/>Buh Bye!"
    });
  }

</script>