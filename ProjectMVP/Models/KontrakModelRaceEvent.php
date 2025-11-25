<?php
interface KontrakModelRaceEvent
{
    public function getAllRaceEvent(): array;
    public function getRaceEventById($id): ?array;

    public function addRaceEvent($nama, $lokasi, $tanggal, $jumlahLaps): void;
    public function updateRaceEvent($id, $nama, $lokasi, $tanggal, $jumlahLaps): void;
    public function deleteRaceEvent($id): void;
}
