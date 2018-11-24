<?php
declare(strict_types=1);


namespace App\Forms;


use Nette\Application\UI\Form;

class BaseFormFactory
{

    /**
     * @return Form
     */
    public function create(): Form
    {
        return new Form();
    }

}