<?php

namespace Eyesee\Entities\Authentication\UI\API\Controllers;

use App\Http\Controllers\Controller;
use Eyesee\Entities\User\Models\User;
use Eyesee\Entities\User\Services\FindRedditUserService;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Eyesee\Entities\User\Services\CreateUserByRedditService;
use \Symfony\Component\HttpFoundation\RedirectResponse;
use \Illuminate\Http\JsonResponse;

/**
 * Class AuthenticationController
 * @package Entities\Authentification\UI\API\Controllers
 */
class AuthenticationController extends Controller
{
    /**
     * @return RedirectResponse
     */
    public function handleRedditRedirect(): RedirectResponse
    {
        return Socialite::driver('reddit')->redirect();
    }

    /**
     * @return JsonResponse
     */
    public function handleRedditLogin(): JsonResponse
    {
        $redditUser = Socialite::driver('reddit')->user();

        if (!$user = app(FindRedditUserService::class)->run($redditUser->token)) {
            $user = app(CreateUserByRedditService::class)->run([
                User::EMAIL    => $redditUser->getEmail(),
                User::NAME     => $redditUser->getName(),
                User::NICKNAME => $redditUser->getNickname()
            ]);
        }

        Auth::login($user);

        return response()->json($user->{User::NICKNAME});
    }
}
