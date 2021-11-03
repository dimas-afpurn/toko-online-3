<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login | blonjosam.com</title>
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/font-awesome.min.css" />
	<link href='https://fonts.googleapis.com/css?family=Aladin' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Montserrat|Raleway:400,200,300,500,600,700,800,900,100' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,700,900' rel='stylesheet' type='text/css'>

	<link href="<?= base_url() ?>assets/css/auth.scss" rel="stylesheet" type="text/css" media="all" />


</head>

<body>
	<div class="container" id="container">
		<div class="form-container sign-up-container">
			<form action="<?php echo base_url('insert_register') ?>" method="post">
				<h1>Registrasi Member</h1>

				<span>Belanja lebih nyaman sebagai member.</span>
				<input type="text" placeholder="Nama" name="nama_member" required oninvalid="this.setCustomValidity('nama masih kosong')" oninput="setCustomValidity('')" />
				<input type="email" placeholder="Email" name="email" required oninvalid="this.setCustomValidity('email masih kosong atau belum sesuai')" oninput="setCustomValidity('')" />
				<input type="password" placeholder="Password" name="password" required oninvalid="this.setCustomValidity('password masih kosong')" oninput="setCustomValidity('')" />
				<button>Daftar</button>
			</form>
		</div>
		<div class="form-container sign-in-container">
			<form method="POST" action="<?php echo base_url("user/home/check_login"); ?>">
				<h1>Login</h1>
				<span>masuk ke akun member Anda</span>
				<input type="email" placeholder="Email" name="email" required oninvalid="this.setCustomValidity('email masih kosong atau belum sesuai')" oninput="setCustomValidity('')" />
				<input type="password" placeholder="Password" name="password" required oninvalid="this.setCustomValidity('password masih kosong')" oninput="setCustomValidity('')" />
				<button>Log In</button>
			</form>
		</div>
		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-left">
					<h1>Welcome Back Sam!</h1>
					<p>sudah punya akun member?</p>
					<button class="ghost" id="signIn">Log In</button>
				</div>
				<div class="overlay-panel overlay-right">
					<h1>Hello, Sam!</h1>
					<p>Belum terdaftar member? </p>
					<button class="ghost" id="signUp">Daftar</button>
				</div>
			</div>
		</div>
	</div>
</body>

<script>
	const signUpButton = document.getElementById('signUp');
	const signInButton = document.getElementById('signIn');
	const container = document.getElementById('container');

	signUpButton.addEventListener('click', () => {
		container.classList.add("right-panel-active");
	});

	signInButton.addEventListener('click', () => {
		container.classList.remove("right-panel-active");
	});
</script>

</html>