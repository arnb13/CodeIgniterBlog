<!DOCTYPE html>
<html lang = "en" dir = "ltr">
    <head>
        <meta charset = "utf-8">
        <title>Blog</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    </head>

    <body>
        <?php $uri = service('uri'); ?>
        <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">BLOG</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item <?= ($uri->getSegment(1) == '' ? 'active' : null) ?>">
                        <a class="nav-link" href="/blog/public">Home</a>
                    </li>
                    <li class="nav-item <?= ($uri->getSegment(1) == 'about' ? 'active' : null) ?>">
                        <a class="nav-link" href="/blog/public/about">About us</a>
                    </li>
                    
                    <?php if (session()->get('is_logged_in')): ?>
                        <li class="nav-item <?= ($uri->getSegment(1) == 'create' ? 'active' : null) ?>">
                            <a class="nav-link" href="/blog/public/blog/create">Create new blog</a>
                        </li>
                        <li class="nav-item <?= ($uri->getSegment(1) == 'profile' ? 'active' : null) ?>">
                            <a class="nav-link" href="/blog/public/user/profile">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/blog/public/user/logout">Logout</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item <?= ($uri->getSegment(1) == 'login' ? 'active' : null) ?>">
                            <a class="nav-link" href="/blog/public/user/login">Login</a>
                        </li>
                        
                            <li class="nav-item <?= ($uri->getSegment(1) == 'signup' ? 'active' : null) ?>">
                                <a class="nav-link" href="/blog/public/user/signup">Signup</a>
                            </li>
                        
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
