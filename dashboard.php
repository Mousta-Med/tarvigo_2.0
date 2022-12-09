<?php
session_start();

include "./models/db.class.php";
$connect = new Db;
$conn = $connect->connection();

require_once "tour.class.php";
// $sql = "SELECT * FROM tours";
// $result = mysqli_query($conn, $sql);
// $i = 0;
// while ($row = mysqli_fetch_assoc($result)) {
//   $t0 = new tour($row['id'], $row['tour_place'], $row['tour_description'], $row['tour_image']);
//   $i++;
// }
$t1 = new tour(1, 'paris', 'testest', 'alaska.png');
$t2 = new tour(1, 'paris', 'testest', 'alaska.png');
$t3 = new tour(1, 'paris', 'testest', 'alaska.png');

include "./models/admin.class.php";
$admin = new admin();
$admin->addtour($t1);
$admin->addtour($t2);
$admin->addtour($t3);

if (!isset($_SESSION['name']) && !isset($_SESSION['password'])) {
  header("location: login.php?login=you must login");
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
  <a href="login.php?logout=1" type="button" class="btn btn-danger">Log out</a>
  <div class="container mt-4">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4>Tour Details
              <a href="add.php" class="btn btn-primary float-end">Add Tour</a>
            </h4>
          </div>
          <div class="card-body">

            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Tour image</th>
                  <th>Tour Place</th>
                  <th>Tour description</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $tour = $admin->gettour();
                for ($i = 0; $i < count($tour); $i++) : ?>
                  <tr>
                    <td><?= $tour[$i]->getid(); ?></td>
                    <td><?= $tour[$i]->getplace(); ?></td>
                    <td><?= $tour[$i]->gettdesc(); ?></td>
                    <td><img src="./img/<?= $tour[$i]->getimage(); ?>" width="50" height="50"></td>
                    <td>
                      <a href="edite.php" class="btn btn-success btn-sm">Edit</a>
                      <a href="dashboard.php" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                  </tr>
                <?php endfor; ?>
              </tbody>
            </table>

          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>


</html>