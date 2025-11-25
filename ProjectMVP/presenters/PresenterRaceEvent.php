<?php

include_once(__DIR__ . "/KontrakPresenterRaceEvent.php");
include_once(__DIR__ . "/../models/TabelRaceEvent.php");
include_once(__DIR__ . "/../models/RaceEvent.php");
include_once(__DIR__ . "/../views/ViewRaceEvent.php");

class PresenterRaceEvent implements KontrakPresenterRaceEvent
{
    private $tabelRaceEvent;
    private $viewRaceEvent;
    private $listRaceEvent = [];

    public function __construct($tabelRaceEvent, $viewRaceEvent)
    {
        $this->tabelRaceEvent = $tabelRaceEvent;
        $this->viewRaceEvent = $viewRaceEvent;
        $this->initListRaceEvent();
    }

    public function initListRaceEvent()
    {
        $data = $this->tabelRaceEvent->getAllRaceEvent();
        $this->listRaceEvent = [];
        foreach ($data as $item) {
            $event = new RaceEvent(
                $item['id'],
                $item['nama'],
                $item['lokasi'],
                $item['tanggal'],
                $item['jumlah_laps']
            );
            $this->listRaceEvent[] = $event;
        }
    }

    public function tampilkanRaceEvent(): string
    {
        return $this->viewRaceEvent->tampilRaceEvent($this->listRaceEvent);
    }

    public function tampilkanFormRaceEvent($id = null): string
    {
        $data = null;
        if ($id !== null) {
            $data = $this->tabelRaceEvent->getRaceEventById($id);
        }
        return $this->viewRaceEvent->tampilFormRaceEvent($data);
    }

    public function tambahRaceEvent($nama, $lokasi, $tanggal, $jumlahLaps): void
    {
        $this->tabelRaceEvent->addRaceEvent($nama, $lokasi, $tanggal, $jumlahLaps);
        $this->initListRaceEvent();
    }

    public function ubahRaceEvent($id, $nama, $lokasi, $tanggal, $jumlahLaps): void
    {
        $this->tabelRaceEvent->updateRaceEvent($id, $nama, $lokasi, $tanggal, $jumlahLaps);
        $this->initListRaceEvent();
    }

    public function hapusRaceEvent($id): void
    {
        $this->tabelRaceEvent->deleteRaceEvent($id);
        $this->initListRaceEvent();
    }
}
