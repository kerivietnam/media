<?php

if(isset($_POST['image'])) {

    $img = $_POST['image'];

    // loại bỏ header base64
    $img = str_replace('data:image/png;base64,', '', $img);
    $img = str_replace(' ', '+', $img);

    $data = base64_decode($img);

    // tạo tên file
    $file = 'uploads/img_' . time() . '.png';

    // tạo thư mục nếu chưa có
    if (!file_exists('uploads')) {
        mkdir('uploads', 0777, true);
    }

    // lưu file
    file_put_contents($file, $data);

    echo "OK - saved: " . $file;

} else {
    echo "No image!";
}
