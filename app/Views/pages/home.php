<section>
    <div class="jumbotron">
    <?php $session = \Config\Services::session(); ?>
    <?php if(isset($session->success)): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= $session->success ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

        <?php if ($blog): ?>
            <?php foreach ($blog as $blog_item): ?>
                <h1 class="display-4"><?= $blog_item["title"] ?></h1>
                <p class="lead">Author: <?= $blog_item["author"] ?></p>
                <p>Published at <?= $blog_item["time"] ?></p>
                <a class="btn btn-primary btn-lg" href="blog/<?= $blog_item["slug"] ?>" role="button">Read more</a>
                <hr class="my-4">
            <?php endforeach; ?>

        <?php else: ?>
            <p class="lead">No blog post found ?></p>
        <?php endif; ?>
    </div>
</section>