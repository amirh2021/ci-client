<div class="container-fluid">
    <?= $this->session->flashdata('info'); ?>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List Data Customer</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="customerTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="1%">No</th>
                            <th width="10%">CUSTOMER ID</th>
                            <th width="15%">CUSTOMER NAME</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                                $no = '1';
                                $curl = curl_init();

                                curl_setopt_array($curl, array(
                                  CURLOPT_URL => 'https://api-test.godig1tal.com/customer/all_customer',
                                  CURLOPT_RETURNTRANSFER => true,
                                  CURLOPT_ENCODING => '',
                                  CURLOPT_MAXREDIRS => 10,
                                  CURLOPT_TIMEOUT => 0,
                                  CURLOPT_FOLLOWLOCATION => false,
                                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                  CURLOPT_CUSTOMREQUEST => 'GET',
                                ));

                                $response = curl_exec($curl);

                                curl_close($curl);
                                //echo $response;
                                $data_customer = json_decode($response, true);
                                foreach($data_customer['data'] as $a) :
                            ?>
                            <td><?= $no++; ?></td>
                            <td><?= $a['customer_id']; ?></td>
                            <td><?= $a['customer_name']; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

