<?php

namespace Mvc\core;

use Mvc\core\Database;

class App
{
	public function __construct(){
		$db = new Database;
		$db->init();
	}

	public function init()
	{
		$this->parseUrl();
	}

	public function loadIndex(){
		$home = new \Mvc\controller\page;
		$home->indexAction();
	}

	public function loadNotFound(){
		header("HTTP/1.0 404 Not Found");
		echo '<h1>404 Not Found</h1>';
		echo '<p>Halaman tidak ditemukan</p>';
	}

	public function parseUrl()
	{
		if (!isset($_GET['url']))
		{
			$this->loadIndex();
		} else {
			$url = filter_var($_GET['url'], FILTER_SANITIZE_URL);
			$url = trim($url, '/');
			$url = explode('/', $url);
			
			$class = '\Mvc\controller\\'.$url[0];

			if (!class_exists($class))
			{
				$this->loadNotFound();
			} else {
				$controller = new $class;
				
				if (!isset($url[1]))
				{
					$action = 'indexAction';
				} else {
					$action = $url[1].'Action';
				}

				if (!method_exists($controller, $action))
				{
					$this->loadNotFound();
				} else {
					$controller->{$action}();
				}
			}
		}
	}

	public function loadView($filename, array $params = array())
	{
		$viewfile = VIEW_PATH . $filename .'.php';
		if (file_exists($viewfile)){
			ob_start();
			extract($params);
			require $viewfile;
			return ob_get_clean();
		} else {
			throw new \Exception("file view " . $filename . " tidak ditemukan");
		}
	}

	public function uri_segment($index = 0)
	{
		if (isset($_GET['url']))
		{
			$url = filter_var($_GET['url'], FILTER_SANITIZE_URL);
			$url = trim($url, '/');
			$url = explode('/', $url);
			return $url[$index];
		} else {
			return false;
		}
	}
}