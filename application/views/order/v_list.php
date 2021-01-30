<div class="container-fluid">
    <?= $this->session->flashdata('info'); ?>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List Data Order
            <button type="button" class="btn btn-sm btn-primary float-right" data-toggle="modal"
                data-target="#tambahorder">
                <i class="fas fa-plus"></i> Add
            </button>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="orderTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="1%">No</th>
                            <th width="10%">ORDER ID</th>
                            <th width="10%">DATE</th>
                            <th width="15%">CUSTOMER NAME</th>
                            <th width="5%">REGION</th>
                            <th width="20%">PRODUCT NAME</th>
                            <th width="10%">SALES</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                                $no = '1';
                                $curl = curl_init();

                                curl_setopt_array($curl, array(
                                  CURLOPT_URL => 'https://api-test.godig1tal.com/order/all_order',
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
                                $data_order = json_decode($response, true);
                                foreach($data_order['data'] as $a) :
                            ?>
                            <td><?= $no++; ?></td>
                            <td><?= $a['order_id']; ?></td>
                            <td><?= $a['date']; ?></td>
                            <td><?= $a['customer_name']; ?></td>
                            <td><?= $a['region']; ?></td>
                            <td><?= $a['product_name']; ?></td>
                            <td><?= $a['sales']; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Add -->
<div class="modal fade" id="tambahorder" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-primary" id="exampleModalLabel"><b>Add Order</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="<?= base_url('order/tambah'); ?>">
            <div class="form-group">
              <label class="control-label col-md-4">Customer Name</label>
              <select class="selectpicker col-md-6" data-style="form-control btn-secondary" name="customer_id" data-live-search="true">
                  <?php
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
                    foreach ($data_customer['data'] as $r) {
                    echo "<option value='$r[customer_id]'>$r[customer_name]</option>";
                    }
                  ?>
              </select>
            </div>
            <div class="form-group">
              <label class="control-label col-md-4">Region</label>
              <select class="selectpicker col-md-3" data-style="form-control btn-secondary" name="country">
                <option value="CA">CA</option>
                <option value="US">US</option>
              </select>
              <select class="selectpicker col-md-3" data-style="form-control btn-secondary" name="region" data-live-search="true">
                <option value="East">East</option>
                <option value="West">West</option>
                <option value="Central">Central</option>
                <option value="South">South</option>
              </select>
            </div>
            <div class="form-group">
              <label class="control-label col-md-4">Product Name</label>
              <select class="selectpicker col-md-6" data-style="form-control btn-secondary" name="product_id" data-live-search="true">
                  <?php
                    $curl = curl_init();

                    curl_setopt_array($curl, array(
                      CURLOPT_URL => 'https://api-test.godig1tal.com/product/all_product',
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
                    $data_product = json_decode($response, true);
                    foreach ($data_product['data'] as $r) {
                    echo "<option value='$r[product_id]'>$r[product_name]</option>";
                    }
                  ?>
              </select>
            </div>
            <div class="form-group pmd-textfield pmd-textfield-floating-label">
              	<label class="control-label" for="datepicker">Select Date</label>
              	<input type="text" class="form-control" id="datepicker" name="datepicker">
            </div>
            <div class="form-group">
              <label for="control-label">Sales</label>
              <input type="text" class="form-control" id="sales" name="sales" placeholder="Enter Your Sales...">
              <input type="hidden" class="form-control" id="no" name="no" value="<?= $no+1 ?>">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Akhir Modal Add -->