 
 <?php
 require "config.php";
	
function forgot_password($to) {
    global $conn;
	
    
    $reset_code = code();
	$user = get_data("select * from users where email='$to'");
	$username = get_data("select * from users where email='$to'")['username'];

     $conn->query("insert into profile_codes  values (id,$user[id],'$reset_code','not_used')");

    $subject = "Elfelejtett jelszó helyreállítása";
   $message = "
<html>
<head>
  <title>Elfelejtett jelszó helyreállítása</title>
  <style>
    body {
      background-color: #f4f4f4;
      font-family: Arial, sans-serif;
      color: #333;
      padding: 20px;
    }
    .container {
      background-color: #ffffff;
      border: 1px solid #ccc;
      padding: 20px;
      border-radius: 10px;
      max-width: 600px;
      margin: auto;
    }
    h2 {
      color: #0b58a6;
    }
    a.button {
      background-color: #0b58a6;
      color: white;
      padding: 10px 20px;
      text-decoration: none;
      border-radius: 5px;
      display: inline-block;
      margin-top: 20px;
    }
    p {
      font-size: 16px;
      line-height: 1.5;
    }
  </style>
</head>
<body>
  <div class='container'>
    <h2>Jelszó visszaállítása</h2>
    <p>Kedves $username!</p>
    <p>Kérjük, kattintson az alábbi gombra a jelszava visszaállításához:</p>
    <a class='button' href='https://team09.project.scholaeu.hu/forgot_pass.php?code=$reset_code'>Jelszó visszaállítása</a>
    <p style='margin-top: 30px;'>Ha nem Ön kérte ezt az e-mailt, egyszerűen hagyja figyelmen kívül.</p>
    <p>Üdvözlettel,<br><strong>CodeVault csapata</strong></p>
  </div>
</body>
</html>
";


    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
    $headers .= "from: phpora2024@gmail.com" . "\r\n";

    if(mail($to, $subject, $message, $headers)) {
        echo "Az e-mail sikeresen elküldve.";
    } else {
        echo "Hiba történt az e-mail küldése során.";
    }
}
function get_messages($from, $to) {
    global $conn;

    $sql = $conn->query("select * from messages 
                         where (from_id = $from AND to_id = $to)
                            OR (from_id = $to AND to_id = $from)
                         ORDER BY created_at ASC");

    echo "<div class='message-container' id='messageContainer'>";
    while ($msg = $sql->fetch_assoc()) {
        $class = $msg['from_id'] == $from ? 'my-msg' : 'to-msg';
        $time = date('H:i', strtotime($msg['created_at']));
        echo "<div class='$class'>
                <div>" . htmlspecialchars($msg['message']) . "</div>
                <small class='timestamp'>$time</small>
              </div>";
    }

}



function message_send($from, $to) {
    global $conn;

    if (isset($_POST['send_btn'])) {
        $msg = trim($_POST['message_field']);
        if ($msg !== '') {
            $safe_msg = mysqli_real_escape_string($conn, $msg);
            $conn->query("INSERT INTO messages (from_id, to_id, message) 
                          VALUES ($from, $to, '$safe_msg')");
            header("Location: chat.php?id=$to");
            exit;
        }
    }
}


function regist_confirm($to){
    global $conn;

    $reset_code = code();
    $user = get_data("select * from profile_requests where email='$to'");
    $username = $user['username'];

    $conn->query("insert into profile_codes values (id, {$user['id']}, '$reset_code', 'not_used')");

    $subject = "Profil aktiválása";
    $message = "
    <html>
    <head>
      <title>Profil aktiválása</title>
      <style>
        body {
          background-color: #f4f4f4;
          font-family: Arial, sans-serif;
          color: #333;
          padding: 20px;
        }
        .container {
          background-color: #ffffff;
          border: 1px solid #ccc;
          padding: 20px;
          border-radius: 10px;
          max-width: 600px;
          margin: auto;
        }
        h2 {
          color: #0b58a6;
        }
        a.button {
          background-color: #0b58a6;
          color: white;
          padding: 10px 20px;
          text-decoration: none;
          border-radius: 5px;
          display: inline-block;
          margin-top: 20px;
        }
        p {
          font-size: 16px;
          line-height: 1.5;
        }
      </style>
    </head>
    <body>
      <div class='container'>
        <h2>Profil aktiválása</h2>
        <p>Kedves $username!</p>
        <p>Kérjük, kattintson az alábbi gombra a profilja aktiválásához:</p>
        <a class='button' href='https://team09.project.scholaeu.hu/engine_sites/activate_profile.php?code=$reset_code'>Profil aktiválása</a>
        <p style='margin-top: 30px;'>Ha Ön nem regisztrált, nyugodtan hagyja figyelmen kívül ezt az üzenetet.</p>
        <p>Üdvözlettel,<br><strong>CodeVault csapata</strong></p>
      </div>
    </body>
    </html>
    ";

    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    $headers .= "From: phpora2024@gmail.com\r\n";

    if(mail($to, $subject, $message, $headers)) {
        echo "<script>alert('Az e-mail sikeresen elküldve.')</script>";
    } else {
        echo "Hiba történt az e-mail küldése során.";
    }
}




function is_admin(){
	
	if(get_data("select * from users where id=$_COOKIE[userid]")['type'] !=1){
		alert_link("Nincs jogosultságod!","index.php");
	
	}
	else if(get_data("select * from users where id=$_COOKIE[userid]")['status'] =='suspended'){
		alert_link("Fiókod fel lett függesztve!","login.php");
	}
}
function is_admin_value(){
	if(get_data("select * from users where id=$_COOKIE[userid]")['type'] !=1){
		return false;
	
	}else{
		return true;
	}
}
function report_isset(){
	global $conn;
	if(isset($_POST['btn'])){
		$email= get_user()['email'];
		$conn->query("insert into reports values(id, '$email', '$_POST[problem]')");
		
		alert_link("Sikeres hibajelentés","index.php");
		
	}
	
}
function filter_value() {
    $filter = '';
    $conditions = [];
    $order = " ORDER BY id DESC";

    if (isset($_POST['btn'])) {
    
        if (!empty($_POST['filter']) && $_POST['filter'] !== 'empty') {
            $language = $_POST['filter'];
            $conditions[] = "language = '" . addslashes($language) . "'";
        }

      
        if (!empty($_POST['search'])) {
            $search = addslashes($_POST['search']);
           $conditions[] = "(description LIKE '%$search%' OR name LIKE '%$search%')";

        }

     
        if (isset($_POST['price_filter']) && is_numeric($_POST['price_filter'])) {
            $price = $_POST['price_filter'];
            $conditions[] = "token >= " . (int)$price; 
        }

     
        if (isset($_POST['sort_by'])) {
            if ($_POST['sort_by'] == 'date_asc') {
                $order = " ORDER BY id ASC";  
            } elseif ($_POST['sort_by'] == 'date_desc') {
                $order = " ORDER BY id DESC"; 
            } elseif ($_POST['sort_by'] == 'price_asc') {
                $order = " ORDER BY token ASC";
            } elseif ($_POST['sort_by'] == 'price_desc') {
                $order = " ORDER BY token DESC"; 
            }
        }

        
        if (!empty($conditions)) {
            $filter = " where " . implode(" AND ", $conditions);
        }
    }

    return $filter . $order;
}



function load_requests($keresett) {
    global $conn;
    
    $lekerdezes = "select * from request $keresett";
    
    $lekerdezes = $conn->query($lekerdezes);
    if(mysqli_num_rows($lekerdezes) == 0){
        echo "<div class='box'>
            Nincs találat!
        </div>";
    }

    echo "<div class='requests-container'>";
    while ($request = $lekerdezes->fetch_assoc()) {
        $requestname = htmlspecialchars($request['name']);
        $description = htmlspecialchars(substr($request['description'], 0, 20)) . (strlen($request['description']) > 20 ? '...' : '');

        echo "<div class='doboz'>";
        echo "<a href='file.php?id={$request['id']}'><div class='code'>
                <h2>{$requestname}</h2>
              </div></a>
              <div class='leiras'><p>{$description}</p></div>
              <a href='file.php?id={$request['id']}'>" . $request['token'] . " token</a>
			  <div class='language_type'>".$request['language']."</div> ";
        echo "</div>";
    }
    echo "</div>";
	exit();
}
function load_reports_admin() {
    echo "<h2>Admin page!</h2>";
    global $conn;

    // Ha jött törléskérés
    if (isset($_POST['delete_report_id'])) {
        $id = intval($_POST['delete_report_id']);
        $conn->query("DELETE from reports where id = $id");
        echo "<div class='admin_file'>Jelentés törölve (ID: $id)!</div>";
    }

    $lekerdezes = "select * from reports ORDER BY id DESC";
    $eredmeny = $conn->query($lekerdezes);

    if (mysqli_num_rows($eredmeny) == 0) {
        echo "<div class='admin_file'>Nincs bejelentés!</div>";
        return;
    }

    echo "<div class='admin_file'>Összes jelentés: " . mysqli_num_rows($eredmeny) . "</div>";

    while ($sor = $eredmeny->fetch_assoc()) {
        echo "<div class='admin_request'>";
        echo "<strong>Email:</strong> " . $sor['email']. "<br>";
        echo "<strong>Jelentés:</strong> " .$sor['report_text'] . "<br>";

       
        echo "<form method='post' style='margin-top: 5px;'>
                <input type='hidden' name='delete_report_id' value='{$sor['id']}'>
                <input type='submit' value='Törlés' style='background-color: #c0392b; color: white; border: none; padding: 5px 10px; border-radius: 5px; cursor: pointer;'>
              </form>";

        echo "</div><hr>";
    }
}

function load_users_admin() {
    global $conn;
	
	

    echo "<h2>Felhasználók kezelése</h2>";

    if (isset($_POST['suspend_user'])) {
        $userId =$_POST['user_id'];
        $conn->query("update users SET status = 'suspended' where id = $userId");
        echo "<div class='success'>Felhasználó felfüggesztve!</div>";
    }

    if (isset($_POST['unsuspend_user'])) {
        $userId =$_POST['user_id'];
        $conn->query("update users SET status = 'live' where id = $userId");
        echo "<div class='success'>Felfüggesztés visszavonva!</div>";
    }

    if (isset($_POST['change_type'])) {
        $userId = $_POST['user_id'];
        $newType = ($_POST['new_type'] == '1') ? '1' : '0';
        $conn->query("update users SET type = '$newType' where id = $userId");
        echo "<div class='success'>Típus megváltoztatva: $newType</div>";
    }

    if (isset($_POST['modify_token'])) {
        $userId = $_POST['user_id'];
        $change = $_POST['token_change'];
        $conn->query("update users SET token = token + ($change) where id = $userId");
        echo "<div class='success'>Token érték módosítva</div>";
    }

    $result = $conn->query("select * from users");

    if ($result->num_rows == 0) {
        echo "<div class='admin_file'>Nincs felhasználó az adatbázisban.</div>";
        return;
    }

    while ($user = $result->fetch_assoc()) {
        echo "<div class='admin_user'>
                <strong>{$user['username']}</strong> ({$user['email']})<br>
                Állapot: {$user['status']}<br>
                Típus: {$user['type']}<br>
                Token: " .$user['token'] . "<br>";

        $uid = $user['id'];
        $ratings = $conn->query("select * from ratings where to_id = $uid");
		
        if ($ratings->num_rows > 0) {
			$ratings_db = $ratings->num_rows;
			$rating_points = 0;
            echo "<div class='user_ratings'>
                    <strong>Értékelések:</strong><ul>";
            while ($rating = $ratings->fetch_assoc()) {
				$from_rating = get_data("select * from users where id= $rating[from_id]")['email'];
                echo "<li><em>{$rating['description']}</em> - " .$rating['points']. " ★ - (  " .$from_rating.")</li>";
				$rating_points+= $rating['points'];
            }
            echo "Átlagos értékelés:".number_format($rating_points/$ratings_db,1)." </ul></div>";
        } else {
            echo "Nincs értékelés.";
        }

        if ($user['status'] === 'suspended') {
            echo "<form method='post'>
                    <input type='hidden' name='user_id' value='{$user['id']}'>
                    <input type='submit' name='unsuspend_user' value='Felfüggesztés visszavonása'>
                  </form>";
        } else {
            echo "<form method='post'>
                    <input type='hidden' name='user_id' value='{$user['id']}'>
                    <input type='submit' name='suspend_user' value='Felfüggesztés'>
                  </form>";
        }

        echo "<form method='post'>
                <input type='hidden' name='user_id' value='{$user['id']}'>
                <select name='new_type'>
                    <option value='0'" . ($user['type'] == '0' ? " selected" : "") . ">Felhasználó</option>
                    <option value='1'" . ($user['type'] == '1' ? " selected" : "") . ">Admin</option>
                </select>
                <input type='submit' name='change_type' value='Profil váltás'>
              </form>";

        echo "<form method='post'>
                <input type='hidden' name='user_id' value='{$user['id']}'>
                <input type='number' name='token_change' placeholder='Token változás'>
                <input type='submit' name='modify_token' value='Token módosítás'>
              </form>";

        echo "</div><hr>";
    }
	exit();
}






function load_requests_admin() {
	echo"<h2>Admin page!</h2>";
    global $conn;
	
    
   
    
      $lekerdezes = "select * from files where review=''";
    

    $lekerdezes = $conn->query($lekerdezes);
	if(mysqli_num_rows($lekerdezes) ==0){
		echo"<div class='admin_file'>Nincs több értékelendő fájl!</div>";
		exit();
	}
	echo "Hátramaradt fájlok: ".mysqli_num_rows($lekerdezes);
	$file = $lekerdezes->fetch_assoc();
	if(isset($_POST['btn'])){
		$conn->query("update files SET review='$_POST[review]', stars=$_POST[stars] where id=$file[id]");
		alert_link("Sikeres feltöltés!","admin_index.php");
		
	}
	
	
	
	
	echo "<div class='admin_file'>";
		echo $file['filename'];
	echo "</div>";
		echo "<div class='admin_request'>";
		echo get_data("select * from request where id = $file[requestid]")['name'];
		echo get_data("select * from request where id = $file[requestid]")['description'];
	echo "</div>";
	echo"<a href='file_download.php?id=$file[id]'>Fájl letöltése</a>";

	echo"<form action='admin_index.php' method='post'>
	<input type='text' placeholder='fájl értékelése' name='review' required>
	<select name='stars' required>
	<option value='1'>1</option>
	<option value='2'>2</option>
	<option value='3'>3</option>
	<option value='4'>4</option>
	<option value='5'>5</option>
	</select>
	<input type='submit' name='btn' value='Értékelés'>
	</form>
	
	
	";
	 
	
	
exit();
   
}

function load_notifications(){
	global $conn;
	$userid = get_user()['id'];
	$sql = $conn->query("select * from notifications where to_id=$userid");
	while($notification = $sql->fetch_assoc()){
		if($notification['status'] == 0){
			echo "<div class='notification_unseen'>";
			echo $notification['content'];
			echo "</div>";
		}else{
			
			echo "<div class='notification_seen'>";
			echo $notification['content'];
			echo "<a href='$notification[link]'>Link</a>";
			
			echo "</div>";
		}
		
	}
	
}
function see_notifications(){
	global $conn;
	$userid = get_user()['id'];
	$sql = $conn->query("select * from notifications where to_id=$userid and status=0");
	while($notification = $sql->fetch_assoc()){
		$conn->query("update notifications set status =1 where id=$notification[id]");
		
	}
	
}

function unseen_notifications(){
	global $conn;
	$userid = get_user()['id'];
	$sql = $conn->query("select * from notifications where to_id=$userid and status=0");
	$count = mysqli_num_rows($sql);
	return $count;
}

function upload_notification($from, $to, $content, $link){
    global $conn;

    $safe_content = mysqli_real_escape_string($conn, $content);
    $safe_link = mysqli_real_escape_string($conn, $link);

    $conn->query("INSERT INTO notifications VALUES (id,$from, $to, '$safe_content', 0, '$safe_link')");
}


function load_reviews($keresett){
	global $conn;
	$lekerdezes  = $conn->query($keresett);
	 while ($review = $lekerdezes->fetch_assoc()) {
        $review_writer = get_data("select * from users where id=$review[from_id]")['username'];
        $description = $review['description'];

        echo "<div class='doboz'>";
        echo "<a href='user_profile.php?id={$review['from_id']}'><div class='code'>
                <h2>{$review_writer}</h2>
              </div></a>
              <div class='leiras'><p>{$description}</p></div>";
        echo "</div>";
    }
    echo "</div>";
	
}
function load_files($keresett) {
    global $conn;

    
    $lekerdezes = $keresett;
    if (empty($keresett)) {
      $lekerdezes = "select * from files order by upload_date desc";
    }

    $lekerdezes_files = $conn->query($lekerdezes);
	
    echo "<div class='requests-container'>";
    while ($file = $lekerdezes_files->fetch_assoc()) {
    
        $description =$file['review'];
        $rating =$file['stars'];
		
        echo "<div class='doboz'>";
        echo "<a href='file.php?id={$file['id']}'><div class='code'>
                <h2>{$file['upload_date']}</h2>
              </div></a>
              <div class='leiras'><p>{$description}</p></div>
              <div class='leiras'><p>{$rating} /5 <i class='fa-regular fa-star'></i></p></div>";
             
			  $bought = false;
			  $f_purchases = $conn->query("select * from buy_history where file_id=$file[id]");
			  while($file_purchased = $f_purchases->fetch_assoc()){
				  if($file_purchased['buyer_id'] == get_user()['id']){
					  $bought = true;
				  }
				  
			  }
			  if($bought == false){
				echo " <div class='buy_btn'><a href='confirm.php?file_id=$file[id]'>Megvásárlom</a></div>

			  ";
			  }else{
				 echo "<form action='file.php?id={$_GET['id']}&download_id={$file['id']}' method='post'>
				<input type='submit' name='download_btn' value='Letöltés'>
				</form>";

			  }
        echo "</div>";
    }
    echo "</div>";

}

function load_purchases($sql) {
    global $conn;

    if (empty($sql)) {
        $sql = "select * from buy_history ORDER BY date DESC";
    }

    $lekerdezes = $conn->query($sql);


    echo '<div class="cart-container">';

    if ($lekerdezes->num_rows == 0) {
        echo '<p class="no-items">Nincsenek vásárolt fájlok.</p>';
    }

    while ($purchase = $lekerdezes->fetch_assoc()) {
        $file = get_data("select * from files where id=" . $purchase['file_id']);

        if (!$file) {
            echo '<p class="error">Hiba: Nem található fájl az adatbázisban.</p>';
            continue;
        }

        // Ha van fájl leírás, azt használjuk, ha nincs, akkor a fájl nevét írjuk ki
        $fileDescription = !empty($file['description']) ? $file['description'] : "Fájl neve: " . htmlspecialchars($file['filename']);

        echo '
        <div class="cart-item">
            <h2>' . date("Y-m-d", strtotime($purchase['date'])) . '</h2>
            <p>' . htmlspecialchars($fileDescription) . '</p>
            <a href="file.php?id=' . $file['id'] . '" class="download-btn">Letöltés</a>
        </div>';
    }

    echo '</div>';
}

function is_landed(){
	if(!isset($_COOKIE['landed'])){
		header("Location: front_page.php");
		
	}
	
}

/**/
//alert from php
function message($message){
	echo "<script>alert('$message'); </script>";
	
	
}

function is_login(){
    if (!isset($_COOKIE['userid'])) {
        echo "<script>
            alert('Jelentkezz be a folytatáshoz!');
            window.location.href = 'login.php?site=login';
        </script>";
        exit;
    }
	if (get_user()['status'] == 'suspended') {
        echo "<script>
            alert('Fiókod fel lett függesztve!');
            window.location.href = 'contacts_suspended.php';
        </script>";
        exit;
    }
	
}

function alert_link($message,$location){
	echo "<script>
            alert('$message');
            window.location.href = '$location';
        </script>";
        exit;
	
}
function code(){
	global $conn;
	code:
	$characters = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z','0', '1', '2','3', '4', '5', '6', '7', '8', '9' ];
	
	$code ='';
	global $conn;
	for($i=0; $i< 8; $i++){
		$code.=$characters[rand(0,count($characters)-1)];
	}
	
	if(mysqli_num_rows($conn->query("select * from profile_codes where code='$code'")) >0){
		goto code;
	}else{
		return $code;
	}
	
}

function upload_file($request_id){
	global $conn;
	
	   $cel_mappa = "files/file/";
	 // Feltöltött fájl neve
	 $fajl_nev = $_FILES['file-to-upload']['name'];
    
    // Fájl kiterjesztése
    $fajl_tipus = pathinfo($fajl_nev, PATHINFO_EXTENSION);
	$request = get_data("select * from request where id = $request_id");
	
    // meret
    $fajl_merete = $_FILES['file-to-upload']['size'];

   
    $elfogadott_tipusok = ['zip'];

   
    $max_fajl_merete = 20 * 1024 * 1024;

    // Új, egyedi fájl név generálása
    $fajl_nev = uniqid('file_', true) . '.' . $fajl_tipus;
    $cel_fajl = $cel_mappa . $fajl_nev;

    // fájl tipus
    if (!in_array(strtolower($fajl_tipus), $elfogadott_tipusok)) {
        echo "<script>alert('Csak .zip fájlokat tölthetsz fel!');</script>";
    }
    //meret
    elseif ($fajl_merete > $max_fajl_merete) {
        echo "<script>alert( Maximum 10 MB engedélyezett');</script>";
    } 
   
    else {
        // Ellenőrizzük, hogy a fájl van e már
        if (file_exists($cel_fajl)) {
            echo "<script>alert('Próbáld meg kérlek újra!');</script>";
        } else {
            
            $date = date('Y-m-d H:i:s');
            
            // fájl adatai feltöltése az adatbázisba
            $conn->query("INSERT INTO files VALUES (id,$_COOKIE[userid], '$fajl_nev', '$date', $request_id,'',$request[token],'Nincs még értékelve')");

            // fájl áthelyezése a megfelelő mappába
            move_uploaded_file($_FILES['file-to-upload']['tmp_name'], $cel_fajl);
            echo "<script>alert('Sikeres feltöltés!');</script>";
			echo "<script>
            if (confirm('Vissza a főoldalra!')) {
                window.location.href = 'index.php';
            }
        </script>";
        exit;
			
        }
    }
	
}
function submit_review($from_id){
	global $conn;
	$my_user=get_user();
	// $from_user = get_data("select * from users where id=$from_id");
	$has_payment =  false;
	$payments = $conn->query("select * from buy_history where (provider_id=$my_user[id] and buyer_id=$from_id)
	or (provider_id=$from_id and buyer_id=$my_user[id])
	");
	if(mysqli_num_rows($payments) > 0){
		$has_payment = true;
		
	}
	if($has_payment){
		$conn->query("insert into ratings values(id, $_POST[point],'$_POST[description]',$from_id,$my_user[id])");
		alert_link("Sikeres közzététel","index.php");
		
	}else{
		alert_link("Nem található vásárlás","index.php");
		
	}
		
	
	
	
	
}
function user_rating($userid){
	global $conn;
	$points = 0;
	$counter = 0;
	$sql = $conn->query("select * from ratings where to_id=$userid");
	while($rating = $sql->fetch_assoc()){
		$counter+=1;
		$points+=$rating['points'];
		
	}
	return $counter > 0 ? $points/$counter : 0;
	
}
function get_data($lekerdezes){
	global $conn;
	$f_data = $conn->query($lekerdezes);
	$data = $f_data->fetch_assoc();
	return $data;
	
	
}

function new_chat($to,$from){
	global $conn;
	
	$is_blocked = $conn->query("select * from blocked where (from_user=$to and to_user=$from) or (from_user=$from and to_user=$to)");
	if(mysqli_num_rows($is_blocked) > 0){
		alert_link("Ez a művelet nem teljesíthető","index.php");
		exit();
		
	}
	
	$has_conv = $conn->query("select * from chats where (from_user=$to and to_user=$from) or (from_user=$from and to_user=$to)");
	if(mysqli_num_rows($has_conv) > 0){
		alert_link("Már létezik ez a beszélgetés","index.php");
		exit();
		
	}
	$conn->query("insert into chats values(id, $from,$to)");
	
}

function get_chats($user_id) {
    global $conn;

    $chats = $conn->query("select * from chats where from_user = $user_id OR to_user = $user_id GROUP BY from_user, to_user");

    if (!$chats) {
        echo "<p class='text-danger'>SQL hiba: " . $conn->error . "</p>";
        return;
    }

    while ($chat = $chats->fetch_assoc()) {

        // Meghatározzuk, ki a beszélgetőpartner
        if ($chat['from_user'] == $user_id) {
            $other_user_id = $chat['to_user'];
        } else {
            $other_user_id = $chat['from_user'];
        }

        // Lekérjük a partner nevét
        $partner_sql = $conn->query("select username from users where id = $other_user_id");
        if ($partner_sql && $partner_sql->num_rows > 0) {
            $partner = $partner_sql->fetch_assoc();
            $chat_user = htmlspecialchars($partner['username']);

            // Kiírás
            echo "<div class='chat_box'>
                    <a href=\"#\" onclick=\"openChat('$other_user_id'); return false;\" class=\"chat-link\">$chat_user</a>
                  </div>";

		
	   }
    }
	
}



function get_user(){
	global $conn;
	$f_user = $conn->query("select * from users where id = $_COOKIE[userid]");
	$user = $f_user->fetch_assoc();
	return $user;
	
}
function file_payment($file_id,$provider_id,$buyer_id,$credits){
	global $conn;
	$date = date('Y-m-d H:i:s'); 
	$link = "https://team09.project.scholaeu.hu/file.php?id=" . $file_id;
	upload_notification($buyer_id,$provider_id,"Feltöltött fájlod sikeresen megvásárolták!",$link);
	$conn->query("insert into buy_history values(id,$file_id,$provider_id,$buyer_id,$credits,'$date')");
	
	
	
}

function file_download($file_id){
	global $conn;
	$file = get_data("select * from files where id=$file_id");
	$file_path = "files/file/{$file['filename']}";



if (file_exists($file_path)) {

    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . basename($file_path) . '"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file_path));

   
    readfile($file_path);
    exit;
} else {
    echo "Hiba: A fájl nem található!";
}
	
	
	
}




 ?>


 
 
 
 