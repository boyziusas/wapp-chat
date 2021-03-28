<?php

namespace App\Http\Controllers\Webhooks;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\View\View;

/**
 * Class MessageBirdController
 *
 * @package App\Http\Controllers\Webhooks
 */
class MessageBirdController extends Controller {
    /**
     * Get conversations page
     *
     * @return View
     */
    public function __invoke (Request $request) : View {
        dd($request->all());
    }
}
