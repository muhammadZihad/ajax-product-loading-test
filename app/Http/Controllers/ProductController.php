<?php

namespace App\Http\Controllers;

use App\Repository\ProductRepository;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    //

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        return view('index');
    }


    /**
     * Provides request products via ajax call
     * @param Request $reqeust
     * @return \Illuminate\Http\Response|\Illuminate\Contracts\Routing\ResponseFactory
     */
    public function ajaxLoad(Request $request)
    {
        $products = $this->productRepository->getProductsByType($request);
        $html = view('sub.product-render', compact('products'))->render();
        return $this->successResponse(['html' => $html]);
    }



    /**
     * Build success response
     * @param array $data
     * @param string $message
     * @return \Illuminate\Http\Response|\Illuminate\Contracts\Routing\ResponseFactory
     */
    protected function successResponse($data = [], $message = "")
    {
        return $this->response($data, Response::HTTP_OK, $message);
    }


    /**
     * Build response
     * @param array $data
     * @param string $message
     * @return \Illuminate\Http\Response|\Illuminate\Contracts\Routing\ResponseFactory
     */
    protected function response($data = [], $status, $message = "")
    {
        return response()->json([
            'status' => [
                'code' => $status,
                'message' => $message
            ],
            'data' => $data
        ]);
    }


    /**
     * Build not found response
     * @param array $data
     * @param string $message
     * @return \Illuminate\Http\Response|\Illuminate\Contracts\Routing\ResponseFactory
     */
    protected function notFoundResponse($data = [], $message = "")
    {
        return $this->response($data, Response::HTTP_NOT_FOUND, $message);
    }


    /**
     * Build unprocessable entries response
     * @param array $data
     * @param string $message
     * @return \Illuminate\Http\Response|\Illuminate\Contracts\Routing\ResponseFactory
     */
    protected function unprocessableResponse($data = [], $message = "")
    {
        return $this->response($data, Response::HTTP_UNPROCESSABLE_ENTITY, $message);
    }
}