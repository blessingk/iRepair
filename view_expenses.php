<?php
include("../doc_expire.php");
?>
<!DOCTYPE html>
<html lang="en">

<?php
include('../head.html');
?>

<body>
<!-- container section start -->
<section id="container" class="">

    <?php
    include('header.php');
    ?>
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-user-md"></i>Expenses section</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
                        <li><i class="fa fa-mobile-phone"></i>Expenses</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <div class="panel-body">
                            <div class="tab-content">
                                <div id="expenses" class="tab-pane active">
                                    <section class="panel">
                                        <div class="panel-body bio-graph-info">
                                            <h1> Expenses List </h1>
                                            <div class="form-group">
                                                <input type="text" id="myUse"  class="col-md-3" onkeyup="searchDatas()" placeholder="Search for expenses.." title="Type in a name"><br>
                                            </div>
                                            <table class="table table-striped table-advance table-hover" id="myTabl">
                                                <tbody>
                                                <tr>
                                                    <th><i class="icon_profile"></i>Technician</th>
                                                    <th><i class="icon_plus-box"></i> Expense</th>
                                                    <th><i class="icon_paperclip"></i>Purpose</th>
                                                    <th><i class="icon_quotations_alt2"></i>Quantity</th>
                                                    <th><i class="icon_cart"></i>Unit Price</th>
                                                    <th><i class="icon_cart_alt"></i>Total Price</th>
                                                    <th><i class="icon_calendar"></i>Date</th>
                                                </tr>
                                                <tr>
                                                    <?php
                                                    //$id=$_GET['record_number'];
                                                    $qry="SELECT * FROM expenses where techName='$FirstName $LastName' ORDER BY expense_id DESC ";
                                                    //var_dump($query3);die();
                                                    $res = $pdo->query($qry);
                                                    if($res->rowCount() > 0){
                                                    while($row = $res->fetch()){
                                                    $id=$row['expense_id'];
                                                    //$equiry=$row['equiry_id'];
                                                    //$id=$row['user_id'];
                                                    //var_dump($row);die();

                                                    ?>
                                                    <td><?php echo $row['techName']; ?></td>
                                                    <td><?php echo $row['expenseName']; ?></td>
                                                    <td><?php echo $row['purpose']; ?></td>
                                                    <td><?php echo $row['quantity']; ?></td>
                                                    <td>R <?php echo $row['amount']; ?>.00</td>
                                                    <td>R <?php echo $row['total']; ?>.00</td>
                                                    <td><?php echo $row['expense_date']; ?></td>
                                                </tr>
                                                <?php
                                                }
                                                }
                                                else{
                                                    echo '<script language="javascript">';
                                                    echo 'alert("No expenses were found")';
                                                    echo '</script>';

                                                }

                                                ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>

                        <!-- page end-->
                    </section>
        </section>
        <!--main content end-->
        <?php
        include('footer.html');
        ?>
    </section>
    <!-- container section end -->
    <!-- javascripts -->
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="../js/jquery.scrollTo.min.js"></script>
    <script src="../js/jquery.nicescroll.js" type="text/javascript"></script>
    <!-- jquery knob -->
    <script src="../assets/jquery-knob/js/jquery.knob.js"></script>
    <!--custome script for all page-->
    <script src="../js/scripts.js"></script>

    <script>
        //knob
        $(".knob").knob();
    </script>
    <script>
        function searchDatas() {
            var input, filter, table, tr, td, i;
            input = document.getElementById("myUse");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTabl");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>


</body>

</html>
