<?php

include_once("models/DB.php");
include_once("KontrakModel.php");
include_once("KontrakModelRaceEvent.php");

class TabelRaceEvent extends DB implements KontrakModelRaceEvent

{
    public function __construct($host = null, $db_name = null, $username = null, $password = null)
    {
        // jika DB punya konstruktur yang menerima kredensial, panggil parent
        parent::__construct($host, $db_name, $username, $password);
    }

    // Read all
    public function getAllRaceEvent(): array
    {
        $query = "SELECT * FROM race_event ORDER BY tanggal DESC";
        $this->executeQuery($query);
        return $this->getAllResult();
    }

    // Read by id
    public function getRaceEventById($id): ?array
    {
        $this->executeQuery("SELECT * FROM race_event WHERE id = :id", ['id' => $id]);
        $results = $this->getAllResult();
        return $results[0] ?? null;
    }

    // Create
    public function addRaceEvent($nama, $lokasi, $tanggal, $jumlahLaps): void
    {
        $query = "INSERT INTO race_event (nama, lokasi, tanggal, jumlah_laps)
                  VALUES (:nama, :lokasi, :tanggal, :jumlahLaps)";
        $this->executeQuery($query, [
            'nama' => $nama,
            'lokasi' => $lokasi,
            'tanggal' => $tanggal,
            'jumlahLaps' => $jumlahLaps
        ]);
    }

    // Update
    public function updateRaceEvent($id, $nama, $lokasi, $tanggal, $jumlahLaps): void
    {
        $query = "UPDATE race_event SET
                    nama = :nama,
                    lokasi = :lokasi,
                    tanggal = :tanggal,
                    jumlah_laps = :jumlahLaps
                  WHERE id = :id";
        $this->executeQuery($query, [
            'id' => $id,
            'nama' => $nama,
            'lokasi' => $lokasi,
            'tanggal' => $tanggal,
            'jumlahLaps' => $jumlahLaps
        ]);
    }

    // Delete
    public function deleteRaceEvent($id): void
    {
        $query = "DELETE FROM race_event WHERE id = :id";
        $this->executeQuery($query, ['id' => $id]);
    }

    public function getAll(): array { return $this->getAllRaceEvent(); }
    public function getById($id): ?array { return $this->getRaceEventById($id); }
}
