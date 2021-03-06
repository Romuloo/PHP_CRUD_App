<?php
/**
 * This code sources belongs to "https://www.bootstrapcdn.com/"
 */
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-3">
    <div class="container">
    <a class="navbar-brand" href="<?php echo URLROOT; ?>"><?php echo SITENAME; ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo URLROOT; ?>">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo URLROOT; ?>/pages/situation">Location</a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            <?php if(isset($_SESSION['user_id'])) : ?> <!--- Register and Login should only be shawn if the user is not login --->
                <li class="nav-item">
                    <a class="nav-link" href="#">Welcome <?php echo $_SESSION['user_name']; ?></a> <!--- Logout --->
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT; ?>/users/logout">Logout</a> <!--- Logout --->
                </li>
            <?php else : ?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo URLROOT; ?>/users/register">Register</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo URLROOT; ?>/users/login">Login</a>
            </li>
            <?php endif; ?>
        </ul>
     </div>
    </div>
</nav>