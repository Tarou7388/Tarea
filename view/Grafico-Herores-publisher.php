<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Título de tu página</title>

    <!-- Bootstrap CSS v5.3.2 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <div class="container mt-5">
        <form>
            <label for="id" class="form-label">Seleccionar Casa:</label>
            <select name="id" id="id" class="form-select" required>
                <option value="">Seleccione</option>
            </select>

            <div class="mt-3">
                <button id="agregar" class="btn btn-primary">Agregar</button>
                <button id="eliminar" class="btn btn-danger">Eliminar</button>
            </div>

            <div class="mt-4" style="width: 70%; margin: auto;">
                <canvas id="lienzo" class="border border-dark"></canvas>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            function $(id) {
                return document.querySelector(id)
            };
            const contexto = document.querySelector("#lienzo")
            const grafico = new Chart(contexto, {
                type: 'doughnut',
                data: {
                    labels: [],
                    datasets: [{
                        label: "",
                        data: []
                    }]
                }
            });

            (function() {
                fetch(`../controllers/Productores.controller.php?operacion=searchListar`)
                    .then(respuesta => respuesta.json())
                    .then(datos => {
                        datos.forEach(element => {
                            const tagOption = document.createElement("option")
                            tagOption.value = element.id
                            tagOption.innerHTML = element.publisher_name
                            $("#id").appendChild(tagOption)
                        });
                    })
                    .catch(e => {
                        console.error(e)
                    })
            })();

            $("#agregar").addEventListener('click', function(event) {
                event.preventDefault();

                const idselect = $('#id');
                const selectValue = idselect.value;

                fetch(`../controllers/Productores.controller.php?operacion=searchListarCantidad&idpublisher=${selectValue}`)
                    .then(respuesta => respuesta.json())
                    .then(datos => {
                        console.log(datos);
                        // Utiliza push para agregar datos al gráfico
                        grafico.data.labels.push(datos.map(registro => registro.Casa))
                        grafico.data.datasets[0].data.push(datos.map(registro => registro.heroes))
                        grafico.update();
                    })
                    .catch(e => {
                        console.error(e)
                    });
            });
            $("#eliminar").addEventListener('click', function(event) {
                event.preventDefault();
                grafico.data.labels.pop();
                grafico.data.datasets[0].data.pop();
                grafico.update();
            });
        })
        //
    </script>
</body>

</html>