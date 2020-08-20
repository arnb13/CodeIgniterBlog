<?php namespace App\Models;

use CodeIgniter\Model;

class BlogModel extends Model {
    protected $table = "blogs";
    protected $allowedFields = ["title", "body", "author", "slug"];

    public function getBlogs ($slug = null) {
        if (!$slug) {
            return $this->findAll();
        }

        return $this->asArray()
                    ->where(['slug' => $slug])
                    ->first();
    }

    public function getBlogById ($id) {
        
        return $this->asArray()
                    ->where(['id' => $id])
                    ->first();
    }
}