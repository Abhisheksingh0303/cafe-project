
<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Food</h1>

        <br><br>
        <?php 
            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        ?>
        <form action="#" method="post">
            Title:       <input type="text" name="title" ><br><br>
            Description: <input type="text" name="description" ><br><br>
            Price:       <input type="text" name="price" ><br><br>
            Category:    <input type="text" name="category" ><br><br>
            Featured:    <input type="radio" name="featured" value="Yes"> YES
                         <input type="radio" name="featured" value="No"> NO <br><br>
            Active:      <input type="radio" name="active" value="Yes" > YES
                         <input type="radio" name="active"  value="No"> NO <br><br>
                         <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Food" class="btn-secondary">
                    </td>
                    </tr>
        </table>
        </form>
    </body>
</html>
<?php
     if(isset($_POST['submit'])){
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    
    }
?>