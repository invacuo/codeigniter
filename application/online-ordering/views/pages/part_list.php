<?php
if(count($parts)===0) {
	echo 'There are no parts in the catalog.';
} else {
	echo form_open('',array('name' => 'part-list-form', 'id' => 'part-list-form'));
?>
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
				<?php foreach ($parts as $part){ ?>				
			    <tr>
			    	<td><?php echo $part['name']?></td>
			    	<td><?php echo $part['part_category']?></td>
			    	<td><div class="right"><?php echo $part['price']?></div></td>
					<td>
						<div class="center">
							<?php echo form_input(array(
				              'name'    => 'part-qty['.$part['id'].']',
				              'value'   => '',
							  'class'	=> 'item-quantity',
							  'maxlength' => '2'
				            ));?>
			            </div>
		            </td>
				</tr>
				<?php 
					//create hidden fields to store the name and price of each part
					//codeigniter's cart requires each item to have id, name, price and qty
		            $data = array(
		            		'part-name-' . $part['id']  => $part['name'],
		            		'part-price-' . $part['id'] => $part['price'],
		            		'Category' . $part['id']  => $part['part_category']
		            );
		             
					echo form_hidden($data);
				?>
				<?php } ?>
				<tr>
					<td colspan="4"><?php echo $page_links;?></td>
				</tr>
				<tr>
					<td colspan="4">
						<div class="center">
							<?php echo form_submit(array(
				              'name'    => 'submit',
				              'value'   => 'Add to cart',
							  'class'	=> 'btn btn-primary'));?>
							<?php echo form_reset(array(
				              'value'   => 'Clear',
							  'class'	=> 'btn'));?>
						</div>
					</td>
				</tr>
			</tbody>
		</table>
	</form>
<?php 
}
?>