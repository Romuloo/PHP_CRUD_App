<?php require APPROOT . '/views/inc/header.php'; ?> <!---- We need to load header and footer for each view ---->
<div class="jumbotron jumbotron-flud text-center" >
    <div class="container">
        <h1> <?php /** @var TYPE_NAME $data */ echo $data['title'] ?> </h1>
        <p> <?php /** @var TYPE_NAME $data */ echo $data['description'] ?> </p>
    </div>
</div>
<div class="jumbotron jumbotron-flud text-center" >
    <div class="container">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d35178.61862017693!2d-6.435989224228594!3d53.998493437293845!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4860cc1fa4c86acb%3A0xa00c7a997317490!2sDundalk%2C%20Co.%20Louth!5e1!3m2!1ses!2sie!4v1619766169737!5m2!1ses!2sie" width="1000" height="1000" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
