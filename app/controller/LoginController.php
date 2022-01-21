<?php

class LoginController{
    /**
     * Metodo responsavel por renderizar a view de Login
     * Aqui se utilizou Twig uma engine de templates para PHP: https://twig.symfony.com
     *
     * @return void
     */
    public function index()
    {
        //Localiza os templates nos aquivos
        $loader = new \Twig\Loader\FilesystemLoader('app/view');
        $twig = new \Twig\Environment($loader, [
        'cache' => '/path/to/compilation_cache',
        'auto_reload' => true
        ]);
        
        //Carrega o local onde a view está 
        $template = $twig->load('login.html');
        //carrega o template passado como primeiro argumento e o renderiza com as variáveis ​​passadas como segundo argumento.
        return $template->render();
    }

    /**
     * Método Responsavel por Validar os dados de login
     *
     */
    public function checkCredential()
    {
        try {
            if (isset($_POST['username']) && isset($_POST['password'])) {
                $user = new User;
                $user->setUsername($_POST['username']);
                $user->setPassword($_POST['password']);
                $user->validateLogin();
                }
            header('Location: https://showdeimagem.com.br');
        } catch (\Exception $th) {
            header('Location: http://localhost/sistemaLogin/');
        }
        
    }
}

?>