<?php
    require('mp3file.class.php');

    // Aqui deberias indicar el archivo MP3 que quieras usar
    $mp3file = new MP3File('audio.mp3');
    $duration1 = $mp3file->getDurationEstimate();
    $duration2 = $mp3file->getDuration();

    echo "Duración: $duration1 segundos"."<br/>";
    echo "Estimado: $duration2 segundos"."<br/>";
    echo "Estimado formateado: ".MP3File::formatTime($duration2)."<br/>";
?>