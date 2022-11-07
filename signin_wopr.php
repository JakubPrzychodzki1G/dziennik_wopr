<!DOCTYPE html>
<html lang="en">
  <head>
  	<title>Wopr_dziennik</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">

	</head>
	<body class="bg-info">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="wrap">
						<div class="img" style="background-image: url(images/wopr-logo.jpg);"></div>
						<div class="login-wrap p-4 p-md-5">
			      	<div class="d-flex" >
			      		<div class="w-100" style="display:flex; justify-content: center; align-items: center;">
			      			<h3 class="mb-4">Zarejestruj się</h3>
			      		</div>

			      	</div>
					<form action="includes/signup_i.php" method="post" class="signin-form">
			      		<div class="form-group mt-3">
			      			<input type="text" class="form-control" name="login_sign" id="login_" required>
			      			<label class="form-control-placeholder" for="username">Login:</label>
			      		</div>
                        <div class="form-group mt-3">
			      			<input type="text" class="form-control" name="imie_sign" id="login_" required>
			      			<label class="form-control-placeholder" for="username">Imie:</label>
			      		</div>
                        <div class="form-group mt-3">
			      			<input type="text" class="form-control" name="nazwisko_sign" id="login_" required>
			      			<label class="form-control-placeholder" for="username">Nazwisko:</label>
			      		</div>
                        <div class="form-group">
		                    <input id="password-field" type="password" name="haslo_sign" id="haslo_" class="form-control" required>
		                    <label class="form-control-placeholder" for="password" >Hasło:</label>
		                    <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
		                </div>
		                <div class="form-group">
		                    <input id="password-field1" type="password" name="haslo_re" id="haslo_" class="form-control" required>
		                    <label class="form-control-placeholder" for="password" >Hasło:</label>
		                    <span toggle="#password-field1" class="fa fa-fw fa-eye field-icon toggle-password"></span>
		                </div>
		                <div class="form-group">
		            	    <button type="submit" name="submit" class="form-control btn rounded submit px-3" style="background-color: red;">Zaloguj się</button>
		                </div>
		          </form>
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>