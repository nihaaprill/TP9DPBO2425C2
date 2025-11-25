<?php

include_once("models/DB.php");

// ==== Pembalap ====
include("models/TabelPembalap.php");
include("views/ViewPembalap.php");
include("presenters/PresenterPembalap.php");

// ==== Race Event ====
include("models/TabelRaceEvent.php");
include("models/RaceEvent.php");
include("views/ViewRaceEvent.php");
include("presenters/PresenterRaceEvent.php");

// ==== Instance Pembalap ====
$tabelPembalap = new TabelPembalap('localhost', 'mvp_db', 'root', '');
$viewPembalap = new ViewPembalap();
$presenterPembalap = new PresenterPembalap($tabelPembalap, $viewPembalap);

// ==== Instance Race Event ====
$tabelRaceEvent = new TabelRaceEvent('localhost', 'mvp_db', 'root', '');
$viewRaceEvent = new ViewRaceEvent();
$presenterRaceEvent = new PresenterRaceEvent($tabelRaceEvent, $viewRaceEvent);



// ROUTING RACE EVENT
if (isset($_GET['module']) && $_GET['module'] === 'raceevent') {

    // Add
    if (isset($_GET['screen']) && $_GET['screen'] === 'add') {
        echo $presenterRaceEvent->tampilkanFormRaceEvent();
        exit;
    }

    // Edit
    if (isset($_GET['screen']) && $_GET['screen'] === 'edit' && isset($_GET['id'])) {
        echo $presenterRaceEvent->tampilkanFormRaceEvent($_GET['id']);
        exit;
    }

    // Handle POST
    if (isset($_POST['action'])) {

        if ($_POST['action'] === 'create') {
            $presenterRaceEvent->tambahRaceEvent(
                $_POST['nama'],
                $_POST['lokasi'],
                $_POST['tanggal'],
                $_POST['jumlah_laps']
            );
        }

        if ($_POST['action'] === 'edit') {
            $presenterRaceEvent->ubahRaceEvent(
                $_POST['id'],
                $_POST['nama'],
                $_POST['lokasi'],
                $_POST['tanggal'],
                $_POST['jumlah_laps']
            );
        }

        header("Location: index.php?module=raceevent");
        exit;
    }

    // Delete
    if (isset($_GET['screen']) && $_GET['screen'] === 'delete' && isset($_GET['id'])) {
        $presenterRaceEvent->hapusRaceEvent($_GET['id']);
        header("Location: index.php?module=raceevent");
        exit;
    }

    echo $presenterRaceEvent->tampilkanRaceEvent();
    exit;
}




// CRUD PEMBALAP
// ----------- FORM ADD -------------
if (isset($_GET['screen']) && $_GET['screen'] === 'add') {
    echo $presenterPembalap->tampilkanFormPembalap();
    exit;
}

// ----------- FORM EDIT ------------
if (isset($_GET['screen']) && $_GET['screen'] === 'edit' && isset($_GET['id'])) {
    echo $presenterPembalap->tampilkanFormPembalap($_GET['id']);
    exit;
}

// ----------- HANDLE POST (Tambah/Edit/Delete) -----------
if (isset($_POST['action']) && !isset($_GET['module'])) {

    if ($_POST['action'] === 'add') {
        $presenterPembalap->tambahPembalap(
            $_POST['nama'],
            $_POST['tim'],
            $_POST['negara'],
            $_POST['poinMusim'],
            $_POST['jumlahMenang']
        );
    }

    if ($_POST['action'] === 'edit') {
        $presenterPembalap->ubahPembalap(
            $_POST['id'],
            $_POST['nama'],
            $_POST['tim'],
            $_POST['negara'],
            $_POST['poinMusim'],
            $_POST['jumlahMenang']
        );
    }

    if ($_POST['action'] === 'delete') {
        $presenterPembalap->hapusPembalap($_POST['id']);
    }

    header("Location: index.php");
    exit;
}



// DEFAULT VIEW 
echo $presenterPembalap->tampilkanPembalap();
echo '
<div style="margin-top:20px;">
    <a href="index.php?module=raceevent" 
       class="btn btn-add" 
       style="padding:10px 16px; display:inline-block;">
        Buka Race Event >
    </a>
</div>';

?>
