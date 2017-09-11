<?php

<<<<<<< HEAD
/* @var $this yii\web\View */
    use app\models\Buku;
    use yii\helpers\Html;
    use yii\helpers\Url;
    use app\models\Penerbit;
    use app\models\Penulis;
?>
<!-- <?php print Html::a('link',['site/index']);
print Url::to(['site/index']); 
  ?> -->

=======
    use app\models\Buku;
    use yii\helpers\Html;
    use yii\helpers\Url;

?>


<?php print Html::a('link',['site/index']);
print Url::to(['site/index']); 
  ?>

>>>>>>> e207189d749f52a3d712366ed17865b9e5859704
<div class="site-index">

    <div class="body-content">

        <div class="row">
            
            <div class="col-lg-4">
                <h2>Berita 1</h2>

                <div class="kotak">
                    <?= Buku::getCount(); ?>
                    <span style="font-size: 20px">Jumlah Buku</span>
                </div>
<<<<<<< HEAD
                <a class="btn btn-default" href="<?= Url::to(['buku/index']); ?>">Klik disini untuk melihat semua</a>
=======
                <a class="btn btn-default" href="<?= Url::to(['buku/index']); ?>">Klik sini untuk melihat semua</a>
>>>>>>> e207189d749f52a3d712366ed17865b9e5859704

            </div>
            <div class="col-lg-4">
                <h2>Berita 2</h2>

                <div class="kotak">
<<<<<<< HEAD
                    <?= Penerbit::getCount(); ?>
=======
                    80
>>>>>>> e207189d749f52a3d712366ed17865b9e5859704
                    <span style="font-size: 20px">Jumlah Penerbit</span>
                </div>

                <p><a class="btn btn-default" href="<?= Url::to(['penerbit/index']); ?>">Klik disini untuk melihat semua</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Berita 3</h2>

                <div class="kotak">
<<<<<<< HEAD
                    <?= Penulis::getCount(); ?>
=======
                    80
>>>>>>> e207189d749f52a3d712366ed17865b9e5859704
                    <span style="font-size: 20px">Jumlah Penulis</span>
                </div>

                <p><a class="btn btn-default" href="<?= Url::to(['penulis/index']); ?>">Klik disini untuk melihat semua</a></p>
            </div>
        </div>

    </div>
</div>
