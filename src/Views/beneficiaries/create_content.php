<h1>Yeni Başvuru</h1>
<form method="post" action="/?action=create">
    <div class="card mb-3">
        <div class="card-header">Kişisel Bilgiler</div>
        <div class="card-body">
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">T.C. Kimlik No</label>
                    <input type="text" name="tc_id" class="form-control" required maxlength="11">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Ad</label>
                    <input type="text" name="first_name" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Soyad</label>
                    <input type="text" name="last_name" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Doğum Tarihi</label>
                    <input type="date" name="birth_date" class="form-control">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Doğum Yeri</label>
                    <input type="text" name="birth_place" class="form-control">
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-header">İletişim</div>
        <div class="card-body">
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">GSM 1</label>
                    <input type="tel" name="gsm1" class="form-control">
                </div>
                <div class="col-md-6">
                    <label class="form-label">GSM 2</label>
                    <input type="tel" name="gsm2" class="form-control">
                </div>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Kaydet</button>
</form>
