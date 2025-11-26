<?php
require_once 'dbConnection.php'; 

	 if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$name = $_POST['name'] ?? null;
		$model= $_POST['model'] ?? null;
		$manufacturer = $_POST['manufacturer'] ?? null;
		$type = $_POST['type'] ?? null;

		$stmt = $conn->prepare("INSERT INTO equipmentDB(name,model,manufacturer,type) VALUES (?,?,?,?)");
		$stmt->bind_param("ssss",$name,$model,$manufacturer,$type);
		$stmt->execute();

		header('Location: equipmentPage.php');
		exit;
	}	
	
?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8" />
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
        <div class="pageTitle">New Equipment</div>
        <div class="formBox">
            <form method="POST">
                <div class="formComponent">
                    <div>Name</div>
                    <input type="text" name="name" />
                </div>
                <div class="formComponent">
                    <div>Model</div>
                    <input type="text" name="model" />
                </div>
                <div class="formComponent">
                    <div>Manufacturer</div>
                    <input type="text" name="manufacturer" />
                </div>
                <div class="formComponent">
                    <div>Equipment Type</div>
                    <input type="text" name="type" />
                </div>
				<button type="submit"  class="submitButton">Submit</button>
            </form>
            
        </div>
    </div>
</body>

</html>