<?php include "header.php"?>
<?php include "body.php"?>
<div>
    <form action="/courses/destroy" enctype="multipart/form-data" method="POST">
        <h3>Delete course with ID = <?php echo $course[0]->id?>?</h3>
        <input type="hidden" name="courseId" value="<?php echo $course[0]->id?>">
        <p>
            <input type="submit" value="Delete">
        </p>
    </form>
</div>

