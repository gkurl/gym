@extends('layouts.app')
<table class="table table-striped">
    <thead>
        <tr>
            <th>Name</th>
            <th>Phonenumber</th>
            <th>Email</th>
            <th>Address</th>
            <th>Date Of Birth</th>
            <th>Subscription</th>
        </tr>
    </thead>

    <tbody>

        @if(Auth::user()->role_id < 2)
            @foreach ($users as $user)
        <tr>
            <td>
            <a href="{{ route('user-edit', ['id' => $user->id]) }}" title="Edit user details">
                {{ $user -> getFullName()}}
            </a>

            </td>

            <td>
                {{ (!empty($user->contactnumber)) ? $user->contactnumber : 'No contact number provided.' }}
            </td>

            <td>
                   {{ $user->email }}
            </td>

            <td>
                    {{ $user->address }}
             </td>

             <td>
                    {{ (!empty($user->dateofbirth)) ? $user->dateofbirth : 'No contact number provided.' }}
            </td>

             <td>
             {{ $user->subscriptionid->subscription_name }}
             </td>

            @endforeach
            @endif

        @if(Auth::user()->role_id > 1)
            <td>
            {{Auth::user()->firstname . ' ' . Auth::user()->lastname}}
            </td>

            <td>
                {{ (!empty(Auth::user()->contactnumber)) ? Auth::user()->contactnumber : 'No contact number provided.'}}
            </td>

            <td>
                    {{ Auth::user()->email }}
             </td>

             <td>
                     {{ Auth::user()->address }}
              </td>

              <td>
                  @datetime(Auth::user()->dateofbirth)
             </td>

              <td>
              {{ Auth::user()->subscriptionid->subscription_name }}
              </td>
            @endif
        </tr>
        @if(count($users) == 0 || empty($users))
        <tr>
            <td colspan="2">
                There are no users yet.
            </td>
        </tr>
        @endif
        @if ($errors->any())
        {{ implode('', $errors->all('<div>:message</div>')) }}
        @endif
    </tbody>
</table>
