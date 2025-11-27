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