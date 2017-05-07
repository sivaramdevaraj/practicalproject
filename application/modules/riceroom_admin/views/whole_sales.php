<?php if(isset($mode) && $mode == 'all'): ?>
  <!-- Page header -->
    <div class="page-header">
      <div class="page-title">
        <h3>Wholesale Products</h3>
      </div>
    </div>
  <!-- /page header -->  
  <!-- Breadcrumbs line -->
    <div class="breadcrumb-line">
      <ul class="breadcrumb">
        <li><a href="<?php echo site_url().admin?>">Home</a></li>
        <li><a href="<?php echo site_url().admin?>whole_sales/">Wholesale Products</a></li>
        <li>Products</li>       
      </ul>
    </div>
  <!-- /breadcrumbs line -->
  <!-- Sueccss message  -->
  <?php if($this->session->flashdata('message')){?>
      <div class="alert alert-success fade in block-inner">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <i class="icon-checkmark-circle"></i> <?php echo $this->session->flashdata('message')?> 
      </div>
  <?php } ?>
  <!--end Sueccss message  -->
     
  <!-- Datatable with tools menu -->
      <div class="panel panel-default">
        <div class="panel-heading">
          <h6 class="panel-title"><i class="icon-table"></i> All Product Details</h6>          
          <div class="panel-icons-group"> 
            <a href="<?php echo site_url().admin?>whole_sales/add/" class="btn btn-link btn-icon tip" title="Add Product Details"><i class="icon-plus"></i></a> 
            </div>
          
        </div>
        <div class="datatable-media">
          <div class="table-responsive">        
            <table class="table table-bordered table-striped" style="border-top: 1px solid #ddd;">
              <thead>
                <tr>
                  <th >#</th>                
                  <th>Image</th> 
                  <th>Category</th> 
                  <th>Sub category</th> 
                  <th>Type</th> 
                  <th>sku id</th>         
                  <th>Qty</th>              
                  <th>Status</th>
                  <th class="team-link">Actions</th>
                </tr>                    
              </thead>
              <tbody>
              <?php if(isset($products) && is_array($products) && count($products)): $i=1;?>
                <?php foreach ($products as $key => $product) { ?>
                   <tr>
                    <td> <?php echo $i++; ?> </td> 
                    <?php $src=base_url('uploads/products').'/'.$product->image; ?>                 
                    <td> <a href="<?php echo $src;?>" class="lightbox" title="Product image">
                            <img src="<?php echo $src;?>" alt="" class="img-media"/>
                         </a>    
                    </td>
                    <td> <?php echo $product -> cat_name?> </td>
                    <td> <?php echo $product -> sub_cat_name?> </td>
                    <td> <?php echo $product -> product_type?></td>
                    <td> <?php echo $product -> sku_id?></td>
                    <td> <?php echo $product -> qty?> </td>                    
                    <td><i data="<?php echo $product->id;?>" class="status_checks btn icon-<?php echo ($product -> status!=0)? 'checkmark btn-success' : 'close btn-danger'?>"></i>  </td>                  
                    <td>
                        <div class="icons-group"> 
                         <script>var subcat_<?php echo $product->id ?> = <?php echo json_encode($product);?></script>                   
                         <a href="<?php echo site_url().admin.'whole_sales/view'.'/'.$product->id ?>" title="View" class="tip btn  btn-link btn"><i class="icon-eye"></i></a>
                         <a href="<?php echo site_url().admin.'whole_sales/edit'.'/'.$product->id ?>" title="Edit" class="tip btn btn-link btn"><i class="icon-pencil"></i></a>
                         <a title="Delete" class="tip delete" data="<?php echo $product->id?>"><i class="icon-close"></i></a>                       
                        </div>
                    </td>                   
                  </tr>
                <?php } ?>              
               <?php else: ?>
                  <tr><td colspan="9"><div align="center"><---- No product ----></div></td></tr>
               <?php endif; ?>
              </tbody>
            </table> 
            <?php echo (isset($links)) ? $links:''; ?>         
          </div>
        </div>        
      </div>
  <!-- /datatable with tools menu -->
<?php elseif(isset($mode) && $mode == 'add'): ?> 
  <!-- Page header -->
    <div class="page-header">
      <div class="page-title">
        <h3>Add New Product</h3>
      </div>
    </div>
  <!-- /page header -->
  <!-- Breadcrumbs line -->
    <div class="breadcrumb-line">
      <ul class="breadcrumb">
        <li><a href="<?php echo site_url().admin?>">Home</a></li>
        <li><a href="<?php echo site_url().admin?>whole_sales">Wholesale</a></li>
        <li><a href="<?php echo site_url().admin?>products">Products</a></li> 
        <li class="active">Add new product</li>
      </ul>
    </div>
  <!-- /breadcrumbs line -->
  <!-- Add form -->
    <div class="row">
      <div class="col-md-12">
        <!-- Form bordered -->
        <?php echo form_open_multipart(admin."whole_sales/add_edit_product",'class="form-horizontal form-bordered .validate"');?>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h6 class="panel-title"><i class="icon-menu"></i>Add Products</h6>
          </div>
          <div class="panel-body">       
            <div class="form-group">
              <label class="col-sm-2 control-label">Category <span class="error">*</span></label>
              <div class="col-sm-3">
                <?php  $category [''] = 'Select Categories';
                        $options =' id="cat_id"  class="select-full required" tabindex="2"';
                        echo form_dropdown('cat_id',$category,'',$options);
                ?>
              </div>
              <label class="col-sm-2 control-label">Sub category <span class="error">*</span></label>
              <div class="col-sm-3">
                <select id="sub_cat_id" name="sub_cat_id" class="select-full required">
                  <option value="">Sub Categories</option>
                </select>
              </div>
            </div>         
            <div class="form-group">
              <label class="col-sm-2 control-label">Product type <span class="error">*</span></label>
              <div class="col-sm-3">
                 <select class="select-full required" name="product_type">
                   <option value="">Product type</option>
                   <option value="Sliver">Sliver</option>
                   <option value="Gold">Gold</option>
                   <option value="Premium">Premium</option>
                 </select>
              </div>
              <label class="col-sm-2 control-label">City <span class="error">*</span></label>
              <div class="col-sm-3">
                 <?php  $cities [''] = 'Select City';
                        $options =' id="city_id"  class="select-full required" tabindex="2"';
                        echo form_dropdown('city_id',$cities,'',$options);
                 ?>
              </div>
            </div>
           <!--  <div class="form-group">
              <label class="col-sm-2 control-label">Product name <span class="error">*</span></label>
              <div class="col-sm-10">
                <input type="text" name="name" class="form-control required ">
              </div>
            </div> -->
            <div class="form-group">
              <label class="col-sm-2 control-label">Weight<span class="error">*</span></label>
              <div class="col-sm-3">
                <select class="select-full required" name="weight">
                   <option selected="selected" value="25">25 kg</option>
                 </select>
                <span class="help-block">Weight 25kg</span>                
              </div>
              <!-- <label class="col-sm-2 control-label">Bag Price (Rs)<span class="error">*</span></label>
              <div class="col-sm-2">
                <input type="text" name="price" min="10"  class="form-control required number">
                <span class="help-block">Bag price</span>              
              </div> -->
              <label class="col-sm-2 control-label">Bag Qty<span class="error">*</span></label>
              <div class="col-sm-3">
                <input type="text" name="qty" id="qty" class="form-control required"> 
                <span class="help-block">Availbe  bag stack in product</span>                 
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">10 bag To 20 bag Price<span class="error">*</span></label>
              <div class="col-sm-4">
                <input type="text" name="ws_first_rang_price" min="1"  class="form-control number required">
                <span class="help-block"></span>                
              </div>
              <label class="col-sm-2 control-label">20 bag To 30 bag Price<span class="error">*</span></label>
              <div class="col-sm-4">
                <input type="text" name="ws_second_rang_price" min="1"  class="form-control required number required">
                 <span class="help-block"></span>                
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">30 bag To 40 bag Price<span class="error">*</span></label>
              <div class="col-sm-4">
                <input type="text" name="ws_third_rang_price" min="1"  class="form-control number required">
                <span class="help-block"></span>                
              </div>
              <label class="col-sm-2 control-label">40+ bag Price <span class="error">*</span></label>
              <div class="col-sm-4">
                <input type="text" name="ws_more_rang_price" min="1"  class="form-control required number required">
                 <span class="help-block"></span>                
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Sku id <span class="error">*</span></label>
              <div class="col-sm-10">
                <input type="text" name="sku_id" class="form-control required">
                <span class="help-block">Unique number of the product</span>              
              </div>
            </div>     
            <div class="form-group">
              <label class="col-sm-2 control-label">Product Image <span class="error">*</span></label>
              <div class="col-sm-10">
                <input type="file" class="styled form-control required" id="report-screenshot" name="image">
                <span class="help-block">Accepted formats: jpg, png, gif. Max file size 512kb</span>
              </div>
            </div>          
            <input type="hidden" name="curl" value="<?php echo site_url().admin.'whole_sales'?>">       
            <div class="form-actions text-right">
            <a class="btn btn-warning" href="<?php echo site_url().admin.'whole_sales'?>">Cancel</a>
            <?php echo form_submit('submit', 'Add','class="btn btn-primary"');?>          
            </div>
          </div>
         </div>
        <?php echo form_close();?>
        <!-- /form striped -->
      </div>
    </div>
  <!-- /add form -->
<?php elseif(isset($mode) && $mode == 'edit'): ?>
 <!-- Page header -->
    <div class="page-header">
      <div class="page-title">
        <h3>Edit Product information</h3>
      </div>
    </div>
  <!-- /page header -->
  <!-- Breadcrumbs line -->
    <div class="breadcrumb-line">
      <ul class="breadcrumb">
        <li><a href="<?php echo site_url().admin?>">Home</a></li>
        <li><a href="<?php echo site_url().admin?>whole_sales">Shop Now</a></li>
        <li><a href="<?php echo site_url().admin?>products">Products</a></li> 
        <li class="active">Edit product information</li>
      </ul>
    </div>
  <!-- /breadcrumbs line -->
  <!-- Add form -->
    <div class="row">
      <div class="col-md-12">
        <!-- Form bordered -->
        <?php echo form_open_multipart(admin."whole_sales/add_edit_product",'class="form-horizontal form-bordered .validate"');?>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h6 class="panel-title"><i class="icon-menu"></i>Edit information</h6>
             <div class="panel-icons-group">
                <a href="<?php echo site_url().admin.'whole_sales/index/'?>">
                    <button class="btn btn-warning btn-sm" type="button"><i class="icon-point-left"></i> Back</button>
                </a> 
            </div>
          </div>
          <div class="panel-body">
            <div class="form-group">
              
              <label class="col-sm-2 control-label">Product type </label>
              <div class="col-sm-10">
                 <select disabled class="select-full required" name="product_type">
                   <option value="">Product type</option>
                   <option <?php if($products->product_type=='Sliver'): echo 'selected'; endif;  ?> value="Sliver">Sliver</option>
                   <option <?php if($products->product_type=='Gold'): echo 'selected'; endif;  ?> value="Gold">Gold</option>
                   <option <?php if($products->product_type=='Premium'): echo 'selected'; endif;  ?> value="Premium">Premium</option>
                 </select>
              </div>
            </div>
             <div class="form-group">
              <label class="col-sm-2 control-label">Sku id </label>
              <div class="col-sm-2">
                <input type="text" readonly="readonly" value="<?php echo $products->sku_id;?>" name="sku_id" class="form-control">        
              </div>             
              <label class="col-sm-2 control-label">Weight</label>
              <div class="col-sm-2">
                <select disabled class="select-full required" name="weight">
                   <option value="">Select weight</option>
                   <option <?php if($products->weight=='10'): echo 'selected'; endif;  ?> value="10">10 kg</option>
                   <option <?php if($products->weight=='25'): echo 'selected'; endif;  ?> value="25">25 kg</option>
                 </select>
              </div>
              <label class="col-sm-2 control-label">Qty<span class="error">*</span></label>
              <div class="col-sm-2">
                <input type="text" name="qty" value="<?php echo $products->qty;?>" id="qty" class="form-control required"> 
                <span class="help-block">Availbe stack in product</span>                 
              </div>
            </div>            
            <div class="form-group">
              <label class="col-sm-2 control-label">10 bag To 20 bag Price<span class="error">*</span></label>
              <div class="col-sm-4">
                <input type="text" name="ws_first_rang_price" min="1" value="<?php echo $products->ws_first_rang_price ?>"  class="form-control number required">
                <span class="help-block"></span>                
              </div>
              <label class="col-sm-2 control-label">20 bag To 30 bag Price<span class="error">*</span></label>
              <div class="col-sm-4">
                <input type="text" name="ws_second_rang_price" min="1" value="<?php echo $products->ws_second_rang_price ?>"  class="form-control required number required">
                 <span class="help-block"></span>                
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">30 bag To 40 bag Price<span class="error">*</span></label>
              <div class="col-sm-4">
                <input type="text" name="ws_third_rang_price" min="1" value="<?php echo $products->ws_third_rang_price ?>"  class="form-control number required">
                <span class="help-block"></span>                
              </div>
              <label class="col-sm-2 control-label">40+ bag Price <span class="error">*</span></label>
              <div class="col-sm-4">
                <input type="text" name="ws_more_rang_price" min="1" value="<?php echo $products->ws_more_rang_price ?>"  class="form-control required number required">
                 <span class="help-block"></span>                
              </div>
            </div>           
            <div class="form-group">
              <label class="col-sm-2 control-label">Image <span class="error">*</span></label>
              <div class="col-sm-4">
                <input type="file" class="styled form-control" id="report-screenshot" name="image">
                <span class="help-block">Accepted formats: jpg, png, gif. Max file size 512kb</span>
                <input type="hidden" value="<?= $products->image;?>" id="report-screenshot" name="old_image">
                <?php  $src=base_url('uploads/products/thumb').'/'.$products->image; ?>         
                <?php  $src1=base_url('uploads/products').'/'.$products->image; ?>         
                  <a href="<?php echo $src1;?>" class="lightbox" title="Product image">
                    <img src="<?php echo $src;?>" width="100" height="100" />
                  </a>
              </div>              
            </div>            
            <input type="hidden" name="curl" value="<?php echo site_url().admin.'whole_sales/index/'?>">       
            <input type="hidden" name="id" value="<?=$products->id;?>">       
            <input type="hidden" name="cat_id" value="<?=$products->cat_id;?>">       
            <input type="hidden" name="sub_cat_id" value="<?=$products->sub_cat_id;?>">       
            <input type="hidden" name="city_id" value="<?=$products->city_id;?>">       
            <input type="hidden" name="product_type" value="<?=$products->product_type;?>">       
            <input type="hidden" name="weight" value="<?=$products->weight;?>">       
            <input type="hidden" name="id" value="<?=$products->id;?>">       
            <div class="form-actions text-right">
            <a class="btn btn-warning" href="<?php echo site_url().admin.'whole_sales/index/'?>">Cancel</a>
            <?php echo form_submit('submit', 'update','class="btn btn-primary"');?>          
            </div>
          </div>
         </div>
        <?php echo form_close();?>
        <!-- /form striped -->
      </div>
    </div>
  <!-- /add form -->
<?php elseif(isset($mode) && $mode == 'view'): ?>
  <style>
    .ui-datepicker .ui-datepicker-calendar .ui-state-highlight a {
      background: #743620 none;
      color: white;
    }
    .ui-datepicker-today, .ui-datepicker .ui-datepicker-current-day .ui-state-active{background: none;color:red;}
  </style>
  <!-- Page header -->
  <div class="page-header">
    <div class="page-title"><h3>View Product Details</h3></div>
  </div>
  <!-- /page header -->
  <!-- Breadcrumbs line -->
    <div class="breadcrumb-line">
      <ul class="breadcrumb">
        <li><a href="<?php echo site_url().admin?>">Home</a></li>
        <li><a href="<?php echo site_url().admin?>whole_sales">Wholesale</a></li>
        <li><a href="<?php echo site_url().admin?>products">Products</a></li> 
        <li class="active">View</li>
      </ul>
    </div>
  <!-- /breadcrumbs line -->
  <div class="panel panel-default">
    <div class="panel-heading">
      <h6 class="panel-title"><i class="icon-menu"></i> View Products Details </h6>
       <div class="panel-icons-group">
                <a href="<?php echo site_url().admin.'whole_sales/index/'?>">
                    <button class="btn btn-warning btn-sm" type="button"><i class="icon-point-left"></i> Back</button>
                </a> 
       </div>
    </div>
    <div class="panel-body">
      <table class="table table-striped">
        <tbody>
            <tr>
              <tr><th>Product type</th>                    <td><?php echo $product ->product_type;?> </td></tr>
              <tr><th>Weight</th>                          <td><?php echo $product ->weight;?> kg</td></tr>
              <tr><th>10 bag To 20 bag Price</th>          <td><?php echo $product->ws_first_rang_price;?> </td></tr>
              <tr><th>20 bag To 30 bag Price</th>          <td><?php echo $product->ws_second_rang_price;?> </td></tr>
              <tr><th>30 bag To 40 bag Price</th>          <td><?php echo $product->ws_third_rang_price;?> </td></tr>
              <tr><th>40+ bag Price</th>                    <td><?php echo $product->ws_more_rang_price;?> </td></tr>
              <tr><th>Quantity</th>                         <td><?php echo $product->qty;?> </td></tr>              
              <tr><th>SKU id</th>                           <td><?php echo $product->sku_id;?> </td></tr>
              <tr><th>Product image</th>
                   <?php $src=base_url('uploads/products').'/'.$product->image; ?>  
                  <td><a href="<?= $src; ?>" class="lightbox"><img src="<?= $src; ?>" height="100px"/></a> </td>
              </tr>
             </tr>           
            </tr>
        </tbody>
      </table>
    </div>
  </div>
<?php endif; ?>
<!-- /form modal -->
<style type="text/css">
  .error{color:red;}
</style>
<script type="text/javascript">
  $(document).ready(function(){    
    $('#result').hide();
      $('#ws_products').addClass('active');// to activate menu link
      $('#ws_products>a').attr('id','second-level');// to open and show second level
      $('#ws_products li a').each(function() {
        if($(this).attr('href') == '<?php echo current_url();?>')
        $(this).closest('li').addClass('active');// to activate third level menu
      });  
    $('form').validate();  
    $(document).on('click','.delete',function(){
      if(confirm('Are you sure to delete')){
        $.ajax({url:"<?php echo site_url().admin?>products/delete/"+$(this).attr('data'), 
          success:function(data){window.location.reload(true);}});
      }
    });
    $(document).on('click','.status_checks',function(){
      var status = ($(this).hasClass("btn-success")) ? '0' : '1';
      var msg = (status=='0')? 'Deactivate' : 'Activate';
      if(confirm("Are you sure to "+ msg)){
        var current_element = $(this);
        if($(this).hasClass("btn-success")) var status = 0;
        else var status = 1;
        url = "<?php echo site_url().admin?>/products/active_status";
        $.ajax({
          type:"POST",
          url: url,
          data: {abs_id:$(current_element).attr('data'),status:status},
          success: function(data)
          {   
            if(status) $(current_element).addClass('btn-success icon-checkmark').removeClass('btn-danger icon-close');
            else $(current_element).removeClass('btn-success icon-checkmark').addClass('btn-danger icon-close');
          }
        });
      }      
    });
    $(document).on('change','#cat_id',function(){
      var value = $(this).val();     
      var url = "<?php echo site_url().admin?>/categories/sub_category_ajax/"+value;
      $.ajax({
         url: url,
         success: function(data)
         {
             if(data) $('#sub_cat_id').html(data); 
         }
       });
      $('#sub_cat_id').select2("val","");
    });    
  });  

</script>