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

  echo '<table class="listFiles__table">';
  echo '<thead class="table__header">';
  echo '<th class="header__table">' . 'Name' . '</th>';
  echo '<th class="header__table">' . 'Creation date' . '</th>';
  echo '<th class="header__table">' . 'Date modified' . '</th>';
  echo '<th class="header__table">' . 'Ext' . '</th>';
  echo '<th class="header__table">' . 'size' . '</th>';
  echo '<th class="header__table">' . 'Date accessed' . '</th>';
  echo '</thead>';

  if (!empty($directories)) {
    foreach ($directories as $directorie) {
      $infoFile = pathinfo($directorie);
      $extension = $infoFile['extension'] ?? '';
      if (!isset($infoFile['extension']))

        echo '<tr class="table__row">';

      echo "<td><i class='fa-solid fa-folder'></i><a href='src/modules/updatepath.php?updatedPath=" . $directorie . "'>" . $infoFile['basename'] . "</a></td>";
      // echo "<td><a href=" . $rootUserPath . str_replace(" ", "%20", $directorie) . " target=_blank>" . $infoFile['basename'] . "</a></td>";
      echo '<td>' . date("m/d/y H:i A", filectime($rootUserPath . $directorie)) . '</td>';
      echo '<td>' . date("m/d/y H:i A", filemtime($rootUserPath . $directorie)) . '</td>';
      echo '<td>' . $extension . '</td>';
      echo '<td></td>';
      echo '<td>' . date("m/d/y H:i A", fileatime($rootUserPath . $directorie)) . '</td>';
      echo '<td>' . '<button type="button" onclick="renameFile(event)" datafile="' . $_SESSION['pathUser'] . $infoFile['basename'] . '"><i class="fa-solid fa-pen-to-square"></i></button>' . '</td>';
      echo '<td>' . '<button type="button" onclick="deleteFile(this.data-id, e)" data-id="' . $_SESSION['pathUser'] . $infoFile['basename'] . '"><i class="fa-solid fa-trash"></i></button>' . '</td>';
      echo '</tr>';
    }
  }

  if (!empty($filesList)) {
    foreach ($filesList as $file) {

      $infoFile = pathinfo($file);
      $extension = $infoFile['extension'] ?? '';

      echo '<tr class="table__row">';
      echo '<td>' . getIconExtension($extension) . '<a href=".' . $_SESSION['pathUser'] . str_replace(' ', '%20', $file) . '" target="_blank">' . $infoFile['basename'] . '</a></td>';
      echo '<td>' . date("m/d/y H:i A", filectime($rootUserPath . $file)) . '</td>';
      echo '<td>' . date("m/d/y H:i A", filemtime($rootUserPath . $file)) . '</td>';
      echo '<td>' . $extension . '</td>';
      echo '<td>' . formatSizeUnits(filesize($rootUserPath . $file))  . '</td>';
      echo '<td>' . date("m/d/y H:i A", fileatime($rootUserPath . $file)) . '</td>';
      echo '<td>' . '<button type="button" onclick="renameFile(event)" datafile="' . $_SESSION['pathUser'] . $infoFile['basename'] . '"><i class="fa-solid fa-pen-to-square"></i></button>' . '</td>';
      echo '<td>' . '<button type="button" onclick="deleteFile(this.data-id, e)" data-id="' . $_SESSION['pathUser'] . $infoFile['basename'] . '"><i class="fa-solid fa-trash"></i></button>' . '</td>';
      // echo '<td>' . '<a href="./index.php?path=.'.$_SESSION['pathUser'].'&file='.$infoFile['basename'].'&rename=true"><i class="fa-solid fa-pen-to-square"></i></a>' . '</td>';
      // echo '<td>' . '<a href="./index.php?path=.'.$_SESSION['pathUser'].'&file='.$infoFile['basename'].'&delete=true"><i class="fa-solid fa-trash"></i></a>' . '</td>';

      echo '</tr>';
    }
  }
  echo '</table>';

  // setFileInfo($infoFile);
  // deleteFile($infoFile);

}

function setFileInfo($infoFile)
{
  if (isset($_GET['path']) && isset($_GET['rename'])) {
    echo '<form action="./index.php?path=.' . $_SESSION['pathUser'] . '&file=' . $infoFile['basename'] . '" method="post">
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

function renameFile()
{

  var_dump(isset($_GET['path']));
  var_dump(isset($_GET['rename']));
  var_dump(isset($_POST['new_name']));

  if (isset($_GET['path']) && isset($_GET['rename']) && !isset($_POST['new_name'])) {
    // $oldfile = $_GET['path'] . $_GET['file'];
    // $newfile = $_GET['path'] . $_POST['new_name'];

    // var_dump($oldfile);
    // var_dump($newfile);

    // rename($oldfile, $newfile);

    echo "Hola";
  }
}

function deleteFile($file)
{

  if (isset($_GET['path']) && isset($_GET['delete'])) {
    unlink($_GET['path'] . $file['basename']);

    var_dump($_GET['path'], $file['basename'], $_GET['delete']);
  }
}

?>



<script>

  function renameFile(e) {
    const formRename = document.getElementById("formRename");
    const file = e.target.parentElement.getAttribute("datafile");
    const filePath = document.getElementById("filePath");
    const modal = document.getElementById("modalRename")
    let ModalEdit = new bootstrap.Modal(modal, {}).show();
    formRename.setAttribute("action", `./src/modules/renameFile.php/?file=${file}`);
  };

  function deleteFile(e) {
    const formRename = document.getElementById("formRename");
    const file = e.target.parentElement.getAttribute("datafile");
    const filePath = document.getElementById("filePath");
    const modal = document.getElementById("modalRename")
    let ModalEdit = new bootstrap.Modal(modal, {}).show();
    formRename.setAttribute("action", `./src/modules/renameFile.php/?file=${file}`);
  };

</script>