 <?php 
            $user = $this->ion_auth->user()->row();
            // re usable user info
            $institution_id = $user->institution_id;
            $user_id = $user->id;
            $username = $user->username;
            $email = $user->email;
           ?>
<div>
	<h4>NLT A</h4>
</div>

<?php 
print_r($venue);

?>

<div class="col-md-7">
	<table class="table">
		<tr>
			<th>Day</th>
			<th>Lectures</th>
		</tr>
		<tr>
			<td>Mon</td>
			<td>ME211 <small>(11:00)</small></td>
			<td>ME211 <small>(11:00)</small></td>
			<td>ME211 <small>(11:00)</small></td>
			<td>ME211 <small>(11:00)</small></td>
		</tr>
		<tr>
			<td>Tue</td>
			<td>ME211 <small>(11:00)</small></td>
			<td>ME211 <small>(11:00)</small></td>
			<td>ME211 <small>(11:00)</small></td>
			<td>ME211 <small>(11:00)</small></td>
		</tr>
		<tr>
			<td>Wed</td>
			<td>CEE233 <small>(2:00)</small></td>
			<td>CEE233 <small>(2:00)</small></td>
			<td>CEE233 <small>(2:00)</small></td>
		</tr>
		<tr>
			<td>Thur</td>
			<td>ME211 <small>(11:00)</small></td>
			<td>ME211 <small>(11:00)</small></td>
			<td>ME211 <small>(11:00)</small></td>
			<td>ME211 <small>(11:00)</small></td>
		</tr>
		
	</table>
</div>