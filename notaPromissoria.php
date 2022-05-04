<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="./style.css">

<body>

    <?php
    $nomeCredor = $_POST['nomeDoCredor'];
    $cpfCnpjCredor = !empty($_POST['cpfCredor'])? $_POST['cpfCredor']: $_POST['cnpjCredor'];
    $valorNota = $_POST['valorNota'];
    $primeiroVencimento = $_POST['primeiroVencimento'];
    $emissao = $_POST['dataEmissao'];
    $nomeDevedor = $_POST['nomeDevedor'];
    $cpfCnpjDevedor = $_POST['cpfDevedor']?:$_POST['cnpjDevedor'];
    $cep = $_POST['cep'];
    $rua = $_POST['rua'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $numero = $_POST['numero'];
    $bairro = $_POST['bairro'];
    $referencia = $_POST['referencia'];
    $quantidade = $_POST['quantidade']?:1;
    for ($i = 1; $i <= $quantidade; $i++) {
        $var = ' <div class="borda">
        <p style="text-align: center;">
            <b>NOTA PROMISSÓRIA (Nº' . $i . ' de ' . $quantidade . ')</b>
        </p>
        <p>Vencimento: <b> anoParaExtenso(' . $primeiroVencimento . ')</b>.</p>
        <p><b>R$ extenso(' . $valorNota . ')</b></p>
        <p>No dia <b> anoParaExtenso(' . $primeiroVencimento . ')</b> pagarei por esta via de NOTA PROMISSÓRIA a <b class="background">' . $nomeCredor . '</b>, CPF (ou CNPJ) nº ' . $cpfCnpjCredor . ' ou a sua ordem a quantia de extenso(' . $valorNota . ') reais.</p>
        <p>Pagável na Rua ' . $rua . ', nº ' . $numero . ' - ' . $bairro . ' na cidade de ' . $cidade . ' - ' . $estado . '.</p>
        <p>Emitente: ' . $nomeDevedor . ', CPF (ou CNPJ) nº ' . $cpfCnpjDevedor . ', com endereço à Rua ' . $rua . ', nº ' . $numero . ' - ' . $bairro . ' na cidade de ' . $cidade . ' - ' . $estado . ' - CEP ' . $cep . '.</p>
        <p>' . $cidade . ' - ' . $estado . ', anoParaExtenso(' . $emissao . ').</p>
        <p>Referência: ' . $referencia . '</p>
        <hr style="margin-left: 10%; margin-right: 10%; margin-top: 10%;">
        <p style="text-align: center;">' . $nomeDevedor . '</p>
    </div>
    <br>';

    echo $var;
    echo'<button id="imprimir" class="btn btn-center" onclick="imprimir()" type="button">Imprimir</input>';

    }

    
    ?>
</body>

</html>
<script src="./scripts.js"></script>
<script>
    function imprimir(){
        window.print();
    }
</script>