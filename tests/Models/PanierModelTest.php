<?php

namespace App\Tests\Models;

use CodeIgniter\Test\CIUnitTestCase;
use App\Models\PanierModel;

class PanierModelTest extends CIUnitTestCase
{
    protected PanierModel $model;

    protected function setUp(): void
    {
        parent::setUp();

        $this->model = new PanierModel();

        // Vide la table avant chaque test
        $this->model->truncate();
    }

    public function testInsertPanier(): void
    {
        $data = [
            'n_article' => 'R200',
            'client'    => 'Jamila',
        ];

        // Insertion
        $id = $this->model->insert($data);
        $this->assertIsInt($id);

        // Récupération
        $result = $this->model->find($id);
        $this->assertNotEmpty($result);
        $this->assertEquals('R200', $result['n_article']);
        $this->assertEquals('Jamila', $result['client']);
    }

    public function testFindAllPanier(): void
    {
        $this->model->insert(['n_article' => 'R200', 'client' => 'Jamila']);
        $this->model->insert(['n_article' => 'IP345', 'client' => 'Malika']);
        
        $results = $this->model->findAll();
        $this->assertCount(2, $results);
    }

}