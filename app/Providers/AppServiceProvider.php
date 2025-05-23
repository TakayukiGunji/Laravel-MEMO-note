<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use App\Http\Livewire\MemoForm;
use App\Http\Livewire\MemoList;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Carbon::setLocale('ja'); // ← これ追加！
        // 👇 ここに Livewire のコンポーネント登録を書く！
        
        Livewire::component('memo-form', MemoForm::class);
        Livewire::component('memo-list', MemoList::class);
        
    }
}