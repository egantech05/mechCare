<?php
require_once 'dbConnection.php'; 


$search= $_GET['searchEquipment'] ?? '';

if ($search !== ''){
    $filter=$conn->prepare("SELECT * FROM equipmentDB WHERE name LIKE ? OR model LIKE ? OR manufacturer LIKE ? OR type LIKE ? ");
    $like = "%{$search}%";
    $filter->bind_param("ssss", $like,$like,$like,$like);
    $filter->execute();
    $equipmentList = $filter->get_result();
} else{
     $equipmentList =  $conn->query("SELECT * FROM equipmentDB;");
}

?>

<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <title>MachCare</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

    <header class="mainTitle">
        <div>
            MACHCARE
        </div>
    </header>

	<div class="navigationRow">
		<a href="index.php" style="text-decoration: none;">
			<div class="navButton">
				<div class="navButtonComponents">
					<img src="img/dashboard.svg" />
					<div class="navText"> Dashboard</div>
				</div>
			</div>
		</a>
		<a href="equipmentPage.php" style="text-decoration: none;">
			<div class="navButton">
				<div class="navButtonComponents">
					<img src="img/equipment.svg" />
					<div class="navText"> Equipment</div>
				</div>
			</div>
		</a>
		<a href="activitiesPage.php" style="text-decoration: none;">
			<div class="navButton">
				<div>
					<img src="img/activities.svg" />
					<div class="navText"> Activities</div>
				</div>
			</div>
		</a>
		<a href="createLogPage.php" style="text-decoration: none;">
			<div class="navButton">
				<div>
					<img src="img/create-log.svg" />
					<div class="navText"> Create Log</div>
				</div>
			</div>
		</a>
		<a href="createEquipmentPage.php" style="text-decoration: none;">
			<div class="navButton">
				<div>
					<img src="img/create-equipment.svg" />
					<div class="navText"> Create Equipment</div>
				</div>
			</div>
		</a>
	</div>


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




</body>

</html>