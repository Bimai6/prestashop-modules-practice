<?php

require_once _PS_ROOT_DIR_ . '/tools/guard.php';

class ServiceExample extends Module{
    public function __construct()
    {
        $this->name = 'serviceexample';
        $this->tab = 'content_management';
        $this->version = '1.0.0';
        $this->author = 'Mario Lebrero';
        $this->need_instance = 0;
        $this->ps_versions_compliancy = [
            'min' => '1.7.0.0',
            'max' => '8.99.99',
        ];
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->trans('Service Example', [], 'Modules.Mymodule.Admin');
        $this->description = $this->trans('First try creating a service on a module.', [], 'Modules.Mymodule.Admin');

        $this->confirmUninstall = $this->trans('Are you sure you want to uninstall?', [], 'Modules.Mymodule.Admin');

        if (!Configuration::get('MYMODULE_NAME')) {
            $this->warning = $this->trans('No name provided', [], 'Modules.Mymodule.Admin');
        }
    }

    public function install(){
        if(Shop::isFeatureActive()){
            Shop::setContext(Shop::CONTEXT_ALL);
        }

        return parent::install();
    }

    public function uninstall()
    {
        return parent::uninstall()
        && Configuration::deleteByName('MYMODULE_NAME');
    }
}