<?php
include_once __DIR__ . '/../lib/database.php';
include_once __DIR__ . '/../helpers/format.php';
?>

<?php
class brand
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
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
