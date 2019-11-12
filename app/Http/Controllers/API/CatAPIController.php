<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCatAPIRequest;
use App\Http\Requests\API\UpdateCatAPIRequest;
use App\Models\Cat;
use App\Repositories\CatRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class CatController
 * @package App\Http\Controllers\API
 */

class CatAPIController extends AppBaseController
{
    /** @var  CatRepository */
    private $catRepository;

    public function __construct(CatRepository $catRepo)
    {
        $this->catRepository = $catRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/cats",
     *      summary="Get a listing of the Cats.",
     *      tags={"Cat"},
     *      description="Get all Cats",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/Cat")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
        $cats = $this->catRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($cats->toArray(), 'Cats retrieved successfully');
    }

    /**
     * @param CreateCatAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/cats",
     *      summary="Store a newly created Cat in storage",
     *      tags={"Cat"},
     *      description="Store Cat",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Cat that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Cat")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Cat"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateCatAPIRequest $request)
    {
        $input = $request->all();

        $cat = $this->catRepository->create($input);

        return $this->sendResponse($cat->toArray(), 'Cat успешно сохранен');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/cats/{id}",
     *      summary="Display the specified Cat",
     *      tags={"Cat"},
     *      description="Get Cat",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Cat",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Cat"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id)
    {
        /** @var Cat $cat */
        $cat = $this->catRepository->find($id);

        if (empty($cat)) {
            return $this->sendError('Cat объект не найден');
        }

        return $this->sendResponse($cat->toArray(), 'Cat retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateCatAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/cats/{id}",
     *      summary="Update the specified Cat in storage",
     *      tags={"Cat"},
     *      description="Update Cat",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Cat",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Cat that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Cat")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Cat"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateCatAPIRequest $request)
    {
        $input = $request->all();

        /** @var Cat $cat */
        $cat = $this->catRepository->find($id);

        if (empty($cat)) {
            return $this->sendError('Cat объект не найден');
        }

        $cat = $this->catRepository->update($input, $id);

        return $this->sendResponse($cat->toArray(), 'Cat обновлено успешно');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/cats/{id}",
     *      summary="Remove the specified Cat from storage",
     *      tags={"Cat"},
     *      description="Delete Cat",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Cat",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id)
    {
        /** @var Cat $cat */
        $cat = $this->catRepository->find($id);

        if (empty($cat)) {
            return $this->sendError('Cat объект не найден');
        }

        $cat->delete();

        return $this->sendResponse($id, 'Cat deleted successfully');
    }
}
