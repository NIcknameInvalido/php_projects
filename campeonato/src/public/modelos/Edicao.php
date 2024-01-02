<?php 
    Class Edicao extends Modelo{
        protected static $colunas = [
            'id',
            'ano_edicao',
            'dt_inicio',
            'dt_fim',
            'id_campeonato'
        ];

        protected static $nome_tabela = 'Edicao';

        public function save(){
            $this->validar();

            parent::save();
        }

        private function validar(){
            $errors = [];

            if($this->ano_edicao > getFormatedDate()->format('Y')){
                $errors['ano_edicao'] = "Ano não pode ser maior que o ano atual";
            }
            if($this->dt_inicio == ""){
                $errors['dt_inicio'] = "Data de inicio é obrigatória";
            }
            if($this->dt_fim == ""){
                $errors['dt_fim'] = "Data de inicio é obrigatória";
            }
            if($this->dt_inicio > $this->dt_fim){
                $errors['dt_inicio'] = "Data de fim deve ser maior que a data de início";
            }
            if($this->id_campeonato == 0 || !isset($this->id_campeonato)){
                $erros['id_campeonato'] = "Campeonato é obrigatório";
            }

            if(count($errors) > 0){
                throw new ValidationException($errors);
            }
        }
    }
?>