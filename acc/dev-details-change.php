<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
    <style>
  body{
    background-color:#8cb0bc;
  }

</style>
</head>
<body>
<div class="container-fluid mt-5">
    <div class="row justify-content-center mt-5">
      <div class="col-lg-4 col-md-6 col-sm-12">
        <form action="dev-details-change-action.php" method="post" enctype="multipart/form-data"
          class="bg-light p-4 rounded shadow-sm">
          <div class="mb-4 text-center">
            <h3 class="mb-0">Update Biography</h3>
          </div>
          <div class="mb-3">
            <label for="" class="form-label">Mobile Number</label>
            <input type="number" class="form-control" id=" " name="mobile">
          </div>
          <div class="mb-3">
            <label for="" class="form-label">Skills</label>
            <input type="text" class="form-control" id=" " name="skill">
          </div>
          <div class="d-grid">
            <button type="submit" class="btn btn-primary btn-block" name="login">Upload</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>