<?php
namespace App\Exceptions;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpFoundation\Response;

trait ExceptionTrait{
	public function apiException($request, $exception){

		if($this->isModel($exception)){
           return response([
            'error'=>'Model not found exception'
           ], Response::HTTP_NOT_FOUND);
         }

         if($this->isHttp($exception)){
            return response([
                'error'=>'Incorrect route'
            ], Response::HTTP_NOT_FOUND);
         }
	}

	public function isModel($exception){
		return $exception instanceof ModelNotFoundException;
	}
	public function isHttp($exception){
		return $exception instanceof NotFoundHttpException;
	}
}