<?php
//Include Constants File
include('config/constants.php');
//echo "Delete Page";
//Check whether the id and image name value is set or not
if(isset($_GET['id']) AND isset($_GET['image_name']))
{
//Get the value and Delete
//echo "Get Value and Delete";
$id = $_GET['id'];
$image_name = $_GET['image_name'];
//Remove the physical image file is available
if($image_name != "")
{
//image is Available. So remove it
$path = "../images/category/".$image_name;
//REmove the Tmage
$remove =unlink($path);
if($remove=false)
{
   $_SESSION['remove'] ="<div class='error'>Failed to remove Category Image.</div>";
  header('location:'.SITEURL.'admin/manage-category.php');
    die();
    }
  }

//Delete Data from Database
//REdirect to Manage Category Page with Message
$sql ="DELETE FROM tbl_category WHERE id=$id";
$res =mysqli_query($conn, $sql);
if($res==true)
{
$_SESSION['delete'] ="<div class='success'>Category Deleted Succcessfully.</div>";
header('location:'.SITEURL.'admin/manage-category.php');
}
else
{
    $_SESSION['delete'] ="<div class='error'>failed to delete Category.</div>";
    header('location:'.SITEURL.'admin/manage-category.php');
}

}
else
{
//redirect to Manage Category Page
header('location:'.SITEURL.'admin/manage_category.php');
}
?>