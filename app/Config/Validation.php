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

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------

    public $users = [
        'name_or_fantasy' => 'required|min_length[5]|max_length[70]',
        'cpf_cnpj' => 'required|min_length[11]|max_length[14]|is_unique[users.cpf_cnpj]',
    ];

    public $users_update = [
        'name_or_fantasy' => 'required|min_length[5]|max_length[70]',
        'cpf_cnpj' => 'required|min_length[11]|max_length[14]',
    ];
    
    public $products = [
        'name' => 'required|min_length[5]|max_length[70]',
        'description' => 'required|min_length[3]|max_length[70]',
        'price' => 'required',
        'amount' => 'required',
    ];

    public $sales = [
        'price_amount' => 'required',
        'status' => 'required|min_length[4]|max_length[9]',
  
    ];
}
