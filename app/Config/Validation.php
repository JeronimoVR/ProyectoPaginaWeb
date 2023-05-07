<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    public $person = [
        'name' => 'required|alpha_space',
        'apellido' => 'required|alpha_space',
        'telefono' => 'required|integer|is_natural|max_length[11]',
        'correo' => 'required|valid_email|is_unique[personas.correo]',
        'type' => 'required|alpha_space',
        'usuario' => 'required|alpha_space|is_unique[personas.usuario]',
        'password' => 'required',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------
}
