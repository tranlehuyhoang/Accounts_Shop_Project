<?php
include_once __DIR__ . '/../lib/database.php';
include_once __DIR__ . '/../helpers/format.php';
?>

<?php
class invoices
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
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
