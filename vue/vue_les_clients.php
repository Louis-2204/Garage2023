<body class="large-screen">
  <h3>Liste des clients</h3>
  <form action="" method="POST">
    <table class="col-md-5">
      <td><label for="mot">Filtrer par :</label>
        <input class="form-control mb-2" type="text" name="mot" id="mot">
        <input class="btn btn-primary mb-4" type="submit" name="Filtrer" value="Filtrer">
      </td>
    </table>
  </form>
  <br><br>
  <?php
  echo "<h4> Le nombre de clients est de : " . $unControleur->count("client")['nb'] . "</h4>";
  ?>
  <div class="mb-5">
    <div class="wrap col-md-10 shadow">
      <table class="table-responsive card-list-table tab">
        <thead class="first sticky-top">
          <tr>
            <td>Id Client</td>
            <td>Nom Client</td>
            <td>Prénom</td>
            <td>Adresse</td>
            <td>Email</td>
            <td>Téléphone</td>
            <?php
            if (isset($_SESSION['role']) && $_SESSION['role'] == "admin") {
              echo "<td>Opérations</td>";
            }
            ?>
          </tr>
        </thead>
        <tbody>
          <?php
          if (isset($lesClients)) {
            foreach ($lesClients as $unClient) {
              echo "<tr>";
              echo "<td>" . $unClient['idclient'] . "</td>";
              echo "<td>" . $unClient['nom'] . "</td>";
              echo "<td>" . $unClient['prenom'] . "</td>";
              echo "<td>" . $unClient['adresse'] . "</td>";
              echo "<td>" . $unClient['email'] . "</td>";
              echo "<td>" . $unClient['tel'] . "</td>";
              if (isset($_SESSION['role']) && $_SESSION['role'] == "admin") {
                echo "<td>";
                echo "<div>";
                echo "<a href='index.php?page=2&action=edit&idclient=" . $unClient['idclient'] . "'><img src= 'images/edit.png' width='40' heigth='40'> </a>";
                echo "<a href='index.php?page=2&action=sup&idclient=" . $unClient['idclient'] . "'><img src= 'images/sup.png' width='40' heigth='40'> </a>";
                echo "</div>";
                echo "</td>";
              }
              echo "</tr>";
            }
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</body>

<style>
  .tab {
    border: 1px solid #dfdfdf;
  }

  .wrap {
    max-height: 70vh;
    overflow: auto;
  }

  .first {
    top: -2px;
  }

  .first td {
    height: 50px;
  }

  .first tr {
    background: white;
    box-shadow: 0 30px 40px rgba(0, 0, 0, .1);
  }

  /* ::-webkit-scrollbar {
    width: 0.15em;
    height: 0.15em;
  }

  ::-webkit-scrollbar-thumb {
    background: slategray;
  }

  ::-webkit-scrollbar-track {
    background: #b8c0c8;
  } */

  body {
    scrollbar-face-color: slategray;
    scrollbar-track-color: #b8c0c8;
  }

  body,
  html {
    height: 100%;
    width: 100%;
  }

  body {
    font-family: "Roboto";
  }

  button.btn {
    box-shadow: 0 2px 3px rgba(0, 0, 0, 0.2);
    border: 0;
    border-radius: 0px;
  }

  button.btn i {
    margin-right: 3px;
  }

  body.large-screen .card-list-table {
    background: white;
  }

  body.large-screen .card-list-table tbody tr {
    background: transparent;
    box-shadow: none;
    margin: 0;
  }

  body.large-screen .card-list-table thead {
    display: table-header-group;
  }

  body.large-screen .card-list-table thead th:last-child {
    box-shadow: none;
  }

  body.large-screen .card-list-table thead th {
    padding: 12px 24px;
  }

  body.large-screen .card-list-table tbody tr {
    display: table-row;
    padding-bottom: 0;
  }

  body.large-screen .card-list-table tbody tr:nth-of-type(even) {
    background: white;
  }

  body.large-screen .card-list-table tbody td {
    display: table-cell;
    padding: 20px 10px;
    transition: background 0.2s ease-out;
    vertical-align: middle;
  }

  body.large-screen .card-list-table tbody td:after {
    display: none;
  }


  .buttons {
    margin: 10px 0 50px;
  }

  .table-wrapper {
    max-width: 300px;
    width: 80%;
    margin: 0 auto 0;
    max-height: 500px;
    overflow-y: scroll;
    position: relative;
    transition: all 0.2s ease-out;
  }

  @media (min-width: 768px) {
    .table-wrapper {
      background: white;
      box-shadow: 0 2px 3px rgba(0, 0, 0, 0.2);
    }
  }

  .card-list-table {
    background: transparent;
    margin-bottom: 0;
    width: 100%;
  }

  .card-list-table thead {
    display: none;
  }

  .card-list-table tbody tr {
    box-shadow: 0 2px 3px rgba(0, 0, 0, 0.2);
    background: #fff;
    display: block;
    padding: 15px 10px;
    margin: 0 0 10px 0;
  }

  .card-list-table tbody td {
    border: 0;
    display: block;
    padding: 10px 10px 20px 40%;
    position: relative;
  }

  .card-list-table tbody td:first-of-type::after {
    visibility: hidden;
  }

  .card-list-table tbody td:after {
    content: '';
    width: calc(100% - 30px);
    display: block;
    margin: 0 auto;
    height: 1px;
    background: #dfdfdf;
    position: absolute;
    left: 0;
    right: 0;
    top: -6px;
  }

  .card-list-table thead th {
    text-transform: uppercase;
    font-size: 0.85em;
    color: rgba(0, 0, 0, 0.35);
    letter-spacing: 0.5pt;
  }
</style>