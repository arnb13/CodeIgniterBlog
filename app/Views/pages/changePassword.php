<section>
<div class="jumbotron">
    <?php if(isset($validation)): ?>
        <div class="alert alert-danger" role="alert"> 
            <?= $validation->listErrors() ?>
        </div>
    <?php endif; ?>

<h1 class="display-4">Change Password</h1>
<form action="changePassword" method="post">
    <div class="form-group">
        <input type="hidden" class="form-control" name="email" id="email" placeholder="email" value="<?= session()->get('email') ?>">
    </div>
    <div class="form-group">
        <label for="password">Old password</label>
        <input type="password" class="form-control" name="password" id="password" placeholder="Old password">
    </div>
    <div class="form-group">
        <label for="new_password">New password</label>
        <input type="password" class="form-control" name="new_password" id="new_password" placeholder="New password">
    </div>
    <div class="form-group">
        <label for="confirm_password">Confirm password</label>
        <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm password">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</section>