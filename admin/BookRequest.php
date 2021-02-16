<?php 
include('include/header.php');

// reject
if(isset($_POST["reject"]))
{
    $id = $_POST["id"];

    $sql = "UPDATE `reservation_table` SET `status`= 2 WHERE `Rev_id`= '{$_POST["id"]}'";
    $conn->query($sql);
    echo '
    <script>
    alert("Rejected");
    window.location.href = "bookings.php";
    </script>';
}
 ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">New Booking</h1>


            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-calendar-alt mr-1"></i>
                    requests
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Room No</th>
                                    <th>Type</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Total</th>
                                    <th>no of guest</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                    $sql = "SELECT * FROM `reservation_table` WHERE `status` = '0'  ORDER BY `Rev_id` asc";
                                    $result = $conn->query($sql);
                                    while($row = $result->fetch_assoc())
                                    {
                                        echo '
                                            <tr>
                                                <td>'.$row["Rev_roomno"].'</td>
                                                <td>'.$row["Rev_roomtype"].'</td>
                                                <td class="text-success">'.$row["Rev_Sdate"].'</td>
                                                <td class="text-danger">'.$row["Rev_Edate"].'</td>
                                                <td class="text-success">'.$row["Room_total"].'</td>
                                                <td class="text-danger">'.$row["rev_totalguest"].'</td>

                                                <td>
                                                <form action="newbooking.php" method="POST" class="d-inline">
                                                    <input type="hidden" name="id" value='.$row["Rev_id"].'>
                                                    <button type="submit" class="btn btn-primary m-2 " name="View">Approve</button>
                                                </form>

                                                <form action="" method="POST" class="d-inline">
                                                    <input type="hidden" name="id" value='.$row["Rev_id"].'>
                                                    <button type="submit" class="btn btn-danger m-2 " name="reject">Reject</button>
                                                </form>
                                                
                                                </td>
                                            </tr>
                                        ';
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php include('include/footer.php') ?>