{{-- bg-theme-6 Dwon // chevron-down--}}
{{-- bg-theme-9 Up   // chevron-up--}}

<div class="intro-x">
    <div class="box px-5 py-3 mb-3 flex items-center zoom-in">
        <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden">
            <img alt="Mine Menu" src="{{$image}}">
        </div>
        <div class="ml-4 mr-auto">
            <div class="font-medium">{{$name}}</div>
            <div class="text-gray-600 text-xs">{{$date}}</div>
        </div>
        <div class="{{'text-theme-'.$textColor}}">{{$value}}</div>
    </div>
</div>