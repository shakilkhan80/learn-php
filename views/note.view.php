<?php require 'partials/head.php' ?>
<?php require 'partials/nav.php' ?>
<?php require 'partials/banner.php' ?>


<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">

        <a href="/notes" class="text-blue-500 hover:underline mb-3"> Go Back...</a>

        <p>
            <?= $note['body'] ?>
        </p>
    </div>
</main>
<?php require 'partials/footer.php' ?>