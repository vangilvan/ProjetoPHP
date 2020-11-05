<?php 
   include_once('conexao.php');

   if(isset($_POST['nome']) && isset($_POST['msg'])){
       $nome = $_POST['nome'];
       $msg = $_POST['msg'];

       $sql = "insert into comentarios(nome, msg) values('$nome','$msg')";
       $result = $conn->query($sql);
   }
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Contato - Full Stack Eletro</title>
        <link rel="stylesheet" type="text/css" href="./css/estilo.css" />
        <script src="js/funcoes.js"></script>
    </head>
    <body>
        <header id="cabecalho">
            <!-- Inicio do Menu-->
            <?php include('menu.php');?>
            <!--Fim do menu-->
            <h2>Contato</h2>
            <hr />
        </header>
        <main id="conteudo">
            <section class="contato">
                <img src="./imagens/e-mail.jpg" width="40px">
                <p class="destaque">contato@fullstackeletro.com</p>
            </section>
            <section class="contato">
                <img src="./imagens/WhatsApp.svg" width="40px">
                <p class="destaque">(11) 99999-9999</p>
            </section>
            <section class="form">
                <form method="post" action="">
                    <label for="nome"><b>Nome:</b></label>
                    <br>
                    <input type="text" name="nome" id="nome" />
                    <br>
                    <label for="msg"><b>Mensagem:</b></label>
                    <br>
                    <textarea name="msg" id="msg"></textarea>
                    <br>
                    <button type="submit" name="envia">Enviar</button>
                </form>
                
                <?php
                $sql = "select * from comentarios";
                $result = $conn->query($sql);

                if($result->num_rows > 0){
                    while($rows = $result->fetch_assoc()){
                        echo "<div class='livro-visita'>";
                        echo "Data: ", $rows['data'], "<br>";
                        echo "Nome: ", $rows['nome'], "<br>";
                        echo "Mensagem: ", $rows['msg'], "<br>";
                        echo "<br><hr />";
                        echo "</div>";
                  }
                
                }else{
                    echo "<div class='livro-visita'>";
                    echo "Nenhum comentário ainda";
                    echo "<hr />";
                    echo "</div>";
                }
              ?>
              
            </section>
        </main>
        <footer id="rodape">
            <p class="pagamento">Formas de pagamento</p>
            <img src="./imagens/pagamentos.jpg" alt="Formas de Pagamento"  />
            <p class="copy">&copy; Recode Pro</p>
        </footer>
    </body>
</html>