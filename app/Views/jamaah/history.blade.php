<!DOCTYPE html>
<html lang="en">

<head>

  <!-- Required meta tags -->
  <?php $this->include('partials/_header'); ?>
  <!-- end of required meta tags -->

  <!-- Cuztome css here -->
  <?php $this->include('style/_global'); ?>
  <style media="all"> .invoice-box { max-width: 800px; margin: auto; padding: 30px; border: 1px solid #eee; box-shadow: 0 0 10px rgba(0, 0, 0, .15); font-size: 16px; line-height: 24px; font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; color: #555; } .invoice-box table { width: 100%; line-height: inherit; text-align: left; } .invoice-box table td { padding: 5px; vertical-align: top; } .invoice-box table tr td:nth-child(2) { text-align: right; } .invoice-box table tr.top table td { padding-bottom: 20px; } .invoice-box table tr.top table td.title { font-size: 45px; line-height: 45px; color: #333; } .invoice-box table tr.information table td { padding-bottom: 40px; } .invoice-box table tr.heading td { background: #eee; border-bottom: 1px solid #ddd; font-weight: bold; } .invoice-box table tr.details td { padding-bottom: 20px; } .invoice-box table tr.item td{ border-bottom: 1px solid #eee; } .invoice-box table tr.item.last td { border-bottom: none; } .invoice-box table tr.total td:nth-child(2) { border-top: 2px solid #eee; font-weight: bold; } @media only screen and (max-width: 600px) { .invoice-box table tr.top table td { width: 100%; display: block; text-align: center; } .invoice-box table tr.information table td { width: 100%; display: block; text-align: center; } } /** RTL **/ .rtl { direction: rtl; font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; } .rtl table { text-align: right; } .rtl table tr td:nth-child(2) { text-align: left; } </style>
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

          <?php if (!empty($this->flash())): ?>
            <br><div class="alert alert-success">
              <small><?php $this->flash('print') ?></small>
            </div>
          <?php endif; ?>

          <div class="page-header">
            <h3 class="page-title">
              <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-account-multiple"></i>
              </span>
              History Transaction
            </h3>
          </div>

          <div class="row">

            <div class="col-md-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12 table-responsive">
                      <table class="table" id="data">
                        <thead style="text-align:center">
                          <tr>
                            <th>Datetime</th>
                            <th>Donation</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Write As</th>
                            <th>View</th>
                          </tr>
                        </thead>
                        <tbody style="text-align:center">
                          <?php foreach ($history as $h): ?>
                            <tr>
                              <td>
                                <?php
                                  $date = new DateTime($h->datetime);
                                  echo $date->format('j F Y, g:i a');
                                ?>
                              </td>
                              <td>
                                <?php if ($h->status_out == 'project'): ?>
                                  Mosque Development
                                <?php elseif ($h->status_out == 'tpa'): ?>
                                  Infaq TPA
                                <?php elseif ($h->status_out == 'orphanage'): ?>
                                  Infaq Orphanage
                                <?php elseif ($h->status_out == 'poor'): ?>
                                  Infaq Poor
                                <?php endif; ?>
                              </td>
                              <td>
                                Rp <?= number_format(($h->fund),0,',','.') ?>
                              </td>
                              <td>
                                <?php if ($h->confirmation == true): ?>
                                  <div class="text-success"> <b>Confirmed</b> </div>
                                <?php else: ?>
                                  <div class="text-danger"> <b>Checking</b> </div>
                                <?php endif; ?>
                              </td>
                              <td>
                                <?php if ($h->public == 'true'): ?>
                                  <?= $_SESSION['user']->username ?>
                                <?php else: ?>
                                  Hamba Allah
                                <?php endif; ?>
                              </td>
                              <td>
                                <?php if ($h->confirmation == true): ?>
                                  <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#invoice<?= $h->id ?>">Invoice</a>
                                  <button type="submit" onclick="printDiv('printableArea<?= $h->id ?>')" class="btn btn-sm btn-primary"> <i class="mdi mdi-printer"></i> </button>
                                  <!-- Modal Avatar -->
                                  <div class="modal fade" id="invoice<?= $h->id ?>" tabindex="-1" role="dialog" aria-labelledby="avatar" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="avatar">Invoice</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body" id="printableArea<?= $h->id ?>">
                                            <div class="invoice-box">
                                              <style media="all"> .invoice-box { max-width: 800px; margin: auto; padding: 30px; border: 1px solid #eee; box-shadow: 0 0 10px rgba(0, 0, 0, .15); font-size: 16px; line-height: 24px; font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; color: #555; } .invoice-box table { width: 100%; line-height: inherit; text-align: left; } .invoice-box table td { padding: 5px; vertical-align: top; } .invoice-box table tr td:nth-child(2) { text-align: right; } .invoice-box table tr.top table td { padding-bottom: 20px; } .invoice-box table tr.top table td.title { font-size: 45px; line-height: 45px; color: #333; } .invoice-box table tr.information table td { padding-bottom: 40px; } .invoice-box table tr.heading td { background: #eee; border-bottom: 1px solid #ddd; font-weight: bold; } .invoice-box table tr.details td { padding-bottom: 20px; } .invoice-box table tr.item td{ border-bottom: 1px solid #eee; } .invoice-box table tr.item.last td { border-bottom: none; } .invoice-box table tr.total td:nth-child(2) { border-top: 2px solid #eee; font-weight: bold; } @media only screen and (max-width: 600px) { .invoice-box table tr.top table td { width: 100%; display: block; text-align: center; } .invoice-box table tr.information table td { width: 100%; display: block; text-align: center; } } /** RTL **/ .rtl { direction: rtl; font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; } .rtl table { text-align: right; } .rtl table tr td:nth-child(2) { text-align: left; } </style>
                                              <table cellpadding="0" cellspacing="0">
                                                  <tr class="top">
                                                      <td colspan="2">
                                                          <table>
                                                              <tr>
                                                                  <td class="title">
                                                                      <img src="<?php $this->url('images/favicon.png') ?>" style="height: 50px;width:50px; max-width:300px;">
                                                                  </td>

                                                                  <td>
                                                                      Invoice #: <?= $h->id ?><br>
                                                                      Created: <?=  $date->format('j F Y') ?><br>
                                                                  </td>
                                                              </tr>
                                                          </table>
                                                      </td>
                                                  </tr>

                                                  <tr class="heading">
                                                    <td>Worship Place</td>
                                                    <td>
                                                        <?= $h->name ?>
                                                    </td>
                                                  </tr>
                                                  <tr class="details">
                                                    <td>Donatur</td>
                                                    <td>
                                                        <?= $_SESSION['user']->username ?>
                                                    </td>
                                                  </tr>

                                                  <tr class="heading">
                                                      <td>Donation</td>
                                                      <td>
                                                        <?php if ($h->status_out == 'project'): ?>
                                                          Mosque Development
                                                        <?php elseif ($h->status_out == 'tpa'): ?>
                                                          Infaq TPA
                                                        <?php elseif ($h->status_out == 'orphanage'): ?>
                                                          Infaq Orphanage
                                                        <?php elseif ($h->status_out == 'poor'): ?>
                                                          Infaq Poor
                                                        <?php endif; ?>
                                                      </td>
                                                  </tr>

                                                  <tr class="details">
                                                      <td>Fund</td>
                                                      <td>
                                                          Rp <?= number_format(($h->fund),0,',','.') ?>
                                                      </td>
                                                  </tr>

                                                  <tr class="heading">
                                                    <td>
                                                        Payment Method
                                                    </td>
                                                    <td>
                                                        <?php if ($h->status_in == 'transfer jamaah'): ?>
                                                          Transfer
                                                        <?php elseif($h->status_in == 'cash jamaah'): ?>
                                                          Cash
                                                        <?php endif; ?>
                                                    </td>
                                                  </tr>
                                                  <tr class="details">
                                                    <td>
                                                        Status
                                                    </td>
                                                    <td>
                                                      <?php if ($h->confirmation == true): ?>
                                                        <div class="text-success" name="button"> <b>Confirmed</b> </div>
                                                      <?php else: ?>
                                                        <div class="text-danger"> <b>Checking</b> </div>
                                                      <?php endif; ?>
                                                    </td>
                                                  </tr>
                                              </table>
                                          </div>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                          </div>
                                        </div>
                                    </div>
                                  </div>
                                  <!-- End Modal -->
                                <?php else: ?>
                                  <a href="<?php $this->url('jamaah/checking?id='. $this->encrypt($h->id)) ?>" class="btn btn-sm btn-warning">Payment</a>
                                <?php endif; ?>
                              </td>
                            </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
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
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" charset="utf-8"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js" charset="utf-8"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#data').DataTable({
        "dom": '<"clear"f><"clear">',
        "language": {
            "lengthMenu": '_MENU_ ',
                "search": '',
                "searchPlaceholder": "search"
        }
    });
    } );

    function printDiv(divName) {
         var printContents = document.getElementById(divName).innerHTML;
         var originalContents = document.body.innerHTML;
         document.body.innerHTML = printContents;
         window.print();
         document.body.innerHTML = originalContents;
    }
  </script>
  <script src="<?php $this->url('script/js/dashboard.js') ?>"></script>
  <!-- End custom js for this page-->
</body>

</html>