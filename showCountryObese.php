<?php
include("dbFunctions.php");

$statistics = array();

// 1. Create Query - All Statistics
$query = "SELECT * "
       . "FROM statistics";

// 2. Execute Query
$result = mysqli_query($link, $query);

// 3. Store Row in Array
while ($row = mysqli_fetch_assoc($result)) {
    $statistics[] = $row;
}

mysqli_close($link);
?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>View Obesity and Population by country</title>
        <!-- jQuery -->
        <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
        <!-- Bootstrap CSS  & JS -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <!-- JS for this file -->
        <script src="js/showCountryObese.js" type="text/javascript"></script>
    </head>

    <body>
        
        <div class="container m-5">
           
            <!-- Select Input - Country -->
            <select id="idCountry" class="mb-3">
                <option selected disabled >Please select</option>
                <?php
                for ($i = 0; $i < count($statistics); $i++) { ?>
                    <option value="<?php echo $statistics[$i]['id']; ?>">
                        <?php echo $statistics[$i]['country']; ?>
                    </option>                 
                <?php } ?> 
            </select>

            <!-- Table - Statistics -->
            <table class="table table-striped" id="obeseTable">
                <thead>
                    <tr>
                        <th>Population</th>
                        <th>Obese</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
        
    </body>
</html>