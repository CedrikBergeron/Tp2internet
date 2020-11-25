<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Flights Controller
 *
 * @property \App\Model\Table\FlightsTable $Flights
 *
 * @method \App\Model\Entity\Flight[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FlightsController extends AppController {

    public function initialize() {
        parent::initialize();
        $this->Auth->allow(['tags']);
        $this->viewBuilder()->setLayout('cakephp_default');
        }

    public function isAuthorized($user) {
        $action = $this->request->getParam('action');
        // The add and tags actions are always allowed to logged in users.
        if (in_array($action, ['add', 'tags'])) {
            return true;
        }

        // All other actions require a slug.
        $slug = $this->request->getParam('pass.0');
        if (!$slug) {
            return false;
        }
        if ($user['id'] == '2')
            return true; // DEBUG PATCH if user admin...
            
// Check that the flight belongs to the current user.
        $flight = $this->Flights->findBySlug($slug)->first();

        return $flight->user_id === $user['id'];
    }

    public function tags(...$tags) {
        // Use the FlightsTable to find tagged flights.
        $flights = $this->Flights->find('tagged', [
            'tags' => $tags
        ]);

        // Pass variables into the view template context.
        $this->set([
            'flights' => $flights,
            'tags' => $tags
        ]);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index() {
        $this->paginate = [
            'contain' => ['Users', 'Tags', 'Files'],
        ];
        $flights = $this->paginate($this->Flights);

        $this->set(compact('flights'));
    }

    /**
     * View method
     *
     * @param string|null $id Flight id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($slug = null) {
        $flight = $this->Flights->find()
                ->where(['Flights.slug' => $slug])
                ->contain(['Bookings', 'Tags', 'Files', 'Airlines'])
                ->firstOrFail();

        $this->set('flight', $flight);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $flight = $this->Flights->newEntity();
        if ($this->request->is('post')) {
            $flight = $this->Flights->patchEntity($flight, $this->request->getData());
            $flight->user_id = $this->Auth->user('id');
//            debug($flight); die();
            if ($this->Flights->save($flight)) {
                $this->Flash->success(__('The flight has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The flight could not be saved. Please, try again.'));
        }
        $files = $this->Flights->Files->find('list', ['limit' => 200]);
        $tags = $this->Flights->Tags->find('list', ['limit' => 200]);
        $this->set(compact('flight', 'tags', 'files'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Flight id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($slug = null) {
        $flight = $this->Flights->findBySlug($slug)
                ->contain('Tags')
                ->contain('Files')
                ->contain('Airlines')
                ->firstOrFail();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $flight = $this->Flights->patchEntity($flight, $this->request->getData(), [
                // Added: Disable modification of user_id.
                'accessibleFields' => ['user_id' => false]
            ]);
            if ($this->Flights->save($flight)) {
                $this->Flash->success(__('The flight has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The flight could not be saved. Please, try again.'));
        }
        $airlines = $this->Flights->Airlines->find('list', ['limit' => 200]);
        $files = $this->Flights->Files->find('list', ['limit' => 200]);
        $tags = $this->Flights->Tags->find('list', ['limit' => 200]);
        $this->set(compact('flight', 'tags', 'files', 'airlines'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Flight id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($slug = null) {
        $this->request->allowMethod(['post', 'delete']);
        $flight = $this->Flights->findBySlug($slug)->firstOrFail();
        if ($this->Flights->delete($flight)) {
            $this->Flash->success(__('The flight has been deleted.'));
        } else {
            $this->Flash->error(__('The flight could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
