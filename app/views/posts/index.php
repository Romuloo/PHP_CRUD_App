<?php require APPROOT . '/views/inc/header.php'; ?>
<?php flash('post_message'); ?>
    <div class="row">
        <div class="col-md-6">
            <h1>Experiences</h1>
            <br>
        </div>
        <div class="col-md-6">
            <a href="<?php echo URLROOT; ?>/posts/add" class="btn btn-primary pull-right">
               <i class="fa fa-pencil"></i>Add Post
            </a>
        </div>
    </div>
<?php /** @var TYPE_NAME $data */ foreach($data['posts'] as $post) : ?>
        <div class="card card-body mb-3">
            <h4 class="card-title"><?php echo $post -> title; ?></h4>
            <div class="bg-light p-2 mb3">
                Written by <?php echo $post -> name; ?> on <?php echo $post -> postCreated; ?>
            </div>
            <p class="card-text"><?php echo $post -> body; ?> </p>
            <a href="<?php echo URLROOT; ?>/posts/show/<?php echo $post -> postId; ?>" class="btn btn-primary">Read</a>
        </div>
        <br>
    <?php endforeach; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>