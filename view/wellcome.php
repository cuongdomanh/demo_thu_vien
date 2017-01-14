<html>
<body>
<center><h1 style="color:red">xin chao cac ban </h1></center>

<p style="color:blue">tu viet frame word </p>
<p> sau khi tai ve va chay file demomvc.sql thì các bạn chạy các bước </p>
<p> cac ban chay link sau de vao bai post :    http://localhost/demomvc1/index.php/controller/Postcontroller/  </p>
<br>
<p> chi tiet ve cac file : </p>
<p>forder config: configdatabse :de viet ten database; </p>
<p>database : noi ket noi va viet cac ham tim kiem lay ket qua </p>

<pre>
    PROUTE: chua  cac ham :
          route(): ham nay co tac dung dua ra duong dan đầy đủ ( ví dụ truyen duong dan cho thẻ "a=$this->route("controller/postcontroller/add).$id";
             tuong đương với truyền vào : http://localhost/demomvc1/index.php/controller/Postcontroller/add//$id;
             tuy nhien $id da duoc chuyen sang dang hex2bin();
           url() : chuoi url va lay tung phan sau dau (/) de so sanh trong index.php(chinh);
           move(): file giống như file header() nhưng có thêm chức năng truyền biến ;truyền biến xong chúng ta sẽ gọi biến đó trong view . thì bắt buộc phải là  $this->variable ( nó sẽ tự lấy biến đó để in ra ví dụ :
                   $messager = "thanh cong ";
                    // chuyen huong file
                    $this->move("controller/Postcontroller", $messager);
                   // khi day len duong dan url ; se la http://localhost/demomvc1/index.php/controller/Postcontroller//7468616e6820636f6e6720
                   //$messager da được truyền vào url va mã hóa hexa ; để ý thấy có 2 dấu // bên cạnh con số . để cắt chuỗi và chỗ đó là trắng không bị trùng khi so sánh trong index.php
                   // trong view là :
                  .//php echo $this->variable;
    view(): giong include() ; giống lên bỏ qua
    Foder controller ( quy dinh viet file : chữ cái trong file.php bắt buộc viết hoa  còn lại viết thường; để có thể tìm kiếm khi vào file index.php;
                      class : phải kế thừa Proute;
                      file:Route.php chưa hiểu rõ lên để đó ;
    forder: model ; kế thừa database; viết tên model ;
    file index.php ;file index này sẽ lấy url cắt giá trị và so sánh để dẫn đến các file  ;
</pre>
</body>
</html>