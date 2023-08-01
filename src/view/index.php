<div class="header">
    <h3><b><?php echo $title; ?></b></h3>
    <?php \Asset::getCss(); ?>
</div>
<div>
    <?php foreach ($params['articles'] as $elem) : ?>

        <li><?php echo $elem; ?></li>

    <?php endforeach; ?>
</div>