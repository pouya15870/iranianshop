<?php
include("includes/header.php");

if (!(isset($_SESSION["state_login"]) && $_SESSION["state_login"] === true && $_SESSION["user_type"] == "admin")) {
?>

<script type="text/javascript">
location.replace("index.php");
</script>

<?php
}

$link = mysqli_connect("localhost","root","","shop_db");

if (mysqli_connect_errno())
    exit("خطای با شرح زیر رخ داده است:" . mysqli_connect_error());

if (
    isset($_POST["pro_code"]) && !empty($_POST["pro_code"]) &&
    isset($_POST["pro_name"]) && !empty($_POST["pro_name"]) &&
    isset($_POST["pro_qty"]) && !empty($_POST["pro_qty"]) &&
    isset($_POST["pro_price"]) && !empty($_POST["pro_price"]) &&
    isset($_POST["pro_detail"]) && !empty($_POST["pro_detail"])
) {

    $pro_code = $_POST['pro_code'];
    $pro_name = $_POST['pro_name'];
    $pro_qty = $_POST['pro_qty'];
    $pro_price = $_POST['pro_price'];
    $pro_detail = $_POST['pro_detail'];

    if (isset($_FILES["pro_image"]["name"]))
        $pro_image = $_FILES["pro_image"]["name"];
    else
        $pro_image = "";
}

if (isset($_GET['action'])) {

    $id = $_GET['id'];

    switch ($_GET['action']) {

case 'EDIT':

if (!empty($_FILES["pro_image"]["name"])) {

    $target_dir = "images/products/";
    $target_file = $target_dir . basename($_FILES["pro_image"]["name"]);

    move_uploaded_file($_FILES["pro_image"]["tmp_name"], $target_file);

    $pro_image = $_FILES["pro_image"]["name"];

    $query = "UPDATE products SET
    pro_code='$pro_code',
    pro_name='$pro_name',
    pro_qty='$pro_qty',
    pro_price='$pro_price',
    pro_image='$pro_image',
    pro_detail='$pro_detail'
    WHERE pro_code='$id'";

} else {

    $query = "UPDATE products SET
    pro_code='$pro_code',
    pro_name='$pro_name',
    pro_qty='$pro_qty',
    pro_price='$pro_price',
    pro_detail='$pro_detail'
    WHERE pro_code='$id'";
}

if (mysqli_query($link, $query) === true)
    echo("<p style='color:green;'><b>محصول انتخاب شده با موفقیت ویرایش شد.</b></p>");
else
    echo("<p style='color:red;'><b>خطا در ویرایش محصول</b></p>");

break;

        case 'DELETE':

            $query = "DELETE FROM products WHERE pro_code='$id'";

            if (mysqli_query($link, $query) === true)
                echo("<p style='color:green;'><b>محصول انتخاب شده با موفقیت حذف شد.</b></p>");
            else
                echo("<p style='color:red;'><b>خطا در حذف محصول</b></p>");

        break;
    }

    mysqli_close($link);
    include("includes/footer.php");
    exit();
}

$target_dir = "images/products/";
$target_file = $target_dir . basename($_FILES["pro_image"]["name"]);
$uploadOK = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

$check = getimagesize($_FILES["pro_image"]["tmp_name"]);

if ($check !== false) {
    $uploadOK = 1;
} else {
    $uploadOK = 0;
}

if (file_exists($target_file)) {
    $uploadOK = 0;
}

if ($_FILES["pro_image"]["size"] > (500 * 1024)) {
    $uploadOK = 0;
}

if (
    $imageFileType != "jpg" &&
    $imageFileType != "png" &&
    $imageFileType != "jpeg" &&
    $imageFileType != "gif"
) {
    $uploadOK = 0;
}

if ($uploadOK == 1) {

    move_uploaded_file($_FILES["pro_image"]["tmp_name"], $target_file);

    $query = "INSERT INTO products
    (
        pro_code,
        pro_name,
        pro_qty,
        pro_price,
        pro_image,
        pro_detail
    )
    VALUES
    (
        '$pro_code',
        '$pro_name',
        '$pro_qty',
        '$pro_price',
        '$pro_image',
        '$pro_detail'
    )";

    if (mysqli_query($link, $query) === true)
        echo("<p style='color:green;'><b>کالا با موفقیت به انبار اضافه شد</b></p>");
    else
        echo("<p style='color:red;'><b>خطا در ثبت مشخصات کالا</b></p>");

} else {

    echo("<p style='color:red;'><b>خطا در آپلود تصویر</b></p>");
}

mysqli_close($link);

include("includes/footer.php");
?>