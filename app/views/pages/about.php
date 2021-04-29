<?php require APPROOT . '/views/inc/header.php'; ?> <!---- We need to load header and footer for each view ---->
<h1> <?php /** @var TYPE_NAME $data */ echo $data['title'] ?> </h1>
<p> <?php /** @var TYPE_NAME $data */ echo $data['description'] ?> </p>
<p>Version: <strong><?php echo APPVERSION; ?></strong> </p>
<?php require APPROOT . '/views/inc/footer.php'; ?>
