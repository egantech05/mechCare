<?php
require_once 'dbConnection.php'; 

// 1) Read search term from GET
$search = $_GET['searchEquipment'] ?? '';

// 2) Run the correct SELECT query using PDO
if ($search !== '') {
    $stmt = $conn->prepare(
        "SELECT * FROM equipmentDB
         WHERE name LIKE :term
            OR model LIKE :term
            OR manufacturer LIKE :term
            OR type LIKE :term"
    );

    $term = '%' . $search . '%';
    $stmt->execute([':term' => $term]);
    $equipmentList = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    $stmt = $conn->query("SELECT * FROM equipmentDB");
    $equipmentList = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="styles.css">
</head>


<body>

	<header class="mainTitle"
        style="display:flex;
               align-items:center;
               justify-content:space-between;
               padding:16px;
               background-color:#1E1E1E;
               color:#31FFD2;
               font-size:32px;
               font-weight:bold;
			   border-radius:16px;">
		<div>
			EQARE
		</div>
		<img class="bulb" src="img/bulb.svg" style="display:block; height:32px;" />
	</header>

	<div id="navBar"></div>


    <div class="content">
        <div class="pageTitle">Equipment</div>


        <form method="get" class="searchBar">
            <input type="text" name="searchEquipment" class="searchInput" placeholder="Search.." value="<?= $search?>" />
            <button type="submit">
                <img src="img/search.svg" width="30px" />
            </button>
        </form>
        <div class="searchResults">
            <div class="equipmentList">

<?php
    foreach($equipmentList as $row){
?>
        <div class="eqCard">
            <img src="img/machine.svg" />
            <div class="equipmentName"><?=$row['name']?></div>

                    <div class="infoBox">
                        <div class="infoLabel">Model</div>
                        <div class="infoValue"><?=$row['model']?></div>
                        <div class="infoLabel">Manufacturer</div>
                        <div class="infoValue"><?=$row['manufacturer']?></div>
                        <div class="infoLabel">Type</div>
                        <div class="infoValue"><?=$row['type']?></div>
                    </div>


        </div>
<?php
    }
?>


            </div>
        </div>
    </div>

    <script>
     
        async function loadNavBar(file){
            const res=await fetch(file);
            const html= await res.text();
            document.getElementById('navBar').innerHTML=html;
        }

        loadNavBar("nav.html");
		const changeTheme = document.querySelector('.bulb');
		let toggle = false;

		changeTheme.addEventListener('click', () => {
			toggle = !toggle;
			document.body.style.backgroundColor = toggle ? '#1E1E1E' : '#ffffff';
		});
    </script>


</body>

</html>