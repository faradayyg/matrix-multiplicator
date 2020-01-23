<?php

namespace App\Http\Controllers;

use App\Services\Exceptions\MatrixValidationException;
use Illuminate\Http\Request;
use App\Services\MatrixService;
use Illuminate\Support\Facades\Validator;

class MatrixController extends Controller
{
    protected $matrixService;

    /**
     * Create instance of Matrix controller
     * 
     * @param MatrixService $matrixService the matrix operations service
     * 
     * @return void
     */
    public function __construct(MatrixService $matrixService)
    {
        $this->matrixService = $matrixService;
    }

    /**
     * Controller method that handles the matrix multiplication endpoint
     * 
     * @param Request $request the request property
     *
     * @return void
     */
    public function multiply(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'first_matrix' => ['required','array'],
                'second_matrix' => ['required', 'array']
            ]
        );

        $validator->after(
            function ($validator) use ($request) {
                if (count($request->first_matrix[0]) === count($request->second_matrix)) {
                    return true;
                } else {
                    $message = "First Matrix column count should be equal to row count on second matrix";
                    $validator->errors()->add('matrix_compatibility', $message);
                }
            }
        );

        if ($validator->fails()) {
            $errors = $validator->errors();

            if (!empty($errors->get('matrix_compatibility'))) {
                throw new MatrixValidationException($errors->first('matrix_compatibility'));
            }
        }

        $matrixProduct = $this->matrixService->multiplyMatrix(
            $request->first_matrix,
            $request->second_matrix
        );
        
        $matrixProduct = $this->matrixService->formatMatrix($matrixProduct);
        return [
            "status" => "success",
            "data" => $matrixProduct
        ];
    }
}
