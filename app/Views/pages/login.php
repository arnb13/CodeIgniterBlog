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

    <?php if(isset($validation)): ?>
        <div class="alert alert-danger" role="alert"> 
            <?= $validation->listErrors() ?>
        </div>
    <?php endif; ?>

<h1 class="display-4">Login</h1>
<form action="login" method="post">
    <div class="form-group">
        <label for="email">Email Address</label>
        <input type="email" class="form-control" name="email" id="email" placeholder="example@xyz.com">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</section>