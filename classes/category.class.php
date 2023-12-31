<?php
include_once __DIR__ . '/../lib/database.php';
include_once __DIR__ . '/../helpers/format.php';
?>

<?php
class category
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
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
