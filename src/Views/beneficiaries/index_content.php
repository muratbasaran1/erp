<h1>Başvurular</h1>
<form class="mb-3" method="get" action="/">
    <input type="text" name="search" class="form-control" placeholder="Ara" value="<?= htmlspecialchars($search) ?>">
</form>
<table class="table table-bordered table-striped table-responsive">
    <thead class="table-light">
        <tr>
            <th>ID</th>
            <th>T.C. Kimlik No</th>
            <th>Ad</th>
            <th>Soyad</th>
            <th>GSM 1</th>
            <th>GSM 2</th>
            <th>İşlem</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($beneficiaries as $b): ?>
        <tr>
            <td><?= $b['id'] ?></td>
            <td><?= htmlspecialchars($b['tc_id']) ?></td>
            <td><?= htmlspecialchars($b['first_name']) ?></td>
            <td><?= htmlspecialchars($b['last_name']) ?></td>
            <td><?= htmlspecialchars($b['gsm1'] ?? '') ?></td>
            <td><?= htmlspecialchars($b['gsm2'] ?? '') ?></td>
            <td>
                <a class="btn btn-sm btn-info" href="/?action=show&id=<?= $b['id'] ?>">Görüntüle</a>
                <a class="btn btn-sm btn-danger" href="/?action=delete&id=<?= $b['id'] ?>" onclick="return confirm('Silinsin mi?')">Sil</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
