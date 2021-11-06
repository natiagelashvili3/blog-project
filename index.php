<?php include('helpers/db_connection.php') ?>

<?php include('components/header.php') ?>

<?php include('components/aside.php') ?>

<?php

if(isset($_POST['action']) && $_POST['action'] == 'delete') {
    $id = $_POST['id'];

    $sql = "DELETE FROM students where id = " .$id;

    if(mysqli_query($conn, $sql)) {
        echo "Record Delete";
    } else {
        echo "Error";
    }
}

// SELECT Query
$sql = "SELECT * FROM students";
$result = mysqli_query($conn, $sql);
$students = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

<main>
    <div class="container-header">
        <h2>Students</h2>
        <a href="form.php" class="btn">Add New</a>
    </div>
    <div class="content">
        <table>
            <tr>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Age</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            <?php foreach($students as $student): ?>
                <tr>
                    <td><?= $student['name'] ?></td>
                    <td><?= $student['lastname'] ?></td>
                    <td><?= $student['age'] ?></td>
                    <td>
                        <?php if($student['status'] == 1){ ?>
                            <span class="status active">active</span>
                        <?php } else { ?>
                            <span class="status inactive">inactive</span>
                        <?php } ?>
                    </td>
                    <td class="actions">
                        <a class="edit" href="edit.php?id=<?= $student['id'] ?>">Edit</a>
                        <form action="" method="post">
                            <input type="hidden" name="action" value="delete">
                            <input type="hidden" name="id" value="<?= $student['id'] ?>">
                            <button class="delete">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            </table>
    </div>
</main>

<?php include('components/footer.php') ?>