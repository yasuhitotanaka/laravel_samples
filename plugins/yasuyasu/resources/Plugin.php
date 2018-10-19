<?php
  namespace Yasuyasu\Resources;

  use System\Classes\PluginBase;

  class Plugin extends PluginBase {

    public function pluginDetails() {
      return [
        'name' => 'Yasuyasu',
        'description' => 'Provides Company Resources',
        'author' => 'Y.T',
        'icon' => 'icon-leaf'
      ];
    }

  public function registerComponents() {
    return [
      '\Yasuyasu\Resources\Components\Links' => 'resourcesLinks'
    ];
  }

  }
 ?>
