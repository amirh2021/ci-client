<?php
$readAPItop10pro = file_get_contents('https://api-test.godig1tal.com/order/top_10_product');
$topten = json_decode($readAPItop10pro, true);
$readAPItop10wor = file_get_contents('https://api-test.godig1tal.com/order/worst_10_product');
$topwor = json_decode($readAPItop10wor, true);
?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $judul; ?></h1>
    </div>
    <!-- Content Row -->
    <div class="row">

        <!-- Content Column -->
        <div class="col-lg-6 mb-4">

            <!-- Project Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">TOP 10 Products</h6>
                </div>
                <div class="card-body">
                    <?php
                        foreach($topten['data'] as $a) :
                    ?>
                    <h4 class="small font-weight-bold"><?= $a['product_name']; ?> ( <?= $a['year_id']; ?> ) <span
                            class="float-right"><?= $a['total_sold']; ?></span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-success" role="progressbar" style="width: <?= $a['total_sold']; ?>%"
                            aria-valuenow="<?= $a['total_sold']; ?>" aria-valuemin="0" aria-valuemax="50"></div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <!-- Content Column -->
        <div class="col-lg-6 mb-4">

            <!-- Project Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Worst 10 Products</h6>
                </div>
                <div class="card-body">
                    <?php
                        foreach($topwor['data'] as $b) :
                    ?>
                    <h4 class="small font-weight-bold"><?= $b['product_name']; ?> ( <?= $b['year_id']; ?> ) <span
                            class="float-right"><?= $b['total_sold']; ?></span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: <?= $b['total_sold']; ?>%"
                            aria-valuenow="<?= $b['total_sold']; ?>" aria-valuemin="0" aria-valuemax="50"></div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>