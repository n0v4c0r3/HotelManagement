<?php 
include('include/header.php');
 ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Messages</h1>


            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-home mr-1"></i>
                    Feedbacks/messages
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Message</th>
                            </thead>
                            <span></span>
                            <tbody>
                                <?php
                                    $sql = "SELECT * FROM `message` ORDER BY `id` desc";
                                    $result = $conn->query($sql);
                                    while($row = $result->fetch_assoc())
                                    {
                                        echo '
                                            <tr>
                                                <td>'.$row["name"].'</td>
                                                <td>'.$row["mail"].'</td>
                                                <td><span class="text-danger">'.$row["sub"].'</span></br><span class="text-primary">'.$row["msg"].'</span></td>
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