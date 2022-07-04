<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;
use Route;

trait permissionTraits{
    public function hasPermission() {
        if (!isset(Auth::user()->info->roleDetail->rolePermission['permissions']['profile']['view']) && Route::is('member.show')) {
            return abort(404);
        }
        if (!isset(Auth::user()->info->roleDetail->rolePermission['permissions']['profile']['list']) && Route::is('member.index')) {
            return abort(404);
        }
        if (!isset(Auth::user()->info->roleDetail->rolePermission['permissions']['profile']['create']) && Route::is('member.create')) {
            return abort(404);
        }
        if (!isset(Auth::user()->info->roleDetail->rolePermission['permissions']['profile']['update']) && Route::is('member.update')) {
            return abort(404);
        }
        if (!isset(Auth::user()->info->roleDetail->rolePermission['permissions']['profile']['delete']) && Route::is('member.destroy')) {
            return abort(404);
        }
        if (!isset(Auth::user()->info->roleDetail->rolePermission['permissions']['fee']['view']) && Route::is('fee.show')) {
            return abort(404);
        }
        if (!isset(Auth::user()->info->roleDetail->rolePermission['permissions']['fee']['list']) && Route::is('fee.index')) {
            return abort(404);
        }
        if (!isset(Auth::user()->info->roleDetail->rolePermission['permissions']['fee']['create']) && Route::is('fee.create')) {
            return abort(404);
        }
        if (!isset(Auth::user()->info->roleDetail->rolePermission['permissions']['fee']['update']) && Route::is('fee.update')) {
            return abort(404);
        }
        if (!isset(Auth::user()->info->roleDetail->rolePermission['permissions']['fee']['delete']) && Route::is('fee.destroy')) {
            return abort(404);
        }
        if (!isset(Auth::user()->info->roleDetail->rolePermission['permissions']['member']['view']) && \Route::is('member.show')) {
            return abort(404);
        }
        if (!isset(Auth::user()->info->roleDetail->rolePermission['permissions']['member']['list']) && \Route::is('member.index')) {
            return abort(404);
        }
        if (!isset(Auth::user()->info->roleDetail->rolePermission['permissions']['member']['create']) && \Route::is('member.create')) {
            return abort(404);
        }
        if (!isset(Auth::user()->info->roleDetail->rolePermission['permissions']['member']['update']) && \Route::is('member.update')) {
            return abort(404);
        }
        if (!isset(Auth::user()->info->roleDetail->rolePermission['permissions']['member']['delete']) && \Route::is('member.destroy')) {
            return abort(404);
        }
        if (!isset(Auth::user()->info->roleDetail->rolePermission['permissions']['attendance']['view']) && \Route::is('attendance.show')) {
            return abort(404);
        }
        if (!isset(Auth::user()->info->roleDetail->rolePermission['permissions']['attendance']['list']) && \Route::is('attendance.index')) {
            return abort(404);
        }
        if (!isset(Auth::user()->info->roleDetail->rolePermission['permissions']['attendance']['create']) && \Route::is('attendance.create')) {
            return abort(404);
        }
        if (!isset(Auth::user()->info->roleDetail->rolePermission['permissions']['attendance']['update']) && \Route::is('attendance.update')) {
            return abort(404);
        }
        if (!isset(Auth::user()->info->roleDetail->rolePermission['permissions']['attendance']['delete']) && \Route::is('attendance.destroy')) {
            return abort(404);
        }
        if (!isset(Auth::user()->info->roleDetail->rolePermission['permissions']['role']['view']) && \Route::is('roles.show')) {
            return abort(404);
        }
        if (!isset(Auth::user()->info->roleDetail->rolePermission['permissions']['role']['list']) && \Route::is('roles.index')) {
            return abort(404);
        }
        if (!isset(Auth::user()->info->roleDetail->rolePermission['permissions']['role']['create']) && \Route::is('roles.create')) {
            return abort(404);
        }
        if (!isset(Auth::user()->info->roleDetail->rolePermission['permissions']['role']['update']) && \Route::is('roles.update')) {
            return abort(404);
        }
        if (!isset(Auth::user()->info->roleDetail->rolePermission['permissions']['role']['delete']) && \Route::is('roles.destroy')) {
            return abort(404);
        }
        if (!isset(Auth::user()->info->roleDetail->rolePermission['permissions']['package']['view']) && \Route::is('package.show')) {
            return abort(404);
        }
        if (!isset(Auth::user()->info->roleDetail->rolePermission['permissions']['package']['list']) && \Route::is('package.index')) {
            return abort(404);
        }
        if (!isset(Auth::user()->info->roleDetail->rolePermission['permissions']['package']['create']) && \Route::is('package.create')) {
            return abort(404);
        }
        if (!isset(Auth::user()->info->roleDetail->rolePermission['permissions']['package']['update']) && \Route::is('package.update')) {
            return abort(404);
        }
        if (!isset(Auth::user()->info->roleDetail->rolePermission['permissions']['package']['delete']) && \Route::is('package.destroy')) {
            return abort(404);
        }
        if (!isset(Auth::user()->info->roleDetail->rolePermission['permissions']['exercise']['view']) && \Route::is('exercise.show')) {
            return abort(404);
        }
        if (!isset(Auth::user()->info->roleDetail->rolePermission['permissions']['exercise']['list']) && \Route::is('exercise.index')) {
            return abort(404);
        }
        if (!isset(Auth::user()->info->roleDetail->rolePermission['permissions']['exercise']['create']) && \Route::is('exercise.create')) {
            return abort(404);
        }
        if (!isset(Auth::user()->info->roleDetail->rolePermission['permissions']['exercise']['update']) && \Route::is('exercise.update')) {
            return abort(404);
        }
        if (!isset(Auth::user()->info->roleDetail->rolePermission['permissions']['exercise']['delete']) && \Route::is('exercise.destroy')) {
            return abort(404);
        }
        if (!isset(Auth::user()->info->roleDetail->rolePermission['permissions']['diet']['view']) && \Route::is('diet.show')) {
            return abort(404);
        }
        if (!isset(Auth::user()->info->roleDetail->rolePermission['permissions']['diet']['list']) && \Route::is('diet.index')) {
            return abort(404);
        }
        if (!isset(Auth::user()->info->roleDetail->rolePermission['permissions']['diet']['create']) && \Route::is('diet.create')) {
            return abort(404);
        }
        if (!isset(Auth::user()->info->roleDetail->rolePermission['permissions']['diet']['update']) && \Route::is('diet.update')) {
            return abort(404);
        }
        if (!isset(Auth::user()->info->roleDetail->rolePermission['permissions']['diet']['delete']) && \Route::is('diet.destroy')) {
            return abort(404);
        }
        if (!isset(Auth::user()->info->roleDetail->rolePermission['permissions']['video']['view']) && \Route::is('video.show')) {
            return abort(404);
        }
        if (!isset(Auth::user()->info->roleDetail->rolePermission['permissions']['video']['list']) && \Route::is('video.index')) {
            return abort(404);
        }
        if (!isset(Auth::user()->info->roleDetail->rolePermission['permissions']['video']['create']) && \Route::is('video.create')) {
            return abort(404);
        }
        if (!isset(Auth::user()->info->roleDetail->rolePermission['permissions']['video']['update']) && \Route::is('video.update')) {
            return abort(404);
        }
        if (!isset(Auth::user()->info->roleDetail->rolePermission['permissions']['video']['delete']) && \Route::is('video.destroy')) {
            return abort(404);
        }
        if (!isset(Auth::user()->info->roleDetail->rolePermission['permissions']['post']['view']) && \Route::is('post.show')) {
            return abort(404);
        }
        if (!isset(Auth::user()->info->roleDetail->rolePermission['permissions']['post']['list']) && \Route::is('post.index')) {
            return abort(404);
        }
        if (!isset(Auth::user()->info->roleDetail->rolePermission['permissions']['post']['create']) && \Route::is('post.create')) {
            return abort(404);
        }
        if (!isset(Auth::user()->info->roleDetail->rolePermission['permissions']['post']['update']) && \Route::is('post.update')) {
            return abort(404);
        }
        if (!isset(Auth::user()->info->roleDetail->rolePermission['permissions']['post']['delete']) && \Route::is('post.destroy')) {
            return abort(404);
        }
        if (!isset(Auth::user()->info->roleDetail->rolePermission['permissions']['assignex']['view']) && \Route::is('assign.show')) {
            return abort(404);
        }
        if (!isset(Auth::user()->info->roleDetail->rolePermission['permissions']['assignex']['list']) && \Route::is('assign.index')) {
            return abort(404);
        }
        if (!isset(Auth::user()->info->roleDetail->rolePermission['permissions']['assignex']['create']) && \Route::is('assign.create')) {
            return abort(404);
        }
        if (!isset(Auth::user()->info->roleDetail->rolePermission['permissions']['assignex']['update']) && \Route::is('assign.update')) {
            return abort(404);
        }
        if (!isset(Auth::user()->info->roleDetail->rolePermission['permissions']['assignex']['delete']) && \Route::is('assign.destroy')) {
            return abort(404);
        }
        if (!isset(Auth::user()->info->roleDetail->rolePermission['permissions']['rfid']['view']) && \Route::is('init.rfid')) {
            return abort(404);
        }
        if (!isset(Auth::user()->info->roleDetail->rolePermission['permissions']['rfid']['list']) && \Route::is('init.rfid')) {
            return abort(404);
        }
        if (!isset(Auth::user()->info->roleDetail->rolePermission['permissions']['rfid']['create']) && \Route::is('init.add')) {
            return abort(404);
        }
        if (!isset(Auth::user()->info->roleDetail->rolePermission['permissions']['rfid']['update']) && \Route::is('init.add')) {
            return abort(404);
        }
        if (!isset(Auth::user()->info->roleDetail->rolePermission['permissions']['rfid']['delete']) && \Route::is('init.remove')) {
            return abort(404);
        }
        if (!isset(Auth::user()->info->roleDetail->rolePermission['permissions']['finger']['view']) && \Route::is('initiate.finger')) {
            return abort(404);
        }
        if (!isset(Auth::user()->info->roleDetail->rolePermission['permissions']['finger']['list']) && \Route::is('initiate.finger')) {
            return abort(404);
        }
        if (!isset(Auth::user()->info->roleDetail->rolePermission['permissions']['finger']['create']) && \Route::is('initiate.adding')) {
            return abort(404);
        }
        if (!isset(Auth::user()->info->roleDetail->rolePermission['permissions']['finger']['update']) && \Route::is('initiate.adding')) {
            return abort(404);
        }
        if (!isset(Auth::user()->info->roleDetail->rolePermission['permissions']['finger']['delete']) && \Route::is('initiate.remove')) {
            return abort(404);
        }
        if (!isset(Auth::user()->info->roleDetail->rolePermission['permissions']['notification']['view']) && \Route::is('notification.show')) {
            return abort(404);
        }
        if (!isset(Auth::user()->info->roleDetail->rolePermission['permissions']['notification']['list']) && \Route::is('notification.index')) {
            return abort(404);
        }
        if (!isset(Auth::user()->info->roleDetail->rolePermission['permissions']['notification']['create']) && \Route::is('notification.create')) {
            return abort(404);
        }
        if (!isset(Auth::user()->info->roleDetail->rolePermission['permissions']['notification']['update']) && \Route::is('notification.update')) {
            return abort(404);
        }
        if (!isset(Auth::user()->info->roleDetail->rolePermission['permissions']['notification']['delete']) && \Route::is('notification.destroy')) {
            return abort(404);
        }
    }
}
