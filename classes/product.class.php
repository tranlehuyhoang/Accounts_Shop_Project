<?php
include_once __DIR__ . '/../lib/database.php';
include_once __DIR__ . '/../helpers/format.php';
?>

<?php
class product
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
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
