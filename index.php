<?php
require_once __DIR__ . '/vendor/autoload.php';

use Phpml\Classification\NaiveBayes;
use Phpml\Dataset\CsvDataset;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <title>PHP Machine Learning</title>
</head>

<style>
    input {
        margin-bottom: 25px;
    }
</style>

<body>
    <div>
        <form action=""method="POST" enctype="multipart/form-data">
            <label for="">Sepal Length</label>
            <input type="number" name="sepal_length"> <br>
            <label for="">Sepal Width</label>
            <input type="number" name="sepal_width"> <br>
            <label for="">Petal Length</label>
            <input type="number" name="petal_length"> <br>
            <label for="">Petal Width</label>
            <input type="number" name="petal_width"> <br>

            <button type="submit" name="proses">Proses</button>
        </form>

        <?php
        if (isset($_POST['proses'])) {

            $dataset = new CsvDataset('./dataset/iris.csv',4,true);

            $samples = $dataset ->getSamples();
            $labels = $dataset->getTargets();

            $dtesting[] = $_POST['sepal_length'];
            $dtesting[] = $_POST['sepal_width'];
            $dtesting[] = $_POST['petal_length'];
            $dtesting[] = $_POST['petal_width'];

            $class_hasil = "";

            $classifier = new NaiveBayes();

            $classifier->train($samples, $labels);
            $class_hasil = $classifier->predict($dtesting);

            echo "<h2 class='lead'>The Results : $class_hasil</h2>";
            echo "<img src='img/$class_hasil.jpg' width='150'/>";
            
        }
        ?>
    </div>
    </body>

    </html>


<?php

$myfile = fopen("yenideger.csv", "a");
fwrite($myfile,"$class_hasil");
echo fwrite ($myfile, ",");
echo fwrite ($myfile,  $dtesting[] = $_POST['sepal_length']);
echo fwrite ($myfile, ",");
echo fwrite ($myfile,   $dtesting[] = $_POST['sepal_width']);
echo fwrite ($myfile, ",");
echo fwrite ($myfile,  $dtesting[] = $_POST['petal_length']);
echo fwrite ($myfile, ",");
echo fwrite ($myfile,   $dtesting[] = $_POST['petal_width']);

echo fwrite ($myfile,    $class_hasil = "");

            

?>






 