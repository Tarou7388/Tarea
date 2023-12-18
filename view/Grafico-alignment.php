<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <div style="width: 70%; margin: auto;">
    <canvas id="lienzo"></canvas>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    const contexto = document.querySelector("#lienzo")
    const grafico = new Chart(contexto, {
      type: 'radar',
      data: {
        labels: [],
        datasets: [{
          label:"Tipo Combustible",
          data:[]
        }]
      }
    });
  </script>
</body>

</html>