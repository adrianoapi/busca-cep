<?php

//Passa o CEP a ser pesquisado
$cep = "02513000";

//Verifica a válidade do valor informado
if (is_numeric($cep) && strlen($cep) == 8) {
    $xml = simplexml_load_file("http://cep.republicavirtual.com.br/web_cep.php?cep={$cep}&formato=xml");
    if ($xml->resultado > 0) {
        echo "Estado: <strong>" . $xml->uf . "</strong> \n";
        echo "Cidade: <strong>" . $xml->cidade . "</strong> \n";
        echo "Bairro: <strong>" . $xml->bairro . "</strong> \n";
        echo "Rua: <strong>" . $xml->logradouro . "</strong> \n";
    } else {
        echo "O CEP <strong>{$cep}</strong> não foi encontrado!";
    }
} else {
    echo "O CEP <strong>{$cep}</strong> é inválido!";
}