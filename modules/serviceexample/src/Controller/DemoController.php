<?php
// modules/yourmodule/src/Controller/DemoController.php
namespace YourCompany\ServiceExample\Controller;

use PrestaShopBundle\Controller\Admin\FrameworkBundleAdminController;

class DemoController extends FrameworkBundleAdminController
{
    public function demoAction()
    {
        $yourService = $this->get('your_company.your_module.your_service');

        return $this->render('@Modules/serviceexample/templates/admin/demo.html.twig', [
            'customMessage' => $yourService->getTranslatedCustomMessage(),
        ]);
    }
}
