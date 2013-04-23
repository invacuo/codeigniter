<?php
if(count($parts)===0) {
	echo 'There are no parts in the catalog.';
} else {
?>
	<form name="part-list-form" method="post">
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th><input type="checkbox" class=".select-all" /></th>
					<th>Part Name</th>
					<th>Part Category</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($parts as $part){ ?>
			    <tr>
			    	<td><input type="checkbox" name="part-id[]" value="<?php echo $part['id']?>" /></td>
			    	<td><?php echo $part['name']?></td>
			    	<td><?php echo $part['part_category']?></td>
			    	
				</tr>
				<?php } ?>
				<tr>
					<td colspan="3">
						<div class="center">
							<input type="submit" value="Add to cart" class="btn btn-primary"/> 
							<input type="reset" value="Clear" class="btn" />
						</div>
					</td>
				</tr>
			</tbody>
		</table>
	</form>
<?php 
}
?>