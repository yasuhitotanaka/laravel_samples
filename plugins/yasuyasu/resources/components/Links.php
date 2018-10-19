<?php

  namespace Yasuyasu\Resources\Components;

  use Cms\Classes\ComponentBase;
  use ApplicationException;

  class Links extends ComponentBase {

    public function componentDetails() {
      return [
        'name' => 'Links',
        'description' => 'Displays resource links'
      ];
    }

    public function defineProperties() {
      return [
        'link1' => [
          'title' => 'Link 1',
          'description' => 'Link 1 URL',
          'type' => 'string'
        ],
        'link2' => [
          'title' => 'Link 2',
          'description' => 'Link 2 URL',
          'type' => 'string'
        ],
        'link1' => [
          'title' => 'Link 3',
          'description' => 'Link 3 URL',
          'type' => 'string'
        ],
      ];
    }

    public function onRun() {
      $links = [
        $this->property('link1'),
        $this->property('link2'),
        $this->property('link3')
      ];

      $this->page['links'] = $links;
    }


  }

 ?>
