<?php 
    class Login extends Modelo{
        public function validate(){
            $errors =[];

            if(!$this->email){
                $errors['email'] = 'Email é obrigatório';
            }
            if(!$this->senha){
                $errors['senha'] = 'Senha é obrigatória';
            }

            if(count($errors) >0 ){
                throw new ValidationException($errors);
            }
        }

        public function verificarLogin(){
            $this->validate();
            $usuario = Usuario::selectOne(['email' => $this->email]);
            if($usuario){
                if(md5($this->senha) == $usuario->senha){
                    return $usuario;
                }
            }
            throw new AppException('Usuário ou senha inválidos.');
        }
    }

?>