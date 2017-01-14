<h2>dua vao co so du lieu </h2>

<button ><a href="<?php echo $this->Route("controller/Admincontroller/");?>">chuyen sang trang admin</a></button>
<br>
<br>
<form action="#" method="get">
    search:<br/>
    <input type="text" name="content">
    <br>truong search:<br/>
    <select name="fields" id="">
        <option value="content">
            content
        </option>
    </select>
    <br/>
    <br/>
    <input type="submit" name="submit" value="gui ">
</form>
<button ><a href="<?php echo $this->Route("controller/Postcontroller/add/");?>">add</a></button>
<?php echo"<h3 style='color:red'>". (isset($this->variable)?$this->variable:null)."</h3>";?>
<table border="1">
    <tr>
        <th>no.</th>
        <th>id</th>
        <th>content</th>
        <th>edit</th>
        <th>delete</th>
    </tr>
    <tbody>
    <?php foreach ($listpost as $key=>$item):?>
    <tr>
        <td><?php echo $key+1 ?></td>
        <td><?php echo $item['id'];?></td>
        <td><?php echo $item['content'];?></td>
        <td><a href="<?php echo $this->Route("controller/Postcontroller/add/",$item['id']);?>">edit</a></td>
        <td><a href="<?php echo $this->Route("controller/Postcontroller/delete/",$item['id']);?>">del</a></td>
    </tr>
    <?php endforeach;?>
    </tbody>
</table>