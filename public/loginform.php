<?php
include("inc/top.php");
?>
<div class="row mt-5">
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
        <div class="p-4 shadow-lg rounded-3" style="background-color: #2C2C2C; color: #E0E0E0;">
            <h3 class="text-center mb-4" style="color: #FFD700;">ĐĂNG NHẬP</h3>
            <form method="post" action="index.php">
                <div class="mb-3">
                    <input class="form-control bg-dark text-light border-0" 
                           style="border-radius: 8px;" 
                           type="text" name="txtemail" placeholder="Email" required>
                </div>
                <div class="mb-3">
                    <input class="form-control bg-dark text-light border-0" 
                           style="border-radius: 8px;" 
                           type="password" name="txtmatkhau" placeholder="Mật khẩu" required>
                </div>

                <input type="hidden" name="action" value="xldangnhap">
                <div class="d-grid">
                    <input class="btn btn-warning btn-lg fw-bold" 
                           style="border-radius: 8px;" 
                           type="submit" value="Đăng nhập">
                </div>
            </form>
        </div>
    </div>
    <div class="col-sm-4"></div>
</div>
<?php
include("inc/bottom.php");
?>
