        <?php
            require('../views/header.php');
        ?>
        <a href="../public_html/logout.php">Logout</a>
        <form action = "store.php" method="POST">
            <select name = "category">
                <option selected="selected" disabled="disabled">select category</option>
                <option>Books</option>
                <option>clothing</option>
                <option>Electronics</option>
                <option>Furniture</option>
                <option>Vechile</option>
                <option>others</option>
            </select>
            <?php
                require("../controllers/connect.php");
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