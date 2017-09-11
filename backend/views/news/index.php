<?php

use yii\helpers\BaseUrl;
use yii\helpers\Url;
use yii\web\JqueryAsset;

$baseUrl = BaseUrl::base();
$this->title = 'News';
?>

<?php $this->registerJsFile('@web/js/news.js', ['depends' => [JqueryAsset::className()]]); ?>

<style>
    td.action-btns{
        width: 17%;
    }
</style>

<div class="row">
    <div class="col-md-12">
        <a class="btn btn-info" href="<?= Url::to(['news/detail']) ?>">Add new News</a>
    </div>
</div>
<table class="table">
    <thead>
        <tr>
            <th>Detail</th>
            <th>date</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($news as $single_news) { ?>
            <tr>
                <td><?= $single_news['detail']; ?></td>
                <td><?= $single_news['news_date']; ?></td>
                <td class="action-btns">
                    <a class="btn btn-success" href="<?= Url::to(['news/detail', 'id' => (string) $single_news['_id']]); ?>">Detail</a>
                    <a class="btn btn-danger" href="javascript:;" onclick="deleteNews('<?= (string)$single_news['_id'] ?>',this)">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

