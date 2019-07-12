<?php

namespace App\Providers;

use App\Mark;
use App\Repositories\Faculty\FacultyRepository;
use App\Repositories\Faculty\FacultyRepositoryInterface;
use App\Repositories\Mark\MarkRepository;
use App\Repositories\Mark\MarkRepositoryInterface;
use App\Repositories\Specialty\SpecialtyRepository;
use App\Repositories\Specialty\SpecialtyRepositoryInterface;
use App\Repositories\Student\StudentRepository;
use App\Repositories\Student\StudentRepositoryInterface;
use App\Repositories\Subject\SubjectRepository;
use App\Repositories\Subject\SubjectRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(FacultyRepositoryInterface::class,FacultyRepository::class);
        $this->app->singleton(SpecialtyRepositoryInterface::class,SpecialtyRepository::class);
        $this->app->singleton(SubjectRepositoryInterface::class,SubjectRepository::class);
        $this->app->singleton(StudentRepositoryInterface::class,StudentRepository::class);
        $this->app->singleton(MarkRepositoryInterface::class,MarkRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
