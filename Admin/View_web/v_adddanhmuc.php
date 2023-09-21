<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Thêm sản phẩm</title></title>
    <style>
        
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root{
            --success-color: #2691d9;
            --error-color: #e74c3c;
        }

        html, body, .wrapper{
            height: 100%;  
        }

        body{
            display: grid;
            place-items: center;
            padding: 24px;
            font-family: "Ubuntu";
            color: #000;
            animation: rotate 0.5s infinite alternate linear;
            transition: all 0.5s;
        }

        .container{
            width: 800px;
            height: auto;
            border: 1px solid black;
            border-radius: 10px;
            background: white;
            padding: 40px;
        }

        .container h2{
            text-align: center;
        }
        .form-control{
            width: 100%;
            position: relative;
            border: 1px solid grey;
            margin-bottom: 20px;
        }
        .form-control:hover{
            border: 1px solid var(--success-color);
            box-shadow: 2px 2px 2px blue;
        }

        li{
            list-style-type: none;
        }

        .form-control input{
            width: 100%;
            height: 40px;
            border: none;
            outline: none;
            font-size: 16px;
        }
        .form-control span{
            position: absolute;
        }

        .form-control input:focus ~ span{
            width: 100%;
        }

        body .button{
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .button{
            color: black;
            text-decoration: none;
            position: relative;
            padding: 20px 30px;
            display: flex;
            align-items: center;
            transition: all 1s;
            margin-top: 50px;
        }

        .button:before{
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            display: block;
            border-radius: 30px;
            background: rgba(30, 233, 186, .3);
            width: 56px;
            height: 56px;
            transition: all 1s;
        }

        .button span{
            position: relative;
            line-height: 1;
            font-weight: 500;
            letter-spacing: 0;
            padding-left: 20px;
            text-transform: uppercase;   
        }

        .button svg{
            position: relative;
            top: 0;
            margin-left: 10px;
            fill: none;
            stroke-linecap: round;
            stroke: rgb(0, 0, 0);
            stroke-width: 2;
            transform: translateX(-5px);
            transition: all 0.5s;
        }

        .button:hover{
            color: black;
        }

        .button:hover:before{
            width: 100%;
            background: rgb(1, 233, 214);
        }

        .button:hover svg{
            stroke: black;
            transform: translateX(0);
        }

        #canhbao{
            position: absolute;
            margin-left: 5px;
        }

        #id_dm select{
            width: 100%;

        }

        .text-danger{
            color: red;
        }
    </style>
</head>
<body>
<div class="container">
    <form action="#" method="post">
        <div>
            <h2 class="text-uppercase text-center">Thêm danh mục</h2>
        </div> 
        <br>

        <div id="id_danhmuc" class="form-control row mx-1">
            <input name="id_danhmuc" type="text" placeholder="Mã của danh mục đó là?" 
            value="<?php echo (isset($id_danhmuc))?$id_danhmuc:'' ?>" >
            <?php if(isset($loi['id_danhmuc'])){?>
                <p class="text-danger"><?php echo $loi['id_danhmuc']?></p> 
            <?php }?>
        </div>

        <div id="danhmuc" class="form-control row mx-1">
            <input name="danhmuc" type="text" placeholder="Tên danh mục muốn thêm?" 
            value="<?php echo (isset($tendanhmuc))?$tendanhmuc:'' ?>" >
            <?php if(isset($loi['danhmuc'])){?>
                <p class="text-danger"><?php echo $loi['danhmuc']?></p> 
            <?php }?>
        </div>
        
        <button style="border: none; border-radius:25px; background: white; width: 100%;" 
        class="button" name="btn_adddanhmuc" type="submit">
            <span>Thêm</span>
            <svg width="13px" height="10" viewBox="0 0 13 10">
                <path d="M1,5 L11,5"></path>
                <polyline points="8 1 12 5 8 9"></polyline>
            </svg>
        </button>
    </form>    
</div>


</body>
<script>
 document.addEventListener('DOMContentLoaded', function() {
      // Lắng nghe sự kiện thay đổi của tất cả các thẻ input file
      const inputFiles = document.querySelectorAll('input[type="file"]');
      inputFiles.forEach(inputFile => {
        inputFile.addEventListener('change', function() {
          // Lấy đối tượng File của tập tin đã được chọn
          const file = this.files[0];
          // Tạo một đối tượng FileReader để đọc dữ liệu của tập tin
          const reader = new FileReader();
          // Lắng nghe sự kiện đọc dữ liệu của FileReader
          reader.addEventListener('load', function() {
            // Hiển thị ảnh ở id="loaisp_size"
            document.getElementById('loaisp_size1').src = reader.result;
          });
          // Đọc dữ liệu của tập tin
          reader.readAsDataURL(file);
        });
      });
    });
    function showInputs(numProducts) {
  // Tạo mảng chứa các ô input
  var inputs = [];
  for (var i = 1; i <= numProducts; i++) {
    //hienthi anh
    
    //label anh phu
    var label = document.createElement('label');
    label.setAttribute('for', 'label_file');
    label.textContent = 'Chọn ảnh phụ thứ '+i;
    //anh phu
    var inputfile = document.createElement('input');
    inputfile.setAttribute('type', 'file');
    inputfile.setAttribute('accept', 'image/*');
    inputfile.setAttribute('name', 'anh_phu[]');
    inputfile.setAttribute('id', 'label_file');
    // Tạo ô input cho tên sản phẩm
    var inputName = document.createElement("input");
    inputName.type = "text";
    inputName.name = "productName" + i;
    inputName.placeholder = "Tên sản phẩm "+i;

    // Tạo ô input cho giá sản phẩm


    // Tạo các ô input cho số lượng size
    var inputS = document.createElement("input");
    inputS.type = "number";
    inputS.name = "productSizeS" + i;
    inputS.placeholder = "số lượng Size S của sp"+i;

    var inputM = document.createElement("input");
    inputM.type = "number";
    inputM.name = "productSizeM" + i;
    inputM.placeholder = "số lượng Size M của sp"+i;

    var inputL = document.createElement("input");
    inputL.type = "number";
    inputL.name = "productSizeL" + i;
    inputL.placeholder = "số lượng Size L của sp"+i;

    var inputXL = document.createElement("input");
    inputXL.type = "number";
    inputXL.name = "productSizeXL" + i;
    inputXL.placeholder = "số lượng Size XL của sp"+i;

    var inputXXL = document.createElement("input");
    inputXXL.type = "number";
    inputXXL.name = "productSizeXXL" + i;
    inputXXL.placeholder = "số lượng Size XXL của sp"+i;
    var ivbsbs=document.body.appendChild(document.createElement("br"));
    inputs.push(label,inputfile,inputName, inputS, inputM, inputL, inputXL, inputXXL,ivbsbs);
  }

  // Thêm các ô input vào thẻ form
  var form = document.querySelector("#loaisp_size");
  for (var input of inputs) {
    form.appendChild(input);
  }
}




</script>
</html>