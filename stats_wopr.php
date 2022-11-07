<?php session_start(); ?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="plugins/chartist.min.css" rel="stylesheet">
    <link href="css/style_stats.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <?php
        include "header_wopr.php";
        require_once 'funkcje_wopr.php';
        $wykres = month_stats($_SESSION["ID_USER"],0);
        $akcje_dzien = month_stats($_SESSION["ID_USER"],1);
        $srednia_akcja = month_stats($_SESSION["ID_USER"],2);
        include "./classes/database_c.php";
        include "./classes/load_action_c.php";
        $akcje_obj = new Action();
        $akcje_limit = $akcje_obj->get_top_7($_SESSION["ID_USER"]);
        $akcje_urazy = $akcje_obj->count_urazy($_SESSION["ID_USER"]);
        //$akcje_limit = load_action($conn, $_SESSION["ID_USER"],1);
        //$akcje_urazy = load_action($conn,$_SESSION["ID_USER"],2);
    ?>
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" style="padding-top:80px;"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Razem Akcji</h3>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <li>
                                    <div id="sparklinedash"><canvas width="67" height="30"
                                            style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                    </div>
                                </li>
                                <li class="ms-auto"><span class="counter text-success" id="razem_akcji">659</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Akcje Tego Dnia</h3>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <li>
                                    <div id="sparklinedash2"><canvas width="67" height="30"
                                            style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                    </div>
                                </li>
                                <li class="ms-auto"><span class="counter text-purple"><?php echo $akcje_dzien[0]["COUNT(id)"]?></span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Średnia Długość Akcji</h3>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <li>
                                    <div id="sparklinedash3"><canvas width="67" height="30"
                                            style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                    </div>
                                </li>
                                <li class="ms-auto"><span class="counter text-info"><?php echo round($srednia_akcja[0]["srednia"]/60,1)."h";?></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title">Liczba Akcji w Konkretnych Miesiącach</h3>
                            <div id="ct-visits" style="height: 450px;">
                                <div class="chartist-tooltip" style="top: -17px; left: -12px;"><span
                                        class="chartist-tooltip-value">6</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                            <div class="d-md-flex mb-3">
                                <h3 class="box-title mb-0">Ostatnie Akcje</h3>
                            </div>
                            <div class="table-responsive">
                                <table class="table no-wrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">Id</th>
                                            <th class="border-top-0">Imie i Nazwisko</th>
                                            <th class="border-top-0">Start Akcji</th>
                                            <th class="border-top-0">Koniec Akcji</th>
                                            <th class="border-top-0">Rodzaj Urazu</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    for($p=0;$p<count($akcje_limit);$p++){
                                    echo '
                                        <tr>
                                            <td>'.$akcje_limit[$p]["id"].'</td>
                                            <td class="txt-oflo">'.$akcje_limit[$p]["victim_name"].'</td>
                                            <td>'.$akcje_limit[$p]["action_start"].'</td>
                                            <td class="txt-oflo">'.$akcje_limit[$p]["action_end"].'</td>
                                            <td><span class="text-success">'.$akcje_limit[$p]["injury_type"].'</span></td>
                                        </tr>';
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-lg-8 col-sm-12">
                        <div class="card white-box p-0">
                            <div class="card-body">
                                <h3 class="box-title mb-0">Z Kim Najcześciej Miałeś akcje</h3>
                            </div>
                            <div class="comment-widgets">
                                <div class="d-flex flex-row comment-row p-3 mt-0">
                                    <div class="p-2"><img src="plugins/images/users/varun.jpg" alt="user" width="50" class="rounded-circle"></div>
                                    <div class="comment-text ps-2 ps-md-3 w-100">
                                        <h5 class="font-medium">James Anderson</h5>
                                        <span class="mb-3 d-block">Lorem Ipsum is simply dummy text of the printing and type setting industry.It has survived not only five centuries. </span>
                                        <div class="comment-footer d-md-flex align-items-center">
                                             <span class="badge bg-primary rounded">Pending</span>
                                             
                                            <div class="text-muted fs-2 ms-auto mt-2 mt-md-0">April 14, 2021</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex flex-row comment-row p-3">
                                    <div class="p-2"><img src="plugins/images/users/genu.jpg" alt="user" width="50" class="rounded-circle"></div>
                                    <div class="comment-text ps-2 ps-md-3 active w-100">
                                        <h5 class="font-medium">Michael Jorden</h5>
                                        <span class="mb-3 d-block">Lorem Ipsum is simply dummy text of the printing and type setting industry.It has survived not only five centuries. </span>
                                        <div class="comment-footer d-md-flex align-items-center">

                                            <span class="badge bg-success rounded">Approved</span>
                                            
                                            <div class="text-muted fs-2 ms-auto mt-2 mt-md-0">April 14, 2021</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex flex-row comment-row p-3">
                                    <div class="p-2"><img src="plugins/images/users/ritesh.jpg" alt="user" width="50" class="rounded-circle"></div>
                                    <div class="comment-text ps-2 ps-md-3 w-100">
                                        <h5 class="font-medium">Johnathan Doeting</h5>
                                        <span class="mb-3 d-block">Lorem Ipsum is simply dummy text of the printing and type setting industry.It has survived not only five centuries. </span>
                                        <div class="comment-footer d-md-flex align-items-center">

                                            <span class="badge rounded bg-danger">Rejected</span>
                                            
                                            <div class="text-muted fs-2 ms-auto mt-2 mt-md-0">April 14, 2021</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="card white-box p-0">
                            <div class="card-heading">
                                <h3 class="box-title mb-0">Najczęstsze Urazy</h3>
                            </div>
                            <div class="card-body">
                                <ul class="chatonline">
                                <?php
                                for($o=0;$o<count($akcje_urazy);$o++){ 
                                    echo '
                                        <li>
                                            <a href="javascript:void(0)" class="d-flex align-items-center"><span class="text-dark">'.$akcje_urazy[$o]['injury_type'].':</span>
                                                <div class="ms-2">
                                                    <span class="text-dark">'.$akcje_urazy[$o]['ilosc'].'</span>
                                                </div>
                                            </a>
                                        </li>';
                                }
                                ?>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="jquery/jquery.min.js"></script>
    <script src="plugins/jquery.sparkline.min.js"></script>
    <script src="plugins/chartist.min.js"></script>
    <script src="plugins/chartist-plugin-tooltip.min.js"></script>
    <script>
        var wykresArray = <?php echo json_encode($wykres);?>;
        $(function () {
            "use strict";
            const chart1 = new Chartist.Bar('#ct-visits', {
                labels: [],
                series: [[]]
            }, {
                top: 0,
                low: 0,
                showPoint: true,
                fullWidth: true,
                plugins: [
                    Chartist.plugins.tooltip()
                ],
                axisY: {
                    labelInterpolationFnc: function (value) {
                        return (value);
                    }
                },
                showArea: true
            });

            let suma_akcji = 0;
            var chart = [chart];
            for(let i=0;i<wykresArray.length;i=i+2){
                chart1.data.labels.push(wykresArray[i]);
                chart1.data.series[0].push(wykresArray[i+1]);
                suma_akcji=suma_akcji+Number(wykresArray[i+1]);
            }
            document.getElementById("razem_akcji").textContent=suma_akcji;            
            //alert(chart1.data.labels);
            var sparklineLogin = function () {
                $('#sparklinedash').sparkline([0, 5, 6, 10, 9, 12, 4, 9], {
                    type: 'bar',
                    height: '30',
                    barWidth: '4',
                    resize: true,
                    barSpacing: '5',
                    barColor: '#7ace4c'
                });
                $('#sparklinedash2').sparkline([0, 5, 6, 10, 9, 12, 4, 9], {
                    type: 'bar',
                    height: '30',
                    barWidth: '4',
                    resize: true,
                    barSpacing: '5',
                    barColor: '#7460ee'
                });
                $('#sparklinedash3').sparkline([0, 4, 6, 10, 9, 12, 4, 9], {
                    type: 'bar',
                    height: '30',
                    barWidth: '4',
                    resize: true,
                    barSpacing: '5',
                    barColor: '#11a0f8'
                });
            }
            var sparkResize;
            $(window).on("resize", function (e) {
                clearTimeout(sparkResize);
                sparkResize = setTimeout(sparklineLogin, 500);
            });
            sparklineLogin();
        });
        
    </script>
</body>

</html>