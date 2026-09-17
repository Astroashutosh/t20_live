<?php include('config.php')  ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Register — T20</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="assets/css/animations.css">
</head>
<body>

<div class="bg-ambient"></div>
<canvas id="particle-canvas"></canvas>

<nav class="navbar navbar-expand-lg navbar-veri">
  <div class="container">
    <a class="navbar-brand navbar-brand-veri" href="index">
      <span class="brand-mark"><i class="bi bi-hexagon-fill"></i></span>T20
    </a>
    <a href="login" class="text-secondary small">Already have an account? <span style="color: var(--accent);">Log in</span></a>
  </div>
</nav>

<section class="d-flex align-items-center" style="min-height: calc(100vh - 76px);">
  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-lg-5 col-md-7">
        <div class="glass-card card-glow-border p-4 p-md-5" id="registerCard">

          <!-- Form state -->
          <div id="formState">
            <div class="text-center mb-4">
              <div class="eyebrow justify-content-center mb-2">View account</div>
            </div>

            <form id="registerForm" novalidate>
              <input name="baseurl" id="baseurl" type="HIDDEN" value="<?= $base_url; ?>">
              <div class="mb-3">
                <label class="form-label small text-secondary">User ID</label>
                <input type="text" class="form-control form-veri" id="userid" placeholder="Enter Address">
              </div>

              <button type="button" class="btn btn-veri-primary w-100 btn-lg" id="registerSubmitBtn" onclick="viewAccount()">
                Create Account
              </button>
            </form>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bignumber.js/9.0.2/bignumber.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
<!-- <script src="assets/js/wallet.js"></script> -->
<script src="assets/js/app.js"></script>
<script src="js/web3.min.js"></script>
<script src="js/abi.js"></script>
<script src="js/contract_setting.js"></script>

</body>
</html>
