<h2><?php echo $title;?></h2>
<?php if(!empty($orders)) {?>
<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th colspan="2">Customer Name</th>
			<td colspan="2"><?php echo $orders[0]['customer_name']?></td>
		</tr>
		<tr>
			<th>Part Name</th>
			<th>Part Category</th>
			<th>Quantity</th>
			<th>Price</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($orders as $order){ ?>				
		    <tr>
		    	<td><?php echo $order['part_name']?></td>
		    	<td><?php echo $order['part_category']?></td>
				<td>
					<div class="center">
						<?php echo $order['quantity']?>
		            </div>
	            </td>
		    	<td><div class="right"><?php echo $order['unit_price']?></div></td>
			</tr>
		<?php }?>
		<tr>
		  	<td colspan="2"><div class="right"><strong>Total</strong></div></td>
			<td><div class="center"><?php echo $order['no_of_parts'];?></div></td>
			<td><div class="right">$<?php echo $order['price'] ?></div></td>	
		</tr>
	</tbody>
</table>
<?php }?>

<div><strong><a href="/orders/lookup">&lt; Lookup another order</a></strong></div>