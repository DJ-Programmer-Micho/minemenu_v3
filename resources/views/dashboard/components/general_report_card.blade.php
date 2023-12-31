{{-- bg-theme-6 Dwon // chevron-down--}}
{{-- bg-theme-9 Up   // chevron-up--}}

<div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
    <div class="report-box zoom-in">
        <div class="box p-5">
            <div class="flex">
                <i data-feather="{{$icon}}" class="report-box__icon {{'text-theme-'.$iconColor}}"></i> 
                <div class="ml-auto">
                    <div class="report-box__indicator {{'bg-theme-'.$theme}} tooltip cursor-pointer" title="33% Higher than last month"> {{$diff}} <i data-feather="{{$updown}}" class="w-4 h-4"></i> </div>
                </div>
            </div>
            <div class="text-3xl font-bold leading-8 mt-6">{{$value}}</div>
            <div class="text-base text-gray-600 mt-1">{{$title}}</div>
        </div>
    </div>
</div>