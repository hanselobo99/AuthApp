<?php
error_reporting(E_ALL);
ini_set("display_errors", "On");
include('includes/Auth.php');
Auth::loggedIn('auth');
include('includes/Post.php');

if (isset($_POST['submit'])) {
    $data = Post::createPost($_POST['title'], $_POST['description']);
    if (isset($data['message'])) {
        $message = $data['message'];
    } else {
        $errors = $data['errors'];
    }
}
function getValue($key): string
{
    if (isset($_POST[$key])) {
        return $_POST[$key];
    }
    return '';
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <title>Php Crud</title>
</head>
<body>
<?php
include('includes/navbar.php')
?>
<main>
    <div class="container card w-100 mt-5">
        <div class="card-body">
            <div class="card-title d-flex justify-content-center">
                <h3>Add Post</h3>
            </div>
            <hr/>
            <div class="card-text">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" id="title"
                               placeholder="Post title here"
                               value=<?php echo getValue('title') ?>>
                    </div>
                    <div class="mb-3">
                        <label for="description">Description</label>
                        <textarea class="form-control" placeholder="Post description here" id="description"
                                  name="description" rows="4"><?php echo getValue('description') ?></textarea>
                    </div>
                    <?php
                    require('includes/errors.php')
                    ?>
                    <div class="mb-3 d-flex justify-content-center">
                        <input type="submit" name="submit" class="btn btn-primary" value="Create post">
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
<script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
