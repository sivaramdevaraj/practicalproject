<div class="panel panel-default">
      <div class="panel-heading">
        <h6 class="panel-title"><i class="icon-cart-plus"></i>All product list</h6>              
      </div>
<div class="datatable-media">
<table class="table table-bordered table-striped" id="ass_search">
  <thead>
    <tr>
      <th>Select</th>
      <th>Image</th>
      <th>Product name</th>          
      <th>Price (Rs)</th>          
      <th>Discount(%)</th>          
      <th>Sku id</th> 
    </tr>                    
  </thead>
  <tbody>
  <?php if(isset($products) && is_array($products) && count($products)): $i=1;?>
    <?php foreach ($products as $key => $product) { ?>
      <tr>
        <td><input type="checkbox" name="p_id[]" value="<?=$product->id;?>"></td>
        <?php if((substr($product->image, 0, 7 ) === "http://") ||(substr($product->image, 0, 8) === "https://")) : 
                        $src=$product->image;
                      else :
                          $src=base_url('uploads/products/thumb').'/'.$product->image;
                      endif;
                  ?> 
        <td> <a href="<?php echo $src;?>" class="lightbox" title="<?php echo $product->name?>">
                 <img src="<?php echo $src;?>" alt="" class="img-media"/>
             </a>    
        </td>
        <td> <?php echo $product-> name;?></a> </td>        
        <td> <?php echo $product-> price;?></a> </td>        
        <td> <?php echo $product-> discount;?></a> </td>        
        <td> <?php echo $product-> sku_id;?></a> </td>        
      </tr>
    <?php } ?>
  <?php endif; ?>
  </tbody>
</table>
</div>
