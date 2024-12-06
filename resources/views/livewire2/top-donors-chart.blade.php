<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ApexCharts with Tailwind CSS</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
  <div class="bg-white shadow-md rounded-lg p-2 max-w-md mx-auto">
    <h2 class="text-2xl font-semibold mb-4">Bar Chart</h2>
    <div id="chart"></div>
  </div>

  <script>
    var options = {
      series: [{
        data: [400, 430, 448, 470]
      }],
      chart: {
        type: 'bar',
        height: 350
      },
      plotOptions: {
        bar: {
          borderRadius: 4,
          borderRadiusApplication: 'end',
          horizontal: true,
        }
      },
      dataLabels: {
        enabled: false
      },
      xaxis: {
        categories: ['Dr Banda', 'Brenda Masi', 'Mrs Chawinya', 'Mendes Group'
          
        ],
      }
    };

    var chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();
  </script>
</body>
</html>
