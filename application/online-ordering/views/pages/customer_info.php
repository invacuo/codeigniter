<?php
	echo form_open('/cart/submitOrder', array('name' => 'customer-info-form', 'id' => 'customer-info-form'));
?>
	<div class="row">
		<div class="span1"><?php echo form_label('Name', 'customer-name');?></div>
		<div class="span11">
			<?php echo form_input(array(
			'name'    => 'customer-name',
			'value'   => ''
			));?>
		</div>
	</div>
	
	<div class="row">
		<div class="span1"><?php echo form_label('Email', 'customer-email');?></div>
		<div class="span11">
			<?php echo form_input(array(
			'name'    => 'email',
			'value'   => ''
			));?>
		</div>
	</div>
	
	<div>
		<?php echo form_submit(array(
	              'name'    => 'submit',
	              'value'   => 'Submit Order',
				  'class'	=> 'btn btn-primary'));
		?>
	
	</div>
	

</form>