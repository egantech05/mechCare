<?php
require_once 'dbConnection.php'; 

    $listName = $conn->query("SELECT DISTINCT name FROM equipmentDB;");

	 if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$activity = $_POST['activity'] ?? null;
		$name = $_POST['name'] ?? null;
		$notes = $_POST['notes'] ?? null;
        $reported = $_POST['reported'] ?? null;
        $status = $_POST['status'] ?? null;

		$stmt = $conn->prepare("INSERT INTO logDB(activity,date,name,notes,reported,status) VALUES (?,NOW(),?,?,?,?)");
		$stmt->bind_param("sssss",$activity,$name,$notes,$reported,$status);
		$stmt->execute();

		header('Location: activitiesPage.php');
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
        <text>
            EQARE
        </text>
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
        <div class="pageTitle">New Log</div>
        <div class="formBox">
            <form method="POST">
                <div class="formComponent">
                    <div>Equipment</div>
                    <div class="filterSelector">
                        <select name="name">
<?php 
    foreach($listName as $row){
?>
                    <option value="<?= $row['name'] ?>">
                        <?= $row['name'] ?>
                     </option>
<?php
    }
?>
                        
                        </select>
                    </div>
                </div>
                <div class="formComponent">
                    <div>Activity</div>
                    <div class="filterSelector">
                        <select name="activity">
                            <option value="Findings">Findings</option>
                            <option value="Reactive Maintenance">Reactive Maintenance</option>
                            <option value="Proactive Maintenance">Proactive Maintenance</option>
                        </select>
                    </div>
                </div>
                <div class="formComponent">
                    <div>Status</div>
                    <div class="filterSelector">
                        <select name="status">
                            <option value="Online">Online</option>
                            <option value="Offline">Offline</option>
                        </select>
                    </div>
                </div>
                <div class="formComponent">
                    <div>Reported by</div>
                    <input type="text" name="reported" />
                </div>
                <div class="formComponent">
                    <div>Notes</div>
                    <input type="text" name="notes" />
                </div>
                <button type="submit" class="submitButton">Submit</button>
            </form>
            
        </div>
    </div>
</body>

</html>