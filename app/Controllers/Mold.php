<?php namespace App\Controllers;

class Mold extends BaseController
{
	public function index()
	{
		return view('mold/index');
	}

	public function searchById(){
		echo "Search for id";
		
	}

	public function searchByPartner(){
		echo "Search for id";
		
	}

	//--------------------------------------------------------------------
	
	public function list() //Listado de ordenes de trabajo
    {
        if (!$this->session->logged_in) {
            return redirect()->to(base_url() . '/');
        }
        $molds = $this->mold->findAll();
		$partnerData = $this->partner->findAll();

        $data = array(
            "view" => 'molds/list',
            "mold" => $molds,
			"partners"=>$partnerData,
            "session" => $this->session
        );
        $dataHeader = array(
            "title" => 'Moldes de GAM'
        );
        $dataFooter = array();


        echo view('header_overlay', $dataHeader);
        echo view('overlay', $data);
        echo view('footer_overlay', $dataFooter);
    }
	public function view($mold_id){
		
		if (!$this->session->logged_in) {
            return redirect()->to(base_url() . '/');
        }
		$mold_data = $this->mold->where('id',$mold_id)->first();
		$partnerData = $this->partner->where('id',$mold_data['partner_id'])->find();
		$commentMold = $this->comment_mold->where('mold_id',$mold_data['id'])->find();
        $orderData = $this->order->where('mold_id',$mold_data['id'])->find();
        

        $data = array(
            "view" => 'molds/view',
            "mold" => $mold_data,
			"partners"=>$partnerData,
			"comments"=>$commentMold,
            "orders"=>$orderData,
            "session" => $this->session
        );
        $dataHeader = array(
            "title" => $this->title.'Molde "'.$mold_data['name'].'" de GAM'
        );
        $dataFooter = array();


        echo view('header_overlay', $dataHeader);
        echo view('overlay', $data);
        echo view('footer_overlay', $dataFooter);

	}
	public function edit($mold_id){
		echo "Mold to edit ".$mold_id;
	}

    public function addComment($mold_id){
        $data = $this->request->getPostGet();
        $user = $this->session->email;
        $user_id = $this->user->where('email', $user)->first();
        $data = array(
            'mold_id'=>$mold_id,
            'comment'=>$data['comments'],
            'user'=> $user_id['id']
        );
        $this->comment_mold->insert($data);
        $this->view($mold_id);
    }
}
