<?php
    require_once 'classes/validadados.php';
    $u = new Usuario; //chamando a classe
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/x-icon" href="imagens/favicon.ico">
    <link rel="stylesheet" href="css/estilo.css">  
    <title>Sistema de Login</title>
  </head>
  <body>
    <div class="content-fluid">
      <div class="lg_base">
        <div class="logo">
          <img src="imagens/logo.png" alt="logo Sapiens" class="imglogo">
        </div>
        <div class="tit">
            <h3>Cadastrar Novo Usuário</h3>
        </div>
        <div class="forlogin">
        <form method="POST">
           <div class="mb-3">
            <label for="nome" class="form-label">Nome do Usuário</label>
            <input type="text" class="form-control" id="nome" name="nome" aria-describedby="nome">
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
          </div>
          <div class="mb-3">
            <label for="senha" class="form-label">Senha</label>
            <input type="password" class="form-control" id="senha" name="senha">
          </div>
          <div class="mb-3">
            <label for="conf_senha" class="form-label">Confirmar a Senha</label>
            <input type="password" class="form-control" id="conf_senha" name="conf_senha">
          </div>
          <div class="d-grid gap-2">
            <button class="btn btn-primary" type="submit">Cadastrar</button>
            <a href="index.php"><strong>Fazer Login</strong></a>
          </div>
        </form>
        
    <?php
        //verifica se apos o clique do botao submit foi gerado alguma informação.
        if(isset($_POST['email']))
        {
            $nome           = addslashes($_POST['nome']);
            $email          = addslashes($_POST['email']);
            $senha          = addslashes($_POST['senha']);
            $conf_senha     = addslashes($_POST['conf_senha']);

            if(!empty($email) && !empty($senha))
            {
                $u->conectar("bd_aula5","localhost","root","root");

                if($u->msgerro == "")
                {
                    if($senha == $conf_senha)
                    {
                        if($u->cadastrar($nome, $email, $senha))
                        { ?>
                            <div class="msg-sucesso"> 
                                Cadastrado com sucesso
                            </div>
                  <?php }
                        else
                        { ?>
                            <div class="msg-erro"> 
                                Usuario já cadastrado
                            </div>
                  <?php }
                    }
                    else
                    { ?>
                        <div class="msg-erro"> 
                            As senhas não conferem
              <?php } 
                }
                else
                { ?>
                    <div class="msg-erro"> 
                        <?php echo "Erro; ".$u->msgerro; ?>
          <?php }
        }
        else
        { ?>
            <div class="msg-erro"> 
                Preencha seus dados
            </div>
  <?php }
    }    
?>
        
        </div>
      </div>
    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
  </body>
</html>