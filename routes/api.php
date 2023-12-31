    <?php

    use App\Http\Controllers\api\v1\AuthController;
    use App\Http\Controllers\api\v1\CifController;
    use App\Http\Controllers\api\v1\DepositoController;
    use App\Http\Controllers\api\v1\TabunganController;
    use App\Http\Controllers\api\v1\TransaksiController;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Route;

    /*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);

    Route::group(['middleware' => ['auth:sanctum']], function () {
        Route::get('/profile', function (Request $request) {
            return $request->user();
        });

        Route::post('/logout', [AuthController::class, 'logout']);
    });

    Route::get('/v1/cif', [CifController::class, 'index']);
    Route::get('/v1/cif/{id?}', [CifController::class, 'show']);

    // Route::get('/v1/cif/tabungan/{id?}', [TabunganController::class, 'index']);

    Route::get('/v1/tabungan/simapan/{id?}', [TabunganController::class, 'simapan']);
    Route::get('/v1/tabungan/siloka/{id?}', [TabunganController::class, 'siloka']);
    Route::get('/v1/tabungan/simantap/{id?}', [TabunganController::class, 'simantap']);
    Route::get('/v1/tabungan/simabrur/{id?}', [TabunganController::class, 'simabrur']);
    Route::get('/v1/tabungan/{id?}', [TabunganController::class, 'show']);


    Route::get('/v1/tabungan/deposito/{id?}', [DepositoController::class, 'index']);
    Route::get('/v1/deposito/{id?}', [DepositoController::class, 'show']);

    Route::get('/v1/transaksi/{id?}', [TransaksiController::class, 'index']);
    Route::get('/v1/transaksi/{id?}/{param?}', [TransaksiController::class, 'show']);
    Route::get('/v1/transaksi/{id?}/{startDate?}/{endDate?}', [TransaksiController::class, 'by_date']);
