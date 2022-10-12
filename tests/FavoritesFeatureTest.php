<?php

namespace Tests\Feature;

use Tests\TestCase;
use Tests\ResourceFeatureTestCase;

class FavoritesFeatureTest extends TestCase
{
  protected $endpoint = '/api/v1/favorites';
  protected $postData = [
    'foreign_table' => 'contents',
    'foreign_id' => 'e1625fb5-d615-4adc-9212-ad28fff6cdd4',
    'scope' => 'post'
  ];

  protected $putDataInvalid = [
    "foreign_table" => 12344,
  ];

  protected $putDataValid = [
    'foreign_table' => 'contents',
    'foreign_id' => 'e1625fb5-d615-4adc-9212-ad28fff6cdd4',
    'scope' => 'post'
  ];

  use ResourceFeatureTestCase;
}
