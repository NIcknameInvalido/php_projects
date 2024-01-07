<?php 
    class Contrato extends Modelo{
        protected static $colunas = [
            'id',
            'dt_inicio',
            'dt_fim',
            'id_time',
            'id_time'
        ];
        protected static $nome_tabela = 'Contrato';

        public function save(){
            $this->validate();
            parent::save();
        }
        private function validate(){
            $errors = [];

            if($this->dt_inicio == ""){
                $errors['dt_inicio'] = "Data de início não pode ser nula";
            }
            if($this->dt_inicio > $this->dt_fim){
                $errors['dt_fim'] = "Data de fim deve ser maior que data de inicio";
            }
            if($this->id_jogador == "" || $this->id_jogador == 0){
                $errors['id_jogador'] = "Jogador é obrigatório";
            }
            if($this->id_time == "" || $this->id_time == 0){
                $errors['id_time'] = "Time é obrigatório";
            }

            if(count($errors) > 0){
                throw new ValidationException($errors);
            }
        }
    }
?>