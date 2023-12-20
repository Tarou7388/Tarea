<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
  <form id="formulario">
    <label for="id" class="form-label">Seleccionar Casa:</label>
    <select name="id" id="id" class="form-select" required>
      <option value="" disabled selected>Seleccione una casa</option>
    </select>
    <table class="table table-responsive">
      <thead>
        <tr>
          <th>Nombre Publico</th>
          <th>Nombre completo</th>
          <th>Genero</th>
          <th>Raza</th>
          <th>Casa Productora</th>
        </tr>
      </thead>
      <tbody id="tbody">
        <tr>
        </tr>
      </tbody>
    </table>
  </form>
  <script>
    document.addEventListener("DOMContentLoaded", () => {
      function $(id) {
        return document.querySelector(id)
      };

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

      const idselect = $('#id');
      idselect.addEventListener('change', function() {
        const select = idselect.value
        fetch(`../controllers/Productores.controller.php?operacion=searchAll&idpublisher=${select}`)
          .then(respuesta => respuesta.json())
          .then(datos => {
            console.log(datos)
            const tbody = $("#tbody");
            tbody.innerHTML = "";
            datos.forEach(element => {
              console.log(datos)
              const tr = document.createElement("tr");

              const tdNompub = document.createElement("td");
              tdNompub.textContent = element.superhero_name;
              tr.appendChild(tdNompub);

              const tdNombres = document.createElement("td");
              tdNombres.textContent = element.full_name;
              tr.appendChild(tdNombres);

              const tdGenero = document.createElement("td");
              tdGenero.textContent = element.gender;
              tr.appendChild(tdGenero);

              const tdraza = document.createElement("td");
              tdraza.textContent = element.race;
              tr.appendChild(tdraza);

              const tdProductores = document.createElement("td");
              tdProductores.textContent = element.publisher_name;
              tr.appendChild(tdProductores);

              tbody.appendChild(tr);

            });
          })
          .catch(e => {
            console.error(e)
          });
      })
    })
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-c1g5VPTU5uBDi4uPXiP9t1DTvFPT36IOIFj7bLhbeBE1veaR4N12O7WzR3dmI9uM" crossorigin="anonymous"></script>
</body>

</html>