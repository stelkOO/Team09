<?php
require "config.php";
require "functions.php";
is_landed();
// Ha már van id cookie átirányítás az index.php oldalra
if (isset($_COOKIE['userid'])) {
    header("Location:index.php");
   
}

// Ha a link üres, nincs site változó a linkben
if ($_GET['site'] != 'regist' && $_GET['site'] != 'login') {
    header("Location:login.php?site=regist");
    
}

// bejelentkezés 
if (isset($_POST['login'])) {
    $felhasznalo_n = $_POST['email'];
    $felhasznalo_j = $_POST['password'];

    
    $lekerdezes = $conn->query("SELECT * FROM users WHERE email='$felhasznalo_n'");
    
  
    if (mysqli_num_rows($lekerdezes) > 0) {
        $felhasznalo = $lekerdezes->fetch_assoc();
       
        if (password_verify($felhasznalo_j, $felhasznalo['password'])) {
           
            setcookie('userid', $felhasznalo['id'], time() + (86400 * 30), "/"); 

           
            header("Location: index.php");
           
        } else {
			
          
            echo "<script>alert('Helytelen jelszó!')</script>";
        }
    } else {
        
        echo "<script>alert('Hibás email-cím!')</script>";
    }
}


// regisztráció 
if (isset($_POST['regist_btn'])) {
    if ($_POST['r_password1'] === $_POST['r_password2']) {
        $t_felhasznalo = $conn->query("
    SELECT users.*, profile_requests.*
    FROM users
    INNER JOIN profile_requests ON users.email = profile_requests.email
    WHERE users.email = '{$_POST['r_email']}'");

        if (mysqli_num_rows($t_felhasznalo) > 0) {
            echo "<script>alert('Már létezik ilyen emaillel felhasználó');</script>";
        } else {
			
			//adatok feltöltése
            $password = password_hash($_POST['r_password1'], PASSWORD_DEFAULT);
            $conn->query("INSERT INTO users VALUES(id, '$_POST[r_username]','$password',0,'$_POST[r_email]', 10,'live')");
        
			

            $t_userid = $conn->query("SELECT * FROM users WHERE email='$_POST[r_email]'");
            $userid = $t_userid->fetch_assoc();
			 setcookie('userid', $userid['id'], time() + (86400 * 30), "/"); 
               alert_link("Sikeres regisztráció","index.php");
            
        }
    } else {
        echo "<script>alert('Nem egyezik a két jelszó');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo ($_GET['site'] == 'login') ? 'Bejelentkezés' : 'Regisztráció'; ?>
    </title>
	<link rel="icon" type="image/webp" href="files/img/logo.webp">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body class="login-page d-flex justify-content-center align-items-center min-vh-100" style=" background-image: url('https://www.transparenttextures.com/patterns/cubes.png'); background-color:gray;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="login-wrapper">
                <div class="card p-4 shadow login-card">
                    <!--Bejelentkezés rész-->
                    <?php if ($_GET['site'] == 'login') { ?>
                        <h2 class="text-center login-title">Bejelentkezés</h2>
                        <form action="login.php?site=login" method="post" class="login-box">
                            <div class="mb-3">
                                <label for="username" class="form-label">Email:</label>
                                <input type="text" class="form-control login-input" id="username" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Jelszó:</label>
                                <input type="password" class="form-control login-input" id="password" name="password" required>
                            </div>
                            <button type="submit" name="login" class="btn btn-primary login-btn w-100">Bejelentkezés</button>
                            <div class="text-center mt-3 reg-footer">
                                <a href="login.php?site=regist">Még nincs fiókom? Regisztráció</a>
                            </div>
                            
                        </form>
                    <!--Regisztráció rész-->
                    <?php } else { ?>
                        <h2 class="text-center login-title">Regisztráció</h2>
                        <form method="post" action="login.php?site=regist">
                            <div class="mb-3">
                                <label for="r_username" class="form-label">Felhasználónév:</label>
                                <input name="r_username" id="r_username" type="text" class="form-control login-input" required>
                            </div>
                            <div class="mb-3">
                                <label for="r_email" class="form-label">Email cím:</label>
                                <input name="r_email" id="r_email" type="email" class="form-control login-input" required>
                            </div>
                            <div class="mb-3">
								<label for="r_password1" class="form-label">Jelszó:</label>
								<input name="r_password1" id="r_password1" type="password" class="form-control login-input" required>
								<div id="password-feedback" class="form-text text-danger"></div>
							</div>

                            <div class="mb-3">
                                <label for="r_password2" class="form-label">Jelszó újból:</label>
                                <input name="r_password2" id="r_password2" type="password" class="form-control login-input" required>
                            </div>
                          <!-- ... az utolsó jelszó mező után: -->
							<div class="mb-3 form-check">
								<input type="checkbox" class="form-check-input" id="aszfCheck">
								<label class="form-check-label" for="aszfCheck">
									Elfogadom az <a href="aszf.html" target="_blank">Általános Szerződési Feltételeket</a>
								</label>
							</div>
							<button name="regist_btn" id="regist_btn" type="submit" class="btn btn-primary login-btn w-100" disabled>Regisztráció</button>


                            <div class="text-center mt-3 reg-footer">
                                <a href="login.php?site=login">Már van fiókom? Bejelentkezés</a>
                            </div>
                        </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</body>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<script>
const passwordInput = document.getElementById("r_password1");
const feedback = document.getElementById("password-feedback");
const registBtn = document.getElementById("regist_btn");
const aszfCheckbox = document.getElementById("aszfCheck");

function validateForm() {
    const password = passwordInput.value;
    let messages = [];

    if (password.length < 8) {
        messages.push("Legalább 8 karakter hosszú legyen.");
    }
    if (!/[A-Z]/.test(password)) {
        messages.push("Tartalmazzon nagybetűt.");
    }
    if (!/[a-z]/.test(password)) {
        messages.push("Tartalmazzon kisbetűt.");
    }
    if (!/[0-9]/.test(password)) {
        messages.push("Tartalmazzon számot.");
    }
    if (!/[^A-Za-z0-9]/.test(password)) {
        messages.push("Tartalmazzon speciális karaktert.");
    }

    if (messages.length === 0) {
        feedback.textContent = "✅ Erős jelszó.";
        feedback.classList.remove("text-danger");
        feedback.classList.add("text-success");
    } else {
        feedback.textContent = "❌ " + messages.join(" ");
        feedback.classList.remove("text-success");
        feedback.classList.add("text-danger");
    }

  
    registBtn.disabled = messages.length > 0 || !aszfCheckbox.checked;
}


passwordInput.addEventListener("input", validateForm);
aszfCheckbox.addEventListener("change", validateForm);
</script>


