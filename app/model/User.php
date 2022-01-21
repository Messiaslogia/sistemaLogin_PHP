<?php


use lib\Database\Connection;

class User
{
    /**
     * Id do usúario
     *
     * @var $id
     */
    private $id;
    /**
     * User name do usuário
     *
     * @var $username
     */
    private $username;
    /**
     * Senha do usuário
     *
     * @var $password
     */
    private $password;

    /**
     * Metodo responsavel por verificar se os dados do usuário trazidos do formulário
     * são iguais ao do banco de dados.
     *
     * @return bool
     */
    public function validateLogin(){
        $conn = Connection::getConn();
        //selecionar o usuario que tenha o mesmo email do informado
        $sql = 'SELECT * FROM users WHERE username = :username';

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':username', $this->email);
        $stmt->execute();

        if ($stmt->rowCount()) {
            $result = $stmt->fetch();

            if ($result['password'] === $this->password) {
                $_SESSION['usr'] = array(
                    'id_user' => $result['id'], 
                    'name_user' => $result['username']
                );

                return true;
            }
        }

        throw new \Exception('Login Inválido');
    
    }

    /**
     * Metodo responsável por atribuir um valor para username
     *
     * @param string $username
     */
    public function setUsername($username){
        $this->email = $username;
    }

    /**
     * Metodo responsável por atribuir um valor para password
     *
     * @param string $password
     */
    public function setPassword($password){
        $this->password = $password;
    }

    /**
     * Metodo responsável por retornar o valor de username
     *
     * @param string $username
     */
    public function getUsername(){
        return $this->username;
    }

    /**
     * Metodo responsável por retornar o valor de password
     *
     * @param string $username
     */
    public function getPassword(){
        return $this->password;
    }
}

?>