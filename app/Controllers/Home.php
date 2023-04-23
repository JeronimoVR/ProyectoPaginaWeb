<?php

namespace App\Controllers;

use App\Models\Usuario;

class Home extends BaseController
{
    public function index()
    {
        $mensaje = session('mensaje');
        return view('paginas/login', ["mensaje" => $mensaje]);
    }

    public function login()
    {
        $datos['cabecera'] = view('template/cabecera');
        $datos['pie'] = view('template/piepagina');
        $usuario = $this->request->getPost('usuario');
        $password = (string)$this->request->getPost('password');

        $Usuario = new Usuario();

        $datosUsuarios = $Usuario->obtenerUsuario(['usuario' => $usuario]);
                
        if (
            count($datosUsuarios) > 0 &&
            password_verify($password, $datosUsuarios[0]['password'])       
        ) {

            $data = [
                "usuario" => $datosUsuarios[0]['usuario'],
            ];
            $session = session();
            $session->set($data);

            #return redirect()->to(base_url('/inicio'))->with('mensaje', '0');
            return view('paginas/inicio',$datos);
        } else {
            #echo 'Si tiene datos';
            return redirect()->to(base_url('/'))->with('mensaje', 'Usuario o contraseña incorrecto');
        }
    }

    public function registrarse()
    {
        return view('paginas/registro');
    }

    public function guardar()
    {
        $usuario = new Usuario();

        $validacion = $this->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'telefono' => 'required',
            'correo' => 'required',
            'usuario' => 'required',
            'password' => 'required',
        ]);
        if (!$validacion) {
            $session = session();
            $session->setFlashdata('mensaje', 'Revise la infromacion');
            return redirect()->back()->withInput();
        }

        $datos = [
            'nombre' => $this->request->getVar('nombre'),
            'apellido' => $this->request->getVar('apellido'),
            'telefono' => $this->request->getVar('telefono'),
            'correo' => $this->request->getVar('correo'),
            'usuario' => $this->request->getVar('usuario'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
        ];
        $usuario->insert($datos);

        return $this->response->redirect(site_url(''));
    }
}
