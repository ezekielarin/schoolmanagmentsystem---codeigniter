         <?php 
            $user = $this->ion_auth->user()->row();
            // re usable user info
            $institution_id = $user->institution_id;
            $user_id = $user->id;
            $username = $user->username;
            $email = $user->email;
           ?>
<div class="col-md-7">
	<form action="<?php echo base_url()?>dashboard/faculty/update" method="post">
	
		<?php
		foreach ($faculty as $fac) {
			?>
				<input type="hidden" name="id" value="<?php echo $fac->id?>">
				<input type="text" name="faculty" value="<?php echo $fac->faculty?>">
				<input type="submit" value="Update">

			<?php
		}
		?>
		</form>
		
		

</div>