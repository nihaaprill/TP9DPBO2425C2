<?php
class RaceEvent
{
    private $id;
    private $nama;
    private $lokasi;
    private $tanggal;
    private $jumlahLaps;

    public function __construct($id = null, $nama = "", $lokasi = "", $tanggal = "", $jumlahLaps = 0)
    {
        $this->id = $id;
        $this->nama = $nama;
        $this->lokasi = $lokasi;
        $this->tanggal = $tanggal;
        $this->jumlahLaps = $jumlahLaps;
    }

    public function getId() { return $this->id; }
    public function getNama() { return $this->nama; }
    public function getLokasi() { return $this->lokasi; }
    public function getTanggal() { return $this->tanggal; }
    public function getJumlahLaps() { return $this->jumlahLaps; }

    public function setId($v) { $this->id = $v; }
    public function setNama($v) { $this->nama = $v; }
    public function setLokasi($v) { $this->lokasi = $v; }
    public function setTanggal($v) { $this->tanggal = $v; }
    public function setJumlahLaps($v) { $this->jumlahLaps = $v; }
}
