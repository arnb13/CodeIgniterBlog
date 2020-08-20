<?php namespace App\Controllers;

use App\Models\BlogModel;

class Pages extends BaseController
{
	public function index()
	{
		$model = new BlogModel();
		$data['blog'] = $model->getBlogs();

		echo view('templates/header', $data);
		echo view('pages/home');
		echo view('templates/footer');
	}

	public function show($page = 'home') {

		$model = new BlogModel();
		$data['blog'] = $model->getBlogs();

		if (!is_file(APPPATH.'/Views/pages/'.$page.'.php')) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
		}

		echo view('templates/header', $data);
		echo view('pages/' .$page);
		echo view('templates/footer');
	}

	//--------------------------------------------------------------------

}
