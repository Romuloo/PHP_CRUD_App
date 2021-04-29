<?php require APPROOT . '/views/inc/header.php'; ?> <!---- We need to load header and footer for each view ---->
<div class="jumbotron jumbotron-flud text-center" >
    <div class="container">
        <h1 class="display-3"><?php echo /** @var TYPE_NAME $data */ $data['title']; ?></h1>
        <p class="lead"><?php echo $data['description']; ?></p>
    </div>
</div>
<h1> <?php /** @var TYPE_NAME $data */ echo $data['title'] ?></h1>
<?php require APPROOT . '/views/inc/footer.php'; ?>
