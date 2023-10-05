<?php

// class Home {
//     public function index($nama = 'aylnn', $pekerjaan = 'pelajar')
//     {
//         echo "Halo, nama saya $nama dan saya merupakan seorang $pekerjaan";
//     }
// }

// class Home extends Controller {
//     public function index()
//     {
//         $data['nama'] = 'Alinn (^///^)';
//         $data['pekerjaan'] = 'Pelajar';
//         $data['judul'] = 'Home';
//         $this->view('templates/header', $data);
//         $this->view('home/index', $data);
//         $this->view('templates/footer');
//     }

//     public function page()
//     {
//         $data['judul'] = 'Page';
//         $this->view('templates/header', $data);
//         $this->view('home/page', $data);
//         $this->view('templates/footer');
//     }
// }

class Home extends Controller {
    public function index()
    {
        $data['judul'] = 'Home';
        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }

    public function page()
    {
        $data['judul'] = 'Page';
        $data['gambar'] = 'feitan.jpg';
        $data['nama'] = 'Feitan Portor';
        $data['pekerjaan'] = 'Club Genei Ryodan';
        $data['status'] = 'Cowokk Alya';
        $this->view('templates/header', $data);
        $this->view('home/page', $data);
        $this->view('templates/footer');
    }
}