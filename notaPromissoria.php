<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    $nomeCredor = $_POST['nomeDoCredor'];
    $cpfCnpjCredor = !empty($_POST['cpfCredor'])? $_POST['cpfCredor']: $_POST['cnpjCredor'];
    $valorNota = $_POST[''];
    $primeiroVencimento = $_POST[''];
    $emissao = $_POST[''];
    $nomeDevedor = $_POST[''];
    $cpfCnpjDevedor = $_POST[''];
    $cep = $_POST[''];
    $rua = $_POST[''];
    $cidade = $_POST[''];
    $estado = $_POST[''];
    $numero = $_POST[''];
    $bairro = $_POST[''];
    $referencia = $_POST[''];
    $quantidade = $_POST['quantidade'];

    // for ($i = 1; $i <= $quantidade; $i++) {
    //     $var = ' <div class="borda">
    //     <p style="text-align: center;">
    //         <b>NOTA PROMISSÓRIA (Nº' . $i . ' de ' . $quantidadeNotas . ')</b>
    //     </p>
    //     <p>Vencimento: <b>' . $primeiroVencimento . '</b>.</p>
    //     <p><b>R$ extenso(' . $valorNota . ')</b></p>
    //     <p>No dia <b >' . $primeiroVencimento . '</b> pagarei por esta via de NOTA PROMISSÓRIA a <b class="background">' . $nomeCredor . '</b>, CPF (ou CNPJ) nº ' . $cpfCnpjCredor . ' ou a sua ordem a quantia de extenso(' . $valorNota . ') reais.</p>
    //     <p>Pagável na Rua ' . $rua . ', nº ' . $numero . ' - ' . $bairro . ' na cidade de ' . $cidade . ' - ' . $estado . '.</p>
    //     <p>Emitente: ' . $nomeDevedor . ', CPF (ou CNPJ) nº ' . $cpfCnpjDevedor . ', com endereço à Rua ' . $rua . ', nº ' . $numero . ' - ' . $bairro . ' na cidade de ' . $cidade . ' - ' . $estado . ' - CEP ' . $cep . '.</p>
    //     <p>' . $cidade . ' - ' . $estado . ', ' . $emissao . '.</p>
    //     <p>Referência: ' . $referencia . '</p>
    //     <hr style="margin-left: 10%; margin-right: 10%; margin-top: 10%;">
    //     <p style="text-align: center;">' . $nomeDevedor . '</p>
    // </div>
    // <br>';
    // }

    
    ?>
</body>

</html>