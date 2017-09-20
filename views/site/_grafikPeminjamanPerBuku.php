<?php 
  use app\models\Peminjaman; 
?>
<script>

FusionCharts.ready(function(){
      var revenueChart = new FusionCharts({
        "type": "Column3d",
        "renderAt": "grafik-peminjaman-per-buku",
        "width": "100%",
        "height": "300",
        "dataFormat": "json",
        "dataSource": {
          "chart": {
              "caption" : "Grafik Peminjaman Per Buku",
              "xAxisName": "Peminjaman per Buku",
              "yAxisName": "Jumlah",
              "theme": "fint"
           },
          "data":        
              [ <?php print Peminjaman::getGrafikPerBuku(); ?> ]
        }
    });
    revenueChart.render();
})
    
</script> 
<div id="grafik-peminjaman-per-buku"> FusionChart XT will load here! </div>