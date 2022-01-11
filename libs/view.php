<?php
	/**
	 * 
	 */
	class View
	{
		
		function __construct()
		{
			//echo "<p>Vista BASE</p>";
		}

		function render($nombre) {
			require 'view/' . $nombre . '.php';
		}
	}
?>