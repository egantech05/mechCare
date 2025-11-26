<!DOCTYPE html>

<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <header class="mainTitle">
        <text>
            MACHCARE
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
            <form>
                <div class="formComponent">
                    <div>Equipment</div>
                    <div class="filterSelector">
                        <select>
                            <option>1</option>
                            <option>2</option>
                        </select>
                    </div>
                </div>
                <div class="formComponent">
                    <div>Activity</div>
                    <div class="filterSelector">
                        <select>
                            <option>Findings</option>
                            <option>Reactive Maintenance</option>
                            <option>Proactive Maintenance</option>
                        </select>
                    </div>
                </div>
                <div class="formComponent">
                    <div>Status</div>
                    <div class="filterSelector">
                        <select>
                            <option>Online</option>
                            <option>Offline</option>
                        </select>
                    </div>
                </div>
                <div class="formComponent">
                    <div>Reported by</div>
                    <input />
                </div>
                <div class="formComponent">
                    <div>Notes</div>
                    <input />
                </div>
            </form>
            <a href="" class="submitButton" style="width:432px">Submit</a>
        </div>
    </div>
</body>

</html>