<h2>Order Lookup</h2>
<?php
	echo form_open('/orders/lookup', array('name' => 'frm-order-lookup-by-id', 'id' => 'frm-order-lookup-by-id', 'class' => 'search check-submittable', 'method' =>'get'));
?>

	<?php echo form_fieldset('Search By Order Number');?>		
			<?php echo form_label('Order number', 'order-number', array('class' => 'control-label'));?>
				<?php echo form_input(array(
				'name'    => 'order-number',
				'value'   => set_value('order-number', ''),
				'placeholder' => 'Enter your order number',
				'class'	=> 'submit-enabler numeric-only search-query'
				));?>
				<?php echo form_submit(array(
			              'value'   => 'Lookup by Id',
						  'class'	=> 'btn btn-primary'));
				?>
				<?php echo form_error('order-number'); ?>
	<?php echo form_fieldset_close(); ?>
	
</form>
<?php
	echo form_open('/orders/lookup', array('name' => 'frm-order-lookup-by-email', 'id' => 'frm-order-lookup-by-email', 'class' => 'search check-submittable', 'method' =>'get'));
?>

	
	<?php echo form_fieldset('Search By email');?>	
			<?php echo form_label('Customer Email', 'email', array('class' => 'control-label'));?>
				<?php echo form_input(array(
				'name'    => 'email',
				'value'   =>  set_value('email', ''),
				'placeholder' => 'Enter email',					
				'class'	=> 'search-query submit-enabler'
				));?>
				
				<?php echo form_submit(array(
			              'value'   => 'Lookup by email',
						  'class'	=> 'btn btn-primary'));
				?>		
				
				<?php echo form_error('email'); ?>
	<?php echo form_fieldset_close(); ?>
</form>
