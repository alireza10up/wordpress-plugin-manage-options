<div class="wrap">
    <h1>Update Option</h1>
    <form method="post">
        <label>option name : </label>
        <input type="text" name="option_name" value="<?= $arg->option_name ?? '' ?>"><br><br>
        <label>option value : </label>
        <input type="text" name="option_value" value="<?=$arg->option_value ?? '' ?>"><br><br>
        <label>option autoload : </label>
        <input type="checkbox" name="option_autoload" <?php if($arg->autoload ?? '') echo "checked" ; ?> > <br><br>
        <input type="submit" name="option_update" value="Submit" class="button">
    </form>
</div>