<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

</head>
<body>
    <?php
            include "header_wopr.php";
            require "baza_wopr.php";
            require_once "funkcje_wopr.php";
    ?>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper">
        <div class="row row-offcanvas row-offcanvas-right">
            <div class="content-wrapper">
            <div class="row">
                <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-warning text-white">
                    <div class="card-body">
                    <h4 class="font-weight-normal mb-3">Weekly Sales</h4>
                    <h2 class="font-weight-normal mb-5">$ 15,00000.00</h2>
                    <p class="card-text">Incresed by 60%</p>
                    </div>
                </div>
                </div>
                <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-info text-white">
                    <div class="card-body">
                    <h4 class="font-weight-normal mb-3">Weekly Orders</h4>
                    <h2 class="font-weight-normal mb-5">45633456</h2>
                    <p class="card-text">Decreased by 10%</p>
                    </div>
                </div>
                </div>
                <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-success text-white">
                    <div class="card-body">
                    <h4 class="font-weight-normal mb-3">Visitors Online</h4>
                    <h2 class="font-weight-normal mb-5">955741235</h2>
                    <p class="card-text">Increased by 5%</p>
                    </div>
                </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-7 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">Sale Overview</h4>
                    <canvas id="sales-chart"></canvas>
                    </div>
                </div>
                </div>
                <div class="col-md-5 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body d-flex flex-column">
                    <h4 class="card-title">Satisfaction Graph</h4>
                    <div class="mt-auto">
                        <canvas id="satisfaction-chart" height="200"></canvas>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">Recent Tickets</h4>
                    <div class="table-responsive">
                        <table class="table">
                        <thead>
                            <tr>
                            <th>
                                Ticket No.
                            </th>
                            <th>
                                Subject
                            </th>
                            <th>
                                Assignee
                            </th>
                            <th>
                                Status
                            </th>
                            <th>
                                Last Update
                            </th>
                            <th>
                                Tracking ID
                            </th>
                            <th>
                                Priority
                            </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <td>
                                5669
                            </td>
                            <td>
                                Fund is not recieved
                            </td>
                            <td class="py-1">
                                <img src="images/faces/face1.jpg" class="mr-2" alt="image">
                                David Grey
                            </td>
                            <td>
                                <label class="badge badge-gradient-success">DONE</label>
                            </td>
                            <td>
                                Dec 5, 2017
                            </td>
                            <td>
                                WD-12345
                            </td>
                            <td>
                                <i class="mdi mdi-arrow-up text-danger icon-sm mr-1"></i>High
                            </td>
                            </tr>
                            <tr>
                            <td>
                                5670
                            </td>
                            <td>
                                High loading time
                            </td>
                            <td class="py-1">
                                <img src="images/faces/face2.jpg" class="mr-2" alt="image">
                                Stella Johnson
                            </td>
                            <td>
                                <label class="badge badge-gradient-warning">PROGRESS</label>
                            </td>
                            <td>
                                Dec 12, 2017
                            </td>
                            <td>
                                WD-12346
                            </td>
                            <td>
                                <i class="mdi mdi-arrow-up text-danger icon-sm mr-1"></i>High
                            </td>
                            </tr>
                            <tr>
                            <td>
                                5671
                            </td>
                            <td>
                                Website down for one week
                            </td>
                            <td class="py-1">
                                <img src="images/faces/face3.jpg" class="mr-2" alt="image">
                                Marina Michel
                            </td>
                            <td>
                                <label class="badge badge-gradient-secondary">ON HOLD</label>
                            </td>
                            <td>
                                Dec 16, 2017
                            </td>
                            <td>
                                WD-12347
                            </td>
                            <td>
                                <i class="mdi mdi-arrow-up text-success icon-sm mr-1"></i>Low
                            </td>
                            </tr>
                            <tr>
                            <td>
                                5672
                            </td>
                            <td>
                                Loosing control on server
                            </td>
                            <td class="py-1">
                                <img src="images/faces/face4.jpg" class="mr-2" alt="image">
                                John Doe
                            </td>
                            <td>
                                <label class="badge badge-gradient-success">DONE</label>
                            </td>
                            <td>
                                Dec 3, 2017
                            </td>
                            <td>
                                WD-12348
                            </td>
                            <td>
                                <i class="mdi mdi-arrow-up text-warning icon-sm mr-1"></i>Medium
                            </td>
                            </tr>
                        </tbody>
                        </table>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
</body>