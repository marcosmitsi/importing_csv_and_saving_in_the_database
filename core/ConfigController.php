<?php

namespace Core;

class ConfigController
{
    private string $url;
    public function __construct()
    {
        echo"<p>Carregando a página</p>";

        if(!empty(filter_input(INPUT_GET, "url", FILTER_DEFAULT))){
            $this->url = filter_input(INPUT_GET, "url", FILTER_DEFAULT);
            var_dump($this->url);

            /*$situacao = filter_input(INPUT_GET, "situacao", FILTER_DEFAULT);
            var_dump($situacao);
            $origem = filter_input(INPUT_GET, "origem", FILTER_DEFAULT);
            var_dump($origem);*/
        }else{
            echo "<p>Acessando a pagina Inicial</p>";
        }


    }
}