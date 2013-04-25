<?php
	echo form_open('/cart/submitOrder', array('name' => 'customer-info-form', 'id' => 'customer-info-form', 'class' => 'form-horizontal'));
?>

	<h2 class="offset1">Please fill in your details</h2>
	<div class="control-group">
		<?php echo form_label('Name', 'customer-name', array('class' => 'control-label'));?>
		<div class="controls">
			<?php echo form_input(array(
			'name'    => 'customer-name',
			'value'   => set_value('customer-name', ''),
			'placeholder' => 'Enter full name'
			));?>
			
			<?php echo form_error('customer-name'); ?>
		</div>
	</div>
	
	<div class="control-group">
		<?php echo form_label('Email', 'customer-email', array('class' => 'control-label'));?>
		<div class="controls">		
			<?php echo form_input(array(
			'name'    => 'email',
			'value'   =>  set_value('email', ''),
			'placeholder' => 'Enter email'
			));?>
			
			<?php echo form_error('email'); ?>
		</div>
	</div>
		
	<div class="control-group">
		<div class="controls">
			<?php echo form_submit(array(
		              'name'    => 'submit',
		              'value'   => 'Submit Order',
					  'class'	=> 'btn btn-primary'));
			?>		
		</div>
	</div>
	

</form>