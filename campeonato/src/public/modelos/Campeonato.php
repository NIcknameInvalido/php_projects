<?php 
     class Campeonato extends Modelo{
        protected static $colunas = [
            'id',
            'nome'
        ];
        
        protected static $nome_tabela = 'Campeonato';

        public function save(){
            $this->validar();

            $this->id = parent::save();
        }

        private function validar(){
            $errors = [];
    
            if(strlen($this->nome <= 0) || $this->nome == ""){
                $errors['nome'] = "Nome é obrigatório";
             }
             if(count($errors) > 0){
                throw new ValidationException($errors);
             }
        }

        
    }

    

?>