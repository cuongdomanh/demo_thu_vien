<?php echo "<h3 style='color:red'>".(isset($messager)?$messager:"")."</h3>";?>
<form action=""method="post">
    ten:
    <br/>
    <input type="text" id="name" name="name" value="<?php echo (isset($p)?$p['name']:'')?>">
    <span id ="name1" style="color:red" ></span>
    <br/>password:<br/>
    <input type="password" id="pass"name="pass" value="<?php echo (isset($p)?$p['pass']:'')?>">
    <span id ="pass1" style="color:red" ></span>
    <br/>check_passowrd:<br/>
    <input type="password" id="checkpass" name="checkpass" value="<?php echo (isset($p)?$p['pass']:'')?>">
    <span id ="checkpass1" style="color:red" ></span>
    <br/>address:<br/>
    <input type="text"  id="address" name="address" value="<?php echo (isset($p)?$p['address']:'')?>">
    <span id ="address1" style="color:red" ></span>
    <br/>phone:<br/>
    <input type="text" id="phone" name="phone" value="<?php echo (isset($p)?$p['phone']:'')?>">
    <span id ="phone1" style="color:red" ></span>
    <br/>
    <button type="button" id="button1" name="submit" onclick="check();"> gui </button>
</form>
<script>
    function check(){

        var kt=1;
        if(document.getElementById('name').value.length<6){
            kt=0;
            document.getElementById('name1').innerHTML="ban can phai nhap name nhieu hon 6 ky tu ";
        }
        else{
            document.getElementById('name1').innerHTML="**";
        }

        if(document.getElementById('pass').value!=document.getElementById('checkpass').value||document.getElementById('pass').value.length<6){
            kt=0;
            document.getElementById('checkpass1').innerHTML="chua khop pass hoc phai nhieu hon 6 ky tu  ";
        }
        else{
            document.getElementById('checkpass1').innerHTML="**";
        }
       //
        if(document.getElementById('address').value.length<1){
            kt=0;
            document.getElementById('address1').innerHTML="yeu cau nhap";
        }
        else{
            document.getElementById('address1').innerHTML="**";
        }
        //
        if(document.getElementById('phone').value.length<1){
            kt=0;
            document.getElementById('phone1').innerHTML="yeu cau co nhap ";
        }
        else{
            document.getElementById('phone1').innerHTML="**";
        }
        if(kt==1){
            console.log('ok');
            document.getElementById('button1').type="submit";
        }


    }
</script>