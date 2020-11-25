<?php

namespace App\Controller\Api;

use App\Controller\Api\AppController;

/**
 * Regions Controller
 *
 * @property \App\Model\Table\RegionsTable $Regions
 *
 * @method \App\Model\Entity\Region[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RegionsController extends AppController {

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

    public function index()
    {
        $regions = $this->Regions->find('all');
        $this->set([
            'regions' => $regions,
            '_serialize' => ['regions']
        ]);
    }

    public function view($id)
    {
        $region = $this->Regions->get($id);
        $this->set([
            'region' => $region,
            '_serialize' => ['region']
        ]);
    }

    public function add()
    {
        $this->request->allowMethod(['post', 'put']);
        $region = $this->Regions->newEntity($this->request->getData());
        if ($this->Regions->save($region)) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            'region' => $region,
            '_serialize' => ['message', 'region']
        ]);
    }

    public function edit($id)
    {
        $this->request->allowMethod(['patch', 'post', 'put']);
        $region = $this->Regions->get($id);
        $region = $this->Regions->patchEntity($region, $this->request->getData());
        if ($this->Regions->save($region)) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            '_serialize' => ['message']
        ]);
    }

    public function delete($id)
    {
        $this->request->allowMethod(['delete']);
        $region = $this->Regions->get($id);
        $message = 'Deleted';
        if (!$this->Regions->delete($region)) {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            '_serialize' => ['message']
        ]);
    }


}
