<?php

namespace Packages\System\Http\Controllers;

use Packages\System\Http\Requests\QuoteTest\QuoteRequest;
use Packages\System\Models\SystemCounty;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Support\Facades\Log;

class SystemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $counties = SystemCounty::all()->pluck('countyName', 'countyCode')->toArray();
        $product_types = [];
        $delivery_services = [];
        $product_types['1'] = __('Document');
        $product_types['3'] = __('Package order');
        $delivery_services['0'] = __('All');
        $delivery_services['1'] = __('Priority');
        $delivery_services['2'] = __('Non priority');
        $delivery_services['3'] = __('Returned');

        return view('system::test_form', compact('counties', 'product_types', 'delivery_services'));
    }

    public function quote(QuoteRequest $request)
    {
        try {
            $client = new Client();
            $res = $client->request('POST', systemsetting('system-quote-url'), [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Cache-Control' => 'no-cache',
                    'Ocp-Apim-Subscription-Key' => systemsetting('ocp-apim-subscription-key'),
                ],
                'json' => [
                    "originCountyCode" => $request->origin_county_code,
                    "destinationCountyCode" => $request->destination_county_code,
                    "package" => [
                        "weight" => $request->package_weight,
                        "height" => $request->package_height,
                        "width" => $request->package_width,
                        "length" => $request->package_length,
                    ],
                    "productType" => $request->product_type,
                    "contentType" => 1,
                    "declaredWorth" => $request->declared_worth,
                    "deliveryTime" => $request->delivery_time,
                ],
            ]);

            $result = json_decode($res->getBody())->data;
            dd($result);
            return $result;

        } catch (Exception $e) {
            Log::error($e->getMessage());
            return back()->with('error', $e->getMessage())->withInput();
        } catch (ClientException $e) {
            Log::error($e);
            $message = $e->getMessage();
            if ($e->getMessage() == "Client error: `POST https://testservices.wschilexpress.com/rating/api/v1.0/rates/courier` resulted in a `400 Bad Request` response:\n{\"data\":{\"courierServiceOptions\":[]},\"statusCode\":1,\"statusDescription\":\"EL PESO INGRESADO PARA EL SOBRE EXCEDE EL VALOR (truncated...)\n") {
                $message = "EL PESO INGRESADO PARA EL SOBRE (DOCUMENTO) EXCEDE EL VALOR";
            }
            return back()->with('error', $message)->withInput();
        }
    }
}
