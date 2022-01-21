<?php

    class Core{

        /**
         * URL da pagina
         *
         * @var string
         */
        private $url;

        /**
         * Controller da URL
         *
         * @var [type]
         */
        private $controller;

        /**
         * Método da URL
         *
         * @var [type]
         */
        private $method = 'index';

        /**
         * Parametros da URL
         *
         * @var [type]
         */
        private $params = [];

        public function __construct()
        {
            
        }

        /**
         * Metodo responsável por tratar os dados da URL separando seus controladores e seus métodos. 
         *
         * @param array $request
         */
        public function parametersURL($request){

            if (isset($request['url'])){
				$this->url = explode('/', $request['url']);

				$this->controller = ucfirst($this->url[0]).'Controller';
				array_shift($this->url);

				if (isset($this->url[0]) && $this->url != '') {
					$this->method = $this->url[0];
					array_shift($this->url);

					if (isset($this->url[0]) && $this->url != '') {
						$this->params = $this->url;
					}
				}
            }else{
                $this->controller = 'LoginController';
                $this->method = 'index';

            }
            //Metodo responsavel por carregar a Controller e seu Método
             return call_user_func(array( new $this->controller, $this->method), $this->params);
        }
    }
?>