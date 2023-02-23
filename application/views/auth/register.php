<script>
	// var alamat = 'alamat';

	// $(document).ready(function(){
	// 	var autocomplete;
	// 	autocomplete = new google.maps.places.Autocomplete((document.getElementById(alamat)),{
	// 		types: ['geocode']
	// 	});

	// 	google.maps.event.addListener(autocomplete, 'place_changed',function(){
	// 		var tempat_terdekat = autocomplete.getPlace();
	// 		document.getElementById('latitude_input').value = tempat_terdekat.geometry.location.lat();
	// 		document.getElementById('longitude_input').value = tempat_terdekat.geometry.location.lng();

	// 		document.getElementById('longitude_view').innerHTML = tempat_terdekat.geometry.location.lng();
	// 		document.getElementById('longitude_view').innerHTML = tempat_terdekat.geometry.location.lng();
	// 	})

	// });
	// $(document).on('change','#'+alamat, function(){
	// 	document.getElementById('latitude_input').value = '';
	// 	document.getElementById('longitude_input').value = '';

	// 	document.getElementById('longitude_view').innerHTML = '';
	// 	document.getElementById('latitude_view').innerHTML = '';
	// });

	$(document).ready(function(){
		// $('.select2').select2();

		if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(function(position){
				$('#latitude_input').val(position.coords.latitude);
				$('#longitude_input').val(position.coords.longitude);
				// console.log(position.coords.latitude);
			})
		}else{
			console.log("gaada");
		}
	});


</script> 
	
<div class="limiter">
	<div class="container-login100">
		<div class="wrap-login100 p-l-50 p-r-50 p-t-77 p-b-30">
			<!-- <form action="<?= base_url('auth/registerProses') ?>" method="post" class="login100-form validate-form"  > -->
			<form action="<?= base_url('auth/registerProses') ?>" method="post"  >
				<span class="login100-form-title p-b-55">
					Register
				</span>

				<div class="wrap-input100 validate-input m-b-16" data-validate = "Nama harus diisi">
					<input class="input100" type="text" name="nama" placeholder="Nama" value="<?= set_value('nama'); ?>">
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<span class="lnr lnr-user"></span>
					</span>
					
				</div>
				<?= form_error('nama','<small class="text-danger">','</small>'); ?>

				<div class="wrap-input100 validate-input m-b-16" data-validate = "Contoh email: ex@abc.xyz">
					<input class="input100" type="text" name="email" placeholder="Email" value="<?= set_value('email'); ?>">

					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<span class="lnr lnr-envelope"></span>
					</span>
					
				</div>
				<?= form_error('email','<small class="text-danger">','</small>'); ?>

				<div class="wrap-input100 validate-input m-b-16" data-validate = "No. Hp harus diisi">
					<input class="input100" type="text" name="telepon" placeholder="No. HP" value="<?= set_value('telepon'); ?>">
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<span class="lnr lnr-phone-handset"></span>
					</span>
					
				</div>
				<?= form_error('telepon','<small class="text-danger">','</small>'); ?>


				<div class="wrap-input100 validate-input m-b-16" data-validate = "Alamat harus diisi">
					<input class="input100" type="text" name="alamat" placeholder="Alamat" id="alamat" value="<?= set_value('alamat'); ?>"> 
					<input type="hidden" name="lat" id="latitude_input">
					<input type="hidden" name="long" id="longitude_input">
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<span class="lnr lnr-map-marker"></span>
					</span>
					
				</div>
				<?= form_error('alamat','<small class="text-danger">','</small>'); ?>

				<div class="wrap-input100 validate-input m-b-16" data-validate = "Kota harus diisi">
					<!-- <input class="input100" type="text" name="text" placeholder="Alamat" > -->
					<select name="kota" id="" class="input100 select2">
						<option value="" class="input100">Pilih Kota</option>
						<option value="Jakarta Pusat" class="input100">Jakarta Pusat</option>
						<option value="Jakarta Timur" class="input100">Jakarta Timur</option>
						<option value="Jakarta Utara" class="input100">Jakarta Utara</option>
						<option value="Jakarta Selatan" class="input100">Jakarta Selatan</option>
						<option value="Jakarta Barat" class="input100">Jakarta Barat</option>
					</select>
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<span class="lnr lnr-apartment"></span>
					</span>
					
				</div>
				<?= form_error('kota','<small class="text-danger">','</small>'); ?>

		
	
				<!-- <div class="wrap-input100 validate-input m-b-16">
					<p><b>Latitude : </b> <span id="latitude_view"></span> </p>
					<p><b>Longitude : </b> <span id="longitude_view"></span> </p>
				</div>  -->

				<div class="wrap-input100 validate-input m-b-16" data-validate = "Password harus diisi">
					<input class="input100" type="password" name="password" placeholder="Password" >
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<span class="lnr lnr-lock"></span>
					</span>
					
				</div>
				<?= form_error('password','<small class="text-danger">','</small>'); ?>

				<div class="wrap-input100 validate-input m-b-16" data-validate = "Konfirmasi Password Harus diisi">
					<input class="input100" type="password" name="konfirmasipassword" placeholder="Konfirmasi Password">
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<span class="lnr lnr-lock"></span>
					</span>
				</div>

				
				<div class="container-login100-form-btn p-t-25">
					<button class="login100-form-btn" type="submit">
						Register
					</button>
				</div>

				<div class="text-center w-full mt-4">
					<span class="txt1">
						Sudah Punya Akun?
					</span>

					<a class="txt1 bo1 hov1" href="<?= base_url('auth'); ?>">
						Login					
					</a>
				</div>
				<hr />
				<div class="text-center w-full mt-4">
					<span class="txt1">
						<a href="<?= base_url('user'); ?>">Back to Home</a>
					</span>
				</div>
			</form>
		</div>
	</div>
</div>


	
