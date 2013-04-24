<?php
if(count($parts)===0) {
	echo 'There are no parts in the catalog.';
} else {
	echo validation_errors();
	echo form_open('',array('name' => 'part-list-form', 'id' => 'part-list-form'));
	
?>
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th><?php echo form_checkbox(array('class'=>'.select-all'));?></th>
					<th>Part Name</th>
					<th>Part Category</th>
				</tr>
			</thead>
			
            
			<tbody>
				<?php foreach ($parts as $part){ ?>
			    <tr>
			    	<td><?php echo form_checkbox('part-id[]', $part['id'])?></td>
			    	<td><?php echo $part['name']?></td>
			    	<td><?php echo $part['part_category']?></td>
				</tr>
				<?php } ?>
				<tr>
					<td colspan="3">
						<div class="center">
							<input type="submit" name="submit" value="Add to cart" class="btn btn-primary"/> 
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