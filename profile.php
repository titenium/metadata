<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $fetchData['name'] ?>
    </title>
    <?php require './head.php'; ?>
</head>

<body>
    <?php require './header.php'; ?>

    <div class="card m-auto" style="width: 18rem;">
        <img src="./assets/images/user.png" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Test</h5>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Email : test@gmail.com</li>
            <li class="list-group-item">DOB : 12/12/12</li>
            <li class="list-group-item">Address : Test</li>
            <li class="list-group-item">Gender : Male</li>
            <li class="list-group-item">Phone : 1212232334</li>
            <li class="list-group-item">Joining : 12/12/12</li>
        </ul>
    </div>

    <?php require './footer.php'; ?>
</body>

</html>