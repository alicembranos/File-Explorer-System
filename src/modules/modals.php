<!-- Modal Create Folder -->
<div class="modal fade" id="modalCreateFolder" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Create Directory</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="./src/modules/createfolder.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="text" id="folderName" name="folderName" placeholder="Insert directory name" class="form-control validate">
                    <button type="submit" name="submit" class="btn btn-secondary">Create Folder</button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Create Folder -->