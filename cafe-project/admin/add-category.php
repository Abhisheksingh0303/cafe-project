<?php include('partials-front/menu.php'); ?>

<?php
// Check if food_id is set
if (isset($_GET['food_id'])) {
    $food_id = $_GET['food_id'];
    $sql = "SELECT * FROM tbl_food WHERE id=$food_id";
    $res = mysqli_query($conn, $sql);
    if (mysqli_num_rows($res) == 1) {
        $row = mysqli_fetch_assoc($res);
        $title = $row['title'];
        $price = $row['price'];
    } else {
        header('location:' . SITEURL);
    }
} else {
    header('location:' . SITEURL);
}
?>

<section class="food-search order-section">
    <div class="container">
        <h2 class="text-center text-white">Fill this form to enjoy your favourite food</h2>
        
        <form action="" method="POST" class="order-form">
            <fieldset>
                <legend>Selected Food</legend>
                <div class="food-details">
                    <h3><?php echo $title; ?></h3>
                    <input type="hidden" name="food" value="<?php echo $title; ?>">
                    <p class="food-price">₹<?php echo $price; ?></p>
                    <input type="hidden" name="price" value="<?php echo $price; ?>">
                </div>
            </fieldset>

            <fieldset>
                <legend>Delivery Details</legend>

                <input type="text" name="full-name" placeholder="E.g. Abhishek Singh" required>
                <input type="tel" name="contact" placeholder="E.g. 9843xxxxxx" required pattern="[0-9]{10}">
                <input type="email" name="email" placeholder="E.g. hi@abhsihek.com" required>
                <input type="text" name="address" placeholder="Enter your address" required>
                <input type="text" name="table_no" placeholder="Enter your table number (optional)">
                <input type="number" name="qty" placeholder="Quantity" value="1" min="1" required>
                
                <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
            </fieldset>
        </form>
    </div>
</section>

<style>
/* Improved styling for the order form */
.order-section {
    padding: 40px 0;
    background: #f8f9fa;
}
.order-form {
    max-width: 500px;
    margin: 0 auto;
    background: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
}
.order-form fieldset {
    border: none;
    margin-bottom: 20px;
}
.order-form legend {
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 10px;
}
.order-form input {
    width: 100%;
    padding: 10px;
    margin: 8px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 14px;
}
.order-form .btn-primary {
    width: 100%;
    background: #ff6b6b;
    color: #fff;
    padding: 12px;
    border: none;
    font-size: 16px;
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}
.order-form .btn-primary:hover {
    background: #ff4b4b;
}
.food-details {
    background: #f4f4f4;
    padding: 10px;
    border-radius: 5px;
    text-align: center;
}
.food-price {
    font-weight: bold;
    color: #333;
    margin: 5px 0;
}
</style>

<?php
// Order insert logic
if (isset($_POST['submit'])) {
    $food = $_POST['food'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];
    $total = $price * $qty;
    $order_date = date("Y-m-d H:i:s");
    $status = "Ordered";
    $customer_name = $_POST['full-name'];
    $customer_contact = $_POST['contact'];
    $customer_email = $_POST['email'];
    $customer_address = $_POST['address'];
    $table_no = $_POST['table_no'];

    $sql2 = "INSERT INTO tbl_order SET 
        food = '$food',
        price = '$price',
        qty = '$qty',
        total = '$total',
        order_date = '$order_date',
        status = '$status',
        customer_name = '$customer_name',
        customer_contact = '$customer_contact',
        customer_email = '$customer_email',
        customer_address = '$customer_address',
        table_no = '$table_no'";

    $res2 = mysqli_query($conn, $sql2);

    if ($res2 == true) {
        $_SESSION['order'] = "<div class='success text-center'>Food Ordered Successfully.</div>";
        header('location:' . SITEURL);
    } else {
        $_SESSION['order'] = "<div class='error text-center'>Failed to Order Food.</div>";
        header('location:' . SITEURL);
    }
}
?>

<?php include('partials-front/footer.php'); ?>
