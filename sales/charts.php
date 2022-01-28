<?php
include("../server/connection.php");
include '../set.php';
$sql = "SELECT username,total FROM sales";
$result	= mysqli_query($db, $sql);
?>
<!DOCTYPE html>
<html>
<head>
    <?php include('../templates/head1.php');
    include('../print.php');
    ?>


    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        // Load the Visualization API and the corechart package.
        google.charts.load('current', {'packages':['corechart']});

        // Set a callback to run when the Google Visualization API is loaded.
        google.charts.setOnLoadCallback(drawChart);

        // Callback that creates and populates a data table,
        // instantiates the pie chart, passes in the data and
        // draws it.
        function drawChart() {

            // Create the data table.
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Topping');
            data.addColumn('number', 'Slices');
            data.addRows([
                ['Mushrooms', 3],
                ['Onions', 1],
                ['Olives', 1],
                ['Zucchini', 1],
                ['Pepperoni', 2]
            ]);

            // Set chart options
            var options = {'title':'How Much Pizza I Ate Last Night',
                'width':400,
                'height':300};

            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
            chart.draw(data, options);
        }
    </script>


</head>
<body>
<div class="contain h-100">
    <?php
    include('../sales/base.php');
    ?>
    <div class="pr-1">

        <?php
            $hostname = 'www.google.com';
            $port_no = '80';

            $st = (bool)@fsockopen($hostname,$port_no,$err_no,$err_str,10);
            if (!$st){
                echo '<h1 align="center" class="pt-5" style="color: #9e9e9e">Oooops!! you are offline, please connect and try again</h1>';
                echo '<div align="center" class="p-5"><a href="charts.php"><button  class="btn btn-outline-info">Refresh</button></a></div>';
            }else {
                echo ' <div id="piechart" style="width: 900px; height: 500px;"></div>';
                echo '<div align="right" class="container p-5"><button  class="btn btn-info" onclick="printSection("s")">Print Charts</button></div>';

            }
        ?>
    </div>
</div>
<script src="../bootstrap4/jquery/jquery.min.js"></script>
<script src="bootstrap4/jquery/accounting.min.js"></script>
<script src="../bootstrap4/jquery/datepicker.js"></script>
<script src="../bootstrap4/js/jquery.dataTables.js"></script>
<script src="../bootstrap4/js/dataTables.bootstrap4.min.js"></script>
<script src="../bootstrap4/js/bootstrap.bundle.min.js"></script>
<script src="../sales/javascript.js"></script>

</body>
</html>
