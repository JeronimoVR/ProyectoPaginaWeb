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
                "nombre" => $datosUsuarios[0]['nombre'],
                "type" => $datosUsuarios[0]['type'],
            ];
            $session = session();
            $session->set($data);

            #return redirect()->to(base_url('/inicio'))->with('mensaje', '0');
            return view('paginas/inicio', $datos, ["usuario" => $data]);
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
        /*
        $validacion = $this->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'telefono' => 'required',
            'correo' => 'required',
            'type' => 'required',
            'usuario' => 'required',
            'password' => 'required',
        ]);*/
        /*
        $validation = service('validation');
        $validation->setRules([
            'name' => 'required|alpha_space',
            'apellido' => 'required|alpha_space',
            'telefono' => 'required|integer|is_natural',
            'correo' => 'required|valid_email|is_unique[personas,correo]',
            'type' => 'required|alpha_space',
            'usuario' => 'required|alpha_space|is_unique[personas,usuario]',
            'password' => 'required',
        ]);if (!$validation->withRequest()->run()) {*/


        if ($this->validate('person')) {
            $session = session();
            $session->setFlashdata('mensaje', 'Revise la información suministrada, el usuario y/o pueden ya estar registrados');
            return redirect()->back()->withInput();
        }

        $datos = [
            'nombre' => $this->request->getVar('nombre'),
            'apellido' => $this->request->getVar('apellido'),
            'telefono' => $this->request->getVar('telefono'),
            'correo' => $this->request->getVar('correo'),
            'type' => 'usuario',
            'usuario' => $this->request->getVar('usuario'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
        ];

        if ($usuario->insert($datos)) {
            return redirect()->to(base_url('/'))->with('mensaje', 'Usuario creado exitosamente!');
        } else {
            return redirect()->to(base_url('/registro'))->with('mensaje', 'Hubo un problema en la conexión, revise la información!');
        }
        return $this->response->redirect(site_url(''));
    }

    public function salir()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('/'));
    }
}
