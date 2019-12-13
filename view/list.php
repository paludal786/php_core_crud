<?php

require_once '../config/DB_Connection.php';

$sql = "SELECT * FROM users";

?>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">


    <?php
    if ($result = $db->query($sql)) {

        echo '
    <div class="row form-group ">
    <a href="../view/Add.php"><button class="pull-right btn btn-primary">Add</button></a>
    </div>    
    ';


        echo "<table class='table table-boreder'>";
        echo "<tr>";
        echo "<th>id</th>";
        echo "<th>first_name</th>";
        echo "<th>last_name</th>";
        echo "<th>email</th>";
        echo "<th>age</th>";
        echo "<th>Action</th>";
        echo "</tr>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>
        <td>" . $row['id'] . "</td>
        <td>" . $row['first_name'] . "</td>
        <td>" . $row['last_name'] . "</td>
        <td>" . $row['email'] . "</td>
        <td>" . $row['age'] . "</td>";
            echo '<td><img class="open-AddBookDialog" data-id="' . $row['img_path'] . '" src="../images/' . $row["img_path"] . '" height="50px" width="40px" data-toggle="modal" data-target="#myModal"/></td>';
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo 'Failed !..';
    }
    ?>
</div>


<div class="container">

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                    <img id="bookId" height="500px" width="500px" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

</div>

<script>
    $(document).on("click", ".open-AddBookDialog", function() {
        var myBookId = $(this).data('id');
        document.getElementById("bookId").src = "../images/" + myBookId;
    });
</script>