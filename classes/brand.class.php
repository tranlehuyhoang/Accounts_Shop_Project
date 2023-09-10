<?php
include_once __DIR__ . '/../lib/database.php';
include_once __DIR__ . '/../helpers/format.php';

$db = new Database();
?>

<?php
class brand
{
    private $db;
    private $fm;
    public function __construct()
    {
        global $db;
        $this->db = $db;
        $this->fm = new Format();
    }
    public function insert_brand($data)
    {
        $categoryname = mysqli_real_escape_string($this->db->link, $data['categoryname']);

        if (empty($categoryname)) {
            $arlet = "<div class='alert alert-danger' role='alert'>Category must not be empty</div>";
            return $arlet;
        } else {
            $query = "INSERT INTO tbl_brand(categoryname) VALUES ('$categoryname')";
            $result = $this->db->insert($query);

            if ($result) {
                $arlet = "<div class='alert alert-success' role='alert'>Insert Category Successfully</div>";
                return $arlet;
            } else {
                $arlet = "<div class='alert alert-danger' role='alert'>Insert Category Successfully</div>";
                return $arlet;
            }
        }
    }

    public function show_brand()
    {
        $query = "SELECT * FROM clone_brand order by brand_id desc";
        $result = $this->db->select($query);

        return $result;
    }


    public function update_brand($data, $id)
    {
        $categoryname = mysqli_real_escape_string($this->db->link, $data['categoryname']);
        $id = mysqli_real_escape_string($this->db->link, $id);

        if (empty($categoryname)) {
            $arlet = "<div class='alert alert-danger' role='alert'>Category name empty</div>";
            return $arlet;
        } else {
            $query = "UPDATE tbl_brand SET categoryname = '$categoryname' WHERE categoryid = '$id'";
            $result = $this->db->update($query);

            if ($result) {
                $arlet = "<div class='alert alert-success' role='alert'>Update Category Successfully</div>";
                return $arlet;
            } else {
                $arlet = "<div class='alert alert-danger' role='alert'>Error</div>";

                return $arlet;
            }
        }
    }
    public function delete_brand($id)
    {
        $id = mysqli_real_escape_string($this->db->link, $id);
        $query = "DELETE FROM tbl_brand WHERE categoryid = '$id'";
        $result = $this->db->delete($query);


        if ($result) {
            $arlet = "<div class='alert alert-success' role='alert'>Insert Category Successfully</div>";
            return $arlet;
        } else {
            $arlet = "<div class='alert alert-danger' role='alert'>Insert Category Successfully</div>";

            return $arlet;
        }
    }

    public function getbrandbycat($id)

    {
        $query = "SELECT * FROM clone_brand WHERE brand_category = '$id' order by brand_id  desc";
        $result = $this->db->select($query);

        return $result;
    }
}
?>
<?php
class category
{
    private $db;
    private $fm;
    public function __construct()
    {
        global $db;
        $this->db = $db;
        $this->fm = new Format();
    }
    public function insert_category($data)
    {
        $categoryname = mysqli_real_escape_string($this->db->link, $data['categoryname']);

        if (empty($categoryname)) {
            $arlet = "<div class='alert alert-danger' role='alert'>Category must not be empty</div>";
            return $arlet;
        } else {
            $query = "INSERT INTO tbl_category(categoryname) VALUES ('$categoryname')";
            $result = $this->db->insert($query);

            if ($result) {
                $arlet = "<div class='alert alert-success' role='alert'>Insert Category Successfully</div>";
                return $arlet;
            } else {
                $arlet = "<div class='alert alert-danger' role='alert'>Insert Category Successfully</div>";
                return $arlet;
            }
        }
    }

    public function show_category()
    {
        $query = "SELECT * FROM clone_category order by category_id desc";
        $result = $this->db->select($query);

        return $result;
    }


    public function update_category($data, $id)
    {
        $categoryname = mysqli_real_escape_string($this->db->link, $data['categoryname']);
        $id = mysqli_real_escape_string($this->db->link, $id);

        if (empty($categoryname)) {
            $arlet = "<div class='alert alert-danger' role='alert'>Category name empty</div>";
            return $arlet;
        } else {
            $query = "UPDATE tbl_category SET categoryname = '$categoryname' WHERE categoryid = '$id'";
            $result = $this->db->update($query);

            if ($result) {
                $arlet = "<div class='alert alert-success' role='alert'>Update Category Successfully</div>";
                return $arlet;
            } else {
                $arlet = "<div class='alert alert-danger' role='alert'>Error</div>";

                return $arlet;
            }
        }
    }
    public function delete_category($id)
    {
        $id = mysqli_real_escape_string($this->db->link, $id);
        $query = "DELETE FROM tbl_category WHERE categoryid = '$id'";
        $result = $this->db->delete($query);


        if ($result) {
            $arlet = "<div class='alert alert-success' role='alert'>Insert Category Successfully</div>";
            return $arlet;
        } else {
            $arlet = "<div class='alert alert-danger' role='alert'>Insert Category Successfully</div>";

            return $arlet;
        }
    }

    public function getcatbyId($id)

    {
        $query = "SELECT * FROM tbl_category WHERE categoryid = '$id'";
        $result = $this->db->select($query);

        return $result;
    }
}
?>
<?php
class invoices
{
    private $db;
    private $fm;
    public function __construct()
    {
        global $db;
        $this->db = $db;
        $this->fm = new Format();
    }
    public function insert_invoices($data)
    {
        $invoices_price = mysqli_real_escape_string($this->db->link, $data['invoices_price']);
        $invoices_content = $this->random_invoices_content();
        $invoices_status = '0';
        $invoices_user = $_SESSION['clone_user_id'];


        $query = "INSERT INTO clone_invoices(invoices_price,invoices_content,invoices_status,invoices_user) VALUES ('$invoices_price','$invoices_content','$invoices_status','$invoices_user')";
        $result = $this->db->insert($query);

        if ($result) {
            $arlet = $invoices_content;
            return $arlet;
        } else {
            $arlet = "400";
            return $arlet;
        }
    }

    public function random_invoices_content()
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $randomString = '';


        $randomString = '';
        for ($i = 0; $i < 6; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }

        $query = "SELECT * FROM clone_invoices WHERE invoices_content = '$randomString' ";
        $result = $this->db->select($query);

        if ($result) {
            $this->random_invoices_content();
        } else {
            return $randomString;
        }
    }
    public function show_invoices()
    {
        $query = "SELECT * FROM clone_invoices 
        JOIN clone_user ON clone_invoices.invoices_user = clone_user.user_id";
        $result = $this->db->select($query);

        return $result;
    }
    public function show_invoices_by_user()
    {
        $invoices_user = $_SESSION['clone_user_id'];
        $query = "SELECT * FROM clone_invoices 
        JOIN clone_user ON clone_invoices.invoices_user = clone_user.user_id
        where invoices_user = '$invoices_user'
        ";
        $result = $this->db->select($query);

        return $result;
    }

    public function count_invoices_by_user()
    {
        $invoices_user = $_SESSION['clone_user_id'];
        $query = "SELECT SUM(invoices_price) AS total_amount FROM clone_invoices 
              WHERE invoices_user = '$invoices_user' AND invoices_status = '1'";
        $result = $this->db->select($query);

        return $result;
    }


    public function update_invoices($content, $user, $price)
    {

        $querys = "SELECT * FROM clone_invoices WHERE invoices_content = '$content' AND invoices_status = '0' ";
        $results = $this->db->select($querys);

        if (!$results) {
            return $results;
        }
        $this->update_user($user, $price);

        $query = "UPDATE clone_invoices SET invoices_status = '1' WHERE invoices_content = '$content'";
        $result = $this->db->update($query);
    }
    public function update_user($user, $price)
    {

        $query = "UPDATE clone_user SET user_asset = user_asset + $price WHERE user_id = '$user'";
        $result = $this->db->update($query);
    }

    public function delete_invoices($id)
    {
        $id = mysqli_real_escape_string($this->db->link, $id);
        $query = "DELETE FROM tbl_invoices WHERE categoryid = '$id'";
        $result = $this->db->delete($query);


        if ($result) {
            $arlet = "<div class='alert alert-success' role='alert'>Insert Category Successfully</div>";
            return $arlet;
        } else {
            $arlet = "<div class='alert alert-danger' role='alert'>Insert Category Successfully</div>";

            return $arlet;
        }
    }

    public function getinvoicesbyid($id)

    {
        $invoices_user = $_SESSION['clone_user_id'];
        $query = "SELECT * FROM clone_invoices WHERE invoices_content = '$id' AND invoices_user = '$invoices_user'";
        $result = $this->db->select($query);

        if ($result) {

            return $result;
        } else {
            $arlet = "400";

            return $arlet;
        }
    }
}
?>

<?php
class order
{
    private $db;
    private $fm;
    public function __construct()
    {
        global $db;
        $this->db = $db;
        $this->fm = new Format();
    }
    public function insert_order($order_price, $order_brand, $order_amout)
    {
        $order_price = mysqli_real_escape_string($this->db->link, $order_price);
        $order_brand = mysqli_real_escape_string($this->db->link, $order_brand);
        $order_amout = mysqli_real_escape_string($this->db->link, $order_amout);
        // $order_code = $this->random_order_content();
        $order_code = $this->random_order_content();

        $order_user = $_SESSION['clone_user_id'];


        $query = "INSERT INTO clone_order(order_price,order_brand,order_amout,order_user,order_code) VALUES ('$order_price','$order_brand','$order_amout','$order_user','$order_code')";
        $result = $this->db->insert($query);

        if ($result) {
            $this->update_user($order_user, $order_price * $order_amout);
            $this->update_product($order_brand, $order_code, $order_amout);
            $arlet = "200";
            return $arlet;
        } else {
            $arlet = "400";
            return $arlet;
        }
    }

    public function update_product($order_brand, $order_code, $order_amout)
    {
        for ($i = 0; $i < $order_amout; $i++) {
            $query = "UPDATE clone_product SET product_order = '$order_code', product_selled = '1', product_brand = '$order_brand' WHERE product_order = '0' LIMIT 1";
            $result = $this->db->update($query);
        }
    }
    public function update_user($user, $price)
    {

        $query = "UPDATE clone_user SET user_asset = user_asset - $price WHERE user_id = '$user'";
        $result = $this->db->update($query);
    }

    public function random_order_content()
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $numbers = '0123456789';
        $randomString = '';

        // Tạo 4 kí tự chữ cái đầu tiên
        for ($i = 0; $i < 4; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }

        // Tạo 10 kí tự số tiếp theo
        for ($i = 0; $i < 10; $i++) {
            $randomString .= $numbers[rand(0, strlen($numbers) - 1)];
        }
        $query = "SELECT * FROM clone_order WHERE order_code = '$randomString' ";
        $result = $this->db->select($query);

        if ($result) {
            $this->random_order_content();
        } else {
            return $randomString;
        }
    }
    public function show_order()
    {
        $order_user = $_SESSION['clone_user_id'];
        $query = "SELECT * FROM clone_order 
        JOIN clone_brand ON clone_order.order_brand = clone_brand.brand_id
        WHERE clone_order.order_user = '$order_user' ";
        $result = $this->db->select($query);

        return $result;
    }
    public function show_order_by_code($order_code)
    {
        $order_user = $_SESSION['clone_user_id'];
        $query = "SELECT * FROM clone_order 
        JOIN clone_brand ON clone_order.order_brand = clone_brand.brand_id
        WHERE clone_order.order_code = '$order_code' AND clone_order.order_user = '$order_user' LIMIT 1";
        $result = $this->db->select($query);

        if ($result) {
            return $result;
        } else {
            $arlet = "400";
            return $arlet;
        }
    }
    public function show_order_by_user()
    {
        $order_user = $_SESSION['clone_user_id'];
        $query = "SELECT SUM(order_amout * order_price) AS total_amount FROM clone_order 
              WHERE order_user = '$order_user'";
        $result = $this->db->select($query);

        if ($result) {
            return $result;
        }
    }

    public function show_product_by_order_code($order_code)
    {
        // $query = "SELECT * FROM clone_product";
        $query = "SELECT * FROM clone_product where product_order = '$order_code'";
        $result = $this->db->select($query);

        return $result;
    }



    // public function getinvoicesbyid($id)

    // {
    //     $invoices_user = $_SESSION['clone_user_id'];
    //     $query = "SELECT * FROM clone_order WHERE invoices_content = '$id' AND invoices_user = '$invoices_user'";
    //     $result = $this->db->select($query);

    //     if ($result) {

    //         return $result;
    //     } else {
    //         $arlet = "400";

    //         return $arlet;
    //     }
    // }
}
?>

<?php
class product
{
    private $db;
    private $fm;
    public function __construct()
    {
        global $db;
        $this->db = $db;
        $this->fm = new Format();
    }
    public function insert_product($data)
    {
        $categoryname = mysqli_real_escape_string($this->db->link, $data['categoryname']);

        if (empty($categoryname)) {
            $arlet = "<div class='alert alert-danger' role='alert'>Category must not be empty</div>";
            return $arlet;
        } else {
            $query = "INSERT INTO tbl_product(categoryname) VALUES ('$categoryname')";
            $result = $this->db->insert($query);
            if ($result) {
                $arlet = "<div class='alert alert-success' role='alert'>Insert Category Successfully</div>";
                return $arlet;
            } else {
                $arlet = "<div class='alert alert-danger' role='alert'>Insert Category Successfully</div>";
                return $arlet;
            }
        }
    }

    public function show_product()
    {
        $query = "SELECT * FROM clone_product order by brand_id desc";
        $result = $this->db->select($query);

        return $result;
    }


    public function update_product($data, $id)
    {
        $categoryname = mysqli_real_escape_string($this->db->link, $data['categoryname']);
        $id = mysqli_real_escape_string($this->db->link, $id);

        if (empty($categoryname)) {
            $arlet = "<div class='alert alert-danger' role='alert'>Category name empty</div>";
            return $arlet;
        } else {
            $query = "UPDATE tbl_product SET categoryname = '$categoryname' WHERE categoryid = '$id'";
            $result = $this->db->update($query);
            if ($result) {
                $arlet = "<div class='alert alert-success' role='alert'>Update Category Successfully</div>";
                return $arlet;
            } else {
                $arlet = "<div class='alert alert-danger' role='alert'>Error</div>";

                return $arlet;
            }
        }
    }
    public function delete_product($id)
    {
        $id = mysqli_real_escape_string($this->db->link, $id);
        $query = "DELETE FROM tbl_product WHERE categoryid = '$id'";
        $result = $this->db->delete($query);


        if ($result) {
            $arlet = "<div class='alert alert-success' role='alert'>Insert Category Successfully</div>";
            return $arlet;
        } else {
            $arlet = "<div class='alert alert-danger' role='alert'>Insert Category Successfully</div>";

            return $arlet;
        }
    }

    public function countProduct($id)
    {
        $query = "SELECT COUNT(*) AS total FROM clone_product WHERE product_brand = '$id' AND product_selled = '0'";
        $result = $this->db->select($query);

        return $result;
    }
    public function countProductselled($id)
    {
        $query = "SELECT COUNT(*) AS total FROM clone_product WHERE product_brand = '$id' AND product_selled = '1'";
        $result = $this->db->select($query);

        return $result;
    }
}
?>

<?php
class user
{
    private $db;
    private $fm;
    public function __construct()
    {
        global $db;
        $this->db = $db;
        $this->fm = new Format();
    }
    public function insert_user($data)
    {
        $user_username = mysqli_real_escape_string($this->db->link, $data['user_username']);
        $user_email = mysqli_real_escape_string($this->db->link, $data['user_email']);
        $user_password = mysqli_real_escape_string($this->db->link, md5($data['user_password']));

        // Kiểm tra xem user_username đã tồn tại trong cơ sở dữ liệu chưa
        $check_query = "SELECT * FROM clone_user WHERE user_username = '$user_username'";
        $check_result = $this->db->select($check_query);

        if ($check_result) {
            $alert = "400";
            return $alert;
        }

        // Tiếp tục thêm mới người dùng
        $query = "INSERT INTO clone_user(user_username, user_email, user_password) VALUES ('$user_username', '$user_email', '$user_password')";
        $result = $this->db->insert($query);

        if ($result) {
            $alert = "200";
            return $alert;
        } else {
            $alert = "404";
            return $alert;
        }
    }

    public function show_user()
    {
        $query = "SELECT * FROM clone_user order by userid desc";
        $result = $this->db->select($query);

        return $result;
    }
    public function get_asset_user()
    {
        $user_id =   $_SESSION['clone_user_id'];

        $query = "SELECT * FROM clone_user where user_id = '$user_id'";
        $result = $this->db->select($query);

        return $result;
    }



    // public function update_user($data, $id)
    // {
    //     $userroles = mysqli_real_escape_string($this->db->link, $data['userroles']);
    //     $id = mysqli_real_escape_string($this->db->link, $id);

    //     if ($userroles == '') {
    //         $arlet = "<div class='alert alert-danger' role='alert'>Category name empty</div>";
    //         return $arlet;
    //     } else {
    //         $query = "UPDATE user_user SET userroles = '$userroles'  WHERE userid = '$id'";
    //         $result = $this->db->update($query);
    //         if ($result) {
    //             $arlet = "<div class='alert alert-success' role='alert'>Update Category Successfully</div>";
    //             return $arlet;
    //         } else {
    //             $arlet = "<div class='alert alert-danger' role='alert'>Error</div>";

    //             return $arlet;
    //         }
    //     }
    // }


    // public function delete_user($id)
    // {
    //     $id = mysqli_real_escape_string($this->db->link, $id);
    //     $query = "DELETE FROM user_user WHERE userid = '$id'";
    //     $result = $this->db->delete($query);


    //     if ($result) {
    //         $arlet = "<div class='alert alert-success' role='alert'>Delete Code Successfully</div>";
    //         return $arlet;
    //     } else {
    //         $arlet = "<div class='alert alert-danger' role='alert'>Delete Code Successfully</div>";

    //         return $arlet;
    //     }
    // }
    public function getuserbyid($id)
    {


        $query = "SELECT * FROM clone_user WHERE user_id = '$id'";
        $result = $this->db->select($query);

        return $result;
    }
    public function checklogin($id)
    {


        $query = "SELECT * FROM user_user WHERE userid = '$id'";
        $result = $this->db->select($query);
        if ($result) {
            if ($result && $result->num_rows > 0) {
                while ($resultss = $result->fetch_assoc()) {
                    if ($resultss['userroles'] == 2) {
                        header('Location:page/Home.php');
                    }
                }
            }
        }
    }

    public function login($data)
    {
        $user_username = mysqli_real_escape_string($this->db->link, $data['user_username']);
        $user_password = mysqli_real_escape_string($this->db->link, md5($data['user_password']));
        $query = "SELECT * FROM clone_user WHERE  user_username = '$user_username'AND user_password = '$user_password' ";
        $result = $this->db->select($query);

        if ($result) {
            if ($result && $result->num_rows > 0) {
                while ($resultss = $result->fetch_assoc()) {
                    $_SESSION['clone_user_id'] = $resultss['user_id'];
                    $alertss = "200";
                    return $alertss;
                }
            }
            $alertss = "200";
            return $alertss;
        } else {
            $alerts = "400";

            return $alerts;
        }
    }
    public function logout()
    {
        unset($_SESSION['clone_user_id']);
    }
    public function loginuser($data)
    {
        $userpass = mysqli_real_escape_string($this->db->link, md5($data['userpass']));
        $useremail = mysqli_real_escape_string($this->db->link, $data['useremail']);
        $query = "SELECT * FROM user_user WHERE  userpass = '$userpass'AND useremail = '$useremail' ";
        $result = $this->db->select($query);

        if ($result) {
            if ($result && $result->num_rows > 0) {
                while ($resultss = $result->fetch_assoc()) {
                    $_SESSION['userid'] = $resultss['userid'];
                }
            }
            $arlet = "<div class='alert alert-success' role='alert'>Login Successfully</div>";
            return $arlet;
        } else {
            $arlet = "<div class='alert alert-danger' role='alert'>Login Error </div>";

            return $arlet;
        }
    }
    public function countusser()
    {

        $query = "SELECT COUNT(*) AS total_users FROM user_user; ";
        $result = $this->db->select($query);


        return $result;
    }
}
?>