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

    public function testPay(Request $request){
        echo $request->order_id;
        echo "<br>";
        echo $request->id;
        $this->initPaymentGateway();

        mt_srand($request->id);

        $num = str_pad(mt_rand(0,100000000),8,0,STR_PAD_LEFT);
        $date = date("Ymd");
        $order_id = 'GrooveOrder-'.$date.'-'.$num;

        $params = array(
            'transaction_details' => array(
                'order_id' => $order_id,
                'gross_amount' => 250000,
            ),
            'customer_details' => array(
                'first_name' => 'KLIENKU',
                'email' => 'KLIENKU@MAIL.com',
                'phone' => '',
            ),
        );
        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return view('pages.test-pay', compact('snapToken'));
    }

    public function show(Request $request)
    {
        $order_id = $request->order_id;
        $project_invoice = Project_invoice::where('order_id', $order_id)->where('project_id', $request->id)->first();
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

                return view('pages.project-invoice', compact('project_invoice', 'snapToken'));

            }else{
                abort(404);
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
