<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMetatextAPIRequest;
use App\Http\Requests\API\UpdateMetatextAPIRequest;
use App\Models\Metatext;
use App\Repositories\MetatextRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class MetatextController
 * @package App\Http\Controllers\API
 */

class MetatextAPIController extends AppBaseController
{
    /** @var  MetatextRepository */
    private $metatextRepository;

    public function __construct(MetatextRepository $metatextRepo)
    {
        $this->metatextRepository = $metatextRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/metatexts",
     *      summary="Get a listing of the Metatexts.",
     *      tags={"Metatext"},
     *      description="Get all Metatexts",
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
     *                  @SWG\Items(ref="#/definitions/Metatext")
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
        $metatexts = $this->metatextRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($metatexts->toArray(), 'Metatexts retrieved successfully');
    }

    /**
     * @param CreateMetatextAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/metatexts",
     *      summary="Store a newly created Metatext in storage",
     *      tags={"Metatext"},
     *      description="Store Metatext",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Metatext that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Metatext")
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
     *                  ref="#/definitions/Metatext"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateMetatextAPIRequest $request)
    {
        $input = $request->all();

        $metatext = $this->metatextRepository->create($input);

        return $this->sendResponse($metatext->toArray(), 'Metatext успешно сохранен');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/metatexts/{id}",
     *      summary="Display the specified Metatext",
     *      tags={"Metatext"},
     *      description="Get Metatext",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Metatext",
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
     *                  ref="#/definitions/Metatext"
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
        /** @var Metatext $metatext */
        $metatext = $this->metatextRepository->find($id);

        if (empty($metatext)) {
            return $this->sendError('Metatext not found');
        }

        return $this->sendResponse($metatext->toArray(), 'Metatext retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateMetatextAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/metatexts/{id}",
     *      summary="Update the specified Metatext in storage",
     *      tags={"Metatext"},
     *      description="Update Metatext",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Metatext",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Metatext that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Metatext")
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
     *                  ref="#/definitions/Metatext"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateMetatextAPIRequest $request)
    {
        $input = $request->all();

        /** @var Metatext $metatext */
        $metatext = $this->metatextRepository->find($id);

        if (empty($metatext)) {
            return $this->sendError('Metatext not found');
        }

        $metatext = $this->metatextRepository->update($input, $id);

        return $this->sendResponse($metatext->toArray(), 'Metatext updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/metatexts/{id}",
     *      summary="Remove the specified Metatext from storage",
     *      tags={"Metatext"},
     *      description="Delete Metatext",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Metatext",
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
        /** @var Metatext $metatext */
        $metatext = $this->metatextRepository->find($id);

        if (empty($metatext)) {
            return $this->sendError('Metatext not found');
        }

        $metatext->delete();

        return $this->sendResponse($id, 'Metatext deleted successfully');
    }
}
