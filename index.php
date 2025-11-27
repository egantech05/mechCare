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