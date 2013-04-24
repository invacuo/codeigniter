<?php if($this->cart->total_items()>0) {?>
	
	<?php echo form_open('cart/update/'); ?>
	<table class="table table-bordered table-hover">
		<thead>
			<tr>
				<th>Part Name</th>
				<th>Part Category</th>
				<th>Price</th>
				<th>Quantity</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($this->cart->contents() as $items){ ?>
				<tr>
					<td>
						<?php echo $items['name']; ?>
				  	</td>
				  	<td>
				  		<?php 
				  		if ($this->cart->has_options($items['rowid']) == TRUE) {
			  				foreach ($this->cart->product_options($items['rowid']) as $option_name =>$option_value) {
								echo "<strong>$option_name:</strong>$option_value<br />";
			  					
							}
						}
						?>		  	
				  	</td>
				  	<td><div class="right"><?php echo $this->cart->format_number($items['price']); ?></div></td>
				  
				  	<td>
						<div class="right">
					  		<?php echo form_input(array(
				              'name'    => 'part-qty['.$items['rowid'].']',
				              'value'   => $items['qty'],
							  'class'	=> 'item-quantity',
							  'maxlength' => '2'
				            ));?>
			          	</div>
			     	</td>
				</tr>
			<?php } ?>
		
			<tr>
				<td colspan="2"> </td>
			  	<td><div class="right"><strong>Total</strong></div></td>
				<td><div class="right">$<?php echo $this->cart->total(); ?></div></td>
			</tr>
			<tr>
				<td colspan="4">
					<div class="center">
						<?php echo form_submit(array(
			              'name'    => 'submit',
			              'value'   => 'Update cart',
						  'class'	=> 'btn btn-primary'));?>
						<?php echo form_submit(array(
			              'name'    => 'submit',
			              'value'   => 'Begin Checkout',
						  'class'	=> 'btn btn-primary'));?>
					</div>
				</td>
			</tr>
		</tbody>
	</table>
<?php }