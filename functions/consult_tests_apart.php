<?php
  function show_each_candidates_and_tests($id_superior){
    echo "<div class='container col-xs-12'>";
    require 'server_acess.php';
    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die($conn->connect_error);

    $query  = "SELECT * FROM cadastro_avaliado WHERE id_superior='$id_superior'";
    $result = $conn->query($query);
    if (!$result) die($conn->error);
    elseif ($result->num_rows)
        {
            $rows = $result->num_rows;
            for ($j = 0 ; $j < $rows ; ++$j)
            {
                $result->data_seek($j);
                $row = $result->fetch_array(MYSQLI_NUM);
                $cargo=treat_tipo_avaliacao($row[2]);
                echo<<<END
                <div class="panel panel-default col-md-8 col-xs-12">
                  <div class="panel-heading">
                    <h3> $row[0]</h3>
                    <h5> $cargo</h5>
                    <h5> $row[1]</h5>

                  </div>
                  <div class="panel-body">
                  <div class=''>
                  <table class="table table-striped ">
                      <thead>
                          <tr>
                              <th>Data de Submissão</th>
                              <th>Ação</th>
                          </tr>
                      </thead>
                      <tbody>
END;
                show_dates_from_each($row[4]);
                echo<<<END
                      </tbody>
                  </table>
                  </div>
                  </div>
                </div>

END;
            }
        $result->close();
     }
    echo "</div>";
  }

function show_dates_from_each($id_pessoa){
  require 'server_acess.php';
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die($conn->connect_error);

  $query  = "SELECT * FROM form_submetido WHERE id_avaliado='$id_pessoa' ORDER BY data_submissao ASC";
  $result = $conn->query($query);
  if (!$result) die($conn->error);
  elseif ($result->num_rows)
      {
          $rows = $result->num_rows;
          for ($j = 0 ; $j < $rows ; ++$j)
          {
              $result->data_seek($j);
              $different_row = $result->fetch_array(MYSQLI_NUM);
              $data_limpa=treat_date($different_row[3]);
              echo<<<END
              <tr>
                <th>$data_limpa</th>
                <th>
                  <form action="" method="post">
                      <input name="delete_value" type="hidden" value=$different_row[10]>
                      <button class="btn btn-block btn-danger" type="submit">Deletar</button>
                  </form>
                </th>
              </tr>
END;

          }
      $result->close();
   }
}
function delete_form_data($id_form){
  require_once 'server_acess.php';
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die($conn->connect_error);

  $query  = "DELETE FROM form_submetido WHERE id_do_form = $id_form ";
  $result = $conn->query($query);
  if (!$result) die($conn->error);

}







?>
