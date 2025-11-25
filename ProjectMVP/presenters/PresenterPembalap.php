<?php

include_once(__DIR__ . "/KontrakPresenter.php");
include_once(__DIR__ . "/../models/TabelPembalap.php");
include_once(__DIR__ . "/../models/Pembalap.php");
include_once(__DIR__ . "/../views/ViewPembalap.php");

class PresenterPembalap implements KontrakPresenter
{
    // Model TabelPembalap untuk operasi database
    private $tabelPembalap;   // Instance dari TabelPembalap (Model)
    private $viewPembalap;    // Instance dari ViewPembalap (View)

    // Data list pembalap
    private $listPembalap = []; // Menyimpan array objek Pembalap

    public function __construct($tabelPembalap, $viewPembalap)
    {
        $this->tabelPembalap = $tabelPembalap;
        $this->viewPembalap = $viewPembalap;
        $this->initListPembalap();
    }

    // Method untuk inisialisasi list pembalap dari database
    public function initListPembalap()
    {
        // Dapatkan data pembalap dari database
        $data = $this->tabelPembalap->getAllPembalap();

        // Buat objek Pembalap dan simpan di listPembalap
        $this->listPembalap = [];
        foreach ($data as $item) {
            $pembalap = new Pembalap(
                $item['id'],
                $item['nama'],
                $item['tim'],
                $item['negara'],
                $item['poinMusim'],
                $item['jumlahMenang']
            );
            $this->listPembalap[] = $pembalap;
        }
    }

    // Method untuk menampilkan daftar pembalap menggunakan View
    public function tampilkanPembalap(): string
    {
        return $this->viewPembalap->tampilPembalap($this->listPembalap);
    }

    // Method untuk menampilkan form
    public function tampilkanFormPembalap($id = null): string
    {
        $data = null;
        if ($id !== null) {
            $data = $this->tabelPembalap->getPembalapById($id);
        }
        return $this->viewPembalap->tampilFormPembalap($data);
    }

    // implementasikan metode

    public function tambahPembalap($nama, $tim, $negara, $poinMusim, $jumlahMenang): void
{
    $this->tabelPembalap->addPembalap($nama, $tim, $negara, $poinMusim, $jumlahMenang);
}

public function ubahPembalap($id, $nama, $tim, $negara, $poinMusim, $jumlahMenang): void
{
    $this->tabelPembalap->updatePembalap($id, $nama, $tim, $negara, $poinMusim, $jumlahMenang);
}

public function hapusPembalap($id): void
{
    $this->tabelPembalap->deletePembalap($id);
}

}
