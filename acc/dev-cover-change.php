

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Update Profile Pic</title>

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
        <form action="dev-cover-change-action.php" method="post" enctype="multipart/form-data"
          class="bg-light p-4 rounded shadow-sm">
          <div class="mb-4 text-center">
            <h3 class="mb-0">Update Cover Picture</h3>
          </div>
          <div class="mb-3">
            <label for="image" class="form-label">Select an Image:</label>
            <input type="file" class="form-control" id="image" name="image">
          </div>
          <div class="d-grid">
            <button type="submit" class="btn btn-primary btn-block" name="login">Upload</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>