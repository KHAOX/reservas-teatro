<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\reservas;
use DB;

class ReservasController extends Controller
{
    public function index(){
    	$reservas = reservas::all();    	
    	$reservas->each(function($reservas){
    	    $reservas->usuario;
    	}); 
    	//dd($reservas);
    	return view('reservas.index', compact('reservas'));
    }

    public function reservar(Request $request){
    	
    	$user = DB::table('usuarios')->where('id', $request->userid)->first();

    	$data = json_decode($request->reservas);

    	$nombre_archivo = "logs_reservas.txt";

    	$archivo = fopen($nombre_archivo, "a");    	 

    	foreach($data as $item){
	    	try{    		
				$data = array();
				$data['row'] = $item->row;
				$data['column'] = $item->column;
				$data['usuario_id'] = $request->userid;
				$data['created_at'] =new \DateTime();
				DB::table('reservas')->insert($data);	

				fwrite($archivo, date("d m Y H:m:s")." ".$user->nombre." ".$user->apellidos." Reserva butaca: Fila ".$item->row." Columna ".$item->column."\r\n");			   		
	    	}
	    	catch(Exception $e){  
	    		$sen['success'] = true;
	    		$sen['message'] = 'Problemas al generar la reserva!';  	   	    	   
	    	   	return response(json_encode($sen), 500)->header('Content-Type', 'text/json');
	    	}
    	}

    	fclose($archivo);
    	$sen['success'] = true;
    	$sen['message'] = 'Reserva exitosa!';
    	return response(json_encode($sen), 200)->header('Content-Type', 'text/json');    	
    }

    public function destroy(Request $request){
    	$reserva = \App\Reservas::find($request->id);
    	$reserva->delete();
    	$sen['success'] = true;
    	$sen['message'] = 'Eliminación exitosa!';
    	return response(json_encode($sen), 200)->header('Content-Type', 'text/json');    	
    }
}	
