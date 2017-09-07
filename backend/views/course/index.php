<?php

use yii\helpers\BaseUrl;
use yii\helpers\Url;
use yii\web\JqueryAsset;

$baseUrl = BaseUrl::base();
$this->title = 'Courses';
?>

<?php $this->registerJsFile('@web/js/course.js', ['depends' => [JqueryAsset::className()]]); ?>

<style>
    td.action-btns{
        width: 17%;
    }
</style>

<div class="row">
    <div class="col-md-12">
        <a class="btn btn-info" href="<?= Url::to(['course/detail']) ?>">Add new Course</a>
    </div>
</div>
<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Type</th>
            <th>Duration</th>
            <th>Fee</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($courses as $course) { ?>
            <tr>
                <td><?= $course['name']; ?></td>
                <td><?= $course['course_type']; ?></td>
                <td><?= $course['duration']; ?></td>
                <td><?= $course['fee']; ?></td>
                <td class="action-btns">
                    <a class="btn btn-success" href="<?= Url::to(['course/detail', 'id' => (string) $course['_id']]); ?>">Detail</a>
                    <a class="btn btn-danger" href="javascript:;" onclick="deleteCourse('<?= (string)$course['_id'] ?>',this)">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

