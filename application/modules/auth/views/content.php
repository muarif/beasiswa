
<div class="account-container">
	
	<div class="content clearfix">
		
		<form action="<?php echo site_url('auth/login');?> " method="post">
		
			<h1>Member Login</h1>		
			
			<div class="login-fields">
				
				<div class="field">
					<label for="username">Username</label>
					<input type="text" id="username" name="username" value="" placeholder="Username" class="login username-field" />
				</div> <!-- /field -->
				
				<div class="field">
					<label for="password">Password:</label>
					<input type="password" id="password" name="password" value="" placeholder="Password" class="login password-field"/>
				</div> <!-- /password -->
				<?php if($this->session->flashdata('alert')){
				?>
				<div class="alert">
					<?php echo $this->session->flashdata('alert'); ?>
                </div>
                <?php 
            		} 
            	?>
			</div> <!-- /login-fields -->
			
			<div class="login-actions">
									
				<input type="submit" class="button btn btn-success btn-large" value='Login'>
				
			</div> <!-- .actions -->
			
			
			
		</form>
		
	</div> <!-- /content -->
	
</div> <!-- /account-container -->