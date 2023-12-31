<?php
    class Jogador extends Modelo{
        protected static $colunas = [
            'id', 
            'nome',
            'sobrenome',
            'cpf',
            'dt_nascimento'
        ];
        protected static $nome_tabela = 'Jogador';
        
        public function save(){
            $this->validar();
            
            return parent::save();  
        }
        
        private function validar(){

            $ano = (int)date('Y', strtotime($this->dt_nascimento))-(int)date('Y');
            $errors = [];
            if($this->nome == "" || strlen($this->nome) < 2){
                $errors['nome'] = 'Valor fornecido para nome está incorreto';
            }
            if($this->sobrenome == "" || strlen($this->sobrenome) < 2){
                $errors['sobrenome'] = 'Valor fornecido para sobrenome está incorreto';
            }
            if($this->cpf == "" || strlen($this->cpf) != 11){
                $errors['cpf'] = 'Valor fornecido para cpf está incorreto';
            }
            if($this->dt_nascimento == "" || ($ano < 10 || $ano > 50)){
                $errors['dt_nascimento'] = 'Valor fornecido para data nascimento está incorreto';
            }
            if(count($errors) > 0){
                throw new ValidationException($errors);
            }
        }
    }
?>