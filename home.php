<!doctype html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Intensa</title>

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="css/style.css">

	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="javascript/script.js"></script>
</head>
<body>

<div class="short-link">
	<form action="#" id="short-link">
		<div class="form-result"></div>
		<div class="form-row">
			<input type="text" placeholder="Введите ссылку" name="full-link" onkeyup="shortForm.checkInput(this)">
		</div>
		<div class="form-submit">
			<input type="submit" value="Сократить" onclick="return shortForm.submit()">
		</div>
	</form>
</div>

<script>
	var shortForm = new ShortForm("#short-link");
</script>
</body>
</html>