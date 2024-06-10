<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PushSubscription;

class PushSubscriptionController extends Controller
{
    public function subscribe(Request $request)
    {
        // dd(explode(',', $request->endpoint));
        $subscription = PushSubscription::updateOrCreate(
            ['endpoint' => $request->endpoint],
            [
                'user_id' => auth()->id(),
                'public_key' => $request->publicKey,
                'auth_token' => $request->authToken,
            ]
        );

        return response()->json(['success' => true]);
    }
    public function saveSubscription(Request $request)
    {
        $subscription = PushSubscription::updateOrCreate(
            ['user_id' => auth()->id()],
            [
                'endpoint' => $request->endpoint,
                'keys' => json_encode($request->keys)
            ]
        );

        return response()->json(['success' => true, 'data' => $subscription]);
    }
    public function formSubscription()
    {
        return view('pages.form');
        // $subscription = PushSubscription::updateOrCreate(
        //     ['user_id' => auth()->id()],
        //     ['endpoint' => $request->endpoint, 'keys' => json_encode($request->keys)]
        // );

        // return response()->json(['success' => true, 'data' => $subscription]);
    }

}