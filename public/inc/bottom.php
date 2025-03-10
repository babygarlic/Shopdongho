            </div>
            </section>

            <!-- Top products -->

            <section>
              <div class="container-fluid">
                <div class="row">
                  <div class="col-md-6">
                    <?php include("inc/carousel.php"); ?>
                  </div>
                  <div class="col-md-6 pt-2">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#menu1">Nổi bật</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#menu2">Xem nhiều</a>
                      </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                      <div id="menu1" class="container tab-pane active"><br>

                        <?php include("inc/topview.php"); ?>

                      </div>
                      <div id="menu2" class="container tab-pane fade"><br>
                        <h3>Sản phẩm xem nhiều</h3>
                        <p>Đang cập nhật...</p>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>

            <!-- Footer-->
            <footer class="py-5" style="background-color: #2C2C2C;"> <!-- Nền màu đen xám -->
              <div class="text-center mb-5">
                <a class="text-warning" href="#top">
                  <i class="bi bi-chevron-up" style="font-size: 3rem; font-weight: bold; color: #FFD700;"></i> <!-- Màu vàng đồng -->
                </a>
              </div>

              <div class="container">
                <div class="row">
                  <!-- Cột thông tin cửa hàng -->
                  <div class="col-md-6 text-light">
                    <a href="index.php" class="text-decoration-none text-white">
                      <h4>
                        <span class="badge" style="background-color: #444;">H</span>
                        <span class="badge" style="background-color: #666;">T</span>
                        <span class="badge" style="background-color: #888;">S</span>
                        Shop đồng hồ thời trang
                      </h4>
                    </a>
                    <p>
                      <b><i>Địa chỉ:</i></b> 29 Nguyễn Trãi, phường Mỹ Long, TP Long Xuyên, An Giang<br>
                      <b><i>Điện thoại:</i></b> 05833130289<br>
                      <b><i>Email:</i></b> Sang_dth215783@gmail.com
                    </p>
                  </div>

                  <!-- Cột danh mục hàng -->
                  <div class="col-md-3">
                    <h4 style="color: #FFD700;">DANH MỤC HÀNG</h4> <!-- Tiêu đề vàng đồng -->
                    <?php foreach ($danhmuc as $d): ?>
                      <a class="list-group-item" style="color: #E0E0E0; background-color: #383838;"
                        href="?action=group&id=<?php echo $d["id"]; ?>">
                        <?php echo $d["tendanhmuc"]; ?>
                      </a>
                    <?php endforeach; ?>
                  </div>

                  <!-- Cột dịch vụ khách hàng -->
                  <div class="col-md-3">
                    <h4 style="color: #FFD700;">DỊCH VỤ KHÁCH HÀNG</h4>
                    <a href="#" class="list-group-item" style="color: #E0E0E0; background-color: #383838;">Hướng dẫn mua hàng</a>
                    <a href="#" class="list-group-item" style="color: #E0E0E0; background-color: #383838;">Câu hỏi thường gặp</a>
                    <a href="#" class="list-group-item" style="color: #E0E0E0; background-color: #383838;">Liên hệ với chúng tôi</a>
                  </div>
                </div>
                <hr style="border-color: #555;"> <!-- Đường kẻ màu xám đậm -->
                <p class="m-0 text-center" style="color: #FFD700; font-weight: bold;">
                  Copyright &copy; Đồng Hồ Hải Triều 2024
                </p>
              </div>
            </footer>


            </body>

            </html>