<!DOCTYPE html>
<html lang="hu">
<head>
  <title>Napi menü admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/animate.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
  <style>
  h4 {
    color: red;
  }

  </style>
</head>
<body>
  <?php require_once 'process.php'; ?>
  <?php
  if (isset($_SESSION['message'])): ?>
  <div class="wow slideInDown alert alert-<?=$_SESSION['msg_type']?>">
    <?php
    if(empty($leves) && empty($foetel) && empty($desszert)) {
      echo $_SESSION['message'];
      unset ($_SESSION['message']);
    }
    ?>
  </div>
<?php endif ?>
<div class="container-fluid col-xl-10">
  <?php
  $mysqli = new mysqli ('localhost', 'napietel_krisz', 'mualim13', 'napietel_crud') or die(mysqli_error($mysqli));
  $result = $mysqli->query("SELECT * FROM data") or die($mysqli->error);
  $result_01 = $mysqli->query("SELECT * FROM foetel") or die($mysqli->error);
  $result_02 = $mysqli->query("SELECT * FROM desszert") or die($mysqli->error);
 // pre_r($result);
 // pre_r($result_01);
  //wow slideInRight
  ?>
  <div class="row justify-content wow slideInRight" data-wow-duration="2s" data-wow-delay="0.5s">
    <table class="table col-xl-12">
    <h4>Levesek</h4>
      <?php
      while ($row = $result->fetch_assoc()): ?>
      <tr>
        <td><?php echo $row['leves']; ?></td>
        <td><?php echo "".$row['ar']. "Ft" ;?></td>
      </tr>
      <tr>
        <td>
            <a href="process.php?delete=<?php echo $row['id']; ?>"
              class="btn btn-danger">Delete</a>
            </td>
          </tr>
        <?php endwhile; ?>
        </table>
        <table class="table col-xl-12">
        <h4>Főétel</h4>
        <?php
      while ($row = $result_01->fetch_assoc()): ?>
      <tr>
        <td><?php echo $row['foetel']; ?></td>
        <td><?php echo "".$row['ar_01']. "Ft" ;?></td>
      </tr>
      <tr>
      <td>
            <a href="process.php?delete_01=<?php echo $row['id']; ?>"
              class="btn btn-danger">Delete</a>
            </td>
      </tr>
        <?php endwhile; ?>
        </table>
        <table class="table col-xl-12">
        <h4>Desszertek</h4>
        <?php
      while ($row = $result_02->fetch_assoc()): ?>
      <tr>
        <td><?php echo $row['desszert']; ?></td>
        <td><?php echo "".$row['ar_02']. "Ft" ;?></td>
      </tr>
      <tr>
      <td>
            <a href="process.php?delete_02=<?php echo $row['id']; ?>"
              class="btn btn-danger">Delete</a>
            </td>
      </tr>
        <?php endwhile; ?>
      </table>

    </div>
    <?php
    function pre_r( $array ) {
      echo '<pre>';
      print_r($array);
      echo '</pre>';
    }

    ?>
    <div class="container-fluid col-xl-12">
    <div class="row justify-content-center">
      <form class="" action="" method="POST">
      <div class="form-group">
          <label>Leves</label>
          <input type="text" name="leves" class="form-control" placeholder="Leves" required>
        </div>
        <div class="form-group">
          <label>Ár</label>
          <input type="text" name="ar" class="form-control" placeholder="Ár" required>
        </div>
        <div class="form-group">
          <button type="submit" name="save" class="btn btn-primary">Mentés</button>
        </div>

      </form>

    </div>

  </div>

  <div class="row justify-content-center">
      <form class="" action="" method="POST">
      <div class="form-group">
          <label>Főétel</label>
          <input type="text" name="foetel" class="form-control" placeholder="foetel" required>
        </div>
        <div class="form-group">
          <label>Ár</label>
          <input type="text" name="ar_01" class="form-control" placeholder="Ár" required>
        </div>
        <div class="form-group">
          <button type="submit" name="save_01" class="btn btn-primary">Mentés</button>
        </div>

      </form>

    </div>

  </div>

  <div class="row justify-content-center">
      <form class="" action="" method="POST">
      <div class="form-group">
          <label>Desszert</label>
          <input type="text" name="desszert" class="form-control" placeholder="desszert" required>
        </div>
        <div class="form-group">
          <label>Ár</label>
          <input type="text" name="ar_02" class="form-control" placeholder="Ár" required>
        </div>
        <div class="form-group">
          <button type="submit" name="save_02" class="btn btn-primary">Mentés</button>
        </div>

      </form>

    </div>

  </div>

    </div>


  <script src="js/wow.min.js"></script>
  <script>
  new WOW().init();
  </script>
</body>
</html>
