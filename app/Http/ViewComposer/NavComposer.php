<?php

namespace App\Http\ViewComposer;

use Illuminate\View\View;
use App\Service\Index;
use App\Repositories\UserRepository;

class NavComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $users;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct()
    {
        // Dependencies automatically resolved by service container...
        //$this->users = $users;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $navInfo = Index::getNavs();
        $view->with('nav', $navInfo);
    }
}