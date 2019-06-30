<?php

namespace App\Http\Controllers;

use App\Tender;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use App\Portal;
use App\Predmet;
use App\Tip;

class TenderController extends Controller
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
        $portals = Portal::all();
        $predmets = Predmet::all();
        $tips = Tip::all();
        return view('addtender', ['portals' => $portals, 'predmets' => $predmets, 'tips' => $tips ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request['aukcionDate'] = Carbon::parse($request['aukcionDate'])->format('Y-m-d H:i:s');
        $request['finishTime'] = Carbon::parse($request['finishTime'])->format('Y-m-d H:i:s');
        $request['no'] = trim($request['no']);

        $tender = Tender::create([
            'user_id' => Auth::id(),
            'portal' => $request['portal'],
            'type' => $request['type'],
            'predmet' => $request['predmet'],
            'no' => $request['no'],
            'link' => $request['link'],
            'zakazchik' => $request['zakazchik'],
            'title' => $request['title'],
            'quantity' => $request['quantity'],
            'priceForUnit' => $request['priceForUnit'],
            'sum' => $request['sum'],
            'finishTime' => $request['finishTime'],
            'address' => $request['address'],
            'finishForDelivery' => $request['finishForDelivery'],
            'providerUnitPrice' => $request['providerUnitPrice'],
            'providerSumPrice' => $request['providerSumPrice'],
            'transportation' => $request['transportation'],
            'customs' => $request['customs'],
            'certification' => $request['certification'],
            'allConsumptions' => $request['allConsumptions'],
            'myUnitPrice' => $request['myUnitPrice'],
            'mySum' => $request['mySum'],
            'taxProcent' => $request['taxProcent'],
            'profit' => $request['profit'],
            'margin' => $request['margin'],
            'sumNDS' => $request['sumNDS'],
            'comission' => $request['comission'],
            'procentOtZakupki' => $request['procentOtZakupki'],
            'summaZakupki' => $request['summaZakupki'],
            'taxSum' => $request['taxSum'],
            'procentNDS' =>$request['procentNDS'],
            'aukcionDate' => $request['aukcionDate'],
            'sumBank' => $request['sumBank']
        ]);
        if($request->obespechenie == 'on'){
            $tender->update(['obespechenie' => 1]);
        }
        if($request->submitted == 'on'){
            $tender->update(['submitted' => 1]);
        }
        if (file_exists($request['tz'])) {
            $file = $request['tz'];
            $name = date("Y-m-d-H-i-s").$request['tz']->getClientOriginalName();
            
            $file->move(getcwd().'/public/uploads/tender/', $name);
            $tender->update(['tz' => '/public/uploads/tender/'.$name]);
        }
        if(Auth::user()->type == 'admin')
            return redirect('admin/tenders')->with('message', 'Тендер добавлен');
        else
            return redirect('home')->with('message', 'Тендер добавлен');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tender  $tender
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tender = Tender::find($id);
        return view('showtender', ['tender' => $tender]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tender  $tender
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tender = Tender::find($id);
        $portals = Portal::all();
        $predmets = Predmet::all();
        $tips = Tip::all();
        $tender->finishTime = Carbon::parse($tender->finishTime)->format('Y-m-d\TH:i');
        $tender->aukcionDate = Carbon::parse($tender->aukcionDate)->format('Y-m-d\TH:i');
        $tender->dogovorDate = Carbon::parse($tender->dogovorDate)->format('Y-m-d\TH:i');
        if(Auth::id() == $tender->user_id || Auth::user()->type == 'admin')
            return view('edittender', ['tender' => $tender, 'portals' => $portals, 'predmets' => $predmets, 'tips' => $tips]);
        else
            abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tender  $tender
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->aukcionDate = Carbon::parse($request->aukcionDate)->format('Y-m-d H:i:s');
        $request->finishTime = Carbon::parse($request->finishTime)->format('Y-m-d H:i:s');
        

        $tender = Tender::find($id);
        $tender->portal = $request->portal;
        $tender->type = $request->type;
        $tender->predmet = $request->predmet;
        $tender->no = trim($request->no);
        $tender->link = $request->link;
        $tender->zakazchik = $request->zakazchik;
        $tender->title = $request->title;
        $tender->quantity = $request->quantity;
        $tender->priceForUnit = $request->priceForUnit;
        $tender->sum = $request->sum;
        $tender->finishTime = $request->finishTime;
        $tender->address = $request->address;
        $tender->finishForDelivery = $request->finishForDelivery;
        if($request->obespechenie == 'on'){
            $tender->obespechenie = 1;
        }
        if($request->submitted == 'on'){
            $tender->submitted = 1;
        }
        
        $tender->providerUnitPrice = $request->providerUnitPrice;
        $tender->providerSumPrice = $request->providerSumPrice;
        $tender->transportation = $request->transportation;
        $tender->customs = $request->customs;
        $tender->certification = $request->certification;
        $tender->allConsumptions = $request->allConsumptions;
        $tender->myUnitPrice = $request->myUnitPrice;
        $tender->mySum = $request->mySum;
        $tender->taxProcent = $request->taxProcent;
        $tender->profit = $request->profit;
        $tender->margin = $request->margin;
        $tender->sumNDS = $request->sumNDS;
        $tender->comission = $request->comission;
        $tender->procentOtZakupki = $request->procentOtZakupki;
        $tender->summaZakupki = $request->summaZakupki;
        $tender->taxSum = $request->taxSum;
        $tender->procentNDS = $request->procentNDS;
        $tender->aukcionDate = $request->aukcionDate;
        $tender->sumBank = $request->sumBank;

        if (file_exists(request('tz'))) {
            $file = request('tz');
            $name = date("Y-m-d-H-i-s").request('tz')->getClientOriginalName();
            
            $file->move(getcwd().'/public/uploads/tender/', $name);
            $tender->update(['tz' => '/public/uploads/tender/'.$name]);
        }
        if($request->won == 'on'){
            $tender->won = 1;
        }
        $tender->dogovorDate = $request->dogovorDate;
        $tender->neustoyka = $request->neustoyka;
        $tender->zakazchikLico = $request->zakazchikLico;
        $tender->zakazchikContact = $request->zakazchikContact;
        if($request->oplata == 'on'){
            $tender->oplata = 1;
        }

        $tender->save();
        if(Auth::user()->type == 'admin')
            return redirect('admin/tenders')->with('message', 'Тендер обновлен');
        else
            return redirect('home')->with('message', 'Тендер обновлен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tender  $tender
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tender = Tender::find($id);    
        $tender->delete();
        return redirect()->back()->with('message', 'Тендер удален');
    }
}
