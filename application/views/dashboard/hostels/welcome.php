<div>
	<form action="hostels/addnew" method="post">
		<input type="text" name="hostel"  placeholder="Hostel">
		<input type="text" name="room"  placeholder="Number of rooms">
		<input type="text" name="capacity" placeholder="Capacity">
		<input type="submit" value="Add">
	</form>
</div>
<div class="col-md-7">
	<table class="table">
		<tr>
			<th>Hostel</th>
			<th>Rooms</th>
			<th>Capacity</th>
			<th>Options</th>
			
		</tr>
		<?php
			$get = $this->db->query("SELECT * FROM hostels")->result();
			foreach ($get as $hostel) {
		?>
			<tr>
			  <td><a href="hostels/view/<?php echo $hostel->id?>"><?php echo $hostel->hostel?></a></td>
			  <td><?php echo $hostel->room?></td>
			  <td><?php echo $hostel->capacity?></td>
			  <td><a href="hostels/delete/<?php echo $hostel->id?>">Delete</a></td>
			  <td><a href="hostels/edit/<?php echo $hostel->id?>">Edit</a></td>
		    </tr>
		<?php
	      }
		?>
		
		
	</table>
</div>