<?php 
    class Paginacao {
        private $atributos = [];
        private  $totalPaginas;

        private $deslocamento;
        public $paginaAtual;

        public $limiteInicial;

        public $limiteFinal;

        public function __construct($limiteItensPorPagina, $maxLinks, $totalElementos, $paginaAtual){
            $this->totalPaginas = ceil($totalElementos / $limiteItensPorPagina);
            $this->paginaAtual = $paginaAtual;
            $this->limiteFinal = $maxLinks;
            $this->deslocamento = ($paginaAtual - 1) * $limiteItensPorPagina;

            $this->paginar($maxLinks);
        }

        private function definirLimites($maxLinks){
            while($this->paginaAtual > $this->limiteFinal){
                $this->limiteFinal += $maxLinks;
            }
            $this->limiteInicial = $this->limiteFinal - ($maxLinks - 1);
        
            if($this->limiteFinal > $this->totalPaginas){
                $this->limiteFinal = $this->totalPaginas;
            }
        }
        
        private function paginar($maxLinks){
                $this->definirLimites($maxLinks);
                $this->atributos['totalPaginas'] = $this->totalPaginas;
                $this->atributos['paginaAtual'] = $this->paginaAtual ;
                $this->atributos['limiteInicial'] = $this->limiteInicial;
                $this->atributos['limiteFinal'] = $this->limiteFinal;
                $this->atributos['deslocamento'] = $this->deslocamento;
        
        }

        public function __get($indice){
            if(isset($this->atributos[$indice])){
                return $this->atributos[$indice];
            } 
        }
    }
?>