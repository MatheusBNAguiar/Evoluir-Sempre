<?php
function show_correct_bars($area){
  $nome=$_SESSION['Nome'];
  if($area=="ger"){
    echo<<<END
    <div class="container-fluid row">
         <div class="col-xs-12 navbar">
                <a class="name">$nome</a>
                <form action="" method="post">
                        <button name="get_out" type="submit" class="btn link_out" href="">Sair</button></form>

        </div>
        <div class="col-md-2 col-xs-12 side_menu ">
                    <a class="link_menu" href="main_page.php">
                        <i class="fa fa-home"></i>
                        Home
                    </a>
                    <a class="link_menu" href="manager_make_avaliacoes.php"><i class="fa fa-tasks">
                        </i>
                        Fazer análise
                    </a>

                    <a class="link_menu" href="consulta_avaliacoes.php">
                        <i class="fa fa-search">
                        </i>
                        Visualizar</a>
                    <a class="link_menu" href="manager_administra_avaliados.php">
                        <i class="fa fa-group">
                        </i> Administrar avaliados
                    </a>
                    <a class="link_menu" href="manager_administra_avaliacoes.php">
                        <i class="fa fa-file-text">
                        </i> Administrar avaliacoes
                    </a>

                </div>


END;

  }
  else{
    echo<<<END
    <div class="container-fluid row">
         <div class="col-xs-12 navbar">
                <a class="name">$nome</a>
                <form action="" method="post">
                        <button name="get_out" type="submit" class="btn link_out" href="">Sair</button></form>

        </div>

                <div class="col-md-2 col-xs-12 side_menu ">
                    <a class="link_menu" href="main_page.php">
                        <i class="fa fa-home"></i>
                        Home
                    </a>

                    <a class="link_menu" href="consulta_avaliacoes.php">
                        <i class="fa fa-search">
                        </i>
                        Visualizar</a>
                        <a class="link_menu" href="pres_administra_gerentes.php">
                            <i class="fa fa-group">
                            </i> Administrar Gerentes
                        </a>
                </div>
            

END;

  }






}
function show_correct_areas($area){
  $nome=$_SESSION['Nome'];
  if($area=="ger"){
    echo<<<END

                    <div class="col-xs-10 content ">

                        <div class="col-lg-4 col-md-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tasks fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="h3">Realizar Avaliações</div>
                                    </div>
                                </div>
                            </div>
                            <a href="manager_make_avaliacoes.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Avaliar</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>

                        <div class="col-lg-4 col-md-12">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-search fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="h3">Consultar Avaliações</div>
                                    </div>
                                </div>
                            </div>
                            <a href="consulta_avaliacoes.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Consultar</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>

                        <div class="col-lg-4 col-md-12">
                        <div class="panel panel-warning">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-group fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="h3">Administrar Avaliados</div>
                                    </div>
                                </div>
                            </div>
                            <a href="manager_administra_avaliados.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Administrar</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-file-text fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="h3">Administrar Avaliações</div>
                                </div>
                            </div>
                        </div>
                        <a href="manager_administra_avaliacoes.php">
                            <div class="panel-footer">
                                <span class="pull-left">Administrar</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                    </div>



            </div>

END;

  }
  else{
    echo<<<END
                    <div class="col-xs-10 content ">

                        <div class="col-lg-4 col-md-12">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-search fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="h3">Consultar Avaliações</div>
                                    </div>
                                </div>
                            </div>
                            <a href="consulta_avaliacoes.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Consultar</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>

                        <div class="col-lg-4 col-md-12">
                        <div class="panel panel-warning">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-group fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="h3">Administrar Gerentes</div>
                                    </div>
                                </div>
                            </div>
                            <a href="pres_administra_gerentes.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Administrar</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>

                    </div>



            </div>

END;

  }

}
function show_footer(){
  echo<<<END
  <footer class="copyright">
  <p class="text-center">Software feito pela Autojun - Empresa Júnior de Controle e Automação</p>
  <img class="img-responsive "src="templates/main_logo-min.png">

  </footer>
END;


}


?>
