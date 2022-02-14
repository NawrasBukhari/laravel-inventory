<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Client;
use App\Models\Transaction;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use App\Http\Requests\ClientRequest;
use RealRashid\SweetAlert\Facades\Alert;

class ClientController extends Controller
{

    public function index()
    {
        $clients = Client::paginate(25);

        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(ClientRequest $request, Client $client)
    {
        $client->create($request->all());

        Alert::success('Done!', 'Client has been successfully created','success');
        return redirect()->route('clients.index');

    }


    public function show(Client $client)
    {
        return view('clients.show', compact('client'));
    }

    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    public function update(ClientRequest $request, Client $client)
    {
        $client->update($request->all());
        Alert::success('Done!', 'Client has been successfully updated','success');

        return redirect()
            ->route('clients.index');
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('clients.index');
    }

    public function addtransaction(Client $client)
    {
        $payment_methods = PaymentMethod::all();

        return view('clients.transactions.add', compact('client','payment_methods'));
    }
}
