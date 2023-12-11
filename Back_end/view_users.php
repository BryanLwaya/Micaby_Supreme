<?php

require("../connect.php");

$sql = "SELECT * FROM customer";
$result = mysqli_query($conn, $sql);
// print_r($result);

// if(mysqli_num_rows($result) > 0){
//     while($row = mysqli_fetch_assoc($result)){
//         echo "<pre>";
//         print_r($row);
//         echo "</pre>";
//     }


// }

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>View Users</title>
    <link rel="stylesheet" href="../Css_files/view_users.css">

</head>

<body>
    <table>

        <thead>
            <tr class="head">
                <th colspan="7">
                    <h2>USERS</h2>
                </th>
            </tr>

            <tr>
                <th>Customer ID</th>
                <th>Profile Photo</th>
                <th>FirstName</th>
                <th>Surname</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Edit</th>
            </tr>
        </thead>

        <tbody>
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>

                    <tr>
                        <td><?php echo $row['Customer_ID']; ?></td>
                        <td><?php echo '<img src="../' . $row['Cust_img'] . '" width="100px" height="100px">'; ?></td>
                        <td><?php echo $row['Cust_fname']; ?></td>
                        <td><?php echo $row['Cust_sname']; ?></td>
                        <td><?php echo $row['Cust_email']; ?></td>
                        <td><?php echo $row['Cust_contact']; ?></td>
                        <td>
                            <form action="edit_users.php" method="post">
                                <input type="hidden" name="cust_id" id="cust_id" value="<?php echo $row['Customer_ID'] ?>">
                                <input type="submit" value="Edit" name="edit" class="button">
                            </form>
                        </td>
                    </tr>

            <?php
                }
            }
            ?>
        </tbody>

    </table>
    <a href="./admin_page.php" class="button">Back</a>
</body>

</html>