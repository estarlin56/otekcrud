<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClientsAddresses; 
use App\Models\Clients; 
use Validator;

class ClientController extends Controller
{
    // shows all client
    public function index()
    {
		$clients = Clients::all()->toArray();
        return array_reverse($clients);
    }
    
    // add client
    public function add(Request $request)
    {

        $clients = new Clients([
            'first_name' => $request->input()[1]['first_name'],
            'second_name' => $request->input()[1]['second_name'],
            'telephone_number' => $request->input()[1]['telephone_number'],
            'email' => $request->input()[1]['email']
        ]);
        $clients->save();

        $client_id = $clients->id;

        foreach($request->input()[0] as $direction){
           
            $clients_addresses = new ClientsAddresses([
                'clients_id' =>  $client_id,
                'country' => $direction['country'],
                'city' => $direction['city'],
                'street' => $direction['street'],
                'postal_code' => $direction['postal_code']
            ]);
            $clients_addresses->save();
        }

        return response()->json('The client successfully added');  
    }
 
    // delete client
    public function delete($id)
    {
        $client = Clients::find($id);
        ClientsAddresses::where('clients_id', $id)->delete();
        $client->delete();
 
        return response()->json('The client successfully deleted');
    }
    

    // edit client
     public function edit($id)
    {
        $post = Clients::find($id);
        return response()->json($post);
    }

   // update client
    public function update($id, Request $request)
    {
        $client = Clients::find($id);
        $client->update($request->all());
    
        return response()->json($client);
    }


   public function directions($id)
    {
        $clients =  ClientsAddresses::all()->where('clients_id', $id)->toArray();
        return array_reverse($clients);
    }

    // delete directions
    public function deletedirection($id)
    {
        ClientsAddresses::where('id', $id)->delete();
        
        return response()->json('The direction successfully deleted');
    }


    // edit client
     public function editdirection($id)
    {
        $post = ClientsAddresses::find($id);
        return response()->json($post);
    }

    // update client
    public function updatedirection($id, Request $request)
    {
        $client = ClientsAddresses::find($id);
        $client->update($request->all());
    
        return response()->json($client);
    }
 
    
}
