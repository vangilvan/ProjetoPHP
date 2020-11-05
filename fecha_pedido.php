<?php
include_once('conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Full Stack Eletro</title>
        <link rel="stylesheet" type="text/css" href="./css/estilo.css" />
        <script src="js/funcoes.js"></script>
    </head>
    <body>
        <header id="cabecalho">
           <!-- Inicio do Menu-->
           <?php include('menu.php');?>
           <!--Fim do menu-->
          <h2>Pedido Realizado com Sucesso</h2>
        </header>
        <main id="conteudo">
<?php

if(isset($_POST['nome']) && isset($_POST['telefone'])){
    $idProd = $_POST['idprod'];
    $sql = "select * from produto WHERE idproduto = $idProd";
    $result = $conn->query($sql);
    $infoProd = $result->fetch_array();

     
     $nome = $_POST['nome'];
     $rua = $_POST['endereco'];
     $num = $_POST['numero'];
     $bairro = $_POST['bairro'];
     $cidade = $_POST['cidade'];
     $endereco = $rua.", ".$num." - ".$bairro.", ".$cidade." - SP";
     $tel = $_POST['telefone'];
     $nomeProd = $infoProd['nome_produto'];
     $precoUni = $infoProd['precofinal'];
     $qtd = $_POST['quantidade'];
     $total = $qtd*$infoProd['precofinal'];

     

     $sqlinsere = "insert into pedidos(idprod, Cliente, Endereco, Telefone, Nome_produto, Valor_unit, Quantidade, Valor_final) values ($idProd,'$nome','$endereco',$tel,'$nomeProd',$precoUni,$qtd,$total)";
     $final= $conn->query($sqlinsere);
     ?>
     <p>Obrigado <strong><?php echo $nome;?></strong> por comprar conosco. Entraremos em contato para maiores detalhes sobre sua compra.</p>
     <button type="button" name="envia" onclick="location.href='produtos.php'">Continuar Comprando</button>
     <?php
    
    }else{
        ?>
        <p>Informações incorretas foram enviadas, por favor tente novamente.</p>
        <?php

    }

  

?>
</main>
 <footer id="rodape">
            <p class="pagamento">Formas de pagamento</p>
            <img src="./imagens/pagamentos.jpg" alt="Formas de Pagamento"  />
            <p class="copy">&copy; Recode Pro</p>
        </footer>
    </body>
</html>