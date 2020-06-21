<?php 
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        // Fetching variables of the form which travels in URL
        $color = $_POST['name'];
        
        if($color != NULL )
        {
            setcookie('background_color',$color);
            //  To redirect form on a particular page
            header("location:show_color.php");
        }
    }
    if($_GET['color']==='invalid')
    {
        echo "Invalid color";
    }

    echo '<form method="post" >
    <input type="text" name="name" value="background">
    <input type="submit" value="Submit">
   </form>';
?>
