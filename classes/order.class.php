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
            $arlet = '200';
            return $arlet;
        } else {
            $arlet = "400";
            return $arlet;
        }
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
        $query = "SELECT * FROM clone_order 
        JOIN clone_user ON clone_order.invoices_user = clone_user.user_id";
        $result = $this->db->select($query);

        return $result;
    }
    public function show_order_by_user()
    {
        $invoices_user = $_SESSION['clone_user_id'];
        $query = "SELECT * FROM clone_order 
        JOIN clone_user ON clone_order.invoices_user = clone_user.user_id
        where invoices_user = '$invoices_user'
        ";
        $result = $this->db->select($query);

        return $result;
    }


    public function update_order($content, $user, $price)
    {

        $querys = "SELECT * FROM clone_order WHERE invoices_content = '$content' AND invoices_status = '0' ";
        $results = $this->db->select($querys);

        if (!$results) {
            return $results;
        }
        $this->update_user($user, $price);

        $query = "UPDATE clone_order SET invoices_status = '1' WHERE invoices_content = '$content'";
        $result = $this->db->update($query);
    }
    public function update_user($user, $price)
    {

        $query = "UPDATE clone_user SET user_asset = user_asset + $price WHERE user_id = '$user'";
        $result = $this->db->update($query);
    }
    public function delete_order($id)
    {
        $id = mysqli_real_escape_string($this->db->link, $id);
        $query = "DELETE FROM tbl_order WHERE categoryid = '$id'";
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
        $query = "SELECT * FROM clone_order WHERE invoices_content = '$id' AND invoices_user = '$invoices_user'";
        $result = $this->db->select($query);

        if ($result) {

            return $result;
        } else {
            $arlet = "400";

            return $arlet;
        }
    }
}
