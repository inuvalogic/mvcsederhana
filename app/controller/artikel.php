<?php

namespace Mvc\controller;

use Mvc\model\ArtikelModel;

class artikel extends \Mvc\core\App
{
	public function indexAction()
	{
		$artikel = ArtikelModel::all();

		$isi_halaman = $this->loadView('artikel', array('data_artikel' => $artikel));

		echo $this->loadView('layout', array('content' => $isi_halaman));
	}

	public function detailAction()
	{
		$id = $this->uri_segment(2);
		$artikel = ArtikelModel::one($id);

		if ($artikel==false){
			$this->loadNotFound();
		} else {
			$isi_halaman = $this->loadView('detail_artikel', array('row' => $artikel));
			echo $this->loadView('layout', array('content' => $isi_halaman));
		}
	}
}