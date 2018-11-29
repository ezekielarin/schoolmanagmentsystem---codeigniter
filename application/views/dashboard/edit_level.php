
 <?php 
            $user = $this->ion_auth->user()->row();
            // re usable user info
            $institution_id = $user->institution_id;
            $user_id = $user->id;
            $username = $user->username;
            $email = $user->email;
           ?>
<div class="col-md-7">
	
	
	
	<form action="<?php echo base_url()?>dashboard/levels/update" method="post">
		<input type="hidden" name="id" value="<?php echo $level->id?>">
		<input type="text" name="level" value="<?php echo $level->level?>">
		<input type="submit" value="Update">
	</form>

			  
		
		
		

</div>