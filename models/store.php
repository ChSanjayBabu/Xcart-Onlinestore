        <?php
            require("../controllers/connect.php");
            render("header.php",["back_grd" => "background-pattern.jpg"]);
        ?>
        <script>
            function change_background()
            {
                var cat = document.getElementsByName("category")[0].value;
                var set_back;
                switch(cat)
                {
                    case 0: set_back = "background-pattern.jpg";
                    break;
                    case 1: set_back = "books.jpg";
                    break;
                    case 2: set_back = "clothing.jpg";
                    break;
                    case 3: set_back = "electronics.jpg";
                    break;  
                    case 4: set_back = "furn.jpg";
                    break; 
                    case 5: set_back = "bike.jpg";
                    break;  
                    case 6: set_back = "others.jpg";
                    break;
                }
                document.body.style.backgroundImage = set_back;
            } 
        </script>
        <a href="../public_html/logout.php">Logout</a>
        <form action = "store.php" method="POST">
            <select name = "category" onchange = "change_background()">
                <option selected="selected" disabled="disabled" value ="0">select category</option>
                <option value ="1">Books</option>
                <option value ="2">clothing</option>
                <option value ="3">Electronics</option>
                <option value ="4">Furniture</option>
                <option value ="5">Vechile</option>
                <option value ="6">others</option>
            </select>
            <?php
                $colleges = mysqli_query($conn,"SELECT coll FROM colleges");
            ?>
            <select name="coll">
                    <option selected="selected" disabled="disabled">select college</option>
                <?php  foreach($colleges as $coll): ?>
                    <option value = "<?= $coll["coll"] ?>"><?= $coll["coll"]?></option>
                <?php endforeach ?>
            </select><br/>
            <input type = "submit" name="submit" value = "submit">
        </form>
        <?php
            if(isset($_POST["submit"]))
            {
                if(!isset($_POST["category"]))
                {
                    $list = mysqli_query($conn,"SELECT * FROM items WHERE coll = '".$_POST["coll"]."'");
                }
                else if(!isset($_POST["coll"]))
                {
                    $list = mysqli_query($conn,"SELECT * FROM items WHERE cat = '".$_POST["category"]."'");
                }
                else 
                {
                    $list = mysqli_query($conn,"SELECT * FROM items WHERE cat = '".$_POST["category"]."' AND
                    coll = '".$_POST["coll"]."'");
                }
            }
            else
            {
                $list = mysqli_query($conn,"SELECT * FROM items");
            }
        mysqli_close($conn);
        ?>
        <table>
            <tr>
                <th>img</th>
                <th>title</th>
                <th>description</th>
                <th>price</th>
                <th>coll</th>
                <th>contact info</th>
            </tr>
            <?php foreach($list as $item):?>
                <tr>
                    <td><img src ="../public_html/uploads/<?= $item['img'] ?>" height=100 width=100 alt = '<?= $item["img"] ?>'></td>
                    <td><?= $item["title"] ?></td>
                    <td><?= $item["describe"] ?></td>
                    <td><?= $item["price"] ?></td>
                    <td><?= $item["coll"]?></td>
                    <td><?= $item["cont_info"]?></td>
                </tr>
            <?php endforeach ?>
                
            </tr>
        </table>
    </body>
</html>