
<?php echo "<h3 style='color:red'>".(isset($messager)?$messager:"")."</h3>";?>
<form action=""method="post">
    <input type="text" name="content" value="<?php echo (isset($p)?$p['content']:'')?>">
    <button type="submit" name="submit"> gui </button>
</form>