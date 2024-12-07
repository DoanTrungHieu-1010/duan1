<!-- Giỏ hàng -->

<!-- breadcrumb-section start -->
<nav class="breadcrumb-section theme1 bg-lighten2 pt-110 pb-110">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="section-title text-center">
          <h2 class="title pb-4 text-dark text-capitalize">Giỏ Hàng</h2>
        </div>
      </div>
      <div class="col-12">
        <ol class="breadcrumb bg-transparent m-0 p-0 align-items-center justify-content-center">
          <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
          <li class="breadcrumb-item active" aria-current="page">Giỏ Hàng</li>
        </ol>
      </div>
    </div>
  </div>
</nav>
<!-- breadcrumb-section end -->
<style>
  /* CSS cho checkbox */
  .checkbox {
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    display: inline-block;
    width: 20px;
    height: 20px;
    background-color: #fff;
    border: 2px solid #2196F3;
    border-radius: 4px;
    cursor: pointer;
    position: relative;
  }

  /* Khi checkbox được chọn */
  .checkbox:checked {
    background-color: #2196F3;
    border: 2px solid #2196F3;
  }

  /* Ẩn checkbox mặc định */
  .checkbox::-ms-check,
  .checkbox::-ms-expand {
    display: none;
  }

  /* Hiển thị chữ "V" khi checkbox được chọn */
  .checkbox:checked::before {
    content: '\2713';
    /* Ký tự Unicode của chữ "V" */
    font-size: 16px;
    color: #fff;
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
  }




  input[type="number"] {
    padding: 5px;
    font-size: 16px;
    border: 2px solid #ccc;
    border-radius: 5px;
    background-color: #f4f4f4;
    color: #333;
    outline: none;
    width: 60px;
    /* Ẩn mũi tên điều chỉnh số trong Chrome và Safari */
    -webkit-appearance: textfield;
  }

  /* Tùy chỉnh khi được focus */
  input[type="number"]:focus {
    border-color: #3498db;
    box-shadow: 0 0 10px rgba(52, 152, 219, 0.5);
  }
</style>
<!-- product tab start -->
<section class="whish-list-section theme1 pt-80 pb-80">
  <form action="index.php?act=thanhtoan" method="post">
    <div class="container">
      <div class="row">
        <div class="col-12 text-center">
          <h3 class="title mb-30 pb-25 text-capitalize">Các sản phẩm trong giỏ hàng</h3>
          <div class="table-responsive">
            <div style="color:red;font-size:17px"><?= $_COOKIE['thongbao'] ?? "" ?></div>
            <table class="table">
              <thead class="thead-light">
                <tr>
                  <th class="text-center" scope="col"></th>
                  <th class="text-center" scope="col">Hình ảnh</th>
                  <th class="text-center" scope="col" style="width:28%">Tên sản phẩm</th>
                  <th class="text-center" scope="col">Màu sắc</th>
                  <th class="text-center" scope="col">Tổng kho</th>
                  <th class="text-center" scope="col">Giá tiền</th>
                  <th class="text-center" scope="col">Số lượng</th>
                  <th class="text-center" scope="col">Thành tiền</th>
                  <th class="text-center" scope="col">Chức năng</th>
                  <th class="text-center" scope="col">Thanh toán</th>
                </tr>
              </thead>
              
            </table>
          </div>
        </div>
      </div>
      <?php
      $link = "index.php?act=thanhtoan";
      if (empty($listgiohang)) {
        $link = "";
        $thongbao = "alert('Bạn chưa có sản phẩm nào trong giỏ hàng')";
      }
      ?>
      <div class="Place-order mt-25" style="text-align:right">
        <input type="submit" onclick="<?= $thongbao ?? "" ?>" class="btn btn--lg btn-primary my-2 my-sm-0" name="dathangdachon" value="Đặt Hàng">
      </div>
    </div>
  </form>

</section>
<!-- product tab end -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
  function updateSoLuong(id, conlai) {
    let newSoLuong = $('#soluong_' + id).val();
    if (newSoLuong <= 0) {
      newSoLuong = 1;
    }
    if (newSoLuong >= conlai) {
      newSoLuong = conlai;
    }
    $.ajax({
      type: 'POST',
      url: 'view/update-cart.php',
      data: {
        id: id,
        soluong: newSoLuong
      },
      success: function(response) {
        $.post('view/cart-new.php', function(data) {
          $('#order-cart').html(data);
        })
      },
      error: function(error) {
        console.error('Error:', error);
      }
    });
  }
</script>


<?php
include "view/footer.php";
?>