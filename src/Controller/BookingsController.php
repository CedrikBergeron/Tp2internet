<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Bookings Controller
 *
 * @property \App\Model\Table\BookingsTable $Bookings
 *
 * @method \App\Model\Entity\Booking[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BookingsController extends AppController {

    public function initialize() {
        parent::initialize();
        $this->Auth->allow(['add']);
        $this->viewBuilder()->setLayout('cakephp_default');
    }

    public function isAuthorized($user) {
        return true;
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index() {
        $this->paginate = [
            'contain' => ['Flights'],
        ];
        $bookings = $this->paginate($this->Bookings);

        $this->set(compact('bookings'));
    }

    /**
     * View method
     *
     * @param string|null $id Booking id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $booking = $this->Bookings->get($id, [
            'contain' => ['Flights'],
        ]);

        $this->set('booking', $booking);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        if ($this->request->session()->read('Flight.id') == false) {
            $this->Flash->error(__('Booking must be added from an flight'));
            return $this->redirect(['controller' => 'flights', 'action' => 'index']);
        } else {
            $booking = $this->Bookings->newEntity();
            if ($this->request->is('post')) {
                $booking = $this->Bookings->patchEntity($booking, $this->request->getData());
                $booking->flight_id = $this->request->session()->read('Flight.id');
                $this->request->session()->delete('Flight.id');
//            debug($booking); die();
                if ($this->Bookings->save($booking)) {
                    $this->Flash->success(__('The booking has been saved.'));
                    $flight_slug = $this->request->session()->read('Flight.slug');
                    return $this->redirect(['controller' => 'flights', 'action' => 'view', $flight_slug]);
                }
                $this->Flash->error(__('The booking could not be saved. Please, try again.'));
            }
            $flights = $this->Bookings->Flights->find('list', ['limit' => 200]);
            $this->set(compact('booking', 'flights'));
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Booking id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        $booking = $this->Bookings->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $booking = $this->Bookings->patchEntity($booking, $this->request->getData());
            if ($this->Bookings->save($booking)) {
                $this->Flash->success(__('The booking has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The booking could not be saved. Please, try again.'));
        }
        $flights = $this->Bookings->Flights->find('list', ['limit' => 200]);
        $this->set(compact('booking', 'flights'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Booking id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $booking = $this->Bookings->get($id);
        if ($this->Bookings->delete($booking)) {
            $this->Flash->success(__('The booking has been deleted.'));
        } else {
            $this->Flash->error(__('The booking could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
