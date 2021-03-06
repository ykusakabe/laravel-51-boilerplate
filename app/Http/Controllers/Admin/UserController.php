<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\UserRepositoryInterface;
use App\Http\Requests\PaginationRequest;
use App\Http\Requests\Admin\UserUpdateRequest;

use Illuminate\Support\MessageBag;

class UserController extends Controller
{
    /** @var \App\Repositories\UserRepositoryInterface */
    protected $userRepository;

    /** @var \Illuminate\Support\MessageBag */
    protected $messageBag;

    public function __construct(
        UserRepositoryInterface $userRepositoryInterface,
        MessageBag $messageBag
    )
    {
        $this->userRepository = $userRepositoryInterface;
        $this->messageBag = $messageBag;
    }

    public function index(PaginationRequest $request)
    {
        $offset = $request->offset();
        $limit = $request->limit();

        $users = $this->userRepository->get('id', 'desc', $offset, $limit);

        return view('pages.admin.users.index', [
            'users'  => $users,
            'offset' => $offset,
            'limit'  => $limit,
        ]);
    }

    public function show($id)
    {
        $user = $this->userRepository->find($id);
        if (empty($user)) {
            abort(404);
        }

        return view('pages.admin.users.edit', [
            'user' => $user,
        ]);
    }

    public function create()
    {

    }

    public function store(UserUpdateRequest $request)
    {

    }

    public function update($id, UserUpdateRequest $request)
    {
        $user = $this->userRepository->find($id);
        if (empty($user)) {
            abort(404);
        }

        $this->userRepository->update($user, $request->all());
        return redirect()->action('Admin\UserController@show', [$id])->with('message-success',\Lang::get('admin.messages.general.update_success'));
    }


}
