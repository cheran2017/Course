<div class="row">
    <div class="col-md-4">
        <h1 class="h5">Profile Information</h1>

        <p>Update your account\'s profile information and email address.</p>
    </div>
    <div class="col-md-8 rounded p-2 shadow bg-light w-full right-col">
        <div class="m-3">

    
            <!-- Profile Photo -->
            {{-- @if (Laravel\Jetstream\Jetstream::managesProfilePhotos()) --}}
            <form action="{{route('update-profile')}}" method="post" enctype = "multipart/form-data">
            @csrf
                <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                    <!-- Profile Photo File Input -->
                    <input type="file" name="image" class="hidden"
                                wire:model="photo"
                                x-ref="photo"
                                x-on:change="
                                        photoName = $refs.photo.files[0].name;
                                        const reader = new FileReader();
                                        reader.onload = (e) => {
                                            photoPreview = e.target.result;
                                        };
                                        reader.readAsDataURL($refs.photo.files[0]);
                                " />

                    <x-jet-label for="photo" value="{{ __('Profile Photo') }}" />

                

                    @if (auth()->user()->profile_photo_path == null)
                    <img src="{{asset('assets/img/admin.jpg')}}" alt="Profile" class="rounded-full h-20 w-20 object-cover">
                    @else
                    <!-- Current Profile Photo -->
                    <div class="mt-2" x-show="! photoPreview">
                        <img src="{{asset('assets/images/'.auth()->user()->profile_photo_path)}}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover">
                    </div>
                    @endif

                    <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                        {{ __('Select A New Photo') }}
                    </x-jet-secondary-button>

                    @if ($this->user->profile_photo_path)
                        <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                            {{ __('Remove Photo') }}
                        </x-jet-secondary-button>
                    @endif

                    <x-jet-input-error for="photo" class="mt-2" />
                </div>
                {{-- @endif --}}

                <!-- Name -->
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="name" value="{{ __('Name') }}" />
                    <input id="name" b name = "name" type="text" class="mt-1 block w-full " wire:model.defer="state.name" autocomplete="name" />
                    <x-jet-input-error for="name" class="mt-2" />
                </div>

                <!-- Email -->
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="email" value="{{ __('Email') }}" />
                    <input id="email"  name = "email" type="email"  class="mt-1 block w-full" wire:model.defer="state.email" />
                    <x-jet-input-error for="email" class="mt-2" />
                </div>

            
                <button class="btn btn-primary button-submit" type="submit">Save</button>
            
            </form>
        </div>
    </div>      

</div>
