<?php
session_start();
$required_version = '8.1.7';
if (version_compare(phpversion(), $required_version, '<')) {
    die('This application requires PHP ' . $required_version . ' or later.');
}


require('includes/Post.php');
$data = Post::getAllPost();
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
<div class="mx-4">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Posted By</th>
            <th scope="col">Posted on</th>
        </tr>
        </thead>
        <tbody>

        <?php
        if ($data->num_rows > 0) {
            $i = 1;
            while ($row = $data->fetch_assoc()) { ?>
                <tr>
                    <th scope="row"><?php echo $i++ ?></th>
                    <td><?php echo $row['title'] ?></td>
                    <td><?php echo $row['description'] ?></td>
                    <td><?php echo $row['name'] ?></td>
                    <td><?php echo date('d-m-Y H:i', strtotime($row['created_at'])) ?></td>
                </tr>
                <?php
            }
        } else {
            ?>
            <tr>
                <td colspan="5">No Posts available</td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>

<script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>