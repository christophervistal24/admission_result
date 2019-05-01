<?php
namespace App\Controller;

use App\Controller\Guidance;
use App\Core\Controller;
use App\Helpers\Response;

class GuidanceApi extends Controller
{
    public function __construct()
    {
        $this->guidance = load('Models\GuidanceConselor');
        $this->request = load('Helpers\Request');
    }

    public function show()
    {
        return Response::json([ 'data' => $this->guidance->find($this->request->id) ]);
    }
}
