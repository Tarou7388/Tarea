<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <form id="formulario">
        <label for="id" class="form-label">Casa :</label>
        <select name="id" id="id" class="form-select" required>
            <option value="">Seleccione</option>
        </select>
        <div style="width: 70%; margin: auto;">
            <canvas id="lienzo"></canvas>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
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

            const idselect = $('#id');
            idselect.addEventListener('change', function () {
                const selectValue = idselect.value;
                fetch(`../controllers/Productores.controller.php?operacion=searchListarAlienacion&idpublisher=${selectValue}`)
                    .then(respuesta => respuesta.json())
                    .then(datos => {
                        grafico.data.labels = datos.map(registro => registro.Alienacion)
                        grafico.data.datasets[0].data = datos.map(registro => registro.Heroes)
                        grafico.update();
                    })
                    .catch(e => {
                        console.error(e)
                    });
            })
        })
    </script>

</body>

</html>