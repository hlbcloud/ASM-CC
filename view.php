<!DOCTYPE html>
<!-- saved from url=(0064)https://www.w3schools.com/w3css/tryw3css_templates_architect.htm -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><title></title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="image/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-wide w3-padding w3-card">
    <a href="index.php" class="w3-bar-item w3-button"><b>ATN</b> Toy Store</a>
    <!-- Float links to the right. Hide them on small screens -->
    <div class="w3-right w3-hide-small">
      <a href="home.php" class="w3-bar-item w3-button">Home</a>
      <a href="view.php" class="w3-bar-item w3-button">View</a>
      <a href="insert.php" class="w3-bar-item w3-button">Insert</a>
      <a href="update.php" class="w3-bar-item w3-button">Update</a>
      <a href="delete.php" class="w3-bar-item w3-button">Delete</a>
    </div>
  </div>
</div>

<!-- Header -->
<header class="w3-display-container w3-content w3-wide" style="max-width:1500px;" id="home">
  <img class="w3-image" src="image/architect.jpg" alt="Architecture" width="1500" height="800">
  <div class="w3-display-middle w3-margin-top w3-center">

		
		  
		  <div class="w3-container w3-padding-32" id="#">
		    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">View Database</h3>
		    
		  </div>
			



    <?php
      if (empty(getenv("DATABASE_URL"))){
        $pdo = new PDO('pgsql:host=localhost;port=5432;dbname=mydb', 'postgres', '123456');
      }  
      else{
        echo getenv("dbname");
        $db = parse_url(getenv("DATABASE_URL"));
        $pdo = new PDO("pgsql:" . sprintf(
        "host=ec2-23-21-91-183.compute-1.amazonaws.com;port=5432;user=ekqttaatlknfct;password=
        a829f93c09e957150aef915e6c0e310e9581378fe7e96afeac91def1fa1c5dd8;dbname=d5nvtpltgjl5en",
        $db["host"],
        $db["port"],
        $db["user"],
        $db["pass"],
        ltrim($db["path"], "/")
        ));
      }  

      $sql = "SELECT * FROM asm2 ORDER BY toyid";
      $stmt = $pdo->prepare($sql);
      $stmt->setFetchMode(PDO::FETCH_ASSOC);
      $stmt->execute();
      $resultSet = $stmt->fetchAll();
      ?>

    <div class="w3-responsive w3-container">
      <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable" border="1">
        <thead>
          <tr>
            <th>Store ID</th>
            <th>Accountant</th>
            <th>Revenue</th>
            <th>Last Time Check</th>
          </tr>
        </thead>
        <tbody>

          <?php
          foreach ($resultSet as $row) {
          ?>

          <tr>
            <td scope="row"><?php echo $row['toyname'] ?></td>
            <td><?php echo $row['toyid'] ?></td>
            <td><?php echo $row['price'] ?></td>
            <td><?php echo $row['date'] ?></td>
          </tr>

          <?php
          }
          ?>

        </tbody>
      </table>
    </div>



    
  </div>
</header>




<footer class="w3-center w3-black w3-padding-16">
  <p>Assignment 2 <a href="#" title="Submited" target="_blank" class="w3-hover-text-green">Cloud Computing</a></p>
</footer>


</body></html>