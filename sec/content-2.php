<form action="upload.php" method="post" enctype="multipart/form-data">
    <h3>Загрузить медиа:</h3>
    <input type="file" name="file[]" multiple>
    <input type="submit" value="Отправить">
</form>

<!-- <form action="save-copy.php" method="post" enctype="multipart/form-data">
    <p>
    <h3>Копирайт:</h3>
    <input type="text" name="copyright-name" <?php echo ('value=' . $_SESSION['copyrigth-name'] . ''); ?>>
    <input type="submit" value="Обновить копирайт">
    </p>
</form> -->