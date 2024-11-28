
<?php
$strings = include 'strings.php';

$flowers = [
    ['id' => 1, 'name' => 'Hoa dạ yến thảo', 'moTa' => $strings['img1'], 'image' => 'images/da_yen_thao.webp'],
    ['id' => 2, 'name' => 'Hoa đồng tiền', 'moTa' => $strings['img2'], 'image' => 'images/dong_tien.webp'],
    ['id' => 3, 'name' => 'Hoa giấy', 'moTa' => $strings['img3'], 'image' => 'images/giay.webp'],
    ['id' => 4, 'name' => 'Hoa thanh tú', 'moTa' => $strings['img4'], 'image' => 'images/Thanh_tu.webp'],
    ['id' => 5, 'name' => 'Hoa đèn lồng', 'moTa' => $strings['img5'], 'image' => 'images/den_long.webp'],
    ['id' => 6, 'name' => 'Hoa cẩm chướng', 'moTa' => $strings['img6'], 'image' => 'images/cam_chuong.webp'],
    ['id' => 7, 'name' => ' Hoa huỳnh anh', 'moTa' => $strings['img7'], 'image' => 'images/huynh_anh.webp'],
    ['id' => 8, 'name' => ' Hoa Păng-xê', 'moTa' => $strings['img8'], 'image' => 'images/pang_xe.webp'],
    ['id' => 9, 'name' => 'Hoa sen ', 'moTa' => $strings['img9'], 'image' => 'images/sen.webp'],
    ['id' => 10, 'name' => 'Hoa dừa cạn ', 'moTa' => $strings['img10'], 'image' => 'images/dua_can.webp'],
    ['id' => 11, 'name' => 'Hoa sử quân tử', 'moTa' => $strings['img11'], 'image' => 'images/quan_tu.webp'],
    ['id' => 12, 'name' => ' Cúc lá nho', 'moTa' => $strings['img12'], 'image' => 'images/cuc_la_nho.jpg'],
    ['id' => 13, 'name' => 'Cẩm tú cầu', 'moTa' => $strings['img13'], 'image' => 'images\cam_tu_cau.webp'],
    ['id' => 14, 'name' => 'Hoa cúc dại', 'moTa' => $strings['img14'], 'image' => 'images/cuc_dai.webp'],
];
// Thêm
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addProduct'])) {
    $newProduct = [
        'id' => count($flowers) + 1, // Tự động tăng id
        'name' => $_POST['name'],
        'moTa' => $_POST['moTa'],
        'image' => $_POST['image'],
    ];
    $flowers[] = $newProduct;
}



// Sửa
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['editProduct'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $moTa = $_POST['moTa'];
    $image = $_POST['image'];

    foreach ($flowers as &$flower) {
        if ($flower['id'] == $id) {
            $flower['name'] = $name;
            $flower['moTa'] = $moTa;
            $flower['image'] = $image;
            break;
        }
    }
    $_SESSION['products'] = $flowers; // Cập nhật session nếu dùng session
}

// Xóa
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['deleteProduct'])) {
    $id = $_POST['id'];
    foreach ($flowers as $key => $flower) {
        if ($flower['id'] == $id) {
            unset($flowers[$key]);
        }
    }
}
