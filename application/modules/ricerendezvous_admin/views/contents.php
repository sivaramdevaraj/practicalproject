

 <!-- Page header -->
    <div class="page-header">
      <div class="page-title">
        <h3><?php echo ($p_id)? $p_page->name:$cms->page_name?></h3>
      </div>
    </div>
    <!-- /content header -->
   <!-- Breadcrumbs line -->
    <div class="breadcrumb-line">
      <ul class="breadcrumb">
        <li><a href="<?php echo site_url().admin?>home">Home</a></li>
        <?php if($p_id): $link_id= ($p_id)? '/'.$p_page->p_id:'';?>
          <li><a href="<?php echo site_url().admin.'cms/index/'.$parent_de->url_name.$link_id ?>"><?php echo $parent_de->page_name?></a></li>
        <?php endif;?>
        <li class="active"><?php echo $cms->page_name?></li>
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
  <!-- Datatable with tools menu -->
    <div class="panel panel-default">
      <div class="panel-heading">
        <h6 class="panel-title"><i class="icon-table"></i> <?php echo $cms->page_name?></h6>
        <?php if($cms->add){?>
        <div class="panel-icons-group"> <?php $acontent = array('id'=>'','name'=>'','description'=>'','image'=>  '','other_column'=>'','image_size'=>'','page_id'=>$cms->id,'p_id'=> ($p_id) ? $p_id:'');?>
          <script>var content_0 = <?php echo json_encode($acontent)?></script>
          <a data="content_0" role="button" class="btn btn-link btn-icon model_form tip" title="Add <?php echo $cms->page_name?>"><i class="icon-plus"></i></a>
        </div>
        <?php } ?>
      </div>
      
       <div class="">
        <div class="table-responsive">
        <table class="table table-bordered table-striped" id="cat_table">
          <thead>
            <tr>
              <th>#</th>
              <?php echo ($cms->image)? ('<th>'.(($cms->image!='1' && $cms->image!='2')? $cms->image: 'Image').'</th>'):''?>
              <?php echo ($cms->name)? ('<th>'.(($cms->name!='1' && $cms->name!='2')? $cms->name: 'Title').'</th>'):''?>
              <?php echo ($cms->description)? ('<th>'.(($cms->description!='1' && $cms->description!='2')? $cms->description: 'Description').'</th>'):''?>              
              <?php echo ($cms->other_column)? ('<th>'.(($cms->other_column!='1' && $cms->other_column!='2')? $cms->other_column: 'Other Column').'</th>'):''?>              
              <th>Actions</th>
            </tr>                    
          </thead>
          <tbody>
          <?php if(isset($contents) && is_array($contents) && count($contents)): $i=1;?>
            <?php foreach ($contents as $key => $content) { ?>
              <tr >
                <td> <?php echo $i++; ?> </td>
                <?php if($cms->image){?>
                <td class="text-center">
                   <a href="<?php echo base_url()?>uploads/pages/<?php echo $content->image?>" class="lightbox" title="<?php echo $content->name?>">
                    <img src="<?php echo base_url()?>uploads/pages/<?php echo $content->image?>" alt="" class="img-media">
                  </a>                   
                </td>
                <?php } if($cms->name){?>
                <td> <?php echo ($cms->p_id)? '<a href="'.site_url().admin.'cms/index/cat_slider/'.$content->id.'" >'.$content->name.'</a>': $content->name;?> </td>
                <?php } if($cms->description){?>
                <td> <?php echo $content->description;?> </td>  
                <?php } if($cms->other_column){?>
                <td> <?php echo $content->other_column;?> </td>  
                <?php }?>      
                <td>
                <script>var content_<?php echo $content->id?> = <?php echo json_encode($content);?></script>
                <div class="icons-group"> 
                  <a data="<?php echo 'content_'.$content->id ?>" 
                  role="button" class="btn btn-link btn-icon model_form tip" title="Edit"><i class="icon-pencil"></i></a>
                  <?php if($cms->add){ ?>
                  <a title="Delete" class="tip delete" data="<?php echo $content->id?>"><i class="icon-close"></i></a>
                  <?php }?>
                  </div>
                </td>
              </tr>
            <?php } ?>
          <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
    </div>
    <!-- /datatable with tools menu -->

    <!-- Form modal -->
    <div id="form_modal" class="modal fade" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title"><i class="icon-paragraph-justify2"></i> <?php echo $cms->page_name?> </h4>
          </div>
          <!-- Form inside modal -->
          <?php echo form_open_multipart(site_url().admin.'/cms/add_edit', 'id="cat_form" class=".validate"');?>
              <div class="modal-body with-padding">              
              <?php if($cms->name){?>
              <div class="form-group">
                <div class="row">
                  <div class="col-sm-12">
                    <label><?php echo ($cms->name!=1 && $cms->name!=2)? $cms->name: 'Name' ?>:</label>
                    <input type="text" id="name" name="name" class="form-control<?php echo ($cms->name=='2')? ' required':''?>" value="">
                  </div>
                </div>
              </div>
              <?php } if($cms->image){?>
              <div class="form-group">
                <div class="row">
                  <div class="col-sm-12">
                    <label><?php echo ($cms->image!=1 && $cms->image!=2)? $cms->image: 'Image' ?>:</label>
                    <input type="file" class="styled form-control<?php echo ($cms->image=='2')? ' required':''?>" id="report-screenshot" name="image">
                    <?php if($cms->image_size!='') { $img_size=explode(',', $cms->image_size);?>
                      <span class="help-block">Accepted formats: jpg, png, gif. Max file size 512kb Width:<?php echo $img_size[0]?>px,Height:<?php echo $img_size[1]?>px </span>
                    <?php } ?>
                    <?php if($cms->image_size==' ') { ?>
                      <span class="help-block">Accepted formats: jpg, png, gif. Max file size 512kb </span>
                    <?php } ?>
                    <input type="hidden" name="old_image" id="old_image" value="">
                  </div>
                </div>
              </div>
              <?php } if($cms->description){?>
              <div class="form-group">
                <div class="row">
                  <div class="col-sm-12">
                    <label><?php echo ($cms->description!=1 && $cms->description!=2)? $cms->description: 'Description' ?>:</label>
                    <textarea class="editor<?php echo ($cms->description=='2')? ' required':''?>" data-wysihtml5-command-value="P"  data-bind="editor: news_desc" name="description" id="description" placeholder="Enter text ..." ></textarea>
                  </div>
                </div>
              </div>
              <?php } if($cms->other_column){?>
              <div class="form-group">
                <div class="row">
                  <div class="col-sm-12">
                    <label><?php echo ($cms->other_column!=1 && $cms->other_column!=2)? $cms->other_column: 'Other Column' ?>:</label>
                    <input type="text" id="other_column" name="other_column" class="form-control<?php echo ($cms->other_column=='2')? ' required':''?>" value="">
                  </div>
                </div>
              </div>
              <?php } ?>       
            </div>            
            <div class="modal-footer">
              <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
              <input type="hidden" name="id" value="" id="id">
              <input type="hidden" name="page_id" value="" id="page_id">
              <input type="hidden" name="p_id" value="" id="p_id">
              <input type="hidden" name="curl" value="<?php echo current_url()?>">
              <button type="submit" class="btn btn-primary">Submit</button>
              
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- /form modal -->
<script>
  $(document).ready(function(){   
    $('form').validate({
       errorPlacement: function(error, element) {
         if (element.next().hasClass("filename")) {
            error.insertAfter(element.parent().next('.help-block'));
         }else{
            error.insertAfter(element);
         }
       }           
    });

    $(document).on('click','.model_form',function(){
      $('#form_modal').modal({
        keyboard: false,
        show:true,
        backdrop:'static'
      });
      $('label.error').hide();
      var data = eval($(this).attr('data'));
	    $('#name').val(data.name);
      $('#id').val(data.id);  
      $('#page_id').val(data.page_id);  
      $('#p_id').val(data.p_id);	 
      $('#other_column').val(data.other_column); 
      $('#old_image').val(data.image);
      if(data.image!='') $('#report-screenshot').removeClass('required');
      editor.setValue(data.description);
    });

    $(document).on('click','.delete',function(){
      if(confirm('Are you sure to delete')){
        $.ajax({url:"<?php echo site_url().admin?>cms/delete/"+$(this).attr('data'), 
          success:function(data){window.location.reload(true);}});
      }
    });

    var url_link = "<?php echo $this->uri->segment(3) ?>";
    if(url_link == "offers")
    {
      $('#offers_m').addClass('active'); // to activate menu link
      $('#offers_m a').attr('id','second-level'); // to open and show second level
      $('#offers_m li a').each(function() {
        if($(this).attr('href') == '<?php echo current_url();?>' )
        $(this).closest('li').addClass('active'); // to activate second level menu
      }); 
    }
    else if(url_link == "sliders" || url_link =="home_image" || url_link =="side_image")
    {
      $('#home').addClass('active');// to activate menu link
      $('#home>a').attr('id','second-level');// to open and show second level
      //$('#contents_m #home a').attr('id','second-level');// to open and show third level
      $('#home li a').each(function() {
        if($(this).attr('href') == '<?php echo current_url();?>' )
        $(this).closest('li').addClass('active');// to activate third level menu
      }); 
    }
    else if(url_link == "queries" || url_link =="order" || url_link =="returns")
    {
      $('#faq').addClass('active');// to activate menu link
      $('#faq>a').attr('id','second-level');// to open and show second level
     // $('#contents_m #faq a').attr('id','second-level');// to open and show third level
      $('#faq li a').each(function() {
        if($(this).attr('href') == '<?php echo current_url();?>' )
        $(this).closest('li').addClass('active');// to activate third level menu
      }); 
    }
    else if(url_link == "privacy_policy" || url_link =="terms" || url_link =="cancel" || url_link =="payments" || url_link =="shipping" || url_link =="footer_content" || url_link =="social" )
    {
      $('#footer').addClass('active');// to activate menu link
      $('#footer>a').attr('id','second-level');// to open and show second level
     // $('#contents_m #faq a').attr('id','second-level');// to open and show third level
      $('#footer li a').each(function() {
        if($(this).attr('href') == '<?php echo current_url();?>' )
        $(this).closest('li').addClass('active');// to activate third level menu
      }); 
    }
  });
</script>