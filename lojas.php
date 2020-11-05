<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Nossas Lojas - Full Stack Eletro</title>
        <link rel="stylesheet" type="text/css" href="./css/estilo.css" />
        <script src="js/funcoes.js"></script>
    </head>
    <body>
        <header id="cabecalho">
            <!-- Inicio do Menu-->
            <?php include('menu.php');?>
            <!--Fim do menu-->
            <h2>Nossas Lojas</h2>
            <hr />  
        </header>
        <main id="conteudo">
            <div class="enderecos">
                <h3>Rio de Janeiro</h3>
                <p>Avenida Presidente Vargas, 5000</p>
                <p>10&ordm; Andar</p>
                <p>Centro</p>
                <p>(21) 3333-3333</p>
            </div>
            <div class="enderecos">
                <h3>São Paulo</h3>
                <p>Avenida Paulista, 985</p>
                <p>3&ordm; Andar</p>
                <p>Jardins</p>
                <p>(11) 4444-4444</p>
            </div>
            <div class="enderecos">
                <h3>Santa Catarina</h3>
                <p>Rua Major Ávila, 370</p>
                <p>Vila Mariana</p>
                <p>(47) 5555-5555</p>
            </div>
        </main>
        <footer id="rodape">
            <p class="pagamento">Formas de pagamento</p>
            <img src="./imagens/pagamentos.jpg" alt="Formas de Pagamento"  />
            <p class="copy">&copy; Recode Pro</p>
        </footer>
    </body>
</html>