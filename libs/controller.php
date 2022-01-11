<?php
	/**
	 * 
	 */
	class Controller
	{
		
		function __construct()
		{
			//echo '<p>Controller BASE</p>';
			$this->view = new View();
		}

		function loadModel($model) {
		    $url = 'model/' . $model . 'model.php';
            if(file_exists($url)) {
                require $url;
                $modelName = $model.'Model';
                $this->model = new $modelName();
            }
		}
	}
?>