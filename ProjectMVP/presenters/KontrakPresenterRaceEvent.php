<?php
interface KontrakPresenterRaceEvent
{
    public function tampilkanRaceEvent(): string;
    public function tampilkanFormRaceEvent($id = null): string;

    public function tambahRaceEvent($nama, $lokasi, $tanggal, $jumlahLaps): void;
    public function ubahRaceEvent($id, $nama, $lokasi, $tanggal, $jumlahLaps): void;
    public function hapusRaceEvent($id): void;
}
