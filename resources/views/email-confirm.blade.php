<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Confirmación de Email</title>
</head>
<body>

	<h2>Disquería</h2>
	<br />		
	<br />
	<h1>Gracias por registrarte!!</h1>
	<br>
	<br>
	<p>Necesitas <a href="{{url("register/confirm/{$user->token}")}}">confirmar tu email!!</a></p>

</body>
</html>

