<html>
    <head>
        <title>FormularPHP</title>
        <meta charset="UTF-8">
    </head>

    <body>
        <?php
        $auswahl = isset($_POST["auswahl"]) ? $_POST["auswahl"] : null;
        $con = mysqli_connect("","root","","website");
        //$sql = "SELECT * FROM specs ";
        $sql = "SELECT name, price, recommendation, link, id FROM specs ";

        if($auswahl === null) {
            die("Es wurde keine Auswahl getroffen!");
        }
        switch($auswahl) {
            case 1:
            $sql .= "WHERE name LIKE 'Logitech G910 Orion Spectrum'";
            break;
            case 2:
            $sql .= "WHERE name LIKE 'Roccat Kone XTD'";
            break;
            case 3:
            $sql .= "WHERE name LIKE 'GeForce GTX 1050 TI'";
            break;
            case 4:
            $sql .= "WHERE name LIKE 'Asus VS278H 68,6 cm (27 Zoll) Monitor'";
            break;
            case 5:
            $sql .= "WHERE name LIKE 'Razer Gaming Mausmatte'";
            break;
            case 6:
            $sql .= "WHERE name LIKE 'Huawei Matebook 13'";
            break;
            case 7:
            $sql .= "WHERE name LIKE 'Nikon D3100'";
            break;
    }
        
        $res = mysqli_query($con, $sql);
        $num = mysqli_num_rows($res);

        if($num > 0) echo "Es wurden Datensätze gefunden:<br>";
        else echo "Es wurden keine Datensätze gefunden<br>";

        while($dsatz = mysqli_fetch_assoc($res)) {
            echo $dsatz["name"] . "," . $dsatz["price"] . "," . $dsatz["recommendation"] . "," . $dsatz["link"] . "<br>";
         }
         mysqli_close($con);
        ?>
    </body>
</html>