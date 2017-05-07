<?php if(isset($mode) && $mode == 'all'): ?>
  <!-- Page header -->
    <div class="page-header">
      <div class="page-title">
        <h3>Shop now Products</h3>
      </div>
    </div>
  <!-- /page header -->  
  <!-- Breadcrumbs line -->
    <div class="breadcrumb-line">
      <ul class="breadcrumb">
        <li><a href="<?php echo site_url().admin?>">Home</a></li>
        <li><a href="<?php echo site_url().admin?>products">Shop now</a></li>
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
            <a href="<?php echo site_url().admin?>products/add/" class="btn btn-link btn-icon tip" title="Add Product Details"><i class="icon-plus"></i></a> 
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
                  <th>Gruop id</th> 
                  <th>sku id</th> 
                  <th>weight</th> 
                  <th>Price</th>              
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
                    <td> <?php echo $product -> group_id?></td>
                    <td> <?php echo $product -> sku_id?></td>
                    <td> <?php echo $product -> weight?> kg</td>
                    <td> <i class="fa fa-usd"></i> <?php echo $product -> price?> </td>
                    <td> <?php echo $product -> qty?> </td>                       
                    <td><i data="<?php echo $product->id;?>" class="status_checks btn icon-<?php echo ($product -> status!=0)? 'checkmark btn-success' : 'close btn-danger'?>"></i>  </td>                  
                    <td>
                        <div class="icons-group"> 
                         <script>var subcat_<?php echo $product->id ?> = <?php echo json_encode($product);?></script>                   
                         <a href="<?php echo site_url().admin.'products/view'.'/'.$product->id ?>" title="View" class="tip btn  btn-link btn"><i class="icon-eye"></i></a>
                         <a href="<?php echo site_url().admin.'gallery/index'.'/'.$product->id ?>" title="Gallery " class="tip btn  btn-link btn"><i class="icon-vcard"></i></a>
                         <a href="<?php echo site_url().admin.'products/edit'.'/'.$product->id ?>" title="Edit" class="tip btn btn-link btn"><i class="icon-pencil"></i></a>
                         <a title="Delete" class="tip delete" data="<?php echo $product->id?>"><i class="icon-close"></i></a>                       
                        </div>
                    </td>                   
                  </tr>
                <?php } ?>              
               <?php else: ?>
                  <tr><td colspan="12"><div align="center"><---- No product ----></div></td></tr>
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
        <li><a href="<?php echo site_url().admin?>products">Shop now</a></li>
        <li><a href="<?php echo site_url().admin?>products">Products</a></li> 
        <li class="active">Add new product</li>
      </ul>
    </div>
  <!-- /breadcrumbs line -->
  <!-- Add form -->
    <div class="row">
      <div class="col-md-12">
        <!-- Form bordered -->
        <?php echo form_open_multipart(admin."products/add_edit_product",'class="form-horizontal form-bordered .validate"');?>
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
                   <option value="">Select weight</option>
                   <option value="10">10 kg</option>
                   <option value="25">25 kg</option>
                 </select>
                <span class="help-block">Weight 25kg or 10kg</span>                
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
              <label class="col-sm-2 control-label">Market price <span class="error">*</span></label>
              <div class="col-sm-4">
                <input type="text" name="market_price" min="1"  class="form-control number">
                <span class="help-block"></span>                
              </div>
              <label class="col-sm-2 control-label">Our price <span class="error">*</span></label>
              <div class="col-sm-4">
                <input type="text" name="price" min="10"  class="form-control required number">
                 <span class="help-block"></span>                
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Sku id <span class="error">*</span></label>
              <div class="col-sm-4">
                <input type="text" name="sku_id" class="form-control">
                <span class="help-block">Unique number of the product</span>              
              </div>
              <label class="col-sm-2 control-label">Group id <span class="error">*</span></label>
              <div class="col-sm-4">
                <input type="text" name="group_id" class="form-control required">
                 <span class="help-block">Product Group id to the realted product</span>                
              </div>
            </div>     
            <div class="form-group">
              <label class="col-sm-2 control-label">Product Image <span class="error">*</span></label>
              <div class="col-sm-10">
                <input type="file" class="styled form-control required" id="report-screenshot" name="image">
                <span class="help-block">Accepted formats: jpg, png, gif. Max file size 512kb</span>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Description Image</label>
              <div class="col-sm-10">
                <input type="file" class="styled form-control required" id="report-screenshot" name="description_image">
                <span class="help-block">Accepted formats: jpg, png, gif. Max file size 512kb</span>
              </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">About Description Image</label>
                <div class="col-sm-10">
                    <textarea class="editor" name="description_text" id="description_text" placeholder="Enter text ..."></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Product full Description <span class="error">*</span></label>
                <div class="col-sm-10">
                    <textarea class="editor" name="product_description" id="desc" placeholder="Enter text ..."></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Quality Description <span class="error">*</span></label>
                <div class="col-sm-10">
                    <textarea class="editor" name="quality_description" id="desc" placeholder="Enter text ..."></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Youtube video link</label>
                <div class="col-sm-10">
                    <input type="url" name="video_link" class="styled form-control url" > 
                </div>
            </div>  
            <input type="hidden" name="curl" value="<?php echo site_url().admin.'products'?>">       
            <div class="form-actions text-right">
            <a class="btn btn-warning" href="<?php echo site_url().admin.'products'?>">Cancel</a>
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
        <li><a href="<?php echo site_url().admin?>products">Shop now</a></li>
        <li><a href="<?php echo site_url().admin?>products">Products</a></li> 
        <li class="active">Edit product information</li>
      </ul>
    </div>
  <!-- /breadcrumbs line -->
  <!-- Add form -->
    <div class="row">
      <div class="col-md-12">
        <!-- Form bordered -->
        <?php echo form_open_multipart(admin."products/add_edit_product",'class="form-horizontal form-bordered .validate"');?>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h6 class="panel-title"><i class="icon-menu"></i>Edit information</h6>
             <div class="panel-icons-group">
                <a href="<?php echo site_url().admin.'products/index/'?>">
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
              <label class="col-sm-2 control-label">Group id</label>
              <div class="col-sm-2">
                <input type="text" readonly="readonly" value="<?php echo $products->group_id;?>" name="group_id" class="form-control required">                
              </div>
              <label class="col-sm-2 control-label">Weight</label>
              <div class="col-sm-2">
                <select disabled class="select-full required" name="weight">
                   <option value="">Select weight</option>
                   <option <?php if($products->weight=='10'): echo 'selected'; endif;  ?> value="10">10 kg</option>
                   <option <?php if($products->weight=='25'): echo 'selected'; endif;  ?> value="25">25 kg</option>
                 </select>
              </div>
            </div>            
            <div class="form-group">              
              <label class="col-sm-2 control-label">Market Price (Rs)<span class="error">*</span></label>
              <div class="col-sm-2">
                <input type="text" name="market_price" min="10" value="<?php echo $products->market_price;?>"  class="form-control required number">
                <span class="help-block">1 Bag Market price</span>              
              </div>
              <label class="col-sm-2 control-label">Your Price (Rs)<span class="error">*</span></label>
              <div class="col-sm-2">
                <input type="text" name="price" min="10" value="<?php echo $products->price;?>"  class="form-control required number">
                <span class="help-block">1 Bag riceroom price</span>              
              </div>
              <label class="col-sm-2 control-label">Qty<span class="error">*</span></label>
              <div class="col-sm-2">
                <input type="text" name="qty" value="<?php echo $products->qty;?>" id="qty" class="form-control required"> 
                <span class="help-block">Availbe stack in product</span>                 
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
              <label class="col-sm-2 control-label">Description image </label>
              <div class="col-sm-4">
                <input type="file" class="styled form-control" id="report-screenshot" name="description_image">
                <span class="help-block">Accepted formats: jpg, png, gif. Max file size 512kb</span>
                <input type="hidden" value="<?= $products->description_image;?>" id="report-screenshot" name="old_description_image">
                <?php  $src=base_url('uploads/products/thumb').'/'.$products->description_image; ?>         
                <?php  $src1=base_url('uploads/products').'/'.$products->description_image; ?>         
                 <?php if($products->description_image!=""): ?>
                  <a href="<?php echo $src1;?>" class="lightbox" title="Product image">
                    <img src="<?php echo $src;?>" width="100" height="100" />
                  </a>
                 <?php endif; ?>
              </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">About description image<span class="error">*</span></label>
                <div class="col-sm-10">
                    <textarea class="editor" name="description_text" id="desc" placeholder="Enter text ..."><?php echo $products->description_text;?></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Product Description <span class="error">*</span></label>
                <div class="col-sm-10">
                    <textarea class="editor" name="product_description" id="desc" placeholder="Enter text ..."><?php echo $products->product_description;?></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Quality Description <span class="error">*</span></label>
                <div class="col-sm-10">
                    <textarea class="editor" name="quality_description" id="desc" placeholder="Enter text ..."><?php echo $products->quality_description;?></textarea>
                </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Video link </label>
              <div class="col-sm-4">
                <input type="text" value="<?= $products->video_link;?>" class="styled form-control url" name="video_link"> <br/>
                 <?php if($products->video_link!=""): ?>
                    <div class="thumb"><iframe frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen src="<?=$products->video_link.'?hd=1&amp;modestbranding=1&amp;' ?>"></iframe></div>
                 <?php endif; ?>
              </div>              
            </div>
            <input type="hidden" name="curl" value="<?php echo site_url().admin.'products/index/'?>">       
            <input type="hidden" name="id" value="<?=$products->id;?>">       
            <input type="hidden" name="cat_id" value="<?=$products->cat_id;?>">       
            <input type="hidden" name="sub_cat_id" value="<?=$products->sub_cat_id;?>">       
            <input type="hidden" name="city_id" value="<?=$products->city_id;?>">       
            <input type="hidden" name="product_type" value="<?=$products->product_type;?>">       
            <input type="hidden" name="weight" value="<?=$products->weight;?>">       
            <input type="hidden" name="id" value="<?=$products->id;?>">       
            <div class="form-actions text-right">
            <a class="btn btn-warning" href="<?php echo site_url().admin.'products/index/'?>">Cancel</a>
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
        <li><a href="<?php echo site_url().admin?>products">Shop now</a></li>
        <li><a href="<?php echo site_url().admin?>products">Products</a></li> 
        <li class="active">View</li>
      </ul>
    </div>
  <!-- /breadcrumbs line -->
  <div class="panel panel-default">
    <div class="panel-heading">
      <h6 class="panel-title"><i class="icon-menu"></i> View Products Details </h6>
       <div class="panel-icons-group">
                <a href="<?php echo site_url().admin.'products/index/'?>">
                    <button class="btn btn-warning btn-sm" type="button"><i class="icon-point-left"></i> Back</button>
                </a> 
       </div>
    </div>
    <div class="panel-body">
      <table class="table table-striped">
        <tbody>
            <tr>
              <tr><th>Product type</th>          <td><?php echo $product ->product_type;?> </td></tr>
              <tr><th>Weight</th>                <td><?php echo $product ->weight;?> kg</td></tr>
              <tr><th>Market Price</th>          <td><?php echo $product->market_price;?> </td></tr>
              <tr><th>Rice room Price</th>       <td><?php echo $product->price;?> </td></tr>
              <tr><th>Quantity</th>              <td><?php echo $product->qty;?> </td></tr>              
              <tr><th>SKU id</th>                <td><?php echo $product->sku_id;?> </td></tr>
              <tr><th>Group id</th>              <td><?php echo $product->group_id;?> </td></tr>
              <tr><th>Product image</th>
                   <?php $src=base_url('uploads/products').'/'.$product->image; ?>  
                  <td><a href="<?= $src; ?>" class="lightbox"><img src="<?= $src; ?>" height="100px"/></a> </td>
              </tr>
               <tr><th>Description image</th>
                   <?php $src=base_url('uploads/products').'/'.$product->image; ?>
                   <?php if($product->image!="") : ?>   
                      <td><a href="<?= $src; ?>" class="lightbox"><img src="<?= $src; ?>" height="100px"/></a> </td>
                   <?php endif; ?>
              </tr>              
              <tr><th>About Description image</th>   <td> <?php echo substr($product->description_text,0,50);?>... </td></tr>           
              <tr><th>Product Description</th>   <td> <?php echo substr($product->product_description,0,50);?>... </td></tr>           
              <tr><th>Quality Description</th>   <td> <?php echo substr($product->quality_description,0,50);?>... </td></tr>           
              <tr><th>Video</th> 
              <?php if($product->video_link!="") : ?> 
               <td> <div class="thumb"><iframe frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen src="<?=$product->video_link.'?hd=1&amp;modestbranding=1&amp;' ?>"></iframe></div> 
               </td>
              <?php endif; ?>
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
      $('#products').addClass('active');// to activate menu link
      $('#products>a').attr('id','second-level');// to open and show second level
      $('#products li a').each(function() {
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
    $(document).on('change','#sku_id',function(){
        var url = "<?php echo site_url().admin?>products/existsku_id"; 
        $.ajax({
          type: "POST",
          url: url,
          data: $("#sku_id").serialize(), // serializes the form's elements.
          success: function(data)
          {
            if(data=='1'){
               $('#result').show();
               $('#sku_id').val('');
            } 
            else { $('#result').hide();   }
          }
        });        
        return false;
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