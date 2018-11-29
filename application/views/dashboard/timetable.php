
 <?php 
            $user = $this->ion_auth->user()->row();
            // re usable user info
            $institution_id = $user->institution_id;
            $user_id = $user->id;
            $username = $user->username;
            $email = $user->email;
           ?>



           <h4><a class="btn btn-success" href="">Lectures</a> <a class="btn btn-success" href="">Examinations</a></h4>
<?php
$levels = $this->db->query("SELECT * FROM levels WHERE institution_id='$institution_id' ORDER BY level ASC")->result();
 
 foreach ($levels as $lv) {
 	?>
 	<hr>
<h3><?php echo $lv->level; ?></h3>
<a class="btn btn-primary" href="<?php echo base_url()?>dashboard/timetable/edit/<?php echo $lv->level; ?>">edit</a>
<a class="btn btn-warning" href=""><i class="fa fa-file" > </i> Export to PDF</a>
<a class="btn btn-warning" href="">Export to XLS</a>
<table class="table">
	<tr>
		<th>mon</th>
		<th>tue</th>
		<th>wed</th>
		<th>thur</th>
		<th>fri</th>
	</tr>
	<?php
	$tt = $this->db->query("SELECT * FROM timetable WHERE institution_id='$institution_id' AND level='$lv->level' ");
	   foreach ($tt->result() as $tb) {
		?>
			<tr>
				<td><?php echo $tb->course; ?><p><small><?php echo $tb->lecture_time; ?></small></p></td>
				<td>ME232 (NLT A) <p><small>2:00</small></p></td>
				<td>ME232 (NLT A) <p><small>2:00</small></p></td>
				<td>ME232 (NLT A) <p><small>2:00</small></p></td>
				<td>ME232 (NLT A) <p><small>2:00</small></p></td>
			</tr>
			<?php
		}
		?>
</table>
 	<?php
 	
 }
 ?>