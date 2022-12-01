<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMonthlyDeliveryRequest;
use App\Http\Requests\UpdateMonthlyDeliveryRequest;
use App\Repositories\MonthlyDeliveryRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\Worker;
use App\Models\MonthlyDelivery;
use Barryvdh\DomPDF\Facade\Pdf;

class MonthlyDeliveryController extends AppBaseController
{
    /** @var MonthlyDeliveryRepository $monthlyDeliveryRepository*/
    private $monthlyDeliveryRepository;

    public function __construct(MonthlyDeliveryRepository $monthlyDeliveryRepo)
    {
        $this->monthlyDeliveryRepository = $monthlyDeliveryRepo;
    }

    /**
     * Display a listing of the MonthlyDelivery.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $monthlyDeliveries = $this->monthlyDeliveryRepository->all();

        return view('monthly_deliveries.index')
            ->with('monthlyDeliveries', $monthlyDeliveries);
    }

    
    /**
     * Display a listing of the MonthlyDelivery filter by Worker
     *
     * @param Request $request
     *
     * @return Response
     */
    public function listByWorker($worker_id)
    {
        $monthlyDeliveries = MonthlyDelivery::where('worker_id',$worker_id)->get();
        if(count($monthlyDeliveries) == 0){
            Flash::error('El trabajador no tiene entregas registradas');

            return redirect(route('workers.index'));
        }

        return view('monthly_deliveries.index')
            ->with('monthlyDeliveries', $monthlyDeliveries);
    }

    /**
     * Show the form for creating a new MonthlyDelivery.
     *
     * @return Response
     */
    public function create()
    {
        $workers = Worker::all()->pluck('full_name','id');
        return view('monthly_deliveries.create')->with('workers',$workers);
    }

    /**
     * Store a newly created MonthlyDelivery in storage.
     *
     * @param CreateMonthlyDeliveryRequest $request
     *
     * @return Response
     */
    public function store(CreateMonthlyDeliveryRequest $request)
    {
        $input = $request->all();
        $worker = Worker::find($input['worker_id']);
        $input['role_id'] = $worker->role_id; 
        // return dd($input);

        $monthlyDelivery = $this->monthlyDeliveryRepository->create($input);

        Flash::success('La entrega mensual se guardó correctamente.');

        return redirect(route('monthlyDeliveries.index'));
    }

    /**
     * Display the specified MonthlyDelivery.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $monthlyDelivery = $this->monthlyDeliveryRepository->find($id);

        if (empty($monthlyDelivery)) {
            Flash::error('La entrega mensual no se encuentra');

            return redirect(route('monthlyDeliveries.index'));
        }
        $dataSalary = $this->getSalary($monthlyDelivery->id);
        return view('monthly_deliveries.show')->with('monthlyDelivery', $monthlyDelivery)->with('dataSalary', $dataSalary);
    }

    /**
     * Show the form for editing the specified MonthlyDelivery.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $monthlyDelivery = $this->monthlyDeliveryRepository->find($id);
        $workers = Worker::all()->pluck('full_name','id');

        if (empty($monthlyDelivery)) {
            Flash::error('La entrega mensual no se encuentra');

            return redirect(route('monthlyDeliveries.index'));
        }

        return view('monthly_deliveries.edit')->with('monthlyDelivery', $monthlyDelivery)->with('workers',$workers);
    }

    /**
     * Update the specified MonthlyDelivery in storage.
     *
     * @param int $id
     * @param UpdateMonthlyDeliveryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMonthlyDeliveryRequest $request)
    {
        $monthlyDelivery = $this->monthlyDeliveryRepository->find($id);

        if (empty($monthlyDelivery)) {
            Flash::error('La entrega mensual no se encuentra');

            return redirect(route('monthlyDeliveries.index'));
        }

        $input = $request->all();
        $worker = Worker::find($input['worker_id']);
        $input['role_id'] = $worker->role_id; 

        $monthlyDelivery = $this->monthlyDeliveryRepository->update($input, $id);

        Flash::success('La entrega mensual se modificó correctamente.');

        return redirect(route('monthlyDeliveries.index'));
    }

    /**
     * Remove the specified MonthlyDelivery from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $monthlyDelivery = $this->monthlyDeliveryRepository->find($id);

        if (empty($monthlyDelivery)) {
            Flash::error('La entrega mensual no se encuentra');

            return redirect(route('monthlyDeliveries.index'));
        }

        $this->monthlyDeliveryRepository->delete($id);

        Flash::success('La entrega mensual se eliminó correctamente.');

        return redirect(route('monthlyDeliveries.index'));
    }

    /**
     * Get base salary from specified MonthlyDelivery.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    private function getBaseSalary($id){
        $monthlyDelivery = $this->monthlyDeliveryRepository->find($id);
        $hourly_wage = 30;
        $base_salary = (int) $monthlyDelivery->hours_worked * $hourly_wage;

        return $base_salary;
    }

    /**
     * Get payment for deliveries from specified MonthlyDelivery.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    private function getPaymentForDeliveries($id){
        $monthlyDelivery = $this->monthlyDeliveryRepository->find($id);
        $payment_for_delivery = 5;
        $payment_for_deliveries = $monthlyDelivery->count_delivery * $payment_for_delivery;

        return $payment_for_deliveries;
    }

    /**
     * Get bonus salary from specified MonthlyDelivery.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    private function getBonusSalary($id){
        $monthlyDelivery = $this->monthlyDeliveryRepository->find($id);
        
        switch ($monthlyDelivery->role_id) {
            case 1:
                    $bonus = 10;
                break;
            case 2:
                    $bonus = 5;
                break;
            default:
                    $bonus = 0;
                break;
        }

        $bonus_salary = $monthlyDelivery->hours_worked * $bonus;

        return $bonus_salary;
    }

    /**
     * Get salary before tax from specified MonthlyDelivery.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    private function getSalaryBeforeTaxes($id){
        
        $base_salary = $this->getBaseSalary($id);
        $payment_for_deliveries = $this->getPaymentForDeliveries($id);
        $bonus_salary = $this->getBonusSalary($id);
        $total = (int) $base_salary+(int) $payment_for_deliveries+(int) $bonus_salary;   

        return $total;
    }

    /**
     * Get salary before tax from specified MonthlyDelivery.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    private function getTaxes($id){
        
        $salary_before = $this->getSalaryBeforeTaxes($id); 
        $tax_basic = ((int) $salary_before * 0.09);
        if($salary_before >= 10000){
            $tax_extra = ((int) $salary_before * 0.09);
        }else{
            $tax_extra = 0;
        }
        $taxes = $tax_basic + $tax_extra;

        return $taxes;
    }

    /**
     * Get grocery coupon from specified MonthlyDelivery.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function getMonthySalary($id){
        $salary_before = $this->getSalaryBeforeTaxes($id);
        $taxes = $this->getTaxes($id);
        $salary = (int) $salary_before - (int) $taxes;
        
        return $salary;
    }

    /**
     * Get grocery coupon from specified MonthlyDelivery.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function getGroceryCoupon($id){
        $salary = $this->getMonthySalary($id);
        $grocery_coupon = $salary * 0.04;

        return $grocery_coupon;
    }

    /**
     * Get salary from specified MonthlyDelivery.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function getSalary($id){
        $total = (int) $this->getMonthySalary($id)+(int) $this->getGroceryCoupon($id);
        $data = [
            'base_salary' => $this->getBaseSalary($id),
            'payment_for_deliveries' => $this->getPaymentForDeliveries($id),
            'bonus_salary' => $this->getBonusSalary($id),
            'taxes' => $this->getTaxes($id),
            'monthly_salary' => $this->getMonthySalary($id),
            'grocery_coupon' => $this->getGroceryCoupon($id),
            'total' => $total,
        ];

        return $data;
    }

    /**
     * Get PDF salary from specified MonthlyDelivery.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function getPDFSalary($id){
        $monthlyDelivery = $this->monthlyDeliveryRepository->find($id);

        if (empty($monthlyDelivery)) {
            Flash::error('La entrega mensual no se encuentra');

            return redirect(route('monthlyDeliveries.index'));
        }
        $dataSalary = $this->getSalary($monthlyDelivery->id);
        $pdf = Pdf::loadView('monthly_deliveries.pdf', ['monthlyDelivery' => $monthlyDelivery, 'dataSalary' => $dataSalary]);
        return $pdf->download('monthly_deliveries.pdf');
    }    
}
