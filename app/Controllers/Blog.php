<?php namespace App\Controllers;
use App\Models\BlogModel;

class Blog extends BaseController
{
	public function post($slug) {
		$model = new BlogModel();
		$data['blog'] = $model->getBlogs($slug);

		$sessionData = [
			'blog_id' => $data['blog']['id'],
		];
		session()->set($sessionData);

		echo view('templates/header', $data);
		echo view('pages/blog');
		echo view('templates/footer');
	}

	public function create() {
		if (session()->get('is_logged_in')) {
			$data = [];
			helper("form");
			$model = new BlogModel();

			if ($this->request->getMethod() == "post") {
				$rules = [
					"title" => "required|min_length[3]|max_length[255]",
					"body" => "required"];

					if(!$this->validate($rules)) {
						$data['validation'] = $this->validator;
					} else {
						$model->save([
							"title"=> $this->request->getVar("title"),
							"body"=> $this->request->getVar("body"),
							"slug"=> url_title($this->request->getVar("title")),
							"author"=> session()->get("name"),
						]);
						$session = \Config\Services::session();
						$session->setFlashdata('success', 'New blog has been posted successfully!');
						return redirect()->to("/blog/public/home");
				}
			}
				echo view('templates/header', $data);
				echo view('pages/create');
				echo view('templates/footer');
		} else {
			return redirect()->to("/blog/public/home");
		}
	}
	public function updateBlog() {
		if (session()->get('is_logged_in')) {
			$data = [];
			helper("form");
			$model = new BlogModel();

			if ($this->request->getMethod() == "post") {
				$rules = [
					"title" => "required|min_length[3]|max_length[255]",
					"body" => "required"];

					if(!$this->validate($rules)) {
						$data['validation'] = $this->validator;
					} else {
						$model->save([
							"id"=> session()->get('blog_id'),
							"title"=> $this->request->getVar("title"),
							"body"=> $this->request->getVar("body"),
							"slug"=> url_title($this->request->getVar("title")),
						]);
						$session = \Config\Services::session();
						$session->setFlashdata('success', 'Blog updated successfully!');
						return redirect()->to("/blog/public/home");



					}
				}
				$data['blog'] = $model->getBlogById(session()->get('blog_id'));
				echo view('templates/header', $data);
				echo view('pages/updateBlog');
				echo view('templates/footer');
			} else {
				return redirect()->to("/blog/public/home");
		}
	}

	public function deleteBlog() {
		if (session()->get('is_logged_in')) {
			$data = [];
			$model = new BlogModel();
			$blogId = session()->get('blog_id');
			$model->delete($blogId);
			$session = \Config\Services::session();
			$session->setFlashdata('success', 'Blog deleted successfully!');
			return redirect()->to("/blog/public/home");

		} else {
			return redirect()->to("/blog/public/home");
		}

	}
}
