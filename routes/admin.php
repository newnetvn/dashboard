<?php

use Newnet\Dashboard\Http\Controllers\Admin\DashboardController;

Route::prefix(config('core.admin_prefix'))
    ->domain(config('core.admin_domain'))
    ->middleware(config('core.admin_middleware'))
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard.index');
        Route::get('dashboard/setting', [DashboardController::class, 'setting'])->name('admin.dashboard.setting');
        Route::post('dashboard/save', [DashboardController::class, 'save'])->name('admin.dashboard.save');
    });
