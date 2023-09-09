<?php
include_once __DIR__ . '/../lib/database.php';
include_once __DIR__ . '/../helpers/format.php';
?>

<?php
class order
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
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
