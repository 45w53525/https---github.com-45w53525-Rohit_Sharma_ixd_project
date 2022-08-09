<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Bungee+Shade&family=Ewert&family=Pacifico&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <title>Document</title>
</head>
<body>
<?php
echo '<nav class="navbar navbar-expand-lg bg-primary">';
echo '<div class="container-fluid">';
echo '<a class="navbar-brand h1 bg-li text-light"" href="#">Food-Bank</a>';
echo '<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">';
echo '<span class="navbar-toggler-icon"></span>';
echo '</button>';
echo '<div class="collapse navbar-collapse" id="navbarSupportedContent">';
echo '<ul class="navbar-nav me-auto mb-2 mb-lg-0">';
echo '<li class="nav-item">';
echo '<a class="nav-link active h2 text-light"" aria-current="page" href="#">Home</a>';
echo '</li>';
echo '<li class="nav-item">';
echo '<a class="nav-link h2 text-light"" href="#">Options</a>';
echo '</li>';
echo '<li class="nav-item dropdown">';
echo '<a class="nav-link dropdown-toggle h2 text-light"" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">';
echo 'Departments';
echo '</a>';
echo '<ul class ="dropdown-menu">';
echo '<li><a class="dropdown-item" href="#">Action</a></li>';
echo '<li><a class="dropdown-item" href="#">Another action</a></li>';
echo '<li><hr class="dropdown-divider"></li>';
echo '<li><a class="dropdown-item" href="#">Something else here</a></li>';
echo '</ul>';
echo '</li>';
echo '<li class="nav-item">';
echo '</li>';
echo '</ul>';
echo '<form class="d-flex" role="search">';
echo '<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">';
echo '<button class="btn btn-outline-success" type="submit">Search</button>';
echo '</form>';
echo '</div>';
echo '</div>';
echo '</nav>';
?>
<?php 
  $con = new mysqli('localhost','root','','test');
  $query = $con->query ("
  SELECT * FROM `foodbankcdata` WHERE 1");

  foreach($query as $data)
  {
    $title[]= $data['section'];
    $feedback[]= $data['feedback'];
  }
?>
<div style="width:2000px; font-family: 'Alfa Slab One', cursive; margin: left 40px;">
  <canvas id="myChart"></canvas>
</div>
 
<script>
  // === include 'setup' then 'config' above ===
//   const labels = ['Accessible','Service','Foodquality'];
   const labels = <?php echo json_encode($title)?>;
  const data = {
    labels: labels,
    datasets: [{
      label: 'Food-Bank-Data',
    //   data: [10,20,30,40,50,60,70,80,90,100,110,120,130,140,150,160,170,180,190,200,210,220,230,240,250],
      data:<?php echo json_encode($feedback) ?>,
      backgroundColor: [
        'rgba(255, 99, 132, 0.8)',
        'rgba(255, 159, 64, 0.8)',
        'rgba(255, 205, 86, 0.8)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(54, 162, 235, 0.1)',
        'rgba(153, 102, 255, 0.1)',
        'rgba(201, 203, 207, 0.1)'
      ],
      borderColor: [
        'rgb(255, 99, 132)',
        'rgb(255, 159, 64)',
        'rgb(255, 205, 86)',
        'rgb(75, 192, 192)',
        'rgb(54, 162, 235)',
        'rgb(153, 102, 255)',
        'rgb(201, 203, 207)'
      ],
      borderWidth: 3
    }]
  };
  const config = {
    type: 'bar',
    data: data,
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    },
  };

  var myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
 Chart.defaults.font.size = 18;
 let chart = new Chart(ctx, {
    type: 'line',
    data: data,
    options: {
        plugins: {
            legend: {
                labels: {
                   
                    font: {
                        size: 25
                      
                    }
                }
            }
        }
    }
});


</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>

<?php
echo '<nav class="navbar navbar-expand-lg bg-primary">';
echo '<div class="container-fluid">';
echo '<a class="navbar-brand h1 text-light"" href="#">Foodbank</a>';
echo '<form class="d-flex" role="search">';
echo '</form>';
echo '</nav>';
?>

</body>
</html>