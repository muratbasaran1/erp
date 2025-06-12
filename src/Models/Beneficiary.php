<?php
require_once __DIR__ . '/../../config/config.php';

class Beneficiary
{
    public static function all($search = '')
    {
        global $pdo;
        $sql = "SELECT b.*, c.gsm1, c.gsm2 FROM beneficiaries b LEFT JOIN contacts c ON b.id = c.beneficiary_id WHERE b.deleted_at IS NULL";
        $params = [];
        if ($search) {
            $sql .= " AND (tc_id LIKE :s OR first_name LIKE :s OR last_name LIKE :s)";
            $params[':s'] = "%$search%";
        }
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }

    public static function find($id)
    {
        global $pdo;
        $stmt = $pdo->prepare("SELECT b.*, c.gsm1, c.gsm2 FROM beneficiaries b LEFT JOIN contacts c ON b.id = c.beneficiary_id WHERE b.id = :id AND b.deleted_at IS NULL");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }

    public static function create($data)
    {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO beneficiaries (family_registration_no, nationality, tc_id, first_name, last_name, father_name, mother_name, birth_date, birth_place, marital_status, gender, children_count, working_count, salary, other_income, rent, remaining_amount) VALUES (:family_registration_no, :nationality, :tc_id, :first_name, :last_name, :father_name, :mother_name, :birth_date, :birth_place, :marital_status, :gender, :children_count, :working_count, :salary, :other_income, :rent, :remaining_amount)");
        $stmt->execute([
            ':family_registration_no' => $data['family_registration_no'],
            ':nationality' => $data['nationality'],
            ':tc_id' => $data['tc_id'],
            ':first_name' => $data['first_name'],
            ':last_name' => $data['last_name'],
            ':father_name' => $data['father_name'],
            ':mother_name' => $data['mother_name'],
            ':birth_date' => $data['birth_date'],
            ':birth_place' => $data['birth_place'],
            ':marital_status' => $data['marital_status'],
            ':gender' => $data['gender'],
            ':children_count' => $data['children_count'],
            ':working_count' => $data['working_count'],
            ':salary' => $data['salary'],
            ':other_income' => $data['other_income'],
            ':rent' => $data['rent'],
            ':remaining_amount' => $data['remaining_amount'],
        ]);
        $id = $pdo->lastInsertId();
        $contactStmt = $pdo->prepare("INSERT INTO contacts (beneficiary_id, gsm1, gsm2, owner_gsm) VALUES (:id, :gsm1, :gsm2, :owner)");
        $contactStmt->execute([
            ':id' => $id,
            ':gsm1' => $data['gsm1'] ?? null,
            ':gsm2' => $data['gsm2'] ?? null,
            ':owner' => ($data['first_name'] ?? '') . ' ' . ($data['last_name'] ?? '')
        ]);
        return $id;
    }

    public static function softDelete($id)
    {
        global $pdo;
        $stmt = $pdo->prepare("UPDATE beneficiaries SET deleted_at = NOW() WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }
}
