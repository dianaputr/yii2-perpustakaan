<?php

    use app\models\Buku;
    use yii\helpers\Html;
    use yii\helpers\Url;

?>


<?php print Html::a('link',['site/index']);
print Url::to(['site/index']); 
  ?>

<div class="site-index">

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Berita 1</h2>

                <div class="kotak">
                    <?= Buku::getCount(); ?>
                    <span style="font-size: 20px">Jumlah Buku</span>
                </div>
                <a class="btn btn-default" href="<?= Url::to(['buku/index']); ?>">Klik sini untuk melihat semua</a>

            </div>
            <div class="col-lg-4">
                <h2>Berita 2</h2>

                <div class="kotak">
                    80
                    <span style="font-size: 20px">Jumlah Penerbit</span>
                </div>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Berita 3</h2>

                <div class="kotak">
                    80
                    <span style="font-size: 20px">Jumlah Penulis</span>
                </div>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
        </div>

    </div>
</div>
