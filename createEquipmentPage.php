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