<?php

namespace App\Containers\AppSection\Authentication\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Authentication\Mails\ForgotPassword;
use App\Containers\AppSection\Authentication\Tasks\CreatePasswordResetTokenTask;
use App\Containers\AppSection\User\Tasks\FindUserByEmailTask;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Ship\Parents\Exceptions\Exception;
use App\Ship\Parents\Requests\Request;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordAction extends ParentAction
{
    public function __construct(
        private FindUserByEmailTask $findUserByEmailTask,
        private CreatePasswordResetTokenTask $createPasswordResetTokenTask,
    ) {
    }

    /**
     * @throws IncorrectIdException
     */
    public function run(Request $request): bool
    {
        $sanitizedData = $request->sanitizeInput([
            'email',
            'reseturl',
        ]);

        // It's a good idea to DON'T say if the user email is valid or not
        // (to avoid brute force checking of user email existing).
        try {
            $user = $this->findUserByEmailTask->run($sanitizedData['email']);
            if (! $user) {
                throw new NotFoundException();
            }
            $token = $this->createPasswordResetTokenTask->run($user);
            Mail::send(new ForgotPassword($user, $token, $sanitizedData['reseturl']));
        } catch (Exception) {
            throw new NotFoundException('Existen problemas con el correo electrónico, vuelva a intentarlo más tarde.');
        }

        return true;
    }
}
