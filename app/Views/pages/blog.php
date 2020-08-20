<section> 
    <div class="jumbotron">
        <h1 class="display-4"><?= $blog["title"] ?></h1>
        <p class="lead">Author: <?= $blog["author"] ?></p>
        <p>Published at <?= $blog["time"] ?></p>
        <hr class="my-4">
        <p><?= $blog["body"] ?></p>
        <?php if (session()->get('is_admin') == true or session()->get('name') == $blog['author']): ?>
            <a class="btn btn-primary btn-md" href="updateBlog" role="button">Update</a>
            <a class="btn btn-danger btn-md" href="deleteBlog" role="button">Delete</a>
        <?php endif; ?>
    </div>
</section>