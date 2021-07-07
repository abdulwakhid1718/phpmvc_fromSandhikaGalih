<?php

class About extends Controller
{
    public function index($nama = 'Wakhid', $kerja = 'Pengangguran')
    {
        $data['nama'] = $nama;
        $data['kerja'] = $kerja;
        $data['judul'] = 'About';
        $this->view('tampletes/header', $data);
        $this->view('about/index', $data);
        $this->view('tampletes/footer');
    }

    public function page()
    {
        $data['judul'] = 'About-Page';
        $this->view('tampletes/header', $data);
        $this->view('about/page');
        $this->view('tampletes/footer');
    }
}
