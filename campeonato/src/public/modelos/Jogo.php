<?php 
    Class Jogo extends Modelo {
        protected static $colunas = [
            'id',
            'id_edicao',
            'id_time_visitante',
            'id_time_casa',
            'dt_jogo'
        ];
        
        protected static $nome_tabela = 'Jogo';

        public function validar(){
            $errors = [];
            
            if($this->id_edicao == "" || !isset($this->id_edicao)){
                $errors['id_edicao'] = "Edição é obrigatória";
            }
            if($this->id_time_visitante == "" || !isset($this->id_time_visitante)){
                $errors['id_time_visitante'] = "Time visitante é obrigatório";
            }
            if($this->id_time_casa == "" || !isset($this->id_time_casa)){
                $errors['id_time_casa'] = "Time da casa é obrigatório";
            }
            if($this->dt_jogo == ""){
                $errors['dt_jogo'] = "Data do jogo é obrigatória";
            }
        }
    }
?>