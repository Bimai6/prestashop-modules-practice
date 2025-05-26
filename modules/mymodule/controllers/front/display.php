<?php
class mymoduledisplayModuleFrontController extends ModuleFrontController
{
    public function initContent()
    {
        parent::initContent();
        $this->context->smarty->assign(
            [
                'my_module_name' => Configuration::get('MYMODULE_NAME'),
                'my_module_link' => $this->context->link->getModuleLink('mymodule', 'display'),
                'my_module_message' => $this->l('This is a simple text message') // Do not forget to enclose your strings in the l() translation method
            ]
        );
        $this->setTemplate('module:mymodule/views/templates/front/display.tpl');
    }
}
