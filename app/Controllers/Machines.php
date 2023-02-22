<?php

namespace App\Controllers;

class Machines extends BaseController
{

    public function index()
    {
        if (!$this->session->logged_in) {
            return redirect()->to(base_url() . '/');
        }
        $data = array(
            "status" => $this->status->findAll(),
            "view" => 'captureMachine/index',
            "session" => $this->session
        );
        $dataHeader = array(
            "title" => 'Captura Trabajo Máquinas'
        );
        $dataFooter = array();

        echo view('header_overlay', $dataHeader);
        echo view('overlay', $data);
        echo view('footer_overlay', $dataFooter);
    }

    public function view(){
        if (!$this->session->logged_in) {
            return redirect()->to(base_url() . '/');
        }
        $machines = $this->machine->findAll();
        $data = array(
            "status" => $this->status->findAll(),
            "view" => 'captureMachine/view',
            "machines" => $machines,
            "session" => $this->session
        );
        $dataHeader = array(
            "title" => $this->title.'Listado de Máquinas'
        );
        $dataFooter = array();


        echo view('header_overlay', $dataHeader);
        echo view('overlay', $data);
        echo view('footer_overlay', $dataFooter);
    }

    public function machineValidation($machine_qr)
    {
        $data = $this->machine->where('qr', $machine_qr)->find();
        if ($data > 0) {
            return '1';
        } else {
            return '0';
        }
    }
}
