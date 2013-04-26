<?php
	echo form_open('/orders/lookup', array('name' => 'order-lookup-form', 'class' => 'form-horizontal check-submittable', 'method' =>'get'));
?>


	<h2 class="offset1">Please fill in the details below</h2>
		
	<div class="control-group">
		<?php echo form_label('Order number (required)', 'order-number', array('class' => 'control-label'));?>
		<div class="controls">
			<?php echo form_input(array(
			'name'    => 'order-number',
			'value'   => set_value('order-number', ''),
			'placeholder' => 'Enter your order number',
			'class'	=> 'submit-enabler'
			));?>
			
			<?php echo form_error('order-number'); ?>
		</div>
	</div>
	
<!-- 	<div class="control-group"> -->
		<?php //echo form_label('Email (not working fully yet)', 'email', array('class' => 'control-label'));?>
<!-- 		<div class="controls">		 -->
			<?php //echo form_input(array(
// 			'name'    => 'email',
// 			'value'   =>  set_value('email', ''),
// 			'placeholder' => 'Enter email'
// 			));?>
			
			<?php // echo form_error('email'); ?>
<!-- 		</div> -->
<!-- 	</div> -->
	
	<div class="control-group">
		<div class="controls">
			<?php echo form_submit(array(
		              'value'   => 'Lookup Order',
					  'class'	=> 'btn btn-primary'));
			?>		
		</div>
	</div>
	

</form>
