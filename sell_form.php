<!DOCTYPE html>
<html>
    <head>
        <title>
            sell items
        </title>
    </head>
    <body>
        <?php session_start(); ?>
        <form action = "sell.php" method= "post" enctype="multipart/form-data">
            <select name = "category">
                <option selected="selected" disabled="disabled">select category</option>
                <option>Books</option>
                <option>clothing</option>
                <option>Electronics</option>
                <option>Furniture</option>
                <option>Vechile</option>
                <option>others</option>
            </select><br>
            <input type = "text" name= "title" placeholder="Item Title (Min. length 4 char)"><br>
            <textarea type="text" name="desc" placeholder="Item description (Max. length 200 char)"></textarea><br>
            <textarea type="text" name="contact" placeholder="Contact info (Min. length 4 char)"></textarea><br>
            <input type="radio" name="choice" value="donate">I want to Donate
            <input type="radio" name="choice" value="sell">I want to Sell<br>
            <input type="text" name="price" placeholder="Your Price (In Rs.)"><br>
            <input type="hidden" name="size" value="100000">
            <input type="file" name="image">
            <input type = "submit" name="submit" value = "submit"><br/>
            <div>
                <?= $_SESSION["error"] ?>
            </div>
         </form>
    </body>
</html>