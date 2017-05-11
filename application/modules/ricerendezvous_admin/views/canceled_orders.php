<?php if(isset($mode) && $mode =='all'): ?>
  <!-- Page header -->
    <div class="page-header">
      <div class="page-title"> <h3>Canceled Orders</h3> </div>
    </div>
  <!-- /page header -->
  <!-- Breadcrumbs line -->
    <div class="breadcrumb-line">
      <ul class="breadcrumb">
        <li><a href="<?php echo site_url().admin?>">Home</a></li>
        <li class="active">Canceled Orders</li>
      </ul>
    </div>
  <!-- /breadcrumbs line -->
  <!-- Datatable with tools menu -->
    <div class="panel panel-default">
      <div class="panel-heading">
        <h6 class="panel-title"><i class="icon-table"></i> All Canceled Orders</h6>
        <div class="panel-icons-group"> <?php $abuilder = array('id'=>'','name'=>'');?>
          <script>var builder_0 = <?php echo json_encode($abuilder)?></script>
          <!-- <a data="builder_0" role="button" class="btn btn-link btn-icon model_form tip" title="Add Specification"><i class="icon-plus"></i></a> -->
        </div>
      </div>
      <!-- <div class="panel-heading"> <h6 class="panel-title"><i class="icon-table"></i> Test Drive</h6> </div> -->
        <div class="datatable-media">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Message</th>
                <th>Status</th>
                <th class="team-links">Actions</th>
              </tr>                    
            </thead>
            <tbody>
            <?php if(isset($regusers) && is_array($regusers) && count($regusers)): $i=1;?>
              <?php foreach ($regusers as $key => $reg) { ?>
                <tr>
                  <td> <?php echo $i++; ?> </td>
                  <td> <?php echo $reg -> name?> </td>
                  <td><i data="<?php echo $reg->id;?>" class="status_checks btn icon-<?php echo ($reg -> status!=0)? 'checkmark btn-success' : 'close btn-danger'?>"></i>  </td>
                  <td>
                  <div class="icons-group"> 
                    <a href="<?php echo site_url().admin?>regusers/view/<?php echo $reg->id?>" title="View" class="tip btn btn-link"><i class="icon-eye"></i></a> 
                    <a title="Delete <?php echo $reg->id;?>" class="tip delete" data="<?php echo $reg->id?>"><i class="icon-close"></i></a>
                  </td>
                </tr>
              <?php } ?>
            <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
       <!--Add Form model-->
   <!--  <div id="model_form" class="modal fade" tabindex="-1" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title"><i class="icon-paragraph-justify2"></i> <span>Add</span> Category </h4>
          </div>
          <?php echo form_open_multipart(site_url().admin.'regusers/add_new', 'id="cat_form" class=".validate"');?>
            <div class="modal-body with-padding">
              <div class="form-group">
                <div class="row">
                  <div class="col-sm-12">
                    <label>Name: <span class="error">*</span></label>
                    <input type="text" id="name" name="name" title="Please enter category name" class="form-control required" value="">
                  </div>
                </div>
              </div>
          </div>            
          <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
            <span id="add">
              <input type="hidden" name="id" value="" id="id">
              <button type="submit" class="btn btn-primary" id="add_city">Submit</button>
            </span>
          </div>
          </form>
        </div>
      </div>
    </div>
 -->
    <!--End add form model-->
  <!-- /Datatable with tools menu -->
<?php elseif(isset($mode) && $mode =='view'): ?>
  <!-- Page header -->
    <div class="page-header">
      <div class="page-title"><h3>Registered</h3></div>
    </div>
  <!-- /page header -->
  <!-- Breadcrumbs line -->
  <div class="breadcrumb-line">
    <ul class="breadcrumb">
      <li><a href="<?php echo site_url().admin?>">Home</a></li>
      <li><a href="<?php echo site_url().admin?>regusers">Registered Details</a></li>
      <li class="active"> <?php echo $regusers -> name?></li>
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
  <!-- Tabs -->
  <div class="tabbable page-tabs">   
    <div class="tab-content"> 
        <div class="panel panel-default">
          <div class="panel-heading">
              <h6 class="panel-title"><i class="icon-table"></i> Register user details</h6>
              <!-- <div class="panel-icons-group"> <?php $abuilder = array('id'=>'','name'=>'');?>
                  <script>var builder_0 = <?php echo json_encode($abuilder)?></script>
                  <a data="builder_0" role="button" class="btn btn-link btn-icon models_form tip" title="Back "><i class="icon-plus"></i></a>
              </div> -->
              <a href="<?php echo site_url().admin?>regusers">
              <button class="btn btn-warning btn-sm pull-right" type="button"><i class="icon-point-left"></i> Back</button>
              </a>
          </div>
          <div class="row panel-body">
            <div class="col-sm-12"> 
            <table class="table table-striped">
                  <tbody>
                    <tr><th style="width:200px">Email</th> <td><?php echo $regusers_values->email;?></td></tr>
                    <tr><th style="width:200px">Phone</th> <td><?php echo $regusers_values->phone;?></td></tr>
                    <tr><th style="width:200px">Gender</th> <td><?php echo $regusers_values->gender;?></td></tr>
                    <tr><th style="width:200px">Address</th> <td><?php echo $regusers_values->address1;?></td></tr>
                    <tr><th style="width:200px">State</th> <td><?php echo $regusers_values->statename;?></td></tr>
                    <tr><th style="width:200px">City</th> <td><?php echo $regusers_values->cityname;?></td></tr>
                    <tr><th style="width:200px">Zip Code</th> <td><?php echo $regusers_values->zip_code;?></td></tr>
                    
                  </tbody>
                </table>
            </div>
          </div> 
        </div>
    </div>
  </div>

<?php endif; ?>

 <!--Add Form model-->
    <div id="models_form" class="modal fade" tabindex="-1" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title"><i class="icon-paragraph-justify2"></i> <span>Add</span></h4>
          </div>
          <!-- Form inside modal -->
          <?php echo form_open_multipart(site_url().admin.'specifications/add', 'id="cat_form" class=".validate"');?>
            <div class="modal-body with-padding">
              <div class="form-group">
                <div class="row">
                  <div class="col-sm-12">
                    <label>Name: <span class="error">*</span></label>
                    <input type="text" id="name" name="name" title="Please enter category name" class="form-control required" value="">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-sm-12">
                    <label>Other: <span class="error">*</span></label>
                    <input type="text" id="other" name="other" title="Please enter category name" class="form-control required" value="">
                  </div>
                </div>
              </div>
          </div>            
          <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
            <span id="add">
              <input type="hidden" name="id" value="" id="id">
              <input type="hidden" name="spec_id" value="<?php echo $spec ?>" id="spec_id">
              <input type="hidden" name="curl" value="<?php echo current_url()?>" id="id">                
              <button type="submit" class="btn btn-primary" id="add_city">Submit</button>
            </span>
          </div>
          </form>
        </div>
      </div>
    </div>

    <!--End add form model-->


<script>
  
  $(document).ready(function(){      

    $('form').validate();

    var url = document.location.toString();
    $(document).on('click','.model_form',function(){      
      $('#model_form').modal({
        keyboard: false,
        show:true,
        backdrop:'static'
      });
      $('label.error').hide();
      var data = eval($(this).attr('data'));
      $('#id').val(data.id);
      $('#price').val(data.price);
      $('#zzw_price').val(data.zzw_price);
      $('#price_exp_date').val(data.price_exp_date);
      $('#delivery_date').val(data.delivery_date);
    });

    $(document).on('click','.models_form',function(){
      $('#models_form').modal({
        keyboard: false,
        show:true,
        backdrop:'static'
      });
      $('label.error').hide();
      var data = eval($(this).attr('data'));
      $('#id').val(data.id);
      $('#name').val(data.name);
      $('#other').val(data.other);
    });

    $(document).on('click','.modalcar_form',function(){
      $('#modalcar_form').modal({
        keyboard: false,
        show:true,
        backdrop:'static'
      });
      $('label.error').hide();
    });

    $(document).on('click','.status_checks',function(){
      var status = ($(this).hasClass("btn-success")) ? '0' : '1';
      var msg = (status=='0')? 'Deactivate' : 'Activate';
      if(confirm("Are you sure to "+ msg)){
        var current_element = $(this);
        url = "<?php echo site_url().admin;?>/regusers/active_status";
        $.ajax({
          type:"POST",
          url: url,
          data: {abs_id:$(current_element).attr('data'),status:status},
          success: function(data)
          {   
            location.reload();
          }
        });
      }      
    });

    $(document).on('click','.delete',function(){
      if(confirm('Are you sure to delete')){
        $.ajax({url:"<?php echo site_url().admin?>regusers/delete/"+$(this).attr('data'), 
          success:function(data){window.location.reload(true);}});
      }
    });
    // $(document).on('click','.del',function(){ 
    //   if(confirm("Are you sure to delete."))
    //   {       
    //     var url = "<?php echo site_url().admin?>specifications/del/"+$(this).attr('data-id'); 
    //     $.ajax({
    //       type: "POST",
    //       url: url,
    //       success: function(data)
    //       {
    //         //alert(data); // show response from the php script.
    //         location.reload();
    //       }
    //    });
    //   }
    //   return false;
    // });

    $('#regusers_m').addClass('active');
  });
</script>
