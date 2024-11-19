<?php
session_start();
$favorites = $_SESSION['favorites'] ?? [];

?>

<!DOCTYPE html>
<html lang=en>
<head>
<meta charset=utf-8>
    <link href='http://fonts.googleapis.com/css?family=Merriweather' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="css/semantic.js"></script>
  
    
    <link href="css/semantic.css" rel="stylesheet" >
    <link href="css/icon.css" rel="stylesheet" >
    <link href="css/styles.css" rel="stylesheet">
    
    
</head>
<body >
    
<?php include 'includes/art-header.inc.php'; ?>
    
<main class="ui container">
    
    <section class="ui basic segment ">
      <h2>Favorites</h2>
        <table class="ui basic collapsing table">
          <thead>
            <tr>
              <th>Image</th>
              <th>Title</th>
              <th>Action</th>
          </tr></thead>
          <tbody>
              <?php 
                if (empty($favorites)) {
                  echo "<p>No favorites yet!</p>";
              } else {
                  echo "<table class='ui celled table'>";
                  echo "<thead><tr><th>Image</th><th>Title</th><th>Actions</th></tr></thead>";
                  echo "<tbody>";
                  foreach ($favorites as $painting) {
                      echo "<tr>";
                      echo "<td><img src='images/art/works/small-square/" . htmlspecialchars($painting['ImageFileName']) . ".jpg' alt='" . htmlspecialchars($painting['Title']) . "' width='100'></td>";
                      echo "<td><a href='single-painting.php?PaintingID=" . $painting['PaintingID'] . "'>" . htmlspecialchars($painting['Title']) . "</a></td>";
                      echo "<td><a href='remove-favorites.php?PaintingID=" . $painting['PaintingID'] . "' class='ui red button'>Remove</a></td>";
                      echo "</tr>";
                  }
                  echo "</tbody>";
                  echo "</table>";
                  echo "<a href='remove-favorites.php?action=clear' class='ui button'>Clear All Favorites</a>";
              }
              ?>
          </tbody>
          <tfoot class="full-width">
              <th colspan="3">
                <a class="ui left floated small primary labeled icon button" href="remove-favorites.php">
                  <i class="remove circle icon"></i> Remove All Favorites
                </a>                  
              </th>
          </tfoot>
         </table>
    </section>

</main>    
    
  <footer class="ui black inverted segment">
      <div class="ui container">footer</div>
  </footer>
</body>
</html>    