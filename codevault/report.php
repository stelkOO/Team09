<?php
require "config.php";
require "templates.php";
require "functions.php";
is_login();
report_isset();
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<link rel="icon" type="image/webp" href="files/img/logo.webp">
    <title>CodeVault</title>
	<?php nav(); ?>
</head>
<body>

<h1 class="text-center my-4 text-light">Problémába ütköztél? Értesíts bennünket</h1>
<div class="container d-flex justify-content-center mb-5">
  <form id="report-form" action="report.php" method="post" class="w-50 bg-dark text-light p-4 rounded shadow-lg">
    
    <div class="mb-3">
      <label for="category" class="form-label">Probléma típusa</label>
      <select name="category" id="category" class="form-select bg-secondary text-light border-0" required>
        <option value="" disabled selected>Válassz egy kategóriát...</option>
        <option value="fizetes">Fizetéssel kapcsolatos probléma</option>
        <option value="feltoltes">Fájl feltöltéssel kapcsolatos probléma</option>
        <option value="fiok">Fiókkal kapcsolatos probléma</option>
        <option value="egyeb">Egyéb</option>
      </select>
    </div>

    <div class="mb-3">
      <label for="problem" class="form-label">Üzenet</label>
      <textarea name="problem" id="problem" rows="5" class="form-control bg-secondary text-light border-0" placeholder="Írd le részletesen, milyen problémába ütköztél..." required></textarea>
    </div>

    <button type="submit" name="btn" class="btn btn-warning w-100">Beküldés</button>
  </form>
</div>

</body>
</html>
