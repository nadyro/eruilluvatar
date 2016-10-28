<?php

/**
 * 
 */
class Base_SQL {

    private $table;
    private $pdo;
    private $columns = [];

    public function __construct() {
        $this->table = get_called_class();
        try {
            $dsn = "mysql:dbname=eupheme;host=localhost";
            $user = "root";
            $pwd = "";
            $this->pdo = new PDO($dsn, $user, $pwd);

            // On garde met les noms des attributs de la classe enfant dans $columns
            $cols = get_object_vars($this);
            $class_vars = get_class_vars(get_class());
            $this->columns = array_keys(array_diff_key($cols, $class_vars));
        } catch (Exception $e) {
            die("Erreur SQL : " . $e->getMessage());
        }
    }

    public function save() {

        if (is_numeric($this->id)) {
            $cols = $this->columns;
            unset($cols[0]);
            $sets = "";
            $cpt = 1;
            foreach ($cols as $key => $value) {
                $sets .= $value . " = '" . $this->$value . "'";
                if ($cpt < sizeof($cols)) {
                    $sets .= ", ";
                }
                $cpt++;
            }
            $sql = "UPDATE " . strtolower($this->table) . " SET " . $sets . " WHERE id = " . strtolower($this->id);
            $query = $this->pdo->prepare($sql);
            foreach ($this->columns as $key => $value) {
                $data[$value] = $this->$value;
            }
            $query->execute($data);
        } else {
            $cols = $this->columns;
            unset($cols[0]);
            $sql = "INSERT INTO " . strtolower($this->table) . " (" . implode(",", $cols) . ") VALUES (:" . implode(", :", $cols) . ")";
            $query = $this->pdo->prepare($sql);
            foreach ($cols as $key => $value) {
                $data[$value] = $this->$value;
            }
            $query->execute($data);
        }
    }

    public function getUser($email) {
        $query = $this->pdo->prepare("SELECT u.*, m.lien as photo, m.libelle as alt FROM user u, media m WHERE u.id_media = m.id AND email = :email;");
        $query->execute(array('email' => $email));
        $row = $query->fetch();

        return $row;
    }

}
