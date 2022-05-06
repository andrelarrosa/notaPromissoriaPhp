<?php
function data_por_extenso($data)
{
    $date = explode('-', $data);
    $dia_extenso = [
        "01"   => "UM",
        "02"   => "DOIS",
        "03"   => "TRÊS",
        "04"   => "QUATRO",
        "05"   => "CINCO",
        "06"   => "SEIS",
        "07"   => "SETE",
        "08"   => "OITO",
        "09"   => "NOVE",
        "10"  => "DEZ",
        "11"  => "ONZE",
        "12"  => "DOZE",
        "13"  => "TREZE",
        "14"  => "QUATORZE",
        "15"  => "QUINZE",
        "16"  => "DEZESSEIS",
        "17"  => "DEZESSETE",
        "18"  => "DEZOITO",
        "19"  => "DEZENOVE",
        "20"  => "VINTE",
        "21"  => "VINTE E UM",
        "22"  => "VINTE E DOIS",
        "23"  => "VINTE E TRÊS",
        "24"  => "VINTE E QUATRO",
        "25"  => "VINTE E CINCO",
        "26"  => "VINTE E SEIS",
        "27"  => "VINTE E SETE",
        "28"  => "VINTE E OITO",
        "29"  => "VINTE E NOVE",
        "30"  => "TRINTA",
        "31"  => "TRINTA E UM",
    ];
    $mes_extenso = array(
        "01" => 'JANEIRO',
        "02" => 'FEVEREIRO',
        "03" => 'MARÇO',
        "04" => 'ABRIL',
        "05" => 'MAIO',
        "06" => 'JUNHO',
        "07" => 'JULHO',
        "08" => 'AGOSTO',
        "09" => 'SETEMBRO',
        "10" => 'OUTUBRO',
        "11" => 'NOVEMBRO',
        "12" => 'DEZEMBRO'
    );
    return $dia_extenso[$date[2]] . " DE " . $mes_extenso[$date[1]] . " DE " . $date[0];
}


function valor_por_extenso($v)
{

    $v = filter_var($v, FILTER_SANITIZE_NUMBER_INT);
    $sin = array("centavo", "real", "mil", "milhão", "bilhão", "trilhão", "quatrilhão");
    $plu = array("centavos", "reais", "mil", "milhões", "bilhões", "trilhões", "quatrilhões");

    $c = array("", "cem", "duzentos", "trezentos", "quatrocentos", "quinhentos", "seiscentos", "setecentos", "oitocentos", "novecentos");
    $d = array("", "dez", "vinte", "trinta", "quarenta", "cinquenta", "sessenta", "setenta", "oitenta", "noventa");
    $d10 = array("dez", "onze", "doze", "treze", "quatorze", "quinze", "dezesseis", "dezesete", "dezoito", "dezenove");
    $u = array("", "um", "dois", "três", "quatro", "cinco", "seis", "sete", "oito", "nove");

    $z = 0;

    $v = number_format($v, 2, ".", ".");
    $int = explode(".", $v);

    for ($i = 0; $i < count($int); $i++) {
        for ($ii = mb_strlen($int[$i]); $ii < 3; $ii++) {
            $int[$i] = "0" . $int[$i];
        }
    }

    $rt = null;
    $fim = count($int) - ($int[count($int) - 1] > 0 ? 1 : 2);
    for ($i = 0; $i < count($int); $i++) {
        $v = $int[$i];
        $rc = (($v > 100) && ($v < 200)) ? "cento" : $c[$v[0]];
        $rd = ($v[1] < 2) ? "" : $d[$v[1]];
        $ru = ($v > 0) ? (($v[1] == 1) ? $d10[$v[2]] : $u[$v[2]]) : "";

        $r = $rc . (($rc && ($rd || $ru)) ? " e " : "") . $rd . (($rd && $ru) ? " e " : "") . $ru;
        $t = count($int) - 1 - $i;
        $r .= $r ? " " . ($v > 1 ? $plu[$t] : $sin[$t]) : "";
        if ($v == "000")
            $z++;
        elseif ($z > 0)
            $z--;

        if (($t == 1) && ($z > 0) && ($int[0] > 0))
            $r .= (($z > 1) ? " de " : "") . $plu[$t];

        if ($r)
            $rt = $rt . ((($i > 0) && ($i <= $fim) && ($int[0] > 0) && ($z < 1)) ? (($i < $fim) ? ", " : " e ") : " ") . $r;
    }

    $rt = mb_substr($rt, 1);

    return ($rt ? trim($rt) : "zero");
}
?>