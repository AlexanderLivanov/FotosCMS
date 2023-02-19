<style>
    .tabs {
        font-size: 0;
    }

    .tabs>input[type="radio"] {
        display: none;
    }

    .tabs>div {
        /* скрыть контент по умолчанию */
        display: none;
        border: 1px solid #e0e0e0;
        padding: 10px 15px;
        font-size: 16px;
    }

    /* отобразить контент, связанный с вабранной радиокнопкой (input type="radio") */
    #tab-btn-1:checked~#content-1,
    #tab-btn-2:checked~#content-2,
    #tab-btn-3:checked~#content-3 {
        display: block;
    }

    .tabs>label {
        display: inline-block;
        text-align: center;
        vertical-align: middle;
        user-select: none;
        background-color: #f5f5f5;
        border: 1px solid #e0e0e0;
        padding: 2px 8px;
        font-size: 16px;
        line-height: 1.5;
        transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out;
        cursor: pointer;
        position: relative;
        top: 1px;
    }

    .tabs>label:not(:first-of-type) {
        border-left: none;
    }

    .tabs>input[type="radio"]:checked+label {
        background-color: #fff;
        border-bottom: 1px solid #fff;
    }
</style>

<div class="tabs">
    <input type="radio" name="tab-btn" id="tab-btn-1" value="" checked>
    <label for="tab-btn-1">О сайте</label>
    <input type="radio" name="tab-btn" id="tab-btn-2" value="">
    <label for="tab-btn-2">Загрузить фото</label>
    <input type="radio" name="tab-btn" id="tab-btn-3" value="">
    <label for="tab-btn-3">Посты</label>
    <div id="content-1">
        <?php require_once('content-1.php'); ?>
    </div>
    <div id="content-2">
        <?php require_once('content-2.php'); ?>
    </div>
    <div id="content-3">
        <?php require_once('content-3.php'); ?>
    </div>
</div>

<div class="bottom-copyright" style="font-family: 'Courier New', Courier, monospace; text-align: center;">
    <p>FotosCMS</p>
    <p>&copy; 2019-2023 RedCrystal Studio</p>
</div>