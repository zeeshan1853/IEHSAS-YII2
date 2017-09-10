<?php

use yii\helpers\BaseUrl;
use yii\helpers\Url;
use yii\web\JqueryAsset;

$baseUrl = BaseUrl::base();
$this->title = 'Consultancies';
?>

<?php $this->registerJsFile('@web/js/consultancy.js', ['depends' => [JqueryAsset::className()]]); ?>

<style>
    td.action-btns{
        width: 17%;
    }
</style>

<div class="row">
    <div class="col-md-12">
        <a class="btn btn-info" href="<?= Url::to(['consultancy/detail']) ?>">Add new Consultancy</a>
    </div>
</div>
<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Type</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($consultancies as $consultancy) { ?>
            <tr>
                <td><?= $consultancy['name']; ?></td>
                <td><?= $consultancy['consultancy_type']; ?></td>
                <td class="action-btns">
                    <a class="btn btn-success" href="<?= Url::to(['consultancy/detail', 'id' => (string) $consultancy['_id']]); ?>">Detail</a>
                    <a class="btn btn-danger" href="javascript:;" onclick="deleteConsultancy('<?= (string)$consultancy['_id'] ?>',this)">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

