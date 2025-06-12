<?php
require_once __DIR__ . '/../Models/Beneficiary.php';

class BeneficiaryController
{
    public function index()
    {
        $search = $_GET['search'] ?? '';
        $beneficiaries = Beneficiary::all($search);
        include __DIR__ . '/../Views/beneficiaries/index.php';
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = Beneficiary::create($_POST);
            header('Location: /?action=show&id=' . $id);
            exit;
        }
        include __DIR__ . '/../Views/beneficiaries/create.php';
    }

    public function show()
    {
        $id = $_GET['id'];
        $beneficiary = Beneficiary::find($id);
        include __DIR__ . '/../Views/beneficiaries/show.php';
    }

    public function delete()
    {
        $id = $_GET['id'];
        Beneficiary::softDelete($id);
        header('Location: /');
    }

    public function export()
    {
        $beneficiaries = Beneficiary::all();
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=beneficiaries.csv');
        $out = fopen('php://output', 'w');
        fputcsv($out, array_keys($beneficiaries[0] ?? []));
        foreach ($beneficiaries as $row) {
            fputcsv($out, $row);
        }
        fclose($out);
    }
}
