<?php include "inc/header.php"; ?>
<?php 
    spl_autoload_register(function($class){
       include "classes/" .$class. ".php";
    });
?>
<?php
    $users = new student();
    if (isset($_POST['submit'])){
        $name = $_POST['name'];
        $dept = $_POST['dept'];
        $age = $_POST['age'];
        
        $users->setName($name);
        $users->setDept($dept);
        $users->setAge($age);
        
        if($users->insert()){
            echo 'Data inserted succesfully';
        }
    }

     if (isset($_POST['update'])){
         $id   = $_POST['Id'];
         $name = $_POST['name'];
         $dept = $_POST['dept'];
         $age  = $_POST['age'];

         $users->setName($name);
         $users->setDept($dept);
         $users->setAge($age);

        if($users->update($id)){
             echo 'Data updated succesfully';
            }
        }
?>
<?php
    if(isset($_GET['action']) && $_GET['action'] == 'delete'){
        $id = (int)$_GET['Id'];
       if($users->delete($id)){
           echo 'Data deleted succesfully';
       }
    }
?>
<?php
    if(isset($_GET['action']) && $_GET['action'] == 'update'){
        $id = (int)$_GET['Id'];
        $result= $users->readbyId($id);
?>
<section class="mainleft">
    <form action="" method="post">
        <table>
            <input type="hidden" name="Id" value="<?php echo $result['Id'];?>" />
            <tr>
                <td>Name: </td>
                <td><input type="text" name="name" value="<?php echo $result['name'];?>" /></td>
            </tr>

            <tr>
                <td>Department: </td>
                <td><input type="text" name="dept" value="<?php echo $result['dept'];?>" /></td>
            </tr>

            <tr>
                <td>Age: </td>
                <td><input type="text" name="age" value="<?php echo $result['age'];?>" /></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="update" value="Submit" />
                    <input type="reset" value="Clear" />
                </td>
            </tr>
        </table>
    </form>
</section>
<?php }else{?>

<section class="mainleft">
    <form action="" method="post">
        <table>
            <tr>
                <td>Name: </td>
                <td><input type="text" name="name" required="1" /></td>
            </tr>

            <tr>
                <td>Department: </td>
                <td><input type="text" name="dept" required="1" /></td>
            </tr>

            <tr>
                <td>Age: </td>
                <td><input type="text" name="age" required="1" /></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="submit" value="Submit" />
                    <input type="reset" value="Clear" />
                </td>
            </tr>
        </table>
    </form>
    <?php }?>
</section>



<section class="mainright">
    <table class="tblone">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Department</th>
            <th>Age</th>
            <th>Action</th>
        </tr>
        <?php 
      $i = 0;
      foreach($users->readAll() as $key => $value){
      $i++;  
?>
        <tr>
            <td><?php echo $i ;?></td>
            <td><?php echo $value['Name'] ;?></td>
            <td><?php echo $value['Department'] ;?></td>
            <td><?php echo $value['Age'] ;?></td>
            <td>
                <?php echo "<a href='index.php?action=update&Id=".$value['Id']."'>Edit</a>" ; ?> ||
                <?php echo "<a href='index.php?action=delete&Id=".$value['Id']."'>Delete</a>" ; ?>
            </td>
        </tr>
        <?php } ?>

    </table>
</section>
<?php include "inc/footer.php";  ?>
