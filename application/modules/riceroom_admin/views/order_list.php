<!-- Page header -->
<div class="page-header">
  <div class="page-title">
    <h3><?php echo $order_list ->  order_number ?> Order product details.</h3>
  </div>
</div>
<!-- Breadcrumbs line -->
<div class="breadcrumb-line">
  <ul class="breadcrumb">
    <li><a href="<?php echo site_url().admin?>">Home</a></li>
    <li><a href="<?php echo site_url().admin?>order_details/index/<?php echo $order_list -> status; ?>">Orders</a></li>     
    <li class="active"><a href="#"><?php echo $order_list ->  order_number ?></a></li>  
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
              <h6 class="panel-title"><i class="icon-user"></i>Order user list</h6>
              <div class="panel-icons-group">
                <a href="<?php echo site_url().admin?>order_details/index/<?php echo $order_list -> status; ?>">
                    <button class="btn btn-warning btn-sm" type="button"><i class="icon-point-left"></i> Back</button>
                </a> 
               </div>
            </div>
          <div class="datatable-media">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th >#</th>
                    <th>Product name</th>
                    <th>Order id</th>
                    <th>Quantity</th>
                    <th>Order_date</th>
                    <th>Delivery date</th> 
                    <th class="team-links">Actions</th>
                  </tr>                    
                </thead>
                <tbody>
                <?php if(isset($user_list) && is_array($user_list) && count($user_list)): $i=1;?>
                  <?php foreach ($user_list as $key => $user) { ?>
                    <tr>
                      <td> <?php echo $i++; ?> </td>
                      <td> <?php echo $user ->  product_name ?></a> </td> 
                      <td> <?php echo $order_list ->  order_number ?> </td>
                      <td> <?php echo $user ->  qty ?> </td>
                      <td> <?php echo date('d-m-Y h:i A',strtotime($order_list->order_date)) ?> </td>
                      <td> <?php if($order_list ->delivery_date!="0000-00-00 00:00:00") : 
                                    echo date('d-M-Y',strtotime($order_list ->delivery_date)); 
                                 else :
                                    echo "-------";
                                 endif;
                           ?> </td>
                      <td>
                      <script>var subcat_<?php echo $user->id ?> = <?php echo json_encode($user);?></script>
                        <div class="icons-group"> 
                          <a data="<?php echo 'subcat_'.$user->id ?>" role="button" class="btn btn-link btn-icon models_form tip" title="view"><i class="icon-eye"></i></a>
                          <!-- <a data="<?php echo 'subcat_'.$user->id ?>" role="button" class="btn btn-link btn-icon model_form tip" title="Edit"><i class="icon-pencil"></i></a>
                          <a title="Delete <?php echo $user -> last_name?>" class="tip delete" data="<?php echo $user->id?>"><i class="icon-close"></i></a> -->
                        </div>
                      </td>
                    </tr>
                  <?php } ?>
                <?php endif; ?>
                </tbody>
              </table>
            </div>
     <div id="form_modal" class="modal fade" tabindex="-1" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title"><i class="icon-paragraph-justify2"></i> Add New location</h4>
          </div>
          <!-- Form inside modal -->
          <?php echo form_open_multipart(site_url().admin.'locations/add_edit', 'id="cat_form" class=".validate"');?>
           <!-- Add popup  -->
             <!--  <div class="modal-body with-padding">                             
                <div class="form-group">
                  <div class="row">
                    <div class="col-sm-12">
                      <label>Zone name *</label>
                        <?php  $zones_list [''] = '';
                       $options =' id="z_id" data-placeholder="change your time zone" class="select-full required" tabindex="2"';
                      echo form_dropdown('z_id',$zones_list,$zone_id,$options);?>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-sm-12">
                      <label>Location *</label>
                      <input type="text" id="name" name="name" class="form-control required">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-sm-12">
                      <label>Zipcode *</label>
                      <input type="text" id="zipcode" name="zipcode" class="form-control required number" value="">
                    </div>
                  </div>
                </div> 
              </div> -->  
           <!-- end Add popup  -->  
            <div class="modal-footer">
              <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
              <!-- <input type="hidden" name="z_id" value="<?php echo $zone_id; ?>" id="z_id"> -->
              <input type="hidden" name="id" value="" id="id">
              <button type="submit" class="btn btn-primary">Submit</button>              
            </div>
          </form>
        </div>
      </div>
    </div>
    <div id="view_modal" class="modal fade" tabindex="-1" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title"><i class="icon-paragraph-justify2"></i> View order product information</h4>
          </div>          <!-- Form inside modal -->
          <div class="modal-body with-padding">              
            <div class="panel-body">
              <div class="table-responsive">
                <table class="table  table-striped">
                  <tbody>
                      <tr>
                          <th style="width:200px">Product name</th>
                          <td id="product_name"></td>
                      </tr>
                      <tr>
                          <th style="width:200px">Order id</th>
                          <td><?php echo $order_list ->  order_number ?> </td>
                      </tr>
                      <tr>
                          <th style="width:200px">Quantity</th> 
                          <td id="qty"></td>
                      </tr>
                      <tr>
                          <th style="width:200px">Price</th>
                          <td id="price"></td>
                      </tr>                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>                  
        </div>
      </div>
    </div>
</div>              
  </div>   

     

<?php endif;?>


 <script>
  $(document).ready(function(){   
     $('form').validate({       
     });
    // $(document).on('click','.model_form',function(){
    //   $('#form_modal').modal({
    //     keyboard: false,
    //     show:true,
    //     backdrop:'static'
    //   });
    //   $('label.error').hide();
    //   var data = eval($(this).attr('data'));      
    //   $('#name').val(data.name);
    //   $('#id').val(data.id);
    //   $('#z_id').val(data.z_id);
    //   $('#zipcode').val(data.zipcode);          
    //   $.uniform.update();
    // });

    $(document).on('click','.models_form',function(){
      $('#view_modal').modal({
        keyboard: false,
        show:true,
        backdrop:'static'
      });            
      var edata = eval($(this).attr('data'));
      $('#name').html(edata.name);      
      $('#last_name').html(edata.last_name);      
      $('#invoice').html(edata.invoice);      
      $('#grand_total').html(edata.grand_total);      
      $('#email').html(edata.email);      
      $('#discount_amount').html(edata.discount_amount);      
      $('#phone').html(edata.phone);      
      $('#payment_type').html(edata.payment_type);      
      $('#post_code').html(edata.post_code);
      $('#address').html(edata.address);
      $('#delivery_date').html(edata.delivery_date);
      $('#dispatch_date').html(edata.dispatch_date);
      $('#delivered_date').html(edata.delivered_date);
      $('#order_date').html(edata.order_date);
      $('#order_id').html(edata.order_id);
      $('#price').html(edata.price);
      $('#product_name').html(edata.product_name);
      $('#qty').html(edata.qty);
    });

    $(document).on('click','.delete',function(){
      if(confirm('Are you sure to delete')){
        $.ajax({url:"<?php echo site_url().admin?>locations/delete/"+$(this).attr('data'), 
          success:function(data){window.location.reload(true);}});
      }
    });

    $('#orders').addClass('active');
    $('#orders a').attr('id','second-level');
    $('#orders li a').each(function() {
       if($(this).attr('href') == '<?php echo current_url();?>' )
        $(this).closest('li').addClass('active');
    });

  });
</script>