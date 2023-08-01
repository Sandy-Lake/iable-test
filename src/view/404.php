<div class="header">
    <h3><b><?php echo $title; ?></b></h3>
</div>
<div>
    <?php foreach ($params['articles'] as $elem) : ?>

        <li><?= $elem; ?></li>

    <?php endforeach; ?>
</div>