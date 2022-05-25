<?php

include_once __DIR__ . './functions.php';
//get path from root user folder

$rootUserPath = getRootRelativeUserPath();

// $rootUserPath = getRootRelativeUserPath();

$arrayFiles = array_diff(scandir($rootUserPath), array('.', '..'));

$filesList = getFiles($rootUserPath, $arrayFiles);
$directories = getFolders($rootUserPath, $arrayFiles);


function showTable()
{

  global $directories, $filesList, $rootUserPath;

  echo '<table>';
  echo '<th>' . '' . '</th>';
  echo '<th>' . 'name' . '</th>';
  echo '<th>' . 'creation date' . '</th>';
  echo '<th>' . 'last modified date' . '</th>';
  echo '<th>' . 'extension' . '</th>';
  echo '<th>' . 'size' . '</th>';
  echo '<th>' . 'last access time of file' . '</th>';

  foreach ($directories as $directorie) {
    $infoFile = pathinfo($directorie);
    $extension = $infoFile['extension'] ?? '';

    echo '<tr>';

    if (!isset($infoFile['extension'])) echo '<td>' . '<i class="fa-solid fa-folder"></i>' . '</td>';


    echo "<td><a href=" . $_SESSION['pathUser'] . str_replace(" ", "%20", $directorie) . " target=_blank>" . $infoFile['basename'] . "</a></td>";
    echo '<td>' . date("m/d/y H:i A", filectime($rootUserPath . $directorie)) . '</td>';
    echo '<td>' . date("m/d/y H:i A", filemtime($rootUserPath . $directorie)) . '</td>';
    echo '<td>' . $extension . '</td>';
    echo '<td></td>';
    echo '<td>' . date("m/d/y H:i A", fileatime($rootUserPath . $directorie)) . '</td>';
    echo '<td>' . '<button class=""><i class="fa-solid fa-ellipsis"></i></button>' . '</td>';
  }

  foreach ($filesList as $file) {
    $infoFile = pathinfo($file);

    echo '<tr>';

    $extension = $infoFile['extension'] ?? '';
    switch ($extension) {
      case 'txt':
        echo '<td>' . '<i class="fa-solid fa-file"></i>' . '</td>';
        break;
      case 'doc':
        echo '<td>' . '<i class="fa-solid fa-file-word"></i>' . '</td>';
        break;
      case 'avi':
        echo '<td>' . '<i class="fa-solid fa-file-video"></i>' . '</td>';
        break;
      case 'gif':
        echo '<td>' . '<i class="fa-solid fa-file-image"></i>' . '</td>';
        break;
      case 'html':
        echo '<td>' . '<i class="fa-brands fa-html5"></i>' . '</td>';
        break;
      case 'jpg':
        echo '<td>' . '<i class="fa-solid fa-file-image"></i>' . '</td>';
        break;
      case 'js':
        echo '<td>' . '<i class="fa-solid fa-file-code"></i>' . '</td>';
        break;
      case 'mov':
        echo '<td>' . '<i class="fa-solid fa-file-video"></i>' . '</td>';
        break;
      case 'mp3':
        echo '<td>' . '<i class="fa-solid fa-file-music"></i>' . '</td>';
        break;
      case 'mp4':
        echo '<td>' . '<i class="fa-solid fa-file-music"></i>' . '</td>';
        break;
      case 'pdf':
        echo '<td>' . '<i class="fa-solid fa-file-pdf"></i>' . '</td>';
        break;
      case 'png':
        echo '<td>' . '<i class="fa-solid fa-file-image"></i>' . '</td>';
        break;
      case 'xls':
        echo '<td>' . '<i class="fa-solid fa-file-excel"></i>' . '</td>';
        break;
      case 'xlsx':
        echo '<td>' . '<i class="fa-solid fa-file-excel"></i>' . '</td>';
        break;
      default:
        echo '<td>' . '<i class="fa-solid fa-folder"></i>' . '</td>';
        break;
    }

    echo "<td><a href=" . $_SESSION['pathUser'] . str_replace(" ", "%20", $file) . " target=_blank>" . $infoFile['basename'] . "</a></td>";
    echo '<td>' . date("m/d/y H:i A", filectime($rootUserPath . $file)) . '</td>';
    echo '<td>' . date("m/d/y H:i A", filemtime($rootUserPath . $file)) . '</td>';
    echo '<td>' . $extension . '</td>';
    echo '<td>' . formatSizeUnits(filesize($rootUserPath . $file))  . '</td>';
    echo '<td>' . date("m/d/y H:i A", fileatime($rootUserPath . $file)) . '</td>';
    echo '<td>' . '<button class=""><i class="fa-solid fa-ellipsis"></i></button>' . '</td>';

    echo '</tr>';
  }


  echo '</table>';
}
