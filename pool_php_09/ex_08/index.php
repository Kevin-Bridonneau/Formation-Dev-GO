<?php 
    if($_POST['name'] != NULL)
    {
        echo htmlspecialchars($_POST['name']); 
    }
    else
    {
    ?>
        <form method="post">
            <input type="text" name="name">
            <input type="submit" value="Submit">
        </form>
    <?php 
    }
?>