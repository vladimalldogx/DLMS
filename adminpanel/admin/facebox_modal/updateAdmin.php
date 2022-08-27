
<?php 
  include("../../../conn.php");
  $id = $_GET['id'];
 
  $selAdmin = $conn->query("SELECT * FROM admin_acc WHERE admin_id='$id' ")->fetch(PDO::FETCH_ASSOC);

 ?>

<fieldset style="width:543px;" >
	<legend><i class="facebox-header"><i class="edit large icon"></i>&nbsp;Update <b>( <?php echo strtoupper($selAdmin['fullname']); ?> )</b></i></legend>
  <div class="col-md-12 mt-4">
<form method="post" action="query/updateAdmin.php">
     <div class="form-group">
        <legend>Fullname</legend>
        <input type="hidden" name="exmne_id" value="<?php echo $id; ?>">
        <input type="" name="exFullname" class="form-control" required="" value="<?php echo $selAdmin['fullname']; ?>" >
     </div>

     
     <div class="form-group">
        <legend>Email</legend>
        <input type="" name="exEmail" class="form-control" required="" value="<?php echo $selAdmin['admin_user']; ?>" >
     </div>

     <div class="form-group">
        <legend>Password</legend>
        <input type="" name="exPass" class="form-control" required="" value="<?php echo $selAdmin['admin_pass']; ?>" >
     </div>

    
  <div class="form-group" align="right">
    <button type="submit" class="btn btn-sm btn-primary">Update Now</button>
  </div>
</form>
  </div>
</fieldset>







