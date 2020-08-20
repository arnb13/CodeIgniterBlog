<div class="jumbotron">
<h1 class="display-4">Create new blog</h1>
<?php if(isset($validation)): ?>
    <div class="alert alert-danger" role="alert"> 
        <?= $validation->listErrors() ?>
    </div>
<?php endif; ?>
<form action="create" method="post">
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title">
    </div>
    <div class="form-group">
        <label for="body">Write blog</label>
        <textarea class="form-control" name="body" id="body" rows="5"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>