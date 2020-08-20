<section>
<div class="jumbotron">
    <?php if(isset($validation)): ?>
        <div class="alert alert-danger" role="alert"> 
            <?= $validation->listErrors() ?>
        </div>
    <?php endif; ?>

<h1 class="display-4">Update Profile</h1>
<form action="updateProfile" method="post">
    <?php if (session()->get('is_logged_in')): ?>
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Full Name" value="<?= session()->get('name') ?>">
    </div>
    <?php endif; ?> 
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</section>