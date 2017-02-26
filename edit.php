<?php

  require_once "inc/header.php";

  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM nur WHERE id = $id";
    $result = $db->singleData($sql);
    //var_dump($result);
  }else{
    header("Location:index.php");
  }


?>

<div class="edit-area">
  <h5>Edit task</h5>
  <form action="edit-process.php" method="post">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <input type="text" name="task" value="<?php echo $result['task']; ?>" class="form-control">
    <button class="btn btn-primary">update</button>
  </form>
</div>

<?php 

  require_once "inc/footer.php";

?>