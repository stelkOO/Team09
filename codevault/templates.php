<?php
function nav() {
    ?> 
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
	
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark py-3">
        <div class="container-fluid d-flex justify-content-center">
            <a class="navbar-brand d-flex align-items-center" href="index.php">
                <i class="fa-solid fa-house fa-lg me-2"></i> <span class="fw-bold">CodeVault</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav text-center">
                    <?php if (is_admin_value()) { ?>
                         <li class="nav-item">
							  <a class="nav-link" href="admin_index.php" onclick="closeNavbar()">Admin</a>
							  <div class="dropdown">
								<a href="admin_index.php">Értékelés</a>
								<a href="admin_reports.php">Reportok</a>
								<a href="admin_users.php">Felhasználók</a>
							  </div>
						</li>
						
						
                    <?php } ?>

                    <li class="nav-item">
                        <a class="nav-link" href='upload_request.php' onclick="closeNavbar()">
                            <i class="fa-solid fa-plus me-1"></i> Feltöltés
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="my_purchases.php" onclick="closeNavbar()">
                            <i class="fa-solid fa-cart-shopping me-1"></i> Vásárlásaim
                        </a>
                    </li>

                   
                    <li class="nav-item">
                        <a class="nav-link" href='chats.php' onclick="closeNavbar()">
                            <i class="fas fa-comment"></i>  Üzenetek
                        </a>
                    </li>
					

                    <li class="nav-item">
                       
						<a class="nav-link" href="user_profile.php?id=<?php echo get_user()['id']; ?>" onclick="closeNavbar()">

                            <i class="fa-solid fa-circle-user fa-lg me-1"></i> <?= get_user()['username']; ?>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href='notifications.php' onclick="closeNavbar()">
                            <i class="fa-solid fa-bell"></i>
                            <span class='badge'><?= unseen_notifications(); ?></span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="report.php" class="nav-link text-danger">
                            <i class="fas fa-bug"></i> Hibabejelentés
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-danger" href='logout.php' onclick="closeNavbar()">
                            <i class="fa-solid fa-right-from-bracket me-1"></i> Kijelentkezés
                        </a>
                    </li>
					<li class="nav-item">
                        <a class="nav-link" href='contacts.php' onclick="closeNavbar()">
                            Kapcsolat
                        </a>
                    </li>
					 <li class="nav-item">
                        <a class="nav-link" href='credit_page.php' onclick="closeNavbar()">
                            <i class="fa-solid fa-coins me-1"></i> <?= get_user()['token']; ?> C
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <script>
        function closeNavbar() {
            var navbar = document.getElementById("navbarNav");
            if (navbar.classList.contains("show")) {
                navbar.classList.remove("show");
            }
        }

        document.addEventListener('DOMContentLoaded', function () {
        const toggle = document.getElementById('adminToggle');
        const menu = document.getElementById('adminMenu');
        const dropdown = toggle.closest('.custom-dropdown');

        toggle.addEventListener('click', function (e) {
            e.preventDefault();
            dropdown.classList.toggle('show');
        });

        
        document.addEventListener('click', function (e) {
            if (!dropdown.contains(e.target)) {
            dropdown.classList.remove('show');
            }
        });
        });
    </script>

    <?php 
    cookies();
}

function kereso() {
    ?>
    <form id="searchForm" method="POST" onsubmit="return false;">
        <input type="text" id="searchInput" name="search" placeholder="Keresés a leírásban..." onkeyup="searchRequests()">
    </form>

    <div id="results"></div>

    <script>
        function searchRequests() {
            var keresett = document.getElementById("searchInput").value;

            $.ajax({
                url: "engine_sites/search.php",
                method: "POST",  
                data: { search: keresett },  
                success: function(response) {
                    document.getElementById("results").innerHTML = response;
                }
            });
        }
    </script>
    <?php
}

function filter() {
    echo "
        <form action='index.php' method='post' class='filter-form'>
            <div class='filter-container'>
                <input type='text' name='search' class='filter-search' placeholder='Keresés...' onkeypress='if(event.key === \"Enter\") handleSearch();'>
                
                <select name='filter' class='filter-select'>
                    <option value='empty'>Üres</option>
                    <option value='python'>Python</option>
                    <option value='javascript'>javascript</option>
                    <option value='sql'>sql</option>
                    <option value='css'>css</option>
                    <option value='csharp'>csharp</option>
                </select>

                <select name='sort_by' class='filter-select'>
                    <option value='date_desc'>Dátum (Csökkenő)</option>
                    <option value='date_asc'>Dátum (Növekvő)</option>
                    <option value='price_asc'>Ár (Növekvő)</option>
                    <option value='price_desc'>Ár (Csökkenő)</option>
                </select>

                <input type='number' name='price_filter' class='filter-price' placeholder='Min. ár' min='0' step='1'>

                <input type='submit' value='Szűrők alkalmazása' name='btn' class='filter-btn'>
                <input type='submit' value='Szűrők törlése' name='clear_filters' class='filter-btn'>
            </div>
        </form>
    ";
}

function cookies() {
    ?>
    <div id="cookie-banner">
        <span>Ez a webhely sütiket használ a jobb böngészési élmény garantálása érdekében. Az oldal használatával beleegyezik a sütik használatába.</span>
        <button onclick="acceptCookies()">Elfogadom</button>
    </div>

    <script>
        function acceptCookies() {
            document.getElementById('cookie-banner').style.display = 'none';
            localStorage.setItem('cookiesAccepted', 'true');
        }

        window.onload = function() {
            if (localStorage.getItem('cookiesAccepted')) {
                document.getElementById('cookie-banner').style.display = 'none';
            }
        }
    </script>
    <?php
}
?>
