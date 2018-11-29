 <?php 
            $user = $this->ion_auth->user()->row();
            // re usable user info
            $institution_id = $user->institution_id;
            $user_id = $user->id;
            $username = $user->username;
            $email = $user->email;
           ?>
<div>
	<h4>400 level <span> Electrical</span></h4>
</div>
<div class="col-md-4">
	<form class="form-group">
		<select class="form-control" name="course">
			<option>EE415</option>
			<option>EE415</option>
			<option>EE415</option>
		</select>
		<select class="form-control" name="day">
			<option>mon</option>
			<option>tue</option>
			<option>wed</option>
			<option>thur</option>
			<option>fri</option>
		</select>
		<select class="form-control" name="venue">
			<option>NLT A</option>
			<option>NLT B</option>
			<option>KSLT</option>
			<option>SLT</option>
		</select>
		<select class="form-control" name="time">
			<option>1:00</option>
			<option>2:00</option>
			<option>3:00</option>
			<option>4:00</option>
		</select>
		<input type="submit" name="" value="Save">
	</form>
</div>

<div class="col-lg-9">
	<table class="table">
	<tr>
		<th>mon</th>
		<th>tue</th>
		<th>wed</th>
		<th>thur</th>
		<th>fri</th>
	</tr>
	<tr>
		<td>ME232 (NLT A) <p><small>2:00</small></p></td>
		<td>ME232 (NLT A) <p><small>2:00</small></p></td>
		<td>ME232 (NLT A) <p><small>2:00</small></p></td>
		<td>ME232 (NLT A) <p><small>2:00</small></p></td>
		<td>ME232 (NLT A) <p><small>2:00</small></p></td>
		
	</tr>
	<tr>
		<td>ME232 (NLT A) <p><small>2:00</small></p></td>
		<td>ME232 (NLT A) <p><small>2:00</small></p></td>
		<td>ME232 (NLT A) <p><small>2:00</small></p></td>
		<td>ME232 (NLT A) <p><small>2:00</small></p></td>
		<td>ME232 (NLT A) <p><small>2:00</small></p></td>
		
	</tr>
	<tr>
		<td>ME232 (NLT A) <p><small>2:00</small></p></td>
		<td>ME232 (NLT A) <p><small>2:00</small></p></td>
		<td>ME232 (NLT A) <p><small>2:00</small></p></td>
		<td>ME232 (NLT A) <p><small>2:00</small></p></td>
		<td>ME232 (NLT A) <p><small>2:00</small></p></td>
		
	</tr>
</table>
</div>