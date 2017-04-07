<?php
    require("../controllers/connect.php");
    $san[]=   "National Institute of Technology, Agartala";
    $san[]=   "Motilal Nehru National Institute of Technology, Allahabad";
    $san[]=   "Maulana Azad National Institute of Technology, Bhopal";
    $san[]=   "National Institute of Technology, Calicut";
    $san[]=   "National Institute of Technology, Durgapur";
    $san[]=   "National Institute of Technology, Hamirpur";
    $san[]=   "Malaviya National Institute of Technology, Jaipur";
    $san[]=   "Dr. B. R. Ambedkar National Institute of Technology, Jalandhar";
    $san[]=   "National Institute of Technology, Jamshedpur";
    $san[]=   "National Institute of Technology, Kurukshetra";
    $san[]=   "Visvesvaraya National Institute of Technology, Nagpur";
    $san[]=   "National Institute of Technology, Patna";
    $san[]=   "National Institute of Technology, Raipur";
    $san[]=   "National Institute of Technology, Rourkela";
    $san[]=   "National Institute of Technology, Silchar";
    $san[]=   "National Institute of Technology, Srinagar";
    $san[]=   "S V National Institute of Technology, Surat";
    $san[]=   "National Institute of Technology Karnataka, Surathkal";
    $san[]=   "National Institute of Technology, Trichy";
    $san[]=   "National Institute of Technology, Tadepalligudem";
    $san[]=   "National Institute of Technology, Warangal";
    $san[]=   "National Institute of Technology, Arunachal Pradesh (Yupia)";
    $san[]=   "National Institute of Technology Sikkim";
    $san[]=   "National Institute of Technology, Goa";
    $san[]=   "National Institute of Technology, Meghalaya";
    $san[]=   "National Institute of Technology, Nagaland";
    $san[]=   "National Institute of Technology, Manipur";
    $san[]=   "National Institute of Technology Mizoram";
    $san[]=   "National Institute of Technology Uttarakhand";
    $san[]=   "National Institute of Technology, Delhi";
    $san[]=   "National Institute of Technology, Pondicherry";
    $san[]=   "IIT Bombay";
    $san[]=   "IIT Delhi";
    $san[]=   "IIT Kharagpur";
    $san[]=   "IIT Kanpur";
    $san[]=   "IIT Roorkee";
    $san[]=   "IIT Madras (Chennai)";
    $san[]=   "IIT Guwahati";
    $san[] =  "IIT Hyderabad"; 
    
    foreach($san as $coll)
    {
        mysqli_query($conn,"INSERT INTO colleges(coll) VALUE('".$coll."')");
    }
?>