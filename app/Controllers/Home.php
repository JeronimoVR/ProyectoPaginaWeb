<?php

namespace App\Controllers;

use App\Models\Usuario;
use App\Models\Respuesta;

use function PHPSTORM_META\type;

class Home extends BaseController
{
    public function index()
    {
        $mensaje = session('mensaje');
        return view('paginas/login', ["mensaje" => $mensaje]);
    }

    public function inicio($datos = null)
    {
        $dato['title'] = 'Inicio';
        $datos['cabecera'] = view('template/cabecera', $dato);
        $datos['pie'] = view('template/piepagina');
        return view('paginas/inicio', $datos);
    }

    public function login()
    {
        $dato['title'] = 'Inicio';
        $datos['cabecera'] = view('template/cabecera', $dato);
        $datos['pie'] = view('template/piepagina');
        $usuario = $this->request->getPost('usuario');
        $password = (string)$this->request->getPost('password');

        $Usuario = new Usuario();

        $validation = service('validation');
        $validation->setRules([
            'usuario' => 'required',
            'password' => 'required',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            dd($validation->getErrors());
            $session = session();
            $session->setFlashdata('mensaje', [
                'type' => 'alert-danger',
                'body' => 'Revise la información suministrada, el usuario y/o pueden ya estar registrados'
            ]);
            return redirect()->back()->withInput();
        }

        $datosUsuarios = $Usuario->obtenerUsuario(['usuario' => $usuario]);

        if (
            count($datosUsuarios) > 0 &&
            password_verify($password, $datosUsuarios[0]['password'])
        ) {
            $session = session();
            $session->set([
                "id" => $datosUsuarios[0]['id'],
                "nombre" => $datosUsuarios[0]['nombre'],
                "apellido" => $datosUsuarios[0]['apellido'],
                "telefono" => $datosUsuarios[0]['telefono'],
                "correo" => $datosUsuarios[0]['correo'],
                "type" => $datosUsuarios[0]['type'],
                "usuario" => $datosUsuarios[0]['usuario'],
            ]);
            return redirect()->to(base_url('/inicio'));
        } else {

            return redirect()->to(base_url('/'))->with('mensaje', [
                'type' => 'alert-danger',
                'body' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
              </svg> Usuario o contraseña incorrecto',
            ]);
        }
    }

    public function registrarse()
    {
        return view('paginas/registro');
    }

    public function guardar()
    {
        $usuario = new Usuario();

        $validation = service('validation');
        $validation->setRules([
            'nombre' => 'required|alpha_space',
            'apellido' => 'required|alpha_space',
            'telefono' => 'required|integer|max_length[10]',
            'correo' => 'required|valid_email|is_unique[personas.correo]',
            #'type' => 'required|alpha_space',
            'usuario' => 'required|is_unique[personas.usuario]',
            'password' => 'required',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            $session = session();
            $session->setFlashdata('mensaje', [
                'body' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                </svg> Revise la información suministrada <br>
                El usuario y/o el correo pueden ya estar registrados<br>
                Todos los campos son requeridos <br>
                El telofono debe tener minimo 8 digitos y maximo 10',
                'type' => 'alert-danger'
            ]);
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
            return redirect()->to(base_url('/'))->with('mensaje', [
                'body' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                </svg> Usuario creado exitosamente!',
                'type' => 'alert-success'
            ]);
        } else {
            return redirect()->to(base_url('/registro'))->with('mensaje', 'Hubo un problema en la conexión, revise la información!');
        }
        return $this->response->redirect(site_url(''));
    }

    public function listarU()
    {
        $usuario = new Usuario();
        $datos['personas'] = $usuario->where('type', 'usuario')->orderBy('id', 'ASC')->findAll();
        $dato['title'] = "Lista de Usuarios";
        $datos['cabecera'] = view('template/cabecera', $dato);
        $datos['pie'] = view('template/piepagina');

        return view('paginas/listarU', $datos);
    }

    public function listarA()
    {
        $usuario = new Usuario();
        $datos['personas'] = $usuario->where('type', 'administrador')->orderBy('id', 'ASC')->findAll();
        $dato['title'] = "lista de Administradores";
        $datos['cabecera'] = view('template/cabecera', $dato);
        $datos['pie'] = view('template/piepagina');

        return view('paginas/listarA', $datos);
    }

    public function cuenta($id = null)
    {
        $usuario = new Usuario();
        $datos['personas'] = $usuario->where('id', $id)->first();
        $dato['title'] = "Mi Cuenta";
        $datos['cabecera'] = view('template/cabecera', $dato);
        $datos['pie'] = view('template/piepagina');

        return view('paginas/cuenta', $datos);
    }

    public function editar($id = null)
    {
        $usuario = new Usuario();

        $datos['personas'] = $usuario->where('id', $id)->first();
        $dato['title'] = "Editar Cuenta";
        $datos['cabecera'] = view('template/cabecera', $dato);
        $datos['pie'] = view('template/piepagina');

        return view('paginas/editar', $datos);
    }

    public function actualizar()
    {
        $usuario = new Usuario();

        $validation = service('validation');
        $validation->setRules([
            'nombre' => 'required|alpha_space',
            'apellido' => 'required|alpha_space',
            'telefono' => 'required|integer|max_length[10]|min_length[8]',
            'correo' => 'required|valid_email',
            'type' => 'required',
            'usuario' => 'required',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            $session = session();
            $session->setFlashdata('mensaje', [
                'type' => 'alert-danger',
                'body' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                </svg> Revise la información suministrada<br>
                Todos los campos son requeridos <br>
                El telofono debe tener minimo 8 digitos y maximo 10'
            ]);
            return redirect()->back()->withInput();
        }

        $datos = [
            'id' => $this->request->getVar('id'),
            'nombre' => $this->request->getVar('nombre'),
            'apellido' => $this->request->getVar('apellido'),
            'telefono' => $this->request->getVar('telefono'),
            'correo' => $this->request->getVar('correo'),
            'type' => $this->request->getVar('type'),
            'usuario' => $this->request->getVar('usuario'),
        ];

        if ($usuario->update($datos['id'], $datos)) {
            return redirect()->back()->with('mensaje', [
                'type' => 'alert-success',
                'body' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                </svg> Usuario actualizado exitosamente!',
            ]);
        } else {
            return redirect()->to(base_url('/cuenta'))->with('mensaje', [
                'type' => 'alert-danger',
                'body' => 'Hubo un problema en la conexión, revise la información!',
            ]);
        }
        return $this->response->redirect(site_url(''));
    }

    public function actualizarCuenta()
    {
        $usuario = new Usuario();

        $validation = service('validation');
        $validation->setRules([
            'nombre' => 'required|alpha_space',
            'apellido' => 'required|alpha_space',
            'telefono' => 'required|integer|max_length[10]|min_length[8]',
            'correo' => 'required|valid_email',
            'usuario' => 'required',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            $session = session();
            $session->setFlashdata('mensaje', [
                'type' => 'alert-danger',
                'body' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                </svg> Revise la información suministrada<br>
                Todos los campos son requeridos <br>
                El telofono debe tener minimo 8 digitos y maximo 10'
            ]);
            return redirect()->back()->withInput();
        }

        $datos = [
            'id' => $this->request->getVar('id'),
            'nombre' => $this->request->getVar('nombre'),
            'apellido' => $this->request->getVar('apellido'),
            'telefono' => $this->request->getVar('telefono'),
            'correo' => $this->request->getVar('correo'),
            'usuario' => $this->request->getVar('usuario'),
        ];

        if ($usuario->update($datos['id'], $datos)) {
            return redirect()->to(base_url('cuenta/' . (int)session('id')))->with('mensaje', [
                'type' => 'alert-success',
                'body' => 'Usuario actualizado exitosamente! <br> Los cambios realizados se veran la porxima vez que inicies sesión',
            ]);
        } else {
            return redirect()->to(base_url('/cuenta'))->with('mensaje', [
                'type' => 'alert-danger',
                'body' => 'Hubo un problema en la conexión, revise la información!',
            ]);
        }
        return $this->response->redirect(site_url(''));
    }

    public function borrarU($id = null)
    {
        $usuario = new Usuario();
        $datosUsuario = $usuario->where('id', $id)->first();
        $usuario->where('id', $id)->delete($id);

        return $this->response->redirect(site_url('/listarU'));
    }

    public function borrarA($id = null)
    {
        $usuario = new Usuario();
        $datosUsuario = $usuario->where('id', $id)->first();
        $usuario->where('id', $id)->delete($id);

        return $this->response->redirect(site_url('/listarA'));
    }

    #vistas
    public function comidaMar()
    {
        $dato['title'] = "Comida de mar";
        $datos['cabecera'] = view('template/cabecera', $dato);
        $datos['pie'] = view('template/piepagina');
        return view('paginas/comidasDeMar', $datos);
    }

    public function ensalada()
    {
        $dato['title'] = "Ensaladas";
        $datos['cabecera'] = view('template/cabecera', $dato);
        $datos['pie'] = view('template/piepagina');
        return view('paginas/ensaladas', $datos);
    }

    public function sopas()
    {
        $dato['title'] = "Sopas";
        $datos['cabecera'] = view('template/cabecera', $dato);
        $datos['pie'] = view('template/piepagina');
        return view('paginas/sopas', $datos);
    }

    public function carnes()
    {
        $dato['title'] = "Carnes";
        $datos['cabecera'] = view('template/cabecera', $dato);
        $datos['pie'] = view('template/piepagina');
        return view('paginas/carnes', $datos);
    }

    #hojas de vida
    public function hojaJeronimo()
    {
        $dato['title'] = "Hoja de vida Jeronimo Velez Rojas";
        $datos['cabecera'] = view('template/cabecera', $dato);
        $datos['pie'] = view('template/piepagina');
        return view('hojas/hojaJeronimo', $datos);
    }

    #encuesta
    public function formulario()
    {
        $dato['title'] = "Encuesta";
        $datos['cabecera'] = view('template/cabecera', $dato);
        $datos['pie'] = view('template/piepagina');
        return view('paginas/formulario', $datos);
    }

    public function encuestar()
    {
        $encuesta = new Respuesta();

        $validation = service('validation');
        $validation->setRules([
            'CalificacionExpe' => 'required',
            'ExperienciaPersonal' => 'required',
            'OpinionTema' => 'required',
            'Puntuacion' => 'required',
            'Recomendacion' => 'required',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            $session = session();
            $session->setFlashdata('mensaje', [
                'body' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                </svg> Todos los campos deben ser seleccionados',
                'type' => 'alert-danger',
            ]);
            return redirect()->back()->withInput();
        }
        $datosEncuesta = [
            'Pregunta1' => $this->request->getVar('CalificacionExpe'),
            'Pregunta2' => $this->request->getVar('ExperienciaPersonal'),
            'Pregunta3' => $this->request->getVar('OpinionTema'),
            'Pregunta4' => $this->request->getVar('Puntuacion'),
            'Pregunta5' => $this->request->getVar('Recomendacion'),
        ];

        if ($encuesta->insert($datosEncuesta)) {
            return redirect()->to(base_url('/formulario'))->with('mensaje', [
                'body' => 'Gracias por darnos tu opinión👍',
                'type' => 'alert-success'
            ]);
        } else {
            return redirect()->to(base_url('/formulario'))->with('mensaje', 'Hubo un problema en la conexión, revise la información!');
        }
        return $this->response->redirect(site_url(''));
    }

    public function reportes()
    {
        $Grafico = new Respuesta();
        $dato['title'] = "Graficas";

        $encuestaModel = new Respuesta();
        $datos1 = $encuestaModel->obtenerDatosEncuesta1();
        $datos2 = $encuestaModel->obtenerDatosEncuesta2();
        $datos3 = $encuestaModel->obtenerDatosEncuesta3();
        $datos4 = $encuestaModel->obtenerDatosEncuesta4();
        $datos5 = $encuestaModel->obtenerDatosEncuesta5();

        $labels1 = [];
        $valores1 = [];
        foreach ($datos1 as $fila) {
            $labels1[] = $fila['Pregunta1'];
            $valores1[] = $fila['total'];
        }

        $labels2 = [];
        $valores2 = [];
        foreach ($datos2 as $fila) {
            $labels2[] = $fila['Pregunta2'];
            $valores2[] = $fila['total'];
        }

        $labels3 = [];
        $valores3 = [];
        foreach ($datos3 as $fila) {
            $labels3[] = $fila['Pregunta3'];
            $valores3[] = $fila['total'];
        }

        $labels4 = [];
        $valores4 = [];
        foreach ($datos4 as $fila) {
            $labels4[] = $fila['Pregunta4'];
            $valores4[] = $fila['total'];
        }

        $labels5 = [];
        $valores5 = [];
        foreach ($datos5 as $fila) {
            $labels5[] = $fila['Pregunta5'];
            $valores5[] = $fila['total'];
        }

        $datosEncuesta['labels1'] = json_encode($labels1);
        $datosEncuesta['valores1'] = json_encode($valores1);

        $datosEncuesta['labels2'] = json_encode($labels2);
        $datosEncuesta['valores2'] = json_encode($valores2);

        $datosEncuesta['labels3'] = json_encode($labels3);
        $datosEncuesta['valores3'] = json_encode($valores3);

        $datosEncuesta['labels4'] = json_encode($labels4);
        $datosEncuesta['valores4'] = json_encode($valores4);

        $datosEncuesta['labels5'] = json_encode($labels5);
        $datosEncuesta['valores5'] = json_encode($valores5);

        $datos['cabecera'] = view('template/cabecera', $dato);
        $datos['pie'] = view('template/piepagina', $datosEncuesta);

        return view('paginas/reportes', $datos);
    }

    public function salir()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('/'));
    }
}
