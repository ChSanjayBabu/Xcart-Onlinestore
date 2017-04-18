        <?php
            require("../controllers/connect.php");
            if(!isset($_POST["category"]))
            {
                render("header.php",["back_grd" => "background-pattern.jpg"]);
            }
            else
            {
                $cat = $_POST["category"];
                $set_back = "books.jpg";
                $color;
                switch($cat)
                {
                    case "Books": $set_back = "book.jpg";
                    break;
                    case "clothing": $set_back = "clothing.jpg";
                    break;
                    case "Electronics": $set_back = "elect.png";
                    break;  
                    case "Furniture": $set_back = "furn.jpg";
                    break; 
                    case "Vechile": $set_back = "vehicle.jpg";
                    break;  
                    case "others": $set_back = "background-pattern.jpg";
                    break;
                    default:
                    $set_back = "background-pattern.jpg";
                }
                render("header.php",["back_grd" => $set_back]);     
            }
            if($_SESSION["email"] != "")
            {
                echo "<a id = 'log' style = 'color: #665851;text-decoration: none;font-weight: 900;font-size: 18px;padding-right: 20px;' href='../public_html/logout.php'>logout</a><br>";

            }
            else
            {
                echo "<a id = 'log' style = 'color: #665851;text-decoration: none;font-weight: 900;font-size: 18px;padding-right: 20px;'href='../models/login.php'>login</a><br>";
            }
        ?>
        <script>/*global $*/
            function func()
            {
                var bg = $('body').css('background-image');
                bg = bg.replace('url(','').replace(')','').replace(/\"/gi, "");
                var base_name= bg.split(/[\\/]/).pop();
                var col;
                if(base_name == ("clothing.jpg" || "bike.jpg"))
                {
                    col = "white";
                }
                else if(base_name == "book.jpg")
                {
                    col = "#323232";
                }
                else if(base_name == "furn.jpg")
                {
                    col ="black";
                }
                else if(base_name == "vehicle.jpg")
                {
                    col ="#ffffe0";
                }
                else if(base_name == "background-pattern.jpg")
                {
                    col ="#ffffff";
                }
                else
                {
                    col = "#bf8040";
                }
                var elems = document.getElementsByClassName("box");
                for (var i = 0; i < elems.length; i++) 
                {
                    document.getElementsByClassName("box")[i].style.color = col;
                    document.getElementsByClassName("link")[i].style.color = col;
                    document.getElementById("log").style.color = col;
                    document.getElementById("sell").style.color = col;
                }
            }
        </script>
        <form  action = "store.php" method="POST">
            <select style = "width :15%;font-size :100%;padding : 8px;font-family: 'Lato', sans-serif;
       color: #666;border-radius: 2px;margin-bottom: 15px;"name = "category">
                <option selected="selected" disabled="disabled" value ="0">select category</option>
                <option >Books</option>
                <option >clothing</option>
                <option >Electronics</option>
                <option >Furniture</option>
                <option >Vechile</option>
                <option >others</option>
            </select>
            <?php
                require("../controllers/config.php");
                $colleges = mysqli_query($conn,"SELECT coll FROM colleges");
            ?>
            <select style = "width :15%;font-size :100%;padding : 8px;font-family: 'Lato', sans-serif;
                border-radius: 2px;margin-bottom: 15px;"name="coll">
                    <option selected="selected" disabled="disabled">select college</option>
                <?php  foreach($colleges as $coll): ?>
                    <option value = "<?= $coll["coll"] ?>"><?= $coll["coll"]?></option>
                <?php endforeach ?>
            </select><br/>
            <input style ="	margin-top: 8px;border: 0;border-radius: 2px;color: white;padding: 10px;
	            font-weight: 400;font-size: 11px;letter-spacing: 1px;background-color: #665851;
	            cursor:pointer;outline: none;"type = "submit" name="submit" value = "submit">
        </form>
        <?php
            if(isset($_POST["submit"]))
            {
                if(!isset($_POST["category"]) && !isset($_POST["coll"]))
                {
                    $list = mysqli_query($conn,"SELECT * FROM items");
                }
                else if(!isset($_POST["category"]))
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
        <div id = "back_img">
            
        </div>
        <table>
            <div >
                <?php foreach($list as $item):?>
                    <tr class="box" style="margin-top:150px;font-family: 'Lato', sans-serif;color : #000000">
                        <td style="padding:10px;">
                            <img width="160" height="160"style="margin-left: 100px;float:left;" src ="../public_html/uploads/<?= $item['img'] ?>" height=100 width=100 alt = '<?= $item["img"] ?>'\>
                            <div style="margin-left:300px;padding:5px;">
                                <h2 style="display:inline;"><?= $item["title"] ?></h2></br>
                                by <?= $item["fname"]?></br> 
                                From <?= $item["coll"]?></br></br>
                                <?php if($item["choice"] == "donate" )
                                      {
                                        $price = "free of cost";
                                      }
                                      else
                                      {
                                        $price = $item["price"];
                                      }
                                ?>
                                Price : &#x20B9;<?= $price ?></br></br>
                                <a class = "link" style="font-weight:bold;" href="../public_html/seller.php?img=<?= $item['img'] ?>">Contact seller</a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach ?>
            </div>
        </table>
    </body>
</html>