
 <!-- Page header -->
    <div class="page-header">
      <div class="page-title">
        <h3>All Registered User</h3>
      </div>
    </div>
    <!-- /page header -->
   <!-- Breadcrumbs line -->
    <div class="breadcrumb-line">
      <ul class="breadcrumb">
        <li><a href="<?php echo site_url().admin?>">Registered Users</a></li>
        <li class="active"> Pages</li>
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
        <h6 class="panel-title"><i class="icon-table"></i>All Registered Users </h6>
        <div class="panel-icons-group"> <?php $apage = array('id'=>'','image'=>'','page_name'=>'','url_name'=>'','name'=>'','description'=>'','other_column'=>'','add'=>'','p_id'=>'','status'=>'');?>
          <script>var page_0 = <?php echo json_encode($apage)?></script>
         <!-- <a data="page_0" role="button" class="btn btn-link btn-icon model_form tip" title="Add pages"><i class="icon-plus"></i></a>  -->
        </div>
      </div>
      
       <div class="datatable-media">
        <div class="table-responsive">
        <table class="table table-bordered table-striped" id="cat_table">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>              
              <th>Email</th>                        
              <th>Phone</th>
            </tr>                    
          </thead>
          <tbody>
          <?php 
          if(isset($all_users) && is_array($all_users) && count($all_users)): $i=1;?>
            <?php foreach ($all_users as $key => $page) { ?>
              <tr id="row_<?php echo $page->id;?>">
                <td> <?php echo $i++; ?> </td>                
                <td> <?php echo $page->name;?> </td>                                       
                <td> <?php echo $page->email;?>  </td>                                                
                <td> <?php echo $page->phone;?>  </td>
              </tr>
            <?php } ?>
          <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
    </div>
    <!-- /datatable with tools menu -->
<script>
  $(document).ready(function(){ 
    $('#regusers').addClass('active');
    $('#pages_m a').attr('id','second-level');
    $('#pages_m li a').each(function() {
       if($(this).attr('href') == '<?php echo current_url();?>')
        $(this).closest('li').addClass('active');
    });  
    $('form').validate();
    $(document).on('click','.model_form',function(){
      $('#form_modal').modal({
        keyboard: false,
        show:true,
        backdrop:'static'
      });
      $('label.error').hide();
      var data = eval($(this).attr('data'));
      $('#id').val(data.id);
      $('#add').select2("val",data.add);
      $('#page_name').val(data.page_name);
      $('#url_name').val(data.url_name);
      $('#name').val(data.name);
      $('#description').val(data.description);
      $('#image').val(data.image);
      $('#other_column').val(data.other_column); 
      $('#image_size').val(data.image_size); 
      $('#p_id').val(data.p_id); 
    });
    $(document).on('click','.data_form',function(){
      $('#data_modal').modal({
        keyboard: false,
        show:true,
        backdrop:'static'
      });
      var data = eval($(this).attr('data'));
      $('#dname').html(data.name);
      $('#ddescription').html(data.description);
      $('#dimage').html(data.image);
      $('#dparking').html(data.parking);
      $('#dother').html(data.other_column);
      $('#dsize').html(data.image_size);
    });   
   
  });
</script>