 <?php 
            $user = $this->ion_auth->user()->row();
            // re usable user info
            $institution_id = $user->institution_id;
            $user_id = $user->id;
            $username = $user->username;
            $email = $user->email;
           ?>
<div class="col-md-7">
 
      <form action="venues/add" method="post">
      	<input type="hidden" name="institution_id" value="<?php echo $institution_id?>">
      	<input type="text" name="venue" placeholder="Venue">
      	<input type="text" name="capacity" placeholder="Capicity">

      	<input type="submit" name="" value="Add">
      </form>
	</div>

<div class="col-md-7">
	<table class="table">
		<tr>
			<th>Venue</th>
			<th>Capicity</th>
			<th>Option</th>
		</tr>
		<?php
		foreach ($allvenues as $v) {	
	     ?>
		<tr>
			<td><a href="venues/view/2"><?php echo $v->venue?></a></td>
			<td><?php echo $v->capacity?></td>
			<td><a href="venues/delete/<?php echo $v->id?>">Delete</a></td>
			<td><a href="venues/edit/<?php echo $v->id?>">Edit</a></td>
		</tr>
		<?php
	     }
		?>
	</table>
</div>
