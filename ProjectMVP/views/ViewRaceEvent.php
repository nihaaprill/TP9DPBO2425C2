<?php

class ViewRaceEvent
{
    public function tampilRaceEvent($list)
    {
        ob_start();
        ?>

<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Race Event — Daftar</title>

  <!-- COPY STYLE DARI skin.html -->
  <style>
    :root{
      --bg: #f7f8fb;
      --card: #ffffff;
      --muted: #6b7280;
      --accent: #2563eb;
      --danger: #ef4444;
      --border: #e6e9ef;
      --radius: 8px;
      --pad: 14px;
      font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
      color-scheme: light;
    }

    html,body{height:100%;margin:0;background:var(--bg);}
    .container{max-width:980px;margin:36px auto;padding:18px;}

    .card{
      background:var(--card);
      border:1px solid var(--border);
      border-radius:var(--radius);
      padding:12px;
      box-shadow: 0 1px 2px rgba(16,24,40,0.03);
    }

    h1{margin:0 0 12px 0;font-size:18px}
    p.lead{margin:0 0 16px 0;color:var(--muted);font-size:13px}

    table{width:100%;border-collapse:collapse;font-size:14px}
    thead th{
        text-align:left;
        padding:12px 10px;
        color:var(--muted);
        font-weight:600;
        border-bottom:1px solid var(--border);
    }
    tbody td{
        padding:12px 10px;
        border-bottom:1px solid var(--bg);
        vertical-align:middle;
    }
    tbody tr:hover td{
        background:linear-gradient(90deg, rgba(37,99,235,0.03), transparent);
    }

    .col-id{width:48px;color:var(--muted);}
    .col-actions{text-align:right;width:160px;}

    .btn{
        display:inline-block;
        padding:8px 10px;
        border-radius:6px;
        font-size:13px;
        text-decoration:none;
    }
    .btn-add{
        background:var(--accent);
        color:#fff;
        padding:10px 14px;
        border-radius:8px;
    }
    .btn-edit{
        color:var(--accent);
    }
    .btn-delete{
        color:var(--danger);
        margin-left:10px;
    }
    .btn-back{
        border:1px solid var(--border);
        color:var(--muted);
        padding:10px 14px;
        border-radius:8px;
        background:white;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="card">
      <h1>Daftar Race Event</h1>
      <p class="lead">Semua event balapan yang terdaftar</p>

      <div style="margin-bottom:14px;display:flex;justify-content:space-between">
        <a href="index.php" class="btn-back">← Kembali ke Pembalap</a>
        <a href="index.php?module=raceevent&screen=add" class="btn-add">+ Tambah Event</a>
      </div>

      <table>
        <thead>
          <tr>
            <th class="col-id">ID</th>
            <th>Nama Event</th>
            <th>Lokasi</th>
            <th>Tanggal</th>
            <th>Laps</th>
            <th class="col-actions">Aksi</th>
          </tr>
        </thead>

        <tbody>
        <?php foreach ($list as $ev): ?>
          <tr>
            <td><?= $ev->getId() ?></td>
            <td><?= htmlspecialchars($ev->getNama()) ?></td>
            <td><?= htmlspecialchars($ev->getLokasi()) ?></td>
            <td><?= htmlspecialchars($ev->getTanggal()) ?></td>
            <td><?= htmlspecialchars($ev->getJumlahLaps()) ?></td>
            <td class="col-actions">
                <a class="btn-edit" href="index.php?module=raceevent&screen=edit&id=<?= $ev->getId() ?>">Edit</a>
                <a class="btn-delete" href="index.php?module=raceevent&screen=delete&id=<?= $ev->getId() ?>">Hapus</a>
            </td>
          </tr>
        <?php endforeach ?>
        </tbody>
      </table>

    </div>
  </div>
</body>
</html>

        <?php
        return ob_get_clean();
    }


    // FORM TAMBAH / EDIT
    public function tampilFormRaceEvent($data = null)
    {
        $isEdit = $data !== null;
        $id = $isEdit ? $data['id'] : "";
        $nama = $isEdit ? $data['nama'] : "";
        $lokasi = $isEdit ? $data['lokasi'] : "";
        $tanggal = $isEdit ? $data['tanggal'] : "";
        $laps = $isEdit ? $data['jumlah_laps'] : "";

        ob_start();
        ?>

<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title><?= $isEdit ? "Edit" : "Tambah" ?> Event</title>

  <style>
    :root{
      --bg:#f7f8fb;
      --card:#fff;
      --border:#e6e9ef;
      --accent:#2563eb;
      --muted:#6b7280;
      --radius:8px;
      font-family:system-ui;
    }
    body{background:var(--bg);margin:0;}
    .container{max-width:700px;margin:36px auto;padding:20px;}
    .card{background:var(--card);border:1px solid var(--border);border-radius:var(--radius);padding:20px;}
    label{color:var(--muted);font-size:13px;}
    input{width:100%;padding:10px;margin:6px 0 16px;border:1px solid var(--border);border-radius:6px;}
    .actions{display:flex;justify-content:flex-end;gap:10px;margin-top:10px;}
    .btn{padding:10px 14px;border-radius:8px;text-decoration:none;}
    .btn-primary{background:var(--accent);color:white;}
    .btn-muted{border:1px solid var(--border);color:var(--muted);}
  </style>
</head>

<body>
  <div class="container">
    <div class="card">
      <h1><?= $isEdit ? "Edit Event" : "Tambah Event" ?></h1>

      <form method="post" action="index.php?module=raceevent">

        <input type="hidden" name="action" value="<?= $isEdit ? 'edit' : 'create' ?>">
        <?php if ($isEdit): ?>
            <input type="hidden" name="id" value="<?= $id ?>">
        <?php endif ?>

        <label>Nama Event</label>
        <input type="text" name="nama" required value="<?= $nama ?>">

        <label>Lokasi</label>
        <input type="text" name="lokasi" required value="<?= $lokasi ?>">

        <label>Tanggal</label>
        <input type="date" name="tanggal" required value="<?= $tanggal ?>">

        <label>Jumlah Laps</label>
        <input type="number" name="jumlah_laps" required min="0" value="<?= $laps ?>">

        <div class="actions">
            <a href="index.php?module=raceevent" class="btn btn-muted">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>

      </form>
    </div>
  </div>
</body>
</html>

        <?php
        return ob_get_clean();
    }
}
