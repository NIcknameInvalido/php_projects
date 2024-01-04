<?php 
    class Time extends Modelo{
        protected static $colunas = [
            'id',
            'nome',
            'sigla',
            'ano_fundacao'
        ];
        protected static $nome_tabela = 'Time';

        public function save(){
            $this->validar();
            
            return parent::save();  
        }

        private function validar(){
            $errors = [];
            
            $ano_atual = (INT) date('Y');

            if($this->valores['nome'] == ""){
                $errors['nome'] = "Nome do time é obrigatório";
            }
            if($this->valores['sigla'] == ""){
                $errors['sigla'] = "Sigla do time é obrigatória";
            }
            if($this->valores['ano_fundacao'] == ""){
                $errors['ano_fundacao'] = "Ano de fundação é obrigatório";
            }
            if($this->valores['ano_fundacao'] > $ano_atual){
                $errors['ano_fundacao'] = "Ano não pode ser maior que o ano atual";
            }   
            if(count($errors) > 0){
                throw new ValidationException($errors);
            }
        }
    }
?>