<?php include('helpers/db_connection.php') ?>

<?php include('components/header.php') ?>
    
<?php include('components/aside.php') ?>

<?php

    // insert
    if(isset($_POST['action']) && $_POST['action'] == 'insert') {
        $name = isset($_POST['name']) ? $_POST['name'] : '' ;
        $lastname = isset($_POST['lastname']) ? $_POST['lastname'] : '' ;
        $age = isset($_POST['age']) ? $_POST['age'] : '' ;
        $status = isset($_POST['status']) ? $_POST['status'] : '' ;

        if($name && $lastname && $age) {

            $sql = "INSERT INTO students (name, lastname, age, status) VALUES ('$name', '$lastname', '$age', '$status')";

            if(mysqli_query($conn, $sql)) {
                echo "Record Created";
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
                <input type="text" name="name">
            </div>
            <div class="form-group">
                <label for="">Lastname</label>
                <input type="text" name="lastname">
            </div>
            <div class="form-group">
                <label for="">Age</label>
                <input type="text" name="age">
            </div>
            <div class="form-group">
                <label for="">Status</label>
                <select name="status" id="">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>
            <div class="form-group">
                <input type="hidden" name="action" value="insert">
                <button class="btn submit">Add</button>
            </div>
        </form>
    </div>
</main>

<?php include('components/footer.php') ?>