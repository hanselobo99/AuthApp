<nav class="navbar navbar-expand-lg bg-body-tertiary mx-1 mx-md-5">
    <div class="container-fluid">
        <a class="navbar-brand" href="/basic-php-crud">My app</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/basic-php-crud">Home</a>
                </li>
                <?php
                if (isset($_SESSION['id'])) {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/addPost.php">Add Post</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/auth/logout.php">Logout</a>
                    </li>
                    <?php
                } else {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/auth/register.php">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/auth/login.php">Login</a>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>
    </div>
</nav>