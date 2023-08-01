<?php include "header.php"?>
<?php include "body.php"?>
<div>
    <form action="/courses/update" enctype="multipart/form-data" method="POST">
        <input type="hidden" name="id" value="<?php echo $course[0]->id?>">
        <p>
            <label for="name">Name:</label> <br/>
            <input type="text" name="name" value="<?php echo $course[0]->id; ?>">
        </p>
        <p>
            <label for="instructor">Instructor:</label> <br/>
            <input type="text" name="instructor" value="<?php echo $course[0]->instructor; ?>">
        </p>
        <p>
            <label for="description">Description:</label> <br/>
            <input type="text" name="description" value="<?php echo $course[0]->description; ?>">
        </p>
        <p>
<!--        <div>Credits:</div>-->
<!--        </p>-->
<!--        <p>-->
<!--            <label for="lcerp">lcerp (between 0 and 2):</label>-->
<!--            <input type="range" id="lcerp" name="credits[lcerp]" min="0" max="2" step="0.5">-->
<!--        </p>-->
<!--        <p>-->
<!--            <label for="nursing">nursing (between 0 and 2):</label>-->
<!--            <input type="range" id="nursing" name="credits[nursing]" min="0" max="2" step="0.5">-->
<!--        </p>-->
<!--        <p>-->
<!--            <label for="cpeu">cpeu (between 0 and 2):</label>-->
<!--            <input type="range" id="cpeu" name="credits[cpeu]" min="0" max="2" step="0.5">-->
<!--        </p>-->
<!--        <p>-->
<!--            <label for="cme">cme (between 0 and 2):</label>-->
<!--            <input type="range" id="cme" name="credits[cme]" min="0" max="2" step="0.5">-->
<!--        <p>-->
<!--            <label for="ecerp">ecerp (between 0 and 2):</label>-->
<!--            <input type="range" id="ecerp" name="credits[ecerp]" min="0" max="2" step="0.5">-->
<!--        </p>-->
        <p>
            <input type="submit">
        </p>
    </form>
</div>