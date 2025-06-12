<h1>Başvuru Detayı</h1>
<?php if ($beneficiary): ?>
    <ul class="list-group">
        <li class="list-group-item"><strong>Ad:</strong> <?= htmlspecialchars($beneficiary['first_name']) ?></li>
        <li class="list-group-item"><strong>Soyad:</strong> <?= htmlspecialchars($beneficiary['last_name']) ?></li>
        <li class="list-group-item"><strong>T.C. Kimlik No:</strong> <?= htmlspecialchars($beneficiary['tc_id']) ?></li>
        <li class="list-group-item"><strong>GSM 1:</strong> <?= htmlspecialchars($beneficiary['gsm1'] ?? '') ?></li>
        <li class="list-group-item"><strong>GSM 2:</strong> <?= htmlspecialchars($beneficiary['gsm2'] ?? '') ?></li>
    </ul>
<?php else: ?>
    <p>Bulunamadı.</p>
<?php endif; ?>
<a href="/" class="btn btn-secondary mt-3">Geri</a>
