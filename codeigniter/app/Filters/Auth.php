<?php
namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;


class auth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null) {
        if(session()->get('loggedIn') == NULL || !session()->get('loggedIn') == true) {
            return redirect()->to(base_url("login"));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {

    }
}