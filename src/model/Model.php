<?php
class Model
{
    private $unPdo;

    public function __construct($server, $bdd, $user, $mdp)
    {
        $this->unPdo = null;
        try {
            $this->unPdo = new PDO("mysql:host=" . $server . ";dbname=" . $bdd, $user, $mdp);
        } catch (PDOException $exp) {
            echo "Erreur de connexion à la base données";
            echo $exp->getMessage();
        }
    }

    public function verifCon($email, $mdp)
    {
        if ($this->unPdo != null) {
            $requete = "select * from User where email=:email and mdp=:mdp;";
            $donnees = array(":email" => $email, ":mdp" => $mdp);
            $select = $this->unPdo->prepare($requete); //bug
            $select->execute($donnees);
            $resultat = $select->fetch();
            return $resultat;
        }
    }

    public function insertUser($tab)
    {
        if ($this->unPdo != null) {
            $requete = "insert into user values(null, :nom, :email, :mdp)";
            $donnees = array(":nom" => $tab['nom'], ":email" => $tab['email'], "mdp" => $tab['mdp']);
            $insert = $this->unPdo->prepare($requete);
            $insert->execute($donnees);
        }
    }

    public function insertProduct($tab)
    {
        if ($this->unPdo != null) {
            $requete = "insert into product values(null, :nom, :description, :prix; :stock)";
            $donnees = array(":nom" => $tab['nom'], ":description" => $tab['description'], ":prix" => $tab['prix'], ":stock" => $tab['stock']);
            $insert = $this->unPdo->prepare($requete);
            $insert->execute($donnees);
        }
    }

    public function insert($table, $values, $params = null)
    {
        if ($this->unPdo != null) {
            if (isset($params) and (count($params) == count($values))) {
                $params = " (" . implode(', ', $params) . ")";
            }
            $values = "('" . implode('\', \'', $values) . "')";
            $requete = "insert into " . $table . $params . " values " . $values;
            $insert = $this->unPdo->prepare($requete);
            $insert->execute();
        }
    }

    public function selectAll($table)
    {
        if ($this->unPdo != null) {
            $requete = "select * from " . $table;
            $select = $this->unPdo->prepare($requete);
            $select->execute();
            $resultats = $select->fetchAll();
            return $resultats;
        }
    }

    public function select($table, $fields = '*', $params = null, $values = null, $tab)
    {
        if ($this->unPdo != null) {
            $fields = (is_array($fields)) ? implode(', ', $fields) : $fields;
            $where = '';
            if (isset($params) && isset($values)) {
                if (is_array($params) && is_array($values)) {
                    if (count($params) == count($values)) {
                        $where = array();
                        for ($i = 0; $i < count($params); $i++) {
                            $where[] = $params[$i] . ' = ' . $values[$i];
                        }
                        $where = ' where ' . implode(" and ", $where);
                    }
                } elseif (!is_array($params) && !is_array($values)) {
                    $where = ' where ' . $params . ' = ' . $values;
                }
            }
            $requete = "select " . $fields . " from " . $table . $where;
            $select = $this->unPdo->prepare($requete);
            $select->execute();
            $resultats = $select->fetchAll();
            return $resultats;
        }
    }

    public function deleteProduct($id)
    {
        if ($this->unPdo != null) {
            $requete = "delete from product where `id` = " . $id;
            $select = $this->unPdo->prepare($requete);
            $select->execute();
        }
    }

    public function delete($table, $field, $value)
    {
        if ($this->unPdo != null) {
            $requete = "delete from " . $table . " where " . $field . " = " . $value;
            $select = $this->unPdo->prepare($requete);
            $select->execute();
        }
    }

    public function update($champ, $table, $value, $id)
    {
        if ($this->unPdo != null) {
            $requete = "update " . $table . " set " . $champ . " = '" . $value . "' where `id` = " . $id;
            $select = $this->unPdo->prepare($requete);
            $select->execute();
        }
    }


    public function updateS($table, $params, $values, $field, $fieldValue = "id")
    {
        if ($this->unPdo != null) {
            if (is_array($params) && is_array($values)) {
                if (count($params) == count($values)) {
                    $set = array();
                    for ($i = 0; $i < count($params); $i++) {
                        $set[] = $params[$i] . ' = \'' . $values[$i] . '\'';
                    }
                    $set = implode(", ", $set);
                }
            } elseif (!is_array($params) && !is_array($values)) {
                $set = $params . ' = \'' . $values . '\'';
            }
            $requete = "update " . $table . " set " . $set . " where " . $field . " = " . $fieldValue;
            $select = $this->unPdo->prepare($requete);
            $select->execute();
        }
    }
}
