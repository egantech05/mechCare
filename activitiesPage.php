<?php
require_once 'dbConnection.php'; 
     $logList =  $conn->query("SELECT * FROM logDB;");

?>


<!DOCTYPE html>

<head>
    <meta charset="UTF-8" />
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
        <div class="activitiesPage">
            <div class="pageTitle">Activities</div>
            <div class="filterBox">
                <div class="leftBox">
                    <div class="filterComponent">
                        <div class="filterTitle">Type</div>
                        <div class="filterSelector">
                            <select>
                                <option>1</option>
                                <option>2</option>
                            </select>
                        </div>
                    </div>
                    <div class="filterComponent">
                        <div class="filterTitle">Status</div>
                        <div class="filterSelector">
                            <select>
                                <option>Online</option>
                                <option>Offline</option>
                            </select>
                        </div>
                    </div>
                    <div class="filterComponent">
                        <div class="filterTitle">Date</div>
                        <div class="filterSelector">
                            <select></select>
                        </div>
                        <div class="filterSelector">
                            <select></select>
                        </div>
                    </div>

                </div>
                <div class="rightBox">
                    <div class="filterComponent">
                        <div class="filterTitle">Activity</div>
                        <div class="filterSelector">
                            <select>
                                <option>Findings</option>
                                <option>Reactive Maintenance</option>
                                <option>Preventive Maintenance</option>
                            </select>
                        </div>
                    </div>
                    <div class="filterComponent">
                        <div class="filterTitle">Reported by</div>
                        <div class="filterSelector">
                            <select></select>
                        </div>
                    </div>
                    <a href="" class="filterButton">Filter</a>
                </div>

            </div>

            <div class=" filterResults">
                <div class="recentLogList">

<?php foreach($logList as $row){
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
             <div class="equipmentSubText">Notes</div>
             <div class="logNote"><?=$row['notes']?></div>
        </div>
        


<?php
}
?>
       <!--dummy to make sure all results can be viewed -->
       <div class="dummy"></div> 
      
       <div class="recentLogCard">
            <div class="equipmentName"></div>
                <div class="logDetails">
                    <div class="logLeft">
                        <div class="equipmentSubText">Status</div>
                        <div></div>
                        <div class="equipmentSubText">Date</div>
                        <div></div>
                    </div>
                    <div class="logRight">
                        <div class="equipmentSubText">Activity</div>
                        <div></div>
                        <div class="equipmentSubText">Reported by</div>
                        <div></div>
                    </div>
             </div>
             <div class="equipmentSubText">Notes</div>
             <div class="logNote"></div>
        </div>


                </div>
            </div>


        </div>
    </div>
</body>

</html>