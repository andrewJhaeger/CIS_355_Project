<?php 
session_start(); 

require('css/config.inc.php');
if($_GET['category']=='all') {
	$page_title = 'All Items';
} else {
	$page_title = ucwords(str_replace("_", " ", $_GET['category']));
}

require (MYSQL);
$t="";
//$columns = "id, upc, manufacturer, model_number, product_name, price, rating, $t as tablename";

if($_GET['category'] == 'hard_drives' || $_GET['category'] == 'ssds' || $_GET['category'] == 'external_storage')
{
	$t = 'hard_drives_specs WHERE type="' . $_GET['category'].'"';
} elseif($_GET['category'] <> 'all') {
	$t = $_GET['category'] . '_specs';
} 

if($_GET['category'] == 'all') {
	$count = 0;
	$q = "";
	foreach($tablenames as &$t) {
		$columns = "id, upc, manufacturer, model_number, product_name, price, rating, '$t' as tablename";
		$count++;
		$q .= "SELECT ".$columns." FROM " . $t . " ";
		if($count <> count($tablenames)) { $q .= "UNION ALL "; }
	}
} else {
	$columns = "id, upc, manufacturer, model_number, product_name, price, rating";
	$q = "SELECT ".$columns." FROM " . $t;	
}

if(isset($_POST['order'])) {
	switch($_POST['order']) {
		case "Alphabetical":
			$q .= " ORDER BY product_name";
			break;
		case "Price":
			$q .= " ORDER BY price";
			break;
	}
}


$r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));

	while($row = mysqli_fetch_array($r)) 
	{  	$specs[] = $row;  }

mysqli_free_result($r);
mysqli_close($dbc);

function showproducts($page, $specs)
{
	$startingpoint=($page*10)-10;
	for($i=$startingpoint; $i<(($startingpoint+10)); $i=$i+2) {
		echo '<tr>';
		for($j=0; $j<=1; $j++) {
			if(isset($specs[$i+$j]['id'])) {
				echo '<td><img src="images/products/'.$specs[$i+$j]['upc'].'.jpg" class="productImage" /></td>';
				if($_GET['category']=='all') {
					echo '<td><a href="product.php?category='.str_replace("_specs", "", $specs[$i+$j]['tablename']).'&upc='.$specs[$i+$j]['upc'].'">'.$specs[$i+$j]['product_name'].'</a><br />';
				} else {
					echo '<td><a href="product.php?category='.$_GET['category'].'&upc='.$specs[$i+$j]['upc'].'">'.$specs[$i+$j]['product_name'].'</a><br />';
				}
					  echo '<dl class="dl-horizontal">
							    <dt>Price:</dt>
								<dd>'.number_format($specs[$i+$j]['price'], 2).'</dd>
								<dt>Manufacturer:</dt>
								<dd>'.$specs[$i+$j]['manufacturer'].'</dd>
								<dt>Model #:</dt>
								<dd>'.$specs[$i+$j]['model_number'].'</dd>
								<dt>Rating (out of 5):</dt>
								<dd>'.$specs[$i+$j]['rating'].'</dd>
					       </dl>
					  </td>';
			}
		}
		echo '</tr>';
	}
}
?>

<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Computer Parts Store</title>
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
	<link href="css/style.css" rel="stylesheet"/>
</head>
<body>
    <div class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">Computer Parts Store</a>
            </div>
            <div class="navbar-collapse collapse navbar-responsive-collapse">
             	<ul class="nav navbar-nav">
                    <li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Parts <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="browseitems.php?page=1&category=all">Browse all parts</a></li>
							<li class="divider"></li>
							<li class="dropdown-header">Internal Components</li>
							<li><a href="browseitems.php?page=1&category=processors">Processors</a></li>
							<li><a href="browseitems.php?page=1&category=motherboards">Motherboards</a></li>
							<li><a href="browseitems.php?page=1&category=memory">Memory</a></li>
							<li><a href="browseitems.php?page=1&category=hard_drives">Hard Drives</a></li>
							<li><a href="browseitems.php?page=1&category=ssds">SSDs</a></li>
							<li><a href="browseitems.php?page=1&category=video_cards">Video Cards</a></li>
							<li><a href="browseitems.php?page=1&category=disk_drives">Disk Drives</a></li>
							<li><a href="browseitems.php?page=1&category=cases">Cases</a></li>
							<li class="divider"></li>
							<li class="dropdown-header">Peripherals</li>
							<li><a href="browseitems.php?page=1&category=monitors">Monitors</a></li>
							<li><a href="browseitems.php?page=1&category=keyboards">Keyboards</a></li>
							<li><a href="browseitems.php?page=1&category=audio_devices">Audio Devices</a></li>
							<li><a href="browseitems.php?page=1&category=external_storage">External Storage</a></li>
							<li><a href="browseitems.php?page=1&category=printers">Printers</a></li>
						</ul>
					</li>
					<li><a href="questions.php">Q&amp;A</a></li>
                </ul>
				<ul class="nav navbar-nav navbar-right">
					<?php 
					 if(isset($_SESSION['firstName'])) { 
					       echo '<li class="userHeader">' . 'Logged in as ' . $_SESSION['firstName'];
					  }
					  echo '</li><li>';
					  if(isset($_SESSION['firstName'])) {
					      echo '<a href="logout.php">Log Out</a>';
					  } else {
					      echo '<a href="loginregister.php">Login/Register</a>';
					  }
					  echo '</li>';
					
					if(isset($_SESSION['firstName'])) {
						echo '<li><a href="cart.php">Cart &nbsp;<span class="badge">'. $_SESSION['shopping_cart_count'] .'</span></a></li>';
					}
				
					?>
				</ul>
            </div>
        </div>
    </div>
    
	<div class="container body-content">
		<legend><?php echo $page_title; ?></legend>
		<?php echo '<form id="orderBy" action="browseitems.php?page=1&category='.$_GET['category'].'" method="post">'; ?>
		<legend>Order By: 
			<?php 
			echo '<select value="Alphabetical" name="order" onChange="submit();" >'; ?>
				<option></option>
				<option value="Price" <?php if(isset($_POST['order'])) { if($_POST['order'] == 'Price') { echo 'selected'; } } ?>>Price</option>
				<option value="Alphabetical" <?php if(isset($_POST['order'])) { if($_POST['order'] == 'Alphabetical') { echo 'selected'; } } ?>>Alphabetical</option>
			</select>
		</legend>
		
	</form>
		<table class="table table-bordered" id="productList">
				<thead>
					<tr>
						<th>Image</th><th>Product Information</th><th>Image</th><th>Product Information</th>
					</tr>
				</thead>
				<tbody>

				<?php showproducts($_GET['page'], $specs); ?>

				</tbody>
		</table>
		<div id="tablePaginator">
			<ul class="pagination pagination-sm">
				<?php 
				$numelements = count($specs);

				echo '<li><a href="';
				if($_GET['page']>1) {
					echo basename($_SERVER['PHP_SELF']) . '?page=' . ($_GET['page']-1) . '&category='.$_GET['category'];
				}
				echo '">&laquo;</a></li>';

				$pagelimit = ceil($numelements/10);

				for($i=1; $i<=$pagelimit; $i++) {
					if($i == $_GET['page']) { 
						$li = '<li class="active">';
					} else {
						$li = '<li>';
					}
					echo $li.'<a href="'.basename($_SERVER['PHP_SELF']).'?page='.$i.'&category='.$_GET['category'].'">'.$i.'</a></li>';
				}

				if($numelements > ($_GET['page'] * 10)) {
					$link = '"'. basename($_SERVER['PHP_SELF']) . '?page=' . ($_GET['page']+1) . '&category='.$_GET['category'] . '"';
				} else {
					$link = "";
				}
				echo '<li><a href='.$link.'>&raquo;</a></li>'; 
				?>
		</div>
		<hr />
		<footer>
			<p>&copy; 2014 - Computer Parts Store</p>
		</footer>
	</div>
	<script src="scripts/jquery-1.11.0.min.js"></script>
	<script src="scripts/bootstrap.min.js"></script>
</body>
</html>
