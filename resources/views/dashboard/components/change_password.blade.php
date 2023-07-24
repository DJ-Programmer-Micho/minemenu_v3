<div class="col-span-12">
    <!-- BEGIN: Change Password -->
    <div class="intro-y box lg:mt-5">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
                {{__('Change Password')}}
            </h2>
        </div>
        <div class="p-5">
            <form action="{{ route('update-password') }}" method="POST">
                @csrf
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @elseif (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
                <div>
                    <label>{{__('Old Password')}}</label>
                    <input id="oldPasswordInput" name="old_password" type="password" class="input w-full border mt-2" placeholder="{{__('Old Password')}}">
                    @error('old_password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-3">
                    <label>{{__('New Password')}}</label>
                    <input id="newPasswordInput" name="new_password" type="password" class="input w-full border mt-2" placeholder="{{__('New Password')}}">
                    @error('new_password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-3">
                    <label>{{__('Confirm New Password')}}</label>
                    <input id="confirmNewPasswordInput" name="new_password_confirmation" type="password" class="input w-full border mt-2" placeholder="{{__('Confirm Password')}}">
                </div>
                <button type="submit" class="button bg-theme-1 text-white mt-4">{{__('Change Password')}}</button>
            </form>
        </div>
    </div>
    <!-- END: Change Password -->
</div>