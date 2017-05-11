	<!-- Footer -->
    <div class="footer clearfix">
      <!-- <div class="pull-left">&copy; 2015. Admin by <a href="http://www.webdesignpis.com/" target="_blank">Prabha Info Solution</a></div> -->
    </div>
    <!-- /footer -->
  </div>
  <!-- /page content -->
</div>
<!-- /page container -->

<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/plugins/charts/sparkline.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/plugins/forms/uniform.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/plugins/forms/select2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/plugins/forms/inputmask.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/plugins/forms/autosize.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/plugins/forms/inputlimit.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/plugins/forms/listbox.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/plugins/forms/multiselect.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/plugins/forms/validate.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/plugins/forms/additional-methods.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/plugins/forms/tags.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/plugins/forms/switch.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/plugins/forms/wysihtml5/wysihtml5.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/plugins/forms/wysihtml5/toolbar.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/plugins/interface/daterangepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/plugins/interface/fancybox.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/plugins/interface/moment.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/plugins/interface/datatables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/plugins/interface/colorpicker.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/plugins/interface/collapsible.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jQuery.print.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/application.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/ckeditor/ckeditor.js"></script>
<script>
$("[canellDate]").datepicker({
  minDate: '0',
});
</script>
 
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <script>
  $(function() {
    $( "#from" ).datepicker({
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 1,
      onClose: function( selectedDate ) {
        $( "#to" ).datepicker( "option", "minDate", selectedDate );
      }
    });
    $( "#to" ).datepicker({
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 1,
      onClose: function( selectedDate ) {
        $( "#from" ).datepicker( "option", "maxDate", selectedDate );
      }
    });
  });
  </script>
  <script>
$("[canellDate]").datepicker({
  minDate: '0',
});
</script>

</body>
</html>