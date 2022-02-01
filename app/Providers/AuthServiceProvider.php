<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Helpers\Validate;
use App\Models\Technology;
use App\Policies\TechnologyPolicy;

class AuthServiceProvider extends ServiceProvider
{
    use Validate;
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Technology::class => TechnologyPolicy::class,
        Course::class => CoursePolicy::class,
        Category::class => CategoryPolicy::class,
        Role::class => RolePolicy::class,
        CourseTechnology::class => CourseTechnologyPolicy::class,
        Learning::class => LearningPolicy::class,
        CourseTitle::class => CourseTitlePolicy::class,
        CourseTitleDetail::class => CourseTitleDetailPolicy::class,
        Enquiry::class => EnquiryPolicy::class,
        Payment::class => PaymentPolicy::class,
        User::class => UserPolicy::class,
        Batch::class => BatchPolicy::class,
        Setting::class => SettingPolicy::class,

    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

    }
}
