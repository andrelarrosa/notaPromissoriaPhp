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
        $var = '
        <div class="borda">
        <p style="text-align: center;">
            <b>NOTA PROMISSÓRIA (Nº '.$i.'   de   '.$quantidade.'  )</b>
        </p>
        <p>Vencimento: <b> '.$primeiroVencimento.'  </b>.</p>
        <p><b>R$ '. strtoupper(valor_por_extenso($valorNota)) .' </b></p>
        <p>No dia <b > '.$primeiroVencimento.'  </b> pagarei por esta via de NOTA PROMISSÓRIA a <b class="background">  '.$nomeCredor.'  </b>, CPF (ou CNPJ) nº   '.$cpfCnpjCredor.'   ou a sua ordem a quantia de   '.strtoupper(valor_por_extenso($valorNota)).'   reais.</p>
        <p>Pagável na Rua  '.$rua.'  , nº   '.$numero.'   -   '.$bairro.'   na cidade de   '.$cidade.'   -   '.$estado.'  .</p>
        <p>Emitente:  '.$nomeDevedor.'  , CPF (ou CNPJ) nº   '.$cpfCnpjDevedor.'  , com endereço à Rua   '.$rua.'  , nº   $numero   -   '.$bairro.'   na cidade de   '.$cidade.'   -   '.$estado.'   - CEP   '.$cep.'  .</p>
        <p>'.$cidade.'   -   '.$estado.'  ,   '.$emissao.'  .</p>
        <p>Referência:  '.$referencia.'</p>
        <hr style="margin-left: 10%; margin-right: 10%; margin-top: 10%;">
        <p style="text-align: center;"> '.$nomeDevedor.'  </p>
    </div>
    <br>';
    echo $var;
    echo '<button id="imprimir" class="btn btn-center" onclick="imprimir()" type="button">Imprimir</input>';

    }

    
    function valor_por_extenso($v){
		
        $v = filter_var($v, FILTER_SANITIZE_NUMBER_INT);
            $sin = array("centavo", "real", "mil", "milhão", "bilhão", "trilhão", "quatrilhão");
            $plu = array("centavos", "reais", "mil", "milhões", "bilhões", "trilhões","quatrilhões");
    
            $c = array("", "cem", "duzentos", "trezentos", "quatrocentos","quinhentos", "seiscentos", "setecentos", "oitocentos", "novecentos");
            $d = array("", "dez", "vinte", "trinta", "quarenta", "cinquenta","sessenta", "setenta", "oitenta", "noventa");
            $d10 = array("dez", "onze", "doze", "treze", "quatorze", "quinze","dezesseis", "dezesete", "dezoito", "dezenove");
            $u = array("", "um", "dois", "três", "quatro", "cinco", "seis","sete", "oito", "nove");
    
            $z = 0;
     
            $v = number_format( $v, 2, ".", "." );
            $int = explode( ".", $v );
     
            for ( $i = 0; $i < count( $int ); $i++ ) 
            {
                for ( $ii = mb_strlen( $int[$i] ); $ii < 3; $ii++ ) 
                {
                    $int[$i] = "0" . $int[$i];
                }
            }
    
            $rt = null;
            $fim = count( $int ) - ($int[count( $int ) - 1] > 0 ? 1 : 2);
            for ( $i = 0; $i < count( $int ); $i++ )
            {
                $v = $int[$i];
                $rc = (($v > 100) && ($v < 200)) ? "cento" : $c[$v[0]];
                $rd = ($v[1] < 2) ? "" : $d[$v[1]];
                $ru = ($v > 0) ? (($v[1] == 1) ? $d10[$v[2]] : $u[$v[2]]) : "";
     
                $r = $rc . (($rc && ($rd || $ru)) ? " e " : "") . $rd . (($rd && $ru) ? " e " : "") . $ru;
                $t = count( $int ) - 1 - $i;
                $r .= $r ? " " . ($v > 1 ? $plu[$t] : $sin[$t]) : "";
                if ( $v == "000")
                    $z++;
                elseif ( $z > 0 )
                    $z--;
                    
                if ( ($t == 1) && ($z > 0) && ($int[0] > 0) )
                    $r .= ( ($z > 1) ? " de " : "") . $plu[$t];
                    
                if ( $r )
                    $rt = $rt . ((($i > 0) && ($i <= $fim) && ($int[0] > 0) && ($z < 1)) ? ( ($i < $fim) ? ", " : " e ") : " ") . $r;
            }
     
            $rt = mb_substr( $rt, 1 );
     
            return($rt ? trim( $rt ) : "zero");
     
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