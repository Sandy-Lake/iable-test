<div id="table">
    <table bgcolor="antiquewhite">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Instructor</th>
            <th>Description</th>
            <th>Credits</th>
            <th></th>
            <th></th>
        </tr>
        <tr>
            <?php foreach ($courses as $course): ?>
            <div>
                <?php if ($course->id): ?>
                    <td><?php echo $course->id ?></td>
                <?php endif; ?>
                <?php if ($course->name): ?>
                    <td><?php echo $course->name ?></td>
                <?php endif; ?>
                <?php if ($course->instructor): ?>
                    <td><?php echo $course->instructor ?></td>
                <?php endif; ?>
                <?php if ($course->description): ?>
                    <td><?php echo $course->description ?></td>
                <?php endif; ?>
                <?php if ($course->credits): ?>
                    <td><?php echo $course->credits ?></td>
                <?php endif; ?>
                <td class="clickable" onclick="window.location='http://<?php echo $_SERVER['HTTP_HOST'] ?>/courses/edit/<?php echo $course->id ?>'">Edit</td>
                <td class="clickable" onclick="window.location='http://<?php echo $_SERVER['HTTP_HOST'] ?>/courses/delete/<?php echo $course->id ?>'">Delete</td>
        <tr>
            </div>
            <?php endforeach; ?>
        </tr>
    </table>
</div>