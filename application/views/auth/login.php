
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-50 p-r-50 p-t-77 p-b-30">
				<form class="login100-form validate-form" method="post" action="<?= base_url('auth/loginProses') ?>" >
					<span class="login100-form-title p-b-55">
						Login
					</span>

					<?php 
					if ($this->session->flashdata('message')!=null) {
					?>
					
						<div class="badge badge-danger"> <?= $this->session->flashdata('message'); ?></div>
					
					<?php
					}
					?>
					
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email" value="<?= set_value('email'); ?>">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-envelope"></span>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-lock"></span>
						</span>
					</div>

					
					<div class="container-login100-form-btn p-t-25">
						<button class="login100-form-btn" type="submit">
							Login
						</button>
					</div>

					<div class="text-center w-full mt-4">
						<span class="txt1">
							Belum Punya Akun?
						</span>

						<a class="txt1 bo1 hov1" href="<?= base_url('auth/register'); ?>">
							Daftar					
						</a>
					</div>

					<div class="text-center w-full mt-4">
						<span class="txt1">
							<a href="<?= base_url('user'); ?>">Back to Home</a>
						</span>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
