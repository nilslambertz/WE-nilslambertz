<?php namespace App\Controllers;
use CodeIgniter\Controller;

class Mitglieder extends BaseController {
    public function index() {
        $data['mitglieder'] = array(
            array(
                'id' => 1,
                'username' => 'mustermann',
                'name' => 'Max Mustermann',
                'email' => 'mustermann@muster.de',
                'projektID' => 1
            ),
            array(
                'id' => 2,
                'username' => 'elena',
                'name' => 'Elena Musterfrau',
                'email' => 'elena@example.com',
                'projektID' => 1
            )
        );

        echo view('templates/header');
        echo view('mitglieder', $data);
        echo view('templates/footer');
    }
}