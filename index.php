<?php
require_once 'dbConnection.php'; 

     $offlineList =  $conn->query("SELECT name,date FROM logDB WHERE status='Offline';");


	 $recentLog =  $conn->query("SELECT * FROM logDB ORDER by date DESC;");

?>

<!DOCTYPE html>

<html>

<head>
	<meta charset="utf-8">
	<title>EQARE</title>
	<link rel="stylesheet" href="styles.css">
</head>

<body>

	<header class="mainTitle">
		<div>
			EQARE
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
		<div class="pageTitle">Dashboard</div>
		<div class="section">
			<div class="subSection">
				<div class="subSectionTitle">
					Offline Equipment
				</div>
				<div class="equipmentList">
<?php 
	foreach($offlineList as $row){
?>
				<div class="equipmentCard">
					<img src="img/machine.svg" />
					<div class="equipmentName"><?=$row['name']?> </div>
					<div class="equipmentSubText"> since </div>
					<div><?=$row['date']?></div>
				</div>

<?php		
	}
?>


				</div>
			</div>

			<div class="subSection">
				<div class="subSectionTitle">
					Recent Log
				</div>
				<div class="recentLogList">
<?php 
	foreach($recentLog as $row){
?>
					<div class="recentLogCard">
						<div class="equipmentName"><?=$row['name']?></div>
						<div class="logDetails">
							<div class="logLeft">
								<div class="equipmentSubText">Status</div>
								<div><?=$row['status']?></div>
								<div class="equipmentSubText">Date</div>
								<div><?=$row['date']?></div>
							</div>
							<div class="logRight">
								<div class="equipmentSubText">Activity</div>
								<div><?=$row['activity']?></div>
								<div class="equipmentSubText">Reported by</div>
								<div><?=$row['reported']?></div>
							</div>
						</div>
					</div>
<?php		
	}
?>

				</div>
			</div>

		</div>

	</div>



</body>

</html>