<?php
require_once 'dbConnection.php'; 
     $logList =  $conn->query("SELECT * FROM logDB ORDER by date DESC;");

     $typeList = $conn->query("SELECT DISTINCT type FROM equipmentDB ");

     $reportedList = $conn->query("SELECT DISTINCT reported FROM logDB");

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
        <div class="activitiesPage">
            <div class="pageTitle">Activities</div>
            <div class="filterBox">
                <div class="leftBox">
                    <div class="filterComponent">
                        <div class="filterTitle">Type</div>
                        <div class="filterSelector">
                            <select name="type">
<?php 
    foreach($typeList as $row){
?>
                            <option value="<?=$row['type']?>">
                                <?= $row['type'] ?>
                            </option>
<?php
    }
?>
                              
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
                            <select name="reported">
<?php 
    foreach($reportedList as $row){
?>
                            <option value="<?=$row['reported']?>">
                                <?= $row['reported'] ?>
                            </option>
<?php
    }
?>
                            </select>
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