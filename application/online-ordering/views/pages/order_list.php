<h2><?php echo $title?></h2>
<?php if(count($orders)>0) {?>
	<table class="table table-hover table-striped">
		<thead>
			<tr>
				<th>Order Number</th>
				<th>Customer Name</th>
				<th>No. of Parts</th>
				<th>Order Total</th>
				<th>Link</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($orders as $order){ ?>				
			    <tr>
			    	<td><?php echo $order['id']?></td>
			    	<td><?php echo $order['customer_name']?></td>
			    	<td><?php echo $order['price']?></td>
			    	<td><?php echo $order['no_of_parts']?></td>
					<td><a href="/orders/lookup?order-number=<?php echo $order['id'];?>">View Order</a></td>
				</tr>
			<?php }?>
		</tbody>
	</table>
<?php }?>
<div><strong><a href="/orders/lookup">&lt; Lookup another order</a></strong></div>