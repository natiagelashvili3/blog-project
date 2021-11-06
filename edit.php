<?php include('helpers/db_connection.php') ?>

<?php include('components/header.php') ?>
    
<?php include('components/aside.php') ?>

<?php

    $id = isset($_GET['id']) && $_GET['id'] ? $_GET['id'] : null; 
    
    if($id) {
        // select
        $select_query = "SELECT * FROM students WHERE id = " . $id;

        $result = mysqli_query($conn, $select_query);
        $student = mysqli_fetch_assoc($result); // []

        if(!$student) {
            die('student not found');
        }
    } else {
        die('invalid id');
    }

    // update
    if(isset($_POST['action']) && $_POST['action'] == 'update') {
        $name = isset($_POST['name']) ? $_POST['name'] : '' ;
        $lastname = isset($_POST['lastname']) ? $_POST['lastname'] : '' ;
        $age = isset($_POST['age']) ? $_POST['age'] : '' ;
        $status = isset($_POST['status']) ? $_POST['status'] : '' ;

        if($name && $lastname && $age) {

            $sql = "UPDATE students SET name = '$name', lastname = '$lastname', age = '$age', status = '$status' WHERE id = ".$id;

            if(mysqli_query($conn, $sql)) {
                echo "Record Update";
            } else {
                echo "Error";
            }
        }
    }

?>

<main>
    <div class="container-header">
        <h2>Students</h2>
        <a href="" class="btn">Add New</a>
    </div>
    <div class="content">
        <form action="" method="post">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" value="<?= $student['name'] ?>">
            </div>
            <div class="form-group">
                <label for="">Lastname</label>
                <input type="text" name="lastname" value="<?= $student['lastname'] ?>">
            </div>
            <div class="form-group">
                <label for="">Age</label>
                <input type="text" name="age" value="<?= $student['age'] ?>">
            </div>
            <div class="form-group">
                <label for="">Status</label>
                <select name="status" id="">
                    <option value="1" <?php echo $student['status'] == 1 ? 'selected' : '' ?>>Active</option>
                    <option value="0" <?php echo $student['status'] == 0 ? 'selected' : '' ?>>Inactive</option>
                </select>
            </div>
            <div class="form-group">
                <input type="hidden" name="action" value="update">
                <button class="btn submit">Updates</button>
            </div>
        </form>
    </div>
</main>

<?php include('components/footer.php') ?>