@extends('layouts.app', ['page' => __('User Management'), 'pageSlug' => 'users', 'section' => 'users'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ __('translation.Users') }}</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary">{{ __('translation.Add_user') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('alerts.success')

                    <div class="">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <th scope="col">{{ __('translation.Name') }}</th>
                                <th scope="col">{{ __('translation.Email') }}</th>
                                <th scope="col">{{ __('translation.Creation_Date') }}</th>
                                <th scope="col">{{ __('translation.Photo') }}</th>
                                <th scope="col"></th>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>
                                            <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                                        </td>
                                        <td>{{ $user->created_at->format('d/m/Y H:i') }}</td>
                                        <td><img width="64px" height="64px" class="rounded-circle" src="{{asset('/images/profile_pictures/'.$user->image)}}" onerror="this.src='{{asset('images/user.png')}}';"></td>

                                        <td class="text-right">
                                                <div class="dropdown">
                                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="tim-icons icon-settings-gear-63"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                        @if (auth()->user()->id != $user->id)
                                                            <form action="{{ route('users.destroy', $user) }}" method="post">
                                                                @csrf
                                                                @method('delete')

                                                                <a class="dropdown-item" href="{{ route('users.edit', $user) }}">{{ __('translation.edit') }}</a>
                                                                <button type="button" class="dropdown-item" onclick="confirm('Вы уверены, что хотите удалить этого пользователя') ? this.parentElement.submit() : ''">
                                                                            {{ __('translation.delete') }}
                                                                </button>
                                                            </form>
                                                        @else
                                                            <a class="dropdown-item" href="{{ route('profile.edit', $user->id) }}">{{ __('translation.edit') }}</a>
                                                        @endif
                                                    </div>
                                                </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">
                        {{ $users->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
