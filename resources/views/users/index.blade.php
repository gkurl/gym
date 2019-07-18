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

                @if(Auth::user()->id !== $user->id)
            <a href="{{ route('user-edit', ['id' => $user->id]) }}" title="Edit user details">
                @endif

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
                    @datetime($user->dateofbirth)
            </td>

             <td>
             {{ $user->subscriptionid->subscription_name }}
             </td>

            @endforeach

            <a href= {{ route('users-create') }} class="btn btn-primary" >Add user</a>
            <a href= {{ route('report-view') }} class="btn btn-primary" >Generate Report</a>


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
        @foreach($errors as $e)

        <div class="alert alert-primary" role="alert"> {{ $e }} </div>

        @endforeach
        @endif


    </tbody>
</table>
