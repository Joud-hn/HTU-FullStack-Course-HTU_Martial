<?php
include 'connect.php';
include 'header.php';
if(!isset($_SESSION['user_id']) || $_SESSION['role']!='admin'){
    header("Location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Style/admin.css">
    <title>H.T.U Martial</title>
</head>
<body>
    <header>
        <h1>Admin Dashbord</h1>
        <p>H.T.U Martial Arts Managment</p>
    </header>
    
        <main>
            <section id="programs">
                <h2>Mange Programs</h2>
                <form method="POST">
                    <label for="programname">Program Name</label>
                    <input type="text" name="program_name" class="textinput" placeholder="Enter program name">
                    <br>
                    <label for="programPric">Price</label>
                    <input type="number" name="programprice" class="programprice" placeholder="Price">
                    <br>
                      <label for="programType">Program Type</label>
                    <input type="radio" name="program_type" value="Martial Arts">
                    Martial Arts
                    <br>
                    <input type="radio" class="radioinput" name="program_type" value="Fitness">
                   Fitness
                   <br>
                    <input type="radio" class="radioinput" name="program_type" value="SelfDefence">
                   Self Defence
                   <br>
                   <label for="prograDes">Description</label>
                   <textarea name="description" class="prograDes" placeholder="Brief description of the program"></textarea>
                   <br>
                   <button type="submit" class="addprograms" name="add_program">Add Program</button>
                </form>

            </section>
            <?php
            if(isset($_POST['add_program'])){
                $name = $_POST['program_name'];
                $price = $_POST['programprice'];
                $type = $_POST['program_type'];
                $desc = $_POST['description'] ;
                $sql = "INSERT INTO programs (program_name, program_type, price, description) VALUES ('$name','$type','$price','$desc');";
                $result= mysqli_query($con,$sql);
               if($result){
                    echo "<p>Program added successfully</p>";
            }else{
                mysqli_error($con);
            }}
        
            ?>
    <section id="programTableSection">
              <h3>Programs List</h3>
        <table >
        <thead>
                <tr>
                <th>ID</th>
                <th>Program Name</th>
                <th>Type</th>
                <th>Actions</th>
                </tr>
        </thead>

        <tbody>
            
            <?php
                $sql= "SELECT * FROM programs;";
                $result = mysqli_query($con,$sql);
                 $programs = mysqli_fetch_all($result);
                    foreach($programs as $cource ){
                        $id =$cource[0]; 
                        $name = $cource[1];
                        $type = $cource[2];
                        ?>  
            
            <tr>
                <td><?php echo $id; ?></td>
                <td><?php echo $name;?></td>
                <td><?php echo $type;?></td>
                <td>
                    <form action="edit.php" method="POST"  style="display:inline;">
                    <input type="hidden" name="id" value = "<?php echo $id;?>">
                    <input type ="hidden" name="type" value="program">
                    <button type="submit" class="edit-btn">Edit</button>
               </form> 
               <form action="delete.php" method="POST" style="display:inline;">
                <input type="hidden" name="id" value = "<?php echo $id;?>">
                <button type="submit" class="delete-btn">Delete</button>
               </form>
            </td>
            </tr>
            <?php }?>
         </tbody>

    </table>

</section>
<section id="admininstructors">
    <h2>Manage Instructors</h2>
    <form id="addInstructorForm" method="POST"  enctype="multipart/form-data">
        <div class="inputGroup">
            <label for="instName">Full Name</label>
            <input type="text" name="name" id="instName" class="textinput" placeholder="Full Name" required>
        </div>

        <div class="inputGroup">
            <label for="instJob">Job Title</label>
            <input type="text" name="job" id="instJob" class="textinput" placeholder="Job Title" required>
        </div>
            <div class="inputGroup">
            <label for="instSpecialty">Specialty</label>
            <textarea id="instSpecialty" name="specialty" class="prograDes" placeholder="Specialty"></textarea>
        </div>
        <div class="inputGroup">
            <label for="instRank">Qualifications</label>
            <input type="text" name="rank" id="instRank" class="textinput" placeholder="Rank">
        </div>

        <div>
          <label>Instructor Image</label>
    <input type="file" name="image" required>
        </div>
   
    <button type="submit" name="add_inst" class="addprograms">Add Instructor</button>

</form>
</section>
<?php
if(isset($_POST['add_inst'])){
    $name = $_POST['name'];
    $job = $_POST['job'];
    $specialty = $_POST['specialty'];
    $rank =$_POST['rank'];
    $imagename = $_FILES['image']['name'];
    $tempName = $_FILES['image']['tmp_name'];
    move_uploaded_file($tempName, "../uploads/". $imagename);
    $sql = "INSERT INTO instructors (full_name, job_title, 	specialty, 	qualifications, image) VALUES ('$name', '$job', '$specialty','$rank', '$imagename');";
    $result = mysqli_query($con, $sql);
    if($result)
    {
        echo" <p> Instructor added successfully</p>";
    }else{
        mysqli_error($con);
    }
}
?>
<section id="instructorTableSection">
    <h3>Instructors List</h3>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Job Title</th>
                <th>Specialty</th>
                <th>Rank</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            
                 <?php
                $sql= "SELECT * FROM instructors;";
                $result = mysqli_query($con,$sql);
                 $instructors = mysqli_fetch_all($result);
                    foreach($instructors as $i ){
                    ?>
                    <tr>
                <td><?php echo$i[0]?></td>
                <td><?php echo$i[1]?></td>
                <td><?php echo$i[2]?></td>
                <td><?php echo$i[3]?></td>
                <td><?php echo$i[4]?></td>
                <td><img src="../uploads/<?php echo $i[5]; ?>"</td>
                <td class="actions">
               <form action="editinstructors.php" method="POST"  style="display:inline;" >
                    <input type="hidden" name="id" value="<?php echo $i[0];?>" >
                    <button type="submit" class="edit-btn">Edit</button>
                    </form>
                 <form action="delete.php" method="POST" >
                    <input type="hidden" name="id" value="<?php echo $i[0];?>"  style="display:inline;" >
                    <button type="submit" class="delete-btn">Delete</button>

                    </form>
                </td>            
            </tr>
            <?php
                    }
           ?>
        </tbody>
    </table>
</section>
<section id="memberships">
    <h2>Manage Memberships</h2>
    <form id="addMembershipForm" method="POST">
        <div class="inputGroup">
            <label for="memberName">Membership Plan Name</label>
            <input type="text" name="name" id="memberName" class="textinput" placeholder="Membership Plan Name" required>
        </div>

        <div class="inputGroup">
            <label for="memberPrice">Monthly Price ($)</label>
            <input type="number" name="price" id="memberPrice" class="programprice" placeholder="Price"  required>
        </div>

        <div class="inputGroup">
            <label for="memberFeatures">Features / Benefits</label>
            <textarea id="memberFeatures" name="description" class="prograDes" placeholder="">Features / Benefits</textarea>
        </div>

        <button type="submit" name="add_membership" class="addprograms">Add Membership</button>
    </form>
    <?php
    if(isset($_POST['add_membership'])){
        $name = $_POST['name'];
        $price = $_POST['price'];
        $desc = $_POST['description'];
        $sql = "INSERT INTO memberships	(membership_name, price,description) VALUES('$name','$price','$desc');";
        $result = mysqli_query($con, $sql);
        if($result){
            echo "<p> Membership added successful</p>";
        }else{
            echo mysqli_error($con);
        }
    }
    ?>
</section>

<section id="membershipTableSection">
    <h3>Current Membership Plans</h3>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Plan Name</th>
                <th>Price</th>
                <th>Features</th>
                <th>Actions</th>
            </tr>
        </thead>
      <tbody>
            <?php
            $sql="SELECT * FROM memberships;";
            $result = mysqli_query($con, $sql);
            $memberships = mysqli_fetch_all($result);
                    foreach($memberships as $m ){
                    
                ?>  
            
            <tr>
                <td><?php echo $m[0]?></td>
                <td><?php echo $m[1]?></td>
                <td><?php echo $m[3]?></td>
                <td><?php echo $m[2]?></td>
                <td>
                    <form action="editmembership.php" method="POST" style="display:inline;">
                    <input  type="hidden" name="id" class="edit-btn" value="<?php echo $m[0];?>">
                    <button type="submit" class="delete-btn">Edit</button>
                    </form>
                    <form action="delete.php" method="POST"  style="display:inline;" >
                    <input  type="hidden" name="id" class="edit-btn" value="<?php echo $m[0];?>">
                    <button type="submit" class="delete-btn">Delete</button>
                    </form>
                    
                </td>
            </tr>
             <?php
             }?>
        </tbody>
    </table>
</section>

</main>
<?php
require 'contactusFooter.php';
?>
</body>
</html>