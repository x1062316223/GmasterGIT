<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_POST["keyword"])) {
$query ="SELECT * FROM  p_list WHERE name like '" . $_POST["keyword"] . "%' ORDER BY name LIMIT 0,6";
$result = $db_handle->runQuery($query);
if(!empty($result)) {
?>
<ul id="product-list">
<?php
foreach($result as $product) {
?>
<a href="productDetail.php?id=<?php echo $product["id"]?>"><li><?php echo $product["name"]; ?></li></a>
<?php } ?>
</ul>
<?php } } ?>