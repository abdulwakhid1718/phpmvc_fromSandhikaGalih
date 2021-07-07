<?php 

class Home extends Controller {
    public function index()
    {   
        $data['judul'] = 'Utama';
        $data['nama'] = $this->model('User_model')->getUser();
        $this->view('tampletes/header', $data);
        $this->view('home/index', $data);
        $this->view('tampletes/footer');
    }
}