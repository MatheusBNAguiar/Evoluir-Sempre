  <?php

function tratar_manager($person){
        require 'server_acess.php';
        $conn = new mysqli($hn, $un, $pw, $db);
        if ($conn->connect_error) die($conn->connect_error);

        $query  = "SELECT gerente_id FROM data_users WHERE code = $person ";
        $result = $conn->query($query);
        if (!$result) die($conn->error);
        while ($row = $result->fetch_array(MYSQLI_NUM)) {  
        return $row[0];
        
        
    }}

    function tratar_worker($person){
        require 'server_acess.php';
        $conn = new mysqli($hn, $un, $pw, $db);
        if ($conn->connect_error) die($conn->connect_error);

        $query  = "SELECT avaliado_name FROM avaliado_table WHERE avaliado_id= $person ";
        $result = $conn->query($query);
        if (!$result) die($conn->error);
        while ($row = $result->fetch_array(MYSQLI_NUM)) {  
        return $row[0];
 }
  
        
    }
function group_nota_categoria($nota,$categoria){
    $new_array=array();
    $arr_length = count($nota);
    for($i=0;$i<$arr_length;$i++){
        $new_array[]=array("Categoria"=>$categoria[$i],"Nota"=>$nota[$i]);       
        
    }
    return json_encode($new_array);
    
    
    
}

function tratar_data($data){
    $travessao="-";
    $test=explode("-",$data);
    $newdata="{$test[1]}{$travessao}{$test[0]}";
    return $newdata;

}

function tipo_avaliacao($tipo){
    if($tipo=="financeiro")        
        {return "Perfomance Financeiro";}
    else if($tipo=="rep_comercial")        
        {return "Perfomance Representante Comercial";}
    else if($tipo=="televendedor")        
        {return "Perfomance Televendedor";}
    else if($tipo=="gerente_de_cd")        
        {return "Perfomance Gerente de CD";}  
    }
function soma_tudo($questoes){
        $soma=0;
        $arr_length = count($questoes);
        for($i=0;$i<$arr_length;$i++)
        {
            $soma = $soma + intval($questoes[$i]);
        }
        return $soma;
    
}


function calculate_media($questoes){
        $soma=0;
        $arr_length = count($questoes);
        $soma  =  soma_tudo($questoes);
        $media = $soma/$arr_length;
        return $media;
    }
function calculate_percentage($dindin){
        $media=($dindin[1]/$dindin[0])*5;
        if($media>5.0){$media=5.0;}
        return $media;
    
    
}

function print_tables($titulo,$topicos,$notas){
    echo '<table class="table table-striped>"';
    echo "<thead><tr><th>";
    echo $titulo;
    echo '</th></tr></thead><tbody>';
    $arr_length = count($topicos);
    for($i=0;$i<$arr_length;$i++)
    {
        echo "<tr><td>".$topicos[$i]."</td>";
        echo "<td>".$notas[$i]."</td></tr>";
    }
    echo "<tr><td>Média</td><td>";
    echo  calculate_media($notas);
    echo "</td></tr></tbody></table>";
    
}


?>