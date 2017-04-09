<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Sell Items</title>  
      <link rel="stylesheet" href="../public_html/css/sell.css">  
      <script>
       function chooseFile() {
          document.getElementById("fileInput").click();
          document.getElementById("fileInput").onchange = function() {myFunction()};
          
          function myFunction()
          {
              var x = document.getElementById("fileInput").value;
              var base_name= x.split(/[\\/]/).pop();

              document.getElementById("disp").innerHTML = base_name;
          }
       }
    </script>
</head>

<body>

  <div class="grid">

    <form action="../models/sell.php" method="post" class="form sell"  enctype="multipart/form-data">

      <header class="sell__header">
        <h2 class="sell__title">Upload Details</h2>
      </header>

      <div class="sell__body">
          <select name = "category">
              <option selected="selected" disabled="disabled">select category</option>
              <option>Books</option>
              <option>clothing</option>
              <option>Electronics</option>
              <option>Furniture</option>
              <option>Vechile</option>
              <option>others</option>
          </select><br>
          <input id ="basic" type = "text" name= "title" placeholder="Item Title (Min. length 4 char)"><br>
          <textarea type="text" name="desc" placeholder="Item description (Max. length 200 char)"></textarea><br>
          <textarea type="text" name="contact" placeholder="Contact info (Min. length 4 char)"></textarea><br>
          
          <div id="rad">
              <input type="radio" name="choice" value="donate">I want to Donate  
              <input type="radio" name="choice" value="sell">I want to Sell<br>
          </div>
            
          <div style="height:0px;overflow:hidden">
             <input type="file" id="fileInput" name="fileInput" />
          </div>
          <button type="button" onclick="chooseFile();">Upload Image</button>
          <div id="disp" style="display:inline;margin-left:3px;"></div>
      </div>

      <footer class="sell__footer">
        <input type="submit" value="Submit">
      </footer>

    </form>
  </div>


</body>

</html>
