<?php

namespace App\Controllers;

class Qrcodes extends BaseController
{
    public function index(){
        echo "hi";
    }
    public function validation()
    {
        if (!$this->session->logged_in) {
            return redirect()->to(base_url() . '/');
        }
        $data = array(
            "view" => 'qrcodes/validation',
            "session" => $this->session
        );
        $dataHeader = array(
            "title" => 'Admin Index'
        );
        $dataFooter = array();
        echo view('header_overlay', $dataHeader);
        echo view('overlay', $data);
        echo view('footer_overlay', $dataFooter);
    }

    public function checkData(){
        //Obtenemos la información del post
		$data = $this->request->getPostGet();
        $mold = $this->mold->where('qr',$data['qr_code'])->find();
        if(count($mold)>0){
            echo $mold[0]['id'].", ".$mold[0]['name'].", ".$mold[0]['description'].", ".$mold[0]['part_number'];
            echo '<a href="javascript:history.back()"> back </a>';
        } else {echo "";echo '<a href="javascript:history.back()"> back </a>';}
    }
}