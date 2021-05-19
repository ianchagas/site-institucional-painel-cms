<?php
  $pdo = new PDO('mysql:host=localhost;dbname=site_institucional', 'root', '');
  $sobre = $pdo->prepare("SELECT * FROM `tb_sobre`");
  $sobre->execute();
  $sobre = $sobre->fetch()['sobre'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE-edge">
  <meta name="viewport" content="width=device-width, inicial-scale=1">
  <tittle>Painel CMS</tittle>
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="bootstrap/css/style.css" rel="stylesheet">
</head>

<body>

  <nav class="navbar navbar-fixed-top navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Painel Controle</a>
      </div>
      <div id="navbar" class="collapse navbar-collapse">
        <ul id="menu-principal" class="nav navbar-nav">
          <li class="active"><a ref_sys="sobre" href="#">Editar Sobre</a></li>
          <li><a ref_sys="cadastrar_equipe" href="#about">Cadastrar Equipe</a></li>
          <li><a ref_sys="lista_equipe" href="#contact">Lista Equipe</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="?sair"><span class="glyphicon glyphicon-off"></span> Sair</a></li>
        </ul>
      </div>
      <!--/.nav-collapse -->
    </div>
  </nav>

  <div class="box">
    <header id="header">
      <div clas="container">
        <div class="row">
          <div class="col-md-10">
            <h2><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Painel de Controle</h2>
          </div>
          <div class="col-md-2">
            <p><span class="glyphicon glyphicon-time"></span> Seu último login foi em: 21/09/2020</p>
          </div>
        </div>
      </div>
    </header>
    <section class="bread">
      <div class="container">
        <ol class="breadcrumb">
          <li class="active"><a href="#">Home</a></li>
        </ol>
      </div>
    </section>

    <section class="principal">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="list-group">
              <a href="#" class="list-group-item active cor-padrao" ref_sys="sobre">
                <span class="glyphicon glyphicon-pencil"></span> Sobre
              </a>
              <a href="#" class="list-group-item" ref_sys="cadastrar_equipe">
                <span class="glyphicon glyphicon-pencil"></span> Cadastrar Equipe
              <a href="#" class="list-group-item" ref_sys="lista_equipe">
                <span class="glyphicon glyphicon-list-alt"></span> Lista Equipe
                <span class="badge">2</span>
              </a>      
              </a>
            </div>
          </div>
          <div class="col-md-9">

          <?php
            if(isset($_POST['editar_sobre'])) {
              $sobre = $_POST['sobre'];
              if($sobre === '') {
                echo '<div class="alert alert-danger" role="alert">
                Campo <b>Sobre</b> vazio. Favor Preencher!</div>';
              }else{
                $pdo->exec("DELETE FROM `tb_sobre`");
                $sql = $pdo->prepare("INSERT INTO `tb_sobre` VALUES (null, ?)");
                $sql->execute(array($sobre));
                echo '<div class="alert alert-success" role="alert">
                O código HTML <b>Sobre</b> foi editado com sucesso!</div>';
                $sobre = $pdo->prepare("SELECT * FROM `tb_sobre`");
                $sobre->execute();
                $sobre = $sobre->fetch()['sobre'];
              }
            }else if(isset($_POST['cadastrar_equipe'])) {
              $nome = $_POST['nome_membro'];
              $descricao = $_POST['descricao'];
              if($nome === '' || $descricao === '') {
                echo '<div class="alert alert-danger" role="alert">
                Nome ou descrição vazios. Favor preencher!</div>';
              }else{
                $sql = $pdo->prepare("INSERT INTO `tb_equipe` VALUES (null,?,?)");
                $sql->execute(array($nome,$descricao));
                echo '<div class="alert alert-success" role="alert">
                Membro da equipe cadastrado com sucesso!</div>';
              }
            }
          ?>

            <div id="sobre_section" class="panel panel-default">

              <div class="panel-heading cor-padrao">
                <h3 class="panel-title">Sobre</h3>
              </div>

              <div class="panel-body">
                <form method="post">
                  <div class="form-group">
                    <label for="email">Código HTML</label>
                    <textarea name="sobre" class="form-control text-area-html"><?php echo $sobre; ?></textarea>
                  </div>
                  <input type="hidden" name="editar_sobre" value="">
                  <button type="submit" name="acao" class="btn btn-default">Submit</button>
                </form>
              </div>

            </div>

            
            <div id="cadastrar_equipe_section" class="panel panel-default">
              <div class="panel-heading cor-padrao">
                <h3 class="panel-title">Cadastrar Equipe</h3>
              </div>
              <div class="panel-body">
                <form method="post">
                  <div class="form-group">
                    <label for="nome">Nome do membro</label>
                    <input type="text" name="nome_membro" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="descricao">Descrição do membro</label>
                    <textarea name="descricao" class="form-control text-area-html"></textarea>
                  </div>
                  <input type="hidden" name="cadastrar_equipe">
                  <button type="submit" class="btn btn-default">Submit</button>
                </form>
              </div>
            </div>

            <div id="lista_equipe_section" class="panel panel-default">
              <div class="panel-heading cor-padrao">
                <h3 class="panel-title">Membros da Equipe</h3>
              </div>
              <div class="panel-body">
                <table class="table">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nome do membro</th>
                      <th>#</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php
                      $selecionarMembros = $pdo->prepare("SELECT `id`,`nome` FROM `tb_equipe`");
                      $selecionarMembros->execute();
                      $membros = $selecionarMembros->fetchAll();
                      foreach($membros as $key=>$value) {
                    ?>

                    <tr>
                      <td><?php echo $value['id']; ?></td>
                      <td><?php echo $value['nome']; ?></td>
                      <td>
                        <button id_membro="<?php echo $value['id']; ?>"
                        type="button" class="btn btn-sm btn-danger deletar-membro">
                        <span class="glyphicon glyphicon-trash"></span> Excluir</button>
                      </td>
                    </tr>

                      <?php } ?>

                  </tbody>
                </table>
              </div>
            </div>

          </div>
        </div>
    </section>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="bootstrap/js/ajaxPage.js"></script>


</body>

</html>