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
        <h1 class="display-4">Profile</h1>
        <?php if (session()->get('is_logged_in')): ?>
            <h4 class="lead">Name</h4>
            <h2 ><?= session()->get('name') ?></h2>
            <h4 class="lead">Email Address</h4>
            <h2 ><?= session()->get('email') ?></h2>
            <a class="btn btn-primary btn-md" href="updateProfile" role="button">Update profile</a>
            <a class="btn btn-primary btn-md" href="changePassword" role="button">Change password</a>
        <?php endif; ?> 
    </div>
</section>