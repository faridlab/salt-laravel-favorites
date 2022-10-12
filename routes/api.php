<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use SaltFavorites\Controllers\FavoritesResourcesController;

$version = config('app.API_VERSION', 'v1');

Route::middleware(['api'])
    ->prefix("api/{$version}")
    ->group(function () {

    // API: FAVORITES RESOURCES
    Route::get("favorites", [FavoritesResourcesController::class, 'index']); // get entire collection
    Route::post("favorites", [FavoritesResourcesController::class, 'store']); // create new collection

    Route::get("favorites/trash", [FavoritesResourcesController::class, 'trash']); // trash of collection

    Route::post("favorites/import", [FavoritesResourcesController::class, 'import']); // import collection from external
    Route::post("favorites/export", [FavoritesResourcesController::class, 'export']); // export entire collection
    Route::get("favorites/report", [FavoritesResourcesController::class, 'report']); // report collection

    Route::get("favorites/{id}/trashed", [FavoritesResourcesController::class, 'trashed'])->where('id', '[a-zA-Z0-9-]+'); // get collection by ID from trash

    // RESTORE data by ID (id), selected IDs (selected), and All data (all)
    Route::post("favorites/{id}/restore", [FavoritesResourcesController::class, 'restore'])->where('id', '[a-zA-Z0-9-]+'); // restore collection by ID

    // DELETE data by ID (id), selected IDs (selected), and All data (all)
    Route::delete("favorites/{id}/delete", [FavoritesResourcesController::class, 'delete'])->where('id', '[a-zA-Z0-9-]+'); // hard delete collection by ID

    Route::get("favorites/{id}", [FavoritesResourcesController::class, 'show'])->where('id', '[a-zA-Z0-9-]+'); // get collection by ID
    Route::put("favorites/{id}", [FavoritesResourcesController::class, 'update'])->where('id', '[a-zA-Z0-9-]+'); // update collection by ID
    Route::patch("favorites/{id}", [FavoritesResourcesController::class, 'patch'])->where('id', '[a-zA-Z0-9-]+'); // patch collection by ID
    // DESTROY data by ID (id), selected IDs (selected), and All data (all)
    Route::delete("favorites/{id}", [FavoritesResourcesController::class, 'destroy'])->where('id', '[a-zA-Z0-9-]+'); // soft delete a collection by ID

});
