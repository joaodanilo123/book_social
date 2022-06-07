<?php

interface Controller {
    
    public function setAcao(string $acao);

    public function setArgumento(string $argumento);

    public function acionar();

}