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
  <table class="table table-responsive">
    <thead>
      <tr>
        <th>Alienacion</th>
        <th>Cantidad</th>
      </tr>
    </thead>
    <tbody id="tbody">
      <tr>
      </tr>
    </tbody>
  </table>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    function $(id) { return document.querySelector(id) };
    const contexto = document.querySelector("#lienzo")
    const grafico = new Chart(contexto, {
      type: 'bar',
      data: {
        labels: [],
        datasets: [{
          label: "cantidad de personas",
          data: []
        }]
      }
    });
    (function () {
      fetch(`../controllers/alienacion.controller.php?operacion=search`)
        .then(respuesta => respuesta.json())
        .then(datos => {

          grafico.data.labels = datos.map(registro => registro.alienamiento)
          grafico.data.datasets[0].data = datos.map(registro => registro.total)
          grafico.update();
          const tbody = $("#tbody");
          tbody.innerHTML = "";
          datos.forEach(element => {
            const tr = document.createElement("tr");

            const tdalienacion = document.createElement("td");
            tdalienacion.textContent = element.alienamiento;
            tr.appendChild(tdalienacion);

            const tdcantidad = document.createElement("td");
            tdcantidad.textContent = element.total;
            tr.appendChild(tdcantidad);

            tbody.appendChild(tr);
          })
        })
        .catch(e => {
          console.error(e)
        })
    })();
  </script>
</body>

</html>