<?php 
    Class Resultado extends Modelo{
        protected static $colunas = [
            'id',
            'gols_pro',
            'gols_contra',
            'id_jogo',
            'id_time'
        ];
        protected static $nome_tabela = 'Resultado';

        private function validar(){
            $errors = [];

            if($this->gols_pro < 0){
                $errors['gols_pro'] = 'Gols pro devem valores positivos.';
            }
            if($this->gols_contra < 0){
                $errors['gols_contra'] = 'Gols contra devem valores positivos.';
            }
            if(!($this->id_jogo) || $this->id_jogo == 0){
                $errors['id_jogo'] = 'Jogo é obrigatório para gerar resultado.';
            }
            if(!($this->id_time) || $this->id_time == 0){
                $errors['id_time'] = 'Time é obrigatório para cadastrar jogo.';
            }
            
        }
    }
?>