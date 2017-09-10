<?php

use yii\helpers\BaseUrl;
use yii\helpers\Url;
use yii\web\JqueryAsset;

$baseUrl = BaseUrl::base();
$this->title = 'Trainings';
?>

<?php $this->registerJsFile('@web/js/training.js', ['depends' => [JqueryAsset::className()]]); ?>

<style>
    td.action-btns{
        width: 17%;
    }
</style>

<div class="row">
    <div class="col-md-12">
        <a class="btn btn-info" href="<?= Url::to(['training/detail']) ?>">Add new Training</a>
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
        <?php foreach ($trainings as $training) { ?>
            <tr>
                <td><?= $training['name']; ?></td>
                <td><?= $training['training_type']; ?></td>
                <td><?= $training['duration']; ?></td>
                <td><?= $training['fee']; ?></td>
                <td class="action-btns">
                    <a class="btn btn-success" href="<?= Url::to(['training/detail', 'id' => (string) $training['_id']]); ?>">Detail</a>
                    <a class="btn btn-danger" href="javascript:;" onclick="deleteTraining('<?= (string)$training['_id'] ?>',this)">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

