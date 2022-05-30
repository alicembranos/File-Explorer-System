<?php

//get path from root user folder
$rootUserPath = getRootRelativeUserPath();

if (isset($_POST["submit-search"]) && !empty($_POST["search"])) {
  $searchFile = $_POST["search"];
  $arrayMatches = search($rootUserPath, $searchFile);
  $filesMatches = getFiles($rootUserPath, $arrayMatches);
  $directoriesMatches = getFolders($rootUserPath, $arrayMatches);
  showTable($directoriesMatches, $filesMatches, $rootUserPath);
  unset($_POST);
} elseif (!isset($_POST["submit-search"]) && isset($_POST["search"])) {
  $searchFile = $_POST["search"];
  $arrayMatches = search($rootUserPath, $searchFile);
  $filesMatches = getFiles($rootUserPath, $arrayMatches);
  $directoriesMatches = getFolders($rootUserPath, $arrayMatches);
  showTable($directoriesMatches, $filesMatches, $rootUserPath);
  unset($_GET);
} else {
  $arrayFiles = array_diff(scandir($rootUserPath), array('.', '..'));
  $filesList = getFiles($rootUserPath, $arrayFiles);
  $directories = getFolders($rootUserPath, $arrayFiles);
  showTable($directories, $filesList, $rootUserPath);
}

//set origin root 
$_SESSION["pathUser"] = $_SESSION['pathUserBackUp'];

//render table of files
function showTable($directories, $filesList, $rootUserPath)
{

  echo '<table>';
  echo '<th>' . '' . '</th>';
  echo '<th>' . 'name' . '</th>';
  echo '<th>' . 'creation date' . '</th>';
  echo '<th>' . 'last modified date' . '</th>';
  echo '<th>' . 'extension' . '</th>';
  echo '<th>' . 'size' . '</th>';
  echo '<th>' . 'last access time of file' . '</th>';

  if (!empty($directories)) {
    foreach ($directories as $directorie) {
      $infoFile = pathinfo($directorie);
      $extension = $infoFile['extension'] ?? '';

      echo '<tr>';

      if (!isset($infoFile['extension'])) echo '<td>' . '<i class="fa-solid fa-folder"></i>' . '</td>';


      echo "<td><a href='src/modules/updatepath.php?updatedPath=".$directorie."'>" . $infoFile['basename'] . "</a></td>";
      // echo "<td><a href=" . $rootUserPath . str_replace(" ", "%20", $directorie) . " target=_blank>" . $infoFile['basename'] . "</a></td>";
      echo '<td>' . date("m/d/y H:i A", filectime($rootUserPath . $directorie)) . '</td>';
      echo '<td>' . date("m/d/y H:i A", filemtime($rootUserPath . $directorie)) . '</td>';
      echo '<td>' . $extension . '</td>';
      echo '<td></td>';
      echo '<td>' . date("m/d/y H:i A", fileatime($rootUserPath . $directorie)) . '</td>';
      echo '<td>' . '<button class=""><i class="fa-solid fa-ellipsis"></i></button>' . '</td>';
    }
  }

  if (!empty($filesList)) {
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


      echo '<td><a href=".' . $_SESSION['pathUser'] . str_replace(' ', '%20', $file) . '" target="_blank">' . $infoFile['basename'] . '</a></td>';
      echo '<td>' . date("m/d/y H:i A", filectime($rootUserPath . $file)) . '</td>';
      echo '<td>' . date("m/d/y H:i A", filemtime($rootUserPath . $file)) . '</td>';
      echo '<td>' . $extension . '</td>';
      echo '<td>' . formatSizeUnits(filesize($rootUserPath . $file))  . '</td>';
      echo '<td>' . date("m/d/y H:i A", fileatime($rootUserPath . $file)) . '</td>';
      echo '<td>' . '<a href="./index.php?path=.'.$_SESSION['pathUser'].'&file='.$infoFile['basename'].'&rename=true"><i class="fa-solid fa-pen-to-square"></i></a>' . '</td>';
      echo '<td>' . '<a href="./index.php?path=.'.$_SESSION['pathUser'].'&file='.$infoFile['basename'].'&delete=true"><i class="fa-solid fa-trash"></i></a>' . '</td>';

      echo '</tr>';
    }
  }
  echo '</table>';

  setFileInfo($infoFile);
  deleteFile($infoFile);

}

function setFileInfo($infoFile){
  if(isset($_GET['path']) && isset($_GET['rename'])){
    echo '<form action="./index.php?path=.'.$_SESSION['pathUser'].'&file='.$infoFile['basename'].'" method="post">
    <input type="text" name="new_name" placeholder="Introduce new file name" />
    <input type="submit" value="Change">
    </form>';
  
    renameFile();
  }
}


// $oldfile = $_GET['path'] . $_GET['file'];
//     $newfile = $_GET['path'] . $_POST['new_name'];

//     var_dump($oldfile);
//     var_dump($newfile);

//     var_dump($_POST['new_name']);

function renameFile(){

  var_dump(isset($_GET['path']));
  var_dump(isset($_GET['rename']));
  var_dump(isset($_POST['new_name']));

  if(isset($_GET['path'])&& isset($_GET['rename'])&& !isset($_POST['new_name'])){
    // $oldfile = $_GET['path'] . $_GET['file'];
    // $newfile = $_GET['path'] . $_POST['new_name'];

    // var_dump($oldfile);
    // var_dump($newfile);

    // rename($oldfile, $newfile);

    echo "Hola";
  }
}

function deleteFile($file){

  if(isset($_GET['path'])&& isset($_GET['delete'])){
    unlink($_GET['path'].$file['basename']);

    var_dump($_GET['path'], $file['basename'], $_GET['delete']);
  }
}
