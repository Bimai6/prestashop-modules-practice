<?php

require_once _PS_ROOT_DIR_ . '/tools/guard.php';

use PrestaShop\PrestaShop\Core\Module\WidgetInterface;
class MyModule2 extends Module implements WidgetInterface{
    public function __construct()
    {
        $this->name = 'mymodule2';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'Mario Lebrero';
        $this->need_instance = 0;
        $this->ps_versions_compliancy = [
            'min' => '1.7.0.0',
            'max' => '8.99.99',
        ];
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->trans('My module2', [], 'Modules.Mymodule.Admin');
        $this->description = $this->trans('Description of my module2.', [], 'Modules.Mymodule.Admin');

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

    public function renderWidget($hookName, array $configuration) 
    {
        $this->smarty->assign($this->getWidgetVariables($hookName, $configuration));

        return $this->fetch('module:'.$this->name.'/views/templates/widget/mymodule2.tpl');
    }

    public function getWidgetVariables($hookName , array $configuration)
    {
        $myParamKey = $configuration['my_param_key'] ?? null;
        
        return [
            'my_var1' => 'my_var1_value',
            'my_var2' => 'my_var2_value',
            'my_var_n' => 'my_var_n_value',
            'my_dynamic_var_by_param' => $this->getMyDynamicVarByParamKey($myParamKey),
        ];
    }
    
    public function getMyDynamicVarByParamKey(string $paramKey)
    {
        if($paramKey === 'my_param_value') {
            return 'my_dynamic_var_by_my_param_value';
        }

        return null;
    }
}