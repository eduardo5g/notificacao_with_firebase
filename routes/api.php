use App\Http\Controllers\PushSubscriptionController;

Route::post('/save-subscription', [PushSubscriptionController::class, 'saveSubscription'])->middleware('auth:api');
