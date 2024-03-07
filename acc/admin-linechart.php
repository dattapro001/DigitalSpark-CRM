<!DOCTYPE html>
<html>
<head>
  <title>Line Chart Example</title>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
  <canvas id="myChart"></canvas>

  <script>
  
    var data = {
      labels: ['Label 1', 'Label 2', 'Label 3', 'Label 4'],
      datasets: [{
        label: 'Line Chart',
        data: [10, 20, 15, 25],
        borderColor: 'blue',
        fill: false
      }]
    };


    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'line',
      data: data,
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  </script>
</body>
</html>