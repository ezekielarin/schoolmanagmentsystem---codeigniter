
<div class="col-md-7">
	<h4><?php echo $hostel_name->hostel; ?></h4>
	<table class="table">
		<tr>
			<th>Rooms</th>
			<th>Capacity</th>
			<th>Available</th>
			
		</tr>
		<?php
			
			foreach ($hostel as $host) {
		?>
			<tr>
			  <td><?php echo $host->hostel?></td>
			  <td><?php echo $host->room?></td>
			  <td><?php echo $host->capacity?></td>
	
		    </tr>
		<?php
	      }
		?>
		
		
	</table>
</div>