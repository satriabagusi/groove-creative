<?php

namespace App\Http\Controllers;

use App\Project_invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ProjectInvoicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $order_id = $request->order_id;
        if($order_id){
            $order_id = Crypt::decrypt($order_id);
            $project_invoice = Project_invoice::where('order_id', $order_id)->first();

            $this->initPaymentGateway();

            $params = array(
                'transaction_details' => array(
                    'order_id' => $order_id,
                    'gross_amount' => $project_invoice->must_pay,
                ),
                'customer_details' => array(
                    'first_name' => $project_invoice->projects->client_name,
                    'email' => $project_invoice->projects->client_email,
                    'phone' => $project_invoice->projects->client_phone,
                ),
            );

            $snapToken = \Midtrans\Snap::getSnapToken($params);

            // return $order_id;
            return view('pages.project-invoice', compact('project_invoice', 'snapToken'));
        }else{
            abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
