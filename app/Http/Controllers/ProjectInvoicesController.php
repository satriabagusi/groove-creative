<?php

namespace App\Http\Controllers;

use App\Project;
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
        $project_invoice = Project_invoice::where('order_id', $order_id)
                            ->where('project_id', $request->id)
                            ->first();
        $firstInvoice = Project_invoice::where('project_id', $request->id)
                            ->where('order_id', '!=', $order_id)
                            ->where('invoice_type', 0)
                            ->first();

        if($project_invoice){
            if($order_id){
                $snapToken = "";

                if ($project_invoice->status == 0) {
                    $this->initPaymentGateway();

                    $params = array(
                        'transaction_details' => array(
                            'order_id' => $order_id,
                            'gross_amount' => $project_invoice->total_pay,
                        ),
                        'customer_details' => array(
                            'first_name' => $project_invoice->projects->client_name,
                            'email' => $project_invoice->projects->client_email,
                            'phone' => $project_invoice->projects->client_phone,
                        ),
                    );

                    $snapToken = \Midtrans\Snap::getSnapToken($params);
                }

                return view('pages.project-invoice', compact('firstInvoice','project_invoice', 'snapToken'));

            }else{
                abort(404);
            }
        }else{
            abort(404);
        }
    }

    public function invoiceNotification(Request $request){
        $order_id = $request->order_id;
        $id = substr($order_id, 17);
        $invoice_status = $request->status_code;
        $project_invoice = Project_invoice::where('order_id', $order_id)
                            ->where('project_id', $id)
                            ->where('status', 0)
                            ->first();

        if ($project_invoice) {
            $updateInvoice = Project_invoice::where('order_id', $order_id)
                        ->where('project_id', $id)
                        ->update([
                            'status' => 1,
                            'invoice_status' => $invoice_status,
                        ]);

            if($project_invoice->invoice_type == 0){
                $updateProject = Project::where('id', $id)->update(['pay_status' => 1]);
            }elseif($project_invoice->invoice_type == 1){
                $updateProject = Project::where('id', $id)->update(['pay_status' => 2]);
            }


            if($updateInvoice && $updateProject){
                $status = $request->transaction_status;
                return redirect('/payment/invoice?order_id='.$order_id.'&id='.$id);
            }
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
