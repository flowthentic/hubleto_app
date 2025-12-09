<?php

namespace Hubleto\App\Custom\IpInfoTest\Extendibles;

class AppMenu extends \Hubleto\Framework\Extendible
{

  // Add your app's menu items here

   public function getItems(): array
   {
     return [
       [
         'app' => $this->app,
         'url' => 'ipinfotest/favorites',
         'title' => $this->app->translate('Favorites'),
         'icon' => '',
       ],
     ];
   }

  // Hint: Search for 'collectExtendibles' in the codebase to learn
  // what kind of integrations are available.

}
