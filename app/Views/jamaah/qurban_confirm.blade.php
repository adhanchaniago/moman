<!DOCTYPE html>
<html lang="en">

<head>

  <!-- Required meta tags -->
  <?php $this->include('partials/_header'); ?>
  <!-- end of required meta tags -->

  <!-- Cuztome css here -->
  <?php $this->include('style/_global'); ?>
  <!-- end custome -->

</head>
<body onload="loading()">
  <div class="container-scroller">

    <!-- partial:partials/_navbar.html -->
    <?php $this->include('partials/_navbar'); ?>
    <!-- partial -->

    <div class="container-fluid page-body-wrapper">

      <!-- partial:partials/_sidebar.html -->
      <?php $this->include('partials/_sidebar_jamaah'); ?>
      <!-- partial -->

      <div class="main-panel">
        <div class="content-wrapper">

          <div class="row">

            <div class="col-md-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="container">
                        <?php $date = new DateTime($qurban->date); ?>
                        <h4 class="float-left">Qurban Transaction: #<?= $date->format('Ymd') . $qurban->order_number . $qurban->jamaah_id; ?></h4>
                      </div>
                    </div>
                    <div class="col-md-12" style="margin-top: 10px">
                      <div class="container">
                        <table class="table">
                          <tr>
                            <td>Animal</td>
                            <td>:</td>
                            <td>
                              <?= count($detail) ?> <?= $animal->animal ?>
                            </td>
                          </tr>
                          <tr>
                            <td>Payment Information</td>
                            <td>:</td>
                            <td>
                              <?php foreach ($accounts as $key): ?>
                                <labeli><?= $key->bank_name ?> (<?= $key->rekening_number ?>)</label>
                              <?php endforeach; ?>
                            </td>
                          </tr>
                          <tr>
                            <td>Confirmation</td>
                            <td>:</td>
                            <td>
                              After making a payment, please confirm immediately following to:<br><br>
                              <?php foreach ($stewards as $key): ?>
                                <b><?= $key->name ?> - <?= $key->phone ?> (SMS or Whatsapp)</b>
                              <?php endforeach; ?>
                            </td>
                          </tr>
                          <tr>
                            <td>Total Payment</td>
                            <td>:</td>
                            <td>
                              Rp <?= number_format((count($detail) * $animal->animal_price),0,',','.') ?>
                            </td>
                          </tr>
                          <tr>
                            <td>Payment History</td>
                            <td>:</td>
                            <td>
                              <?php if ($qurban->uang_muka): ?>
                                <li>Uang Muka : Rp <?= number_format(($qurban->uang_muka),0,',','.') ?></li>
                                <li>Uang Pelunasan : Rp <?= number_format(($qurban->uang_pelunasan),0,',','.') ?></li>
                              <?php else: ?>
                                Belum ada pembayaran!
                              <?php endif; ?>
                            </td>
                          </tr>
                          <tr>
                            <td>Status</td>
                            <td>:</td>
                            <td>
                              <?php if ($qurban->payment_completed == true): ?>
                                <div class="text-success" name="button"> <b>Payment Completed</b> </div>
                              <?php else: ?>
                                <div class="text-danger"> <b>Payment Incomplete</b> </div>
                              <?php endif; ?>
                            </td>
                          </tr>
                          <tr>
                            <td>Invoice</td>
                            <td>:</td>
                            <td>
                              <a href="<?php $this->url('jamaah/qurban') ?>" class="btn btn-sm btn-success">Check Invoice Payment</a>
                            </td>
                          </tr>
                        </table>

                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>

        </div>
        <!-- content-wrapper ends -->

        <!-- partial:partials/_footer.php -->
        <?php $this->include('partials/_footer'); ?>
        <!-- partial -->

      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <?php $this->include('partials/_plugin'); ?>

  <!-- Custom js for this page-->

  <!-- End custom js for this page-->
</body>

</html>
