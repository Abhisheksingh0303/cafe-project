<?php include('partials/menu.php');?>
<!--- Main content Section Starts-->
<div class="Main-Content">
    <div class="wrapper">
        <h1>MANAGE ADMIN</h1>

        <br /><br /><br />
        <!-- Button to add admin-->
        <a href="add-admin.php" class="btn-primary">Add Admin</a>
        <br /><br /><br />
        <table class="tbl-full">
            <tr>
                <th>S.N.</th>
                <th>Full Name</th>
                <th>User Name</th>
                <th>Actions</th>
            </tr>
            <?php
            $sql = "SELECT * FROM tbl_admin";
            $res = mysqli_query($conn, $sql);
            if ($res == TRUE) {
                $count = mysqli_num_rows($res);
                $sn=1;
            }
            if ($count > 0) {
                while ($rows = mysqli_fetch_assoc($res)) {
                    $id = $rows['id'];
                    $full_name = $rows['full_name'];
                    $username = $rows['username'];

                   ?>
                <tr>
                <td><?php echo $sn++;?></td>
                <td><?php echo $full_name;?></td>
                <td><?php echo $username;?></td>
                <td>
                    <a href="<?php echo SITEURL;?>admin/update-password.php?id=<?php echo $id;?>" class="btn-primary">Change Password</a>
                    <a href="<?php echo SITEURL;?>admin/update-admin.php?id=<?php echo $id;?>" class="btn-secondery">Update Admin</a>
                    <a href="<?php echo SITEURL;?>admin/delete-admin.php?id=<?php echo $id;?>" class="btn-danger">Delete Admin</a>
                </td>
            </tr>

                   <?php
                }
            } else {

            }
            ?>

        </table>
    </div>

</div>
<!--- Main content Ends-->
<?php include('partials/footer.php'); ?>
