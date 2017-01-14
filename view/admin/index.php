<h2>dua vao co so du lieu </h2>
<button ><a href="<?php echo $this->Route("controller/Postcontroller/");?>">chuyen sang trang post</a></button>
<br>
<br>
<form action="#" method="get">
    <input type="text" name="name">
    <br>truong search:<br/>
    <select name="fields" id="">
        <option value="id">id</option>
        <option value="name">name</option>
        <option value="address">address</option>
        <option value="phone">phone</option>
    </select>
    <br/>
    <input type="submit" name="submit" value="gui ">
</form>
<button ><a href="<?php echo $this->Route("controller/Admincontroller/add/");?>">add</a></button>

<?php echo"<h3 style='color:red'>". (isset($this->variable)?$this->variable:null)."</h3>";?>
<table border="1">
    <tr>
        <th>no.</th>
        <th>id</th>
        <th>name</th>
        <th>address</th>
        <th>phone</th>
        <th>edit</th>
        <th>del</th>
    </tr>
    <tbody>
    <?php foreach ($listpost as $key=>$item):?>
        <tr>
            <td><?php echo $key+1 ?></td>
            <td><?php echo $item['id'];?></td>
            <td><?php echo $item['name'];?></td>
            <td><?php echo $item['address'];?></td>
            <td><?php echo $item['phone'];?></td>
            <td><a href="<?php echo $this->Route("controller/Admincontroller/add/",$item['id']);?>">edit</a></td>
            <td><a href="<?php echo $this->Route("controller/Admincontroller/delete/",$item['id']);?>">del</a></td>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>