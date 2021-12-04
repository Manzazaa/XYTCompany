<?php

$recentSearch = NULL;
if (isset($_POST['btnSearch'])) {
  if (!empty($_POST['searchInput'])) {
    $_SESSION['searchInput'] = $_POST['searchInput'];
    $recentSearch = $_POST['searchInput'];
  }
}
 ?>

 <form action="product-list.php" method="post">
   <div class="col-md-12">
       <div class="search">
           <input size="70" name="searchInput" type="text" placeholder="Search" value=<?php echo $recentSearch; ?>></input>
           <button name="btnSearch"><i class="fa fa-search"></i></button>
       </div>
   </div>
 </form>
