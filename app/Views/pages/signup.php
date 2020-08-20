<section>
<div class="jumbotron">
<h1 class="display-4">Signup</h1>
<?php if(isset($validation)): ?>
    <div class="alert alert-danger" role="alert"> 
        <?= $validation->listErrors() ?>
    </div>
<?php endif; ?>
<form action="signup" method="post">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Full Name">
    </div>
    <div class="form-group">
        <label for="email">Email Address</label>
        <input type="email" class="form-control" name="email" id="email" placeholder="example@xyz.com">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
    </div>
    <div class="form-group">
        <label for="confirm_password">Enter password again</label>
        <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Password">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>

</section>